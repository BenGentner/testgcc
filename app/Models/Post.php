<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends \Webfactor\WfBasicFunctionPackage\Models\Post implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaConversions(Media|\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(640)
            ->height(360);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post-image')->singleFile();
    }

    public function image()
    {
        $image = $this->getFirstMediaUrl("post-image");
        return $image;
    }
    public function thumbnail()
    {
        $image = $this->getFirstMediaUrl("post-image", "thumb");
        return $image;
    }
}
