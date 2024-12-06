<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "tbl_product";
    protected $primaryKey = 'product_id';
    public $incrementing = true;
    protected $fillable = [
        'product_id',
        'product_name',
        'category_id',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',
    ] ;
}
