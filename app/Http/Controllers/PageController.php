<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Page $page)
    {
        $image = null;
        $media = $page->getMedia("page-header");

        if ($media->hasAny(0))
        {
            $image = $media[0]->getFullUrl();
        }
        return view("pages.standard", compact("image", "page"));
    }
}
