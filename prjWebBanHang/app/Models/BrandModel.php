<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = "tbl_brand";
    protected $primaryKey = 'brand_id';
    public $incrementing = true;
    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_desc',
        'brand_status',
    ] ;
}
