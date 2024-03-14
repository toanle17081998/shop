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
            $request->session()->flash('error', 'Giá khuyến mãi phải bé hơn giá gốc !');
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
        return false;
    }

    public function getListProduct(){
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }

    public function update($request,$id){
        if ($this->isValidPrice($request)) {
            try {
                $id->fill($request->input());
                $id->save();
                $request->session()->flash('success', 'Chỉnh sửa thành công!');
                return true;
            } catch (\Throwable $th) {
                $request->session()->flash('error', 'Chỉnh sửa thất bại!');
                \Log::info($th->getMessage());
                return false;
            }

        };
        return false;
    }

    public function destroy($request){
        $id = $request->input('id');
        $product = Product::where('id', $id)->first();
        if($product){
            return Product::where('id', $id)->delete();
        };
        return false;
    }
}