<?php

namespace App\Http\Services\Admin\Menu;

use App\Models\Menu;
use Str;

class MenuService
{

    public function create($request)
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'active' => $request->input('active'),
                'slug' => Str::slug($request->input('name')),
            ];
            Menu::create($data);
            $request->session()->flash('success', 'Tạo danh mục thành công !');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return false;
        }
        return true;
    }

    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function getAll(){
        return Menu::orderBy('id')->simplePaginate(10);
    }

    public function destroy($request){
        $id = $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu){
            return Menu::where('id', $id)->orWhere('parent_id',$id)->delete();
        };
        return false;
    }

}