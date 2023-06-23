<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Request;
use Session;
use Illuminate\Http\Request;
use Image;
use File;
use App\Models\Category;
use App\Models\Images;
use App\Models\CategoryTranslation;
use App\Models\ProvinceTranslation;
use App\Models\DistrictTranslation;
use App\Models\WardTranslation;

class AjaxController extends Controller
{
    public function change_cate_lang($id)
    {
        $data = CategoryTranslation::where('category_id',$id)->get();
        foreach ($data as $key => $value) {
    		echo '<input value="'.$value->id.'" name="category_id:'.$value->locale.'" type="hidden">';
        }
    }

   
}
