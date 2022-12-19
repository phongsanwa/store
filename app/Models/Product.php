<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Input;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'description','sku','images','category_id','user_id'
    ];
    protected $table ='products';

    /**
     *
     *  relationship 1-n (1 Category - n Product)
     *
     *  relationship 1-n (1 Author - n Product)
     *
     * relationship n-1 (n Attribute - n Product)
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function subProduct(){
        return $this->hasMany('App\Models\Product','parent_id');
    }
}
