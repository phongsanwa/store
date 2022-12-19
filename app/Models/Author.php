<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    use HasFactory;
    protected $table ='authors';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
