<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'menu_id',
        'description',
        'content',
        'active',
        'image',
        'price',
        'price_sale',
    ];

    public function menu(){ 
        return $this->hasOne(Menu::class,'id','menu_id');
    }
}
