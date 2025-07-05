<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class Landing extends Controller
{
    /**
     * Show main landing page
     */
    public function index(): View
    {   
        // Get settings with caching
        $settings = Cache::remember('landing.settings', 360, function () {
            return Settings::getMultiple([
                'name', 'email', 'phone', 'whatsapp', 'facebook', 
                'instagram', 'linkedin', 'address_district', 'address_street', 
                'address_lat', 'address_lng', 'google_analytic_tag'
            ]);
        });

        // Get recent articles with caching
        $articles = Cache::remember('landing.articles', 1800, function () {
            return Articles::published()
                ->select('*')
                ->orderBy('updated_at', 'desc')
                ->limit(4)
                ->get();
        });

        $totalArticles = Cache::remember('landing.articles.count', 1800, function () {
            return Articles::published()->count();
        });

        $hasMoreArticles = $totalArticles > 4;

        return view('landing.main', compact(
            'settings', 'articles', 'hasMoreArticles'
        )); 
    }

    /**
     * Show article detail page
     */
    public function article(Request $request): View
    {   
        $urlKey = $request->route('id');

        // Get article with caching
        $article = Cache::remember("article.{$urlKey}", 1800, function () use ($urlKey) {
            return Articles::where('url_key', $urlKey)->first();
        });

        if (!$article) {
            abort(404);
        }

        // Get settings for article page
        $settings = Cache::remember('article.settings', 3600, function () {
            return Settings::getMultiple([
                'name', 'email', 'phone', 'whatsapp', 'facebook', 
                'instagram', 'linkedin', 'address_district', 'address_street', 
                'address_lat', 'address_lng', 'google_analytic_tag'
            ]);
        });

        // Get related articles
        $relatedArticles = Cache::remember("article.related.{$article->id}", 1800, function () use ($article) {
            return $article->getRelatedArticles(3);
        });

        return view('landing.article', compact('settings', 'article', 'relatedArticles')); 
    }
   
    /**
     * Show coming soon page
     */
    public function soon(): View
    {   
        return view('landing.soon'); 
    }

    /**
     * Get articles for AJAX loading
     */
    public function getArticles(Request $request)
    {
        $page = $request->get('page', 1);
        $perPage = 4;
        $offset = ($page - 1) * $perPage;

        $articles = Articles::published()
            ->select('*')
            ->orderBy('updated_at', 'desc')
            ->skip($offset)
            ->limit($perPage)
            ->get();

        $hasMore = Articles::published()->count() > ($page * $perPage);

        return response()->json([
            'articles' => $articles,
            'hasMore' => $hasMore,
            'nextPage' => $hasMore ? $page + 1 : null,
        ]);
    }

    /**
     * Search articles
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return response()->json(['articles' => [], 'total' => 0]);
        }

        $articles = Articles::published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('short_description', 'like', "%{$query}%");
            })
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        return response()->json([
            'articles' => $articles,
            'total' => $articles->count(),
            'query' => $query,
        ]);
    }
}