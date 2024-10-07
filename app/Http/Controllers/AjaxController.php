<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data;

class AjaxController extends Controller
{
    public function set(Request $request){
        $name = $request->input('name');
        $phone = $request->input('phone');
        $link_fb = $request->input('link_share');
        $currentPos = $request->input('currentPos');

        $data = new data();
        $data->name = $name;
        $data->phone = $phone;
        $data->link_fb = $link_fb;
        $data->aff = $currentPos;
        
        $data->save();
        return \response()->json(['status' =>true]);
    }
}
