<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Page $page)
    {
        /*TODO:
         * -template
         */
        $image = null;
        $media = $page->getMedia("page-header");

        if ($media->hasAny(0))
        {
            $image = $media[0]->getFullUrl();
        }
//        return $image;

//        return view("pages." . $page->template, compact("page"));
        return view("pages.standard", compact("image", "page"));
    }
}
