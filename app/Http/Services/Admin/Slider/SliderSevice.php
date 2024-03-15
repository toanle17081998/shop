<?php 

namespace App\Http\Services\Admin\Slider;
use App\Models\slider;

class SliderSevice{

    public function insert($request){
        try {
            slider::create($request->input());
            $request->session()->flash('success', 'Thêm Slider thành công');
        } catch (\Throwable $th) {
            $request->session()->flash('error', 'Thêm Slider thất bại');
            return false;
        }
        return true;
    }

    public function list(){
        return slider::orderBy('order')->paginate(15);
    }

    public function update($id,$request){
        try {
            $id->fill($request->input());
            $id->save();
            $request->session()->flash('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            $request->session()->flash('erorr', 'Cập nhật thất bại');
            Log::info($th->getMessage());
            return false;
        };
        return true;
    }

    public function destroy($request){
        $id = $request->input('id');
        $slider = slider::where('id',$id)->first();
        if($slider){
            return slider::where('id',$id)->delete();
        }
        return false;
    }
}