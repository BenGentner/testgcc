<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function nav()
    {
        return $this->belongsTo(Nav::class);
    }
    public function registerMediaConversions(Media|\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(640)
            ->height(360);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('page-header')->singleFile();
    }
}
