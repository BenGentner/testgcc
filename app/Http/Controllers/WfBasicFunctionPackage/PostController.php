<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\PostController
{
    public function index($post)
    {
        $post = parent::index($post);

        $post->thumbnail = $post->thumbnail();
//        ddd($post->thumbnail);
        return view("Webfactor/WfBasicFunctionPackage/single_post", compact("post"));
    }


    public function show(Request $request)
    {
        $articles = $this->getPosts($request);
        return view("news", compact("articles"));
    }

    public function getPosts(Request $request)
    {
        $skip = $request->skip ?: config('wf-base.default_skip_posts');
        $amount = $request->amount ?:  config('wf-base.default_amount_posts');

        $articles = config('wf-resource.models.post')::query()->take($amount)->skip($skip)->orderBy("created_at", "desc")->get();


        $articles = collect($articles)->map(function($article) {
            $article->thumbnail = $article->thumbnail();
            return $article;

        });
        return $articles;
    }
    public function amount()
    {
        return DB::scalar("select count(*) from posts");
    }

}
