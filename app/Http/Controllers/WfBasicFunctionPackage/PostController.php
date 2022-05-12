<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;

use Illuminate\Http\Request;

class PostController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\PostController
{
    public function index($post)
    {
        $post = parent::index($post);
        return view("Webfactor/WfBasicFunctionPackage/single_post", compact("post"));
    }


    public function show(Request $request)
    {
        $articles = $this->getPosts($request);
        return view("news", compact("articles"));
    }

    public function getPosts(Request $request)
    {
        $articles = parent::show($request);

        $articles = collect($articles)->map(function($article) {
            $article->thumbnail = $article->thumbnail();
            return $article;
        });
        return $articles;
    }

}
