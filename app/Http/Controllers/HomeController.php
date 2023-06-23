<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\PostTranslation;
use App\Models\Images;
use App\Models\SectionTranslation;
use App\Models\SliderTranslation;
use App\Models\SettingTranslation;

// $locale = App::currentLocale();

class HomeController extends Controller
{
    // function __construct()
    // {
        
    //     view()->share( [
            
    //     ]);
    // }

    public function index()
    {
        $locale = App::currentLocale();
        $setting = SettingTranslation::where('locale', $locale)->first();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        // end
        $slider = SliderTranslation::where('locale', $locale)->get();
        // $project = PostTranslation::join('category_translations', 'category_translations.id', '=', 'post_translations.category_tras_id')
        //     ->select('post_translations.*')
        //     ->where('category_translations.locale', $locale)
        //     ->where('category_translations.category_id', 39)
        //     ->get();
        $project = CategoryTranslation::where('locale', $locale)->where('category_id', 39)->first();
        return view('pages.home', compact(
            'category',
            'slider',
            'project',
        ));
    }

    public function about()
    {
        $locale = App::currentLocale();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        return view('pages.about', compact(
            'category',
        ));
    }

    public function contact()
    {
        $locale = App::currentLocale();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        return view('pages.contact', [
            'category'=>$category,
        ]);
    }

    public function category($slug)
    {
        $locale = App::currentLocale();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        // end

        $data = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->select('category_translations.*')
            ->where('slug', $slug)
            ->where('locale', $locale)->first();

        // cat_array
        $cat_array = [$data["id"]];
        $cates = CategoryTranslation::where('parent', $data["id"])->get();
        foreach ($cates as $key => $cate) {
            $cat_array[] = $cate->id;
        }
        // cat_array

        $post = PostTranslation::whereIn('category_tras_id', $cat_array)
            ->where('locale', $locale)
            ->orderBy('id', 'desc')
            ->paginate(7);
        if ($data->category->sort_by == 'Product') {
            return view('pages.category', compact(
                'category',
                'data',
                'post'
            ));
        }elseif($data->category->sort_by == 'News'){
            return view('pages.news', compact(
                'category',
                'data',
                'post',
            ));
        }
    }

    public function post($catslug, $slug)
    {
        $locale = App::currentLocale();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get(); //menu
        $post = PostTranslation::join('posts', 'posts.id', '=', 'post_translations.post_id')
            ->where('locale', $locale)
            ->select('post_translations.*')
            ->where('posts.slug', $slug)
            ->first();
        $related_post = PostTranslation::join('posts', 'posts.id', '=', 'post_translations.post_id')
            ->where('category_tras_id', $post->category_tras_id)
            ->where('locale', $locale)
            ->get();
        if ($post->post->sort_by == 'Product') {
            $images = Images::where('post_id', $post->post->id)->get();
            $section = SectionTranslation::where('locale', $locale)->where('post_id', $post->post->id)->orderBy('view', 'asc')->get();
            return view('pages.project', compact(
                'category',
                'post',
                'images',
                'section',
                'catslug',
                'related_post',
            ));
        }elseif ($post->post->sort_by == 'News') {
            return view('pages.post', compact(
                'category',
                'post',
            ));
        }
        
    }
}
