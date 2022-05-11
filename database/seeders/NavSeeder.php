<?php

namespace Database\Seeders;

use App\Models\Nav;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nav::create([
            "id" => 1,
            "name" => "news",
            "type" => "internal_link",
            "link" => "http://127.0.0.1:8000",
            "lft" => 1,
        ]);
        Nav::create([
            "id" => 2,
            "name" => "Impressum",
            "type" => "page",
            "link" => "https://127.0.0.1:8000/impressum",
            "page_id" => 2,
            "lft" => 4,
        ]);

    }
}
