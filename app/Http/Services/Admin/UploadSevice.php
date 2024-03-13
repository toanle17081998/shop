<?php 

namespace App\Http\Services\Admin;

class UploadSevice
{
    public function store($request)
    {
        if($request->hasFile('file')){

            try {
                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/' . date('Y/m/d');
    
                $path = $request->file('file')->storeAs(
                    'public/'.$pathFull , $name
                );
                return '/storage/'. $pathFull.'/'. $name;
            } catch (\Throwable $th) {
                return false;
            }

        }
        return false;
    }
}
