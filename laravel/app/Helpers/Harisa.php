<?php namespace App\Helpers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Auth;
use Cache;
use Carbon\Carbon;
use Session;
use Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Harisa
{
    /**
     * Generate standardized API response
     */
    public static function apiResponse(int $status, $data = null, string $message = ''): JsonResponse
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'timestamp' => now()->toISOString(),
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }

    /**
     * Generate success response
     */
    public static function success($data = null, string $message = 'Success'): JsonResponse
    {
        return self::apiResponse(200, $data, $message);
    }

    /**
     * Generate error response
     */
    public static function error(string $message = 'Error', int $status = 400, $data = null): JsonResponse
    {
        return self::apiResponse($status, $data, $message);
    }

    /**
     * Generate validation error response
     */
    public static function validationError($errors, string $message = 'Validation failed'): JsonResponse
    {
        return self::apiResponse(422, $errors, $message);
    }

    /**
     * Generate not found response
     */
    public static function notFound(string $message = 'Resource not found'): JsonResponse
    {
        return self::apiResponse(404, null, $message);
    }

    /**
     * Generate unauthorized response
     */
    public static function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return self::apiResponse(401, null, $message);
    }

    /**
     * Convert base64 to image file with validation
     */
    public static function base64ToImage(string $base64String, string $outputFile, string $directory = 'img/upload'): ?string
    {
        try {
            // Validate base64 string
            if (!preg_match('/^data:image\/(\w+);base64,/', $base64String, $type)) {
                Log::warning('Invalid base64 image format', ['file' => $outputFile]);
                return null;
            }

            $base64String = substr($base64String, strpos($base64String, ',') + 1);
            $base64String = str_replace(' ', '+', $base64String);

            if (!base64_decode($base64String, true)) {
                Log::warning('Invalid base64 image data', ['file' => $outputFile]);
                return null;
            }

            // Create directory if it doesn't exist
            $fullPath = public_path($directory);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true);
            }

            // Generate unique filename
            $extension = pathinfo($outputFile, PATHINFO_EXTENSION);
            $filename = Str::slug(pathinfo($outputFile, PATHINFO_FILENAME)) . '-' . Str::random(8) . '.' . $extension;
            $filePath = $fullPath . '/' . $filename;

            // Save file
            if (file_put_contents($filePath, base64_decode($base64String))) {
                return $filename;
            }

            Log::error('Failed to save base64 image', ['file' => $outputFile]);
            return null;

        } catch (\Exception $e) {
            Log::error('Error converting base64 to image', [
                'file' => $outputFile,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }

    /**
     * Legacy method for backward compatibility
     */
    public static function base64_to_jpeg(string $base64String, string $outputFile): ?string
    {
        return self::base64ToImage($base64String, $outputFile);
    }

    /**
     * Get setting value by name with caching
     */
    public static function getSettingByName(string $name, $default = null)
    {
        return \App\Models\Settings::getValue($name, $default);
    }

    /**
     * Set setting value by name
     */
    public static function setSettingByName(string $name, $value, ?string $updatedBy = null): bool
    {
        return \App\Models\Settings::setValue($name, $value, $updatedBy);
    }

    /**
     * Generate unique filename
     */
    public static function generateUniqueFilename(string $originalName, string $directory = 'uploads'): string
    {
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
        $timestamp = now()->format('Y-m-d-H-i-s');
        
        return "{$filename}-{$timestamp}-" . Str::random(6) . ".{$extension}";
    }

    /**
     * Format file size
     */
    public static function formatFileSize(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Validate image file
     */
    public static function validateImage($file): bool
    {
        if (!$file || !$file->isValid()) {
            return false;
        }

        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSize = 5 * 1024 * 1024; // 5MB

        return in_array($file->getMimeType(), $allowedMimes) && $file->getSize() <= $maxSize;
    }

    /**
     * Generate slug from text
     */
    public static function generateSlug(string $text, string $separator = '-'): string
    {
        return Str::slug($text, $separator);
    }

    /**
     * Format date for display
     */
    public static function formatDate($date, string $format = 'F j, Y'): string
    {
        if (!$date) {
            return '';
        }

        return Carbon::parse($date)->format($format);
    }

    /**
     * Get time ago
     */
    public static function timeAgo($date): string
    {
        if (!$date) {
            return '';
        }

        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * Truncate text with ellipsis
     */
    public static function truncate(string $text, int $length = 100, string $ending = '...'): string
    {
        return Str::limit($text, $length, $ending);
    }

    /**
     * Clean HTML content
     */
    public static function cleanHtml(string $html): string
    {
        return strip_tags($html, '<p><br><strong><em><ul><ol><li><h1><h2><h3><h4><h5><h6><a><img>');
    }

    /**
     * Generate random string
     */
    public static function randomString(int $length = 10): string
    {
        return Str::random($length);
    }

    /**
     * Check if string is valid JSON
     */
    public static function isValidJson(string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * Log activity
     */
    public static function logActivity(string $action, array $data = [], ?string $userId = null): void
    {
        Log::info('User Activity', [
            'action' => $action,
            'user_id' => $userId,
            'data' => $data,
            'timestamp' => now()->toISOString(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}