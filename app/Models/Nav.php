<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;

    protected $table = "nav_items";

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function parent()
    {
        return $this->belongsTo(Nav::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Nav::class, 'parent_id');
    }

    public function save(array $options = [])
    {
        switch ($this->type) {
            case 'internal_link':
                $this->link = ($this->link) ? url($this->link) : url('');
                break;

            case 'page':
                $this->link = url($this->page->slug);
                break;
            default: //external_link
                break;
        }

        return parent::save($options);
    }
}
