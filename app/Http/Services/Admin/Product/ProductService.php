<?php

namespace App\Http\Services\Admin\Product;

use App\Models\Product;

class ProductService
{

    protected function isValidPrice($request)
    {
        $priceSale = $request->input('price_sale');
        $price = $request->input('price');

        if ($priceSale && $priceSale >= $price) {
            return false;
        }
        return true;
    }


    public function insert($request)
    {
        if ($this->isValidPrice($request)) {
            try {
                $data = $request->except('_token');
                Product::create($data);
                $request->session()->flash('success', 'Thêm mới thành công!');
                return true;
            } catch (\Throwable $th) {
                $request->session()->flash('error', 'Thêm mới thất bại!');
                \Log::info($th->getMessage());
                return false;
            }

        }
        $request->session()->flash('error', 'Giá khuyến mãi phải bé hơn giá gốc !');
        return false;
    }
}