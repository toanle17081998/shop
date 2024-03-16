<?php 

namespace App\Http\Services\Client;
use App\Models\Menu;
use App\Models\Product;
use App\Models\slider;

class ClientSevice{
    
    public function slider(){
        return slider::where('active',1)->get();
    }

    public function menuParent(){
        return Menu::where('parent_id',0)->where('active',1)->get();
    }

    public function menuAll(){
        return Menu::where('active',1)->get();
    }

    public function product(){
        return Product::where('active',1)->orderByDesc('id')->get();
    }


}