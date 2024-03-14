<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Menu\MenuService;

class ProductController extends Controller
{

    protected $menuService;
    protected $productService;

    public function __construct(MenuService $menuService, ProductService $productService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
    }
    public function index()
    {
        return view('Admin.Products.index', [
            'title' => 'Danh sách sản phẩm',
            'listProduct' => $this->productService->getListProduct(),
        ]);
    }


    public function create()
    {
        return view('Admin.Products.add', [
            'title' => 'Thêm sản phẩm',
            'menus' => $this->menuService->getAllMenu()
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Product $id)
    {
        return view('Admin.Products.edit',[
            'title' => 'Chỉnh sửa sản phẩm',
            'productCurrent'=> $id,
            'menus'=> $this->menuService->getAllMenu()
        ]);
    }


    public function update(StoreProductRequest $request, Product $id)
    {
        $this->productService->update($request,$id);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);
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
