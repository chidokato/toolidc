<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use App\Models\Total;
use App\Models\Task;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Project::first();
        $data = Project::get();
        return view('admin.project.index', compact(
            'data',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $note = 'project';
        $date = '2023-06';
        $project = Project::get();
        foreach ($project as $key => $value) {
            $Task = Task::where('project_id',$value->id)->where('date','like',"%$date%")->get();
            $i = 0;
            foreach ($Task as $key => $val) {
                $i = $i + $val->price;
            }
            $countTotal = Total::where('date', $date)->where('project_id', $value->id)->count();
            if($countTotal > 0){
                $Total = Total::where('date', $date)->where('project_id', $value->id)->first();
                $Total->peice = $i;
                $Total->save();
            }else{
                $Total = new Total();
                $Total->project_id = $value->id;
                $Total->peice = $i;
                $Total->date = $date;
                $Total->save();
            }
        }
        return redirect()->back();
    }

    public function create()
    {
        $project = Project::get();
        return view('admin.project.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $project = new Project();
        $project->user_id = Auth::User()->id;
        $project->name = $data['name'];
        $project->save();
        return redirect('admin/project')->with('success','successfully');
    }

    public function upfile(Request $request)
    {
        $request->validate([
            'txt_file' => 'required|file|mimes:txt',
        ]);

        $file = $request->file('txt_file');

        $fileContent = file($file->getRealPath(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($fileContent as $line) {
            $data = explode('"', $line);
            DB::table('projects')->insert([
                'user_id' => 1,
                'name' => $data[0],
            ]);
        }

        return back()->with('success', 'success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $Project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::get();
        $data = Project::find($id);
        return view('admin.Project.edit', compact('project', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $Project = Project::find($id);
        $Project->name = $data['name'];
        $Project->save();
        // return redirect()->back();
        return redirect('admin/project')->with('success','successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Project::find($id)->delete();
        return redirect()->back();
    }
}
