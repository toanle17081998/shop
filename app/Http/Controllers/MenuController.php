<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\CreateMenuRequest;
use App\Http\Requests\Admin\Menu\UpdateMenuRequest;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function index(){
        return view('Admin.Menus.index',[
            'title'=>'Danh sách danh mục',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function create(){
        return view('Admin.Menus.add',[
            'title'=>'Thêm danh mục',
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function store(CreateMenuRequest $request){
        $result = $this->menuService->create($request);
        return redirect()->back();
    }

    public function destroy(Request $request){
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xoá k thành công'
        ]);
    }

    public function edit(Menu $id){
        return view('Admin.Menus.edit',[
            'title'=>'Sửa danh mục: '.$id->name,
            'menuCurrent'=> $id,
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function update(Menu $id , UpdateMenuRequest $request){
        $result = $this->menuService->update($request,$id);
        return redirect()->back();
    }
}
