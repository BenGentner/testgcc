<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;


use App\Models\Gallery;

class GalleryController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\GalleryController
{
    public function index($key)
    {
        $gallery = parent::index($key);
        $files = $gallery->images;
        return view('gallery_detail', compact('gallery', 'files'));
    }


    public function show()
    {
        $year = request("year");
        $galleries = Gallery::whereYear('created_at', '=', $year)->get();
        return view('gallery_list', compact('year', 'galleries'));
    }
}
