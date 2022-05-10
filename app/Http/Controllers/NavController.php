<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavController extends Controller
{
    public function show()
    {
        //load not working
        return Nav::orderBy("lft", "ASC")->with("page", "children")->get();
    }
}
