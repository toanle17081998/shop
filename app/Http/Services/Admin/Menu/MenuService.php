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

    
    public function destroy($request){
        $id = $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu){
            return Menu::where('id', $id)->orWhere('parent_id',$id)->delete();
        };
        return false;
    }
    
    public function update($request,$id){
        try {
            $id->name = $request->input('name');
            $id->parent_id = $request->input('parent_id');
            $id->description = $request->input('description');
            $id->active = $request->input('active');
            $id->content = $request->input('content');
            $id->slug = Str::slug($request->input('name'));
            $id->save();
            $request->session()->flash('success', 'Sửa danh mục thành công !');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return false;
        }
        return true;
    }
    
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function getAllMenu(){
        return Menu::all();
    }

    public function getAll(){
        return Menu::orderBy('id')->simplePaginate(10);
    }
}