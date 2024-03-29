<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public static function getTopCompany()
    {
        return DB::select("
                            SELECT com.id,com.company_name,sum(od.quality) as total,com.company_image
                            FROM products as b
                            LEFT OUTER JOIN companies  as com
                            ON b.company_id=com.id
                            LEFT OUTER JOIN order_details  as od
                            ON b.id=od.product_id
                            GROUP BY com.id,com.company_name,com.company_image
                            ORDER BY total DESC
                            LIMIT 8
                        ");

    }
    public static function getTopCompanyInCategories($categories=array())
    {
        $strCate=implode(',', $categories);
        return DB::select("
                            SELECT com.id,com.company_name,count(b.id) as total
                            FROM products as b
                            LEFT OUTER JOIN categories  as c
                            ON c.id = b.category_id
                            LEFT OUTER JOIN companies  as com
                            ON b.company_id=com.id
                            WHERE c.id IN ($strCate)
                            GROUP BY com.id,com.company_name
                            ORDER BY total DESC
                        ");

    }
    public static function getAllCompany()
    {
        return DB::select("
                            SELECT c.id as companyId,c.company_name,c.company_info,c.company_image,
                                    count(b.id) as totalProduct
                            FROM companies as c
                            LEFT OUTER JOIN products  as b
                            ON c.id = b.company_id
                            GROUP BY c.id,c.company_name,c.company_info,c.company_image
                            ORDER BY totalProduct DESC
                        ");
    }
}
