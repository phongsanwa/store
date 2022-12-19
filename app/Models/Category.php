<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name', 'parent_id', 'order','images'
    ];
    protected $table ='categories';
    protected $guarded =[];

    public $timestamps = false;


    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

//    public function attributes()
//    {
//        return $this->hasMany(Attribute::class,'attribute_id','id');
//    }
    public function attributes() {
        return $this->belongsToMany('App\Models\Attribute');
    }

    public function subCategory(){
        return $this->hasMany('App\Models\Category','parent_id');
    }
}
