<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Recursion get all id Categories
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function getAllIdCategories($categories, $parent_id = 0,$arr=array())
    {
        foreach ($categories as $key => $item)
        {
            if ($parent_id!=0) {
                array_push($arr, $parent_id);
            }
            if ($item['parent_id'] == $parent_id)
            {
                array_push($arr,$item['id']);
                unset($categories[$key]);
                CategoryController::getAllIdCategories($categories, $item['id'], $arr);

            }
        }

        return array_unique($arr);
    }

    public static function getAllCategoriesId($categoryId=0)//lấy toàn bộ id của danh mục con và của chính nó
    {
        $arr=array();

        $result=Category::select('id','parent_id')
            ->find($categoryId);

        $categoriesId=  Category::select('id')
            ->where('parent_id','=',$result->id)
            ->get();

        foreach ($categoriesId as  $categoryId)
            $arr[]=$categoryId->id;

        array_push($arr,$result->id);
        return $arr;
    }
}
