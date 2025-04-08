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
        $task = Task::with(['user:id,yourname', 'team:id,name', 'project:id,name'])->get();
        $projects = Project::select('id', 'name')->get();
        $users = User::select('id', 'yourname')->get();

        $totals_company = Task::join('teams as companies', 'tasks.cty_id', '=', 'companies.id')
        ->select('companies.id', 'companies.name as company_name', \DB::raw('SUM(tasks.actual_costs) as total_cost'))
        ->groupBy('companies.id', 'companies.name')
        ->orderByDesc('total_cost')
        ->where('tasks.classify_id', 3)
        ->get();

        $totals_san = Task::join('teams as sans', 'tasks.san_id', '=', 'sans.id')
        ->select('sans.id', 'sans.name as san_name', \DB::raw('SUM(tasks.actual_costs) as total_cost'))
        ->groupBy('sans.id', 'sans.name')
        ->orderByDesc('total_cost')
        ->where('tasks.classify_id', 3)
        ->get();

        $totals_team = Task::join('teams as team', 'tasks.team_id', '=', 'team.id')
        ->whereNotNull('tasks.actual_costs')
        ->select(
            'team.id',
            'team.name as team_name',
            \DB::raw('SUM(tasks.actual_costs) as total_cost')
        )
        ->groupBy('team.id', 'team.name')
        ->orderByDesc('total_cost')
        ->where('tasks.classify_id', 3)
        ->get();

        $channels = Channel::leftJoin('tasks', 'channels.id', '=', 'tasks.channel_id')
        ->select(
            'channels.id',
            'channels.name',
            'channels.parent',
            \DB::raw('COALESCE(SUM(tasks.actual_costs), 0) as total_cost')
        )
        ->groupBy('channels.id', 'channels.name', 'channels.parent')
        ->get();

        $totalAmount = collect($task)->sum(fn($t) => $t->actual_costs ?? 0);

        return view('admin.main.index', compact('totalAmount',
            'task',
            'projects',
            'users',
            'totals_company',
            'totals_san',
            'totals_team',
            'channels'
        ));
    }


    public function generateImage(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $username = $request->input('username');

        // Tải ảnh gốc
        $baseImagePath = public_path('data/anh.jpg'); // Đảm bảo ảnh tồn tại
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
