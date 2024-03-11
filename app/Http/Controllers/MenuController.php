<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\CreateMenuRequest;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Menu\MenuService;

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
}
