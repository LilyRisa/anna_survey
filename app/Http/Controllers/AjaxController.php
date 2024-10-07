<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function set(Request $request)
    {
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
        return \response()->json(['status' => true]);
    }

    public function get(Request $request)
    {
        if ($request->method() == 'POST')  {
            $phone = $request->input('q');
            $data = data::where('phone', $phone)->get();
            if(!$data->isEmpty()){
                foreach($data as $item){
                    $item->time = Carbon::parse($item->created_at)->format('H:i:s d/m/Y');
                    // check trùng link share với sđt khác
                    $repeat = data::where('link_fb', $item->link_fb)->whereNotIn('phone', [$item->phone])->get();
                    $item->unique = count($repeat);
                    $unique_phone = [];
                    if(!$repeat->isEmpty()){
                        foreach($repeat as $rp){
                            $unique_phone[] = $rp->phone;
                        }
                    }
                    $item->unique_phone = $unique_phone;
                }
                
            }
            return \response()->json(['data' => $data]);
        }
        return view('check');
    }
}
