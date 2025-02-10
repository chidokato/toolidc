<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Request;
use Session;
use Illuminate\Http\Request;
use Image;
use File;
use App\Models\Team;
use App\Models\User;

class AjaxController extends Controller
{
    public function cty($id)
    {
        $data = Team::where('parent',$id)->get();
        echo '<option value="">--Chọn sàn--</option>';
        foreach ($data as $key => $val) {
            echo '<option value="'.$val->id.'">'.$val->name.'</option>';
        }
    }
    public function san($id)
    {
        $data = Team::where('parent',$id)->get();
        echo '<option value="">--Chọn nhóm--</option>';
        foreach ($data as $key => $val) {
            echo '<option value="'.$val->id.'">'.$val->name.'</option>';
        }
    }


   
}
