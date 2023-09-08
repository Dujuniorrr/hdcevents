<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploadImage(Request $request, $nameKey = 'image', $save_path = 'img/'){
        if($request->hasFile($nameKey) && $request->file($nameKey)->isValid()){
            $extension = $request->image->extension();
            $imgName = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path($save_path), $imgName);

            return $imgName;
        }
        
        return false;
    }
}
