<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Food extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'category',
        'description',
        'image',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        $media = $this->getFirstMedia();
        if (!$media) {
            return null;
        }

        if ($media->hasGeneratedConversion('thumb')) {
            return $media->getUrl('thumb');
        }

        return $media->getUrl();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);

    }

    public function imageUrl($conversionName = 'thumb')
    {
        $media = $this->getFirstMedia();
        if (!$media) {
            return null;
        }
        if ($conversionName && $media->hasGeneratedConversion($conversionName)) {
            return $media->getUrl($conversionName);
        }
        return $media->getUrl();
    }
}
