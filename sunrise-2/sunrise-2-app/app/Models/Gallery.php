<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'type',
        'title',
        'category',
        'image_path',
        'video_url',
        'video_path',
        'thumbnail_path',
    ];

    /**
     * Check if item is a video
     */
    public function getIsVideoAttribute(): bool
    {
        return $this->type === 'video';
    }

    /**
     * Check if item is a photo
     */
    public function getIsPhotoAttribute(): bool
    {
        return $this->type !== 'video';
    }

    /**
     * Extract YouTube ID if video_url is a YouTube link
     */
    public function getYoutubeIdAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?|shorts)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
        if (preg_match($pattern, $this->video_url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Check if it's a YouTube video
     */
    public function getIsYoutubeAttribute(): bool
    {
        return !empty($this->youtube_id);
    }

    /**
     * Check if it's an uploaded video file
     */
    public function getIsVideoFileAttribute(): bool
    {
        return !empty($this->video_path);
    }

    /**
     * Get embed URL for iframe
     */
    public function getEmbedUrlAttribute(): ?string
    {
        if ($this->youtube_id) {
            return "https://www.youtube-nocookie.com/embed/{$this->youtube_id}?autoplay=1&rel=0";
        }

        if ($this->video_path) {
            return asset('storage/' . $this->video_path);
        }

        return $this->video_url;
    }

    /**
     * Get direct video stream URL
     */
    public function getDirectVideoUrlAttribute(): ?string
    {
        if ($this->video_path) {
            return asset('storage/' . $this->video_path);
        }

        return null;
    }

    /**
     * Get thumbnail URL (works for both photo and video)
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail_path)) {
            return asset('storage/' . $this->thumbnail_path);
        }

        if (!empty($this->image_path)) {
            return asset('storage/' . $this->image_path);
        }

        if ($this->youtube_id) {
            return "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg";
        }

        return asset('kider/img/classes-1.jpg');
    }
}
