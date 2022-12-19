<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseClass;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Author;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ModelClass;
class HomeController extends Controller
{


    /**
     *
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }




    /**
     *
     *Class BaseClass::handlingView xử lý dữ liệu trước khi trả về view
     * @return void
     */
    public function index()
    {
        return view('front-end.home');
    }
}
