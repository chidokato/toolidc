<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Channel;
use App\Models\Project;
use App\Models\Supplier;
use App\Models\Team;
use App\Models\User;

use Image;
use File;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $arays = Task::get();
        // foreach($arays as $aray){
        //     $aa = Task::find($aray->id);
        //     if($aa->team == 'NHóm Lộc'){ $aa->team = 6; }
        //     $aa->save();
        // }

        $task = Task::
            leftJoin('users', 'users.id', '=', 'tasks.u_id')
            ->leftJoin('teams', 'teams.id', '=', 'tasks.team_id')
            ->leftJoin('projects', 'projects.id', '=', 'tasks.project_id')
            ->select('tasks.*', 'users.yourname', 'projects.name AS project_name', 'teams.name AS teams_name')
            ->get();
        $project = Project::get();
        $Team = Team::get();
        $User = User::get();
        return view('admin.main.index', compact(
            'task',
            'project',
            'Team',
            'User',
        ));
    }

    public function generateImage(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $username = $request->input('username');

        // Tải ảnh gốc
        $baseImagePath = public_path('images/base_image.png'); // Đảm bảo ảnh tồn tại
        $image = Image::make($baseImagePath);

        // Cấu hình font, kích thước và màu chữ
        $fontPath = public_path('fonts/arial.ttf'); // Thêm font vào thư mục public/fonts
        $image->text($username, 100, 100, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(40);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('middle');
        });

        // Lưu ảnh tạm thời vào bộ nhớ
        $filePath = storage_path('app/public/generated_image.png');
        $image->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
