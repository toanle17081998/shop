<?php

namespace App\Http\Controllers\Admin\Sliders;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Slider\SliderSevice;
use App\Models\slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderSevices;
    public function __construct(SliderSevice $sliderSevice){
        $this->sliderSevices = $sliderSevice;
    } 

    public function index(){
        return view('Admin.Slider.index',[
            'title' => 'Danh sách slider',
            'listSlider'=> $this->sliderSevices->list(),
        ]);
    }

    public function create(){
        return view('Admin.Slider.add',[
            'title' => 'Thêm mới slider',
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'order' => 'required',
            'image'=>'required'
        ]);
        $this->sliderSevices->insert($request);
        return redirect()->back();
    }

    public function edit(slider $id){
        return view('Admin.Slider.edit',[
            'title' => 'Chỉnh sửa slider',
            'slider'=> $id
        ]);
    }

    public function update(slider $id,Request $request){
        $this->validate($request,[
            'name'=>'required',
            'order' => 'required',
            'image'=>'required'
        ]);

        $this->sliderSevices->update($id,$request);
        return redirect()->back();
    }

    public function destroy(Request $request){
        $result = $this->sliderSevices->destroy($request);
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
