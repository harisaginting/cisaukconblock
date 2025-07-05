<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url_key' => $this->url_key,
            'category' => $this->category,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'excerpt' => $this->excerpt,
            'image_desktop' => $this->image_desktop,
            'image_mobile' => $this->image_mobile,
            'desktop_image_url' => $this->desktop_image_url,
            'mobile_image_url' => $this->mobile_image_url,
            'has_images' => $this->hasImages(),
            'publish_date' => $this->publish_date,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
            'user' => $this->whenLoaded('user', function () {
                return new UserResource($this->user);
            }),
        ];
    }
} 