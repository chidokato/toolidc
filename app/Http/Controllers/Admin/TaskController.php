<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use App\Models\Channel;
use App\Models\Project;
use App\Models\Supplier;
use App\Models\Team;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = task::first();
        $Channel = Channel::get();
        $Project = Project::get();
        $Supplier = Supplier::get();
        $data = Task::orderBy('id', 'desc')->get();
        return view('admin.task.index', compact(
            'Channel',
            'Project',
            'Supplier',
            'data',
        ));
    }

    public function search(Request $request)
    {
        // $data = $request->all();
        // $data->where('channel_id','like',"%$request->key%");
        $datefilter[] = '';
        $data = Task::where('id','!=' , 0);
        if($request->channel){
            
            $channel_id_array = [$request->channel];
            $channels = Channel::where('parent', $request->channel)->get();
            foreach ($channels as $val) {
                $channel_id_array[] = $val->id;
            }

            $data->whereIn('channel_id',$channel_id_array);
        }
        if($request->project){
            $data->where('project_id',$request->project);
        }
        if($request->supplier){
            $data->where('supplier_id',$request->supplier);
        }
        if(isset($request->datefilter)){
            $datefilter = explode(" - ", $request->datefilter);
            $day1 = date('Y-m-d',strtotime($datefilter[0]));
            $day2 = date('Y-m-d',strtotime($datefilter[1]));
            // $data->whereBetween('created_at', [$day1, $day2]);
            $data->whereDate('date','>=', $day1)->whereDate('date','<=', $day2);
        }
        $data = $data->paginate($request->paginate);

        // echo "string";
        // $Channel = Channel::get();
        // $Project = Project::get();
        // $Supplier = Supplier::get();
        return view('admin.task.load', compact(
            'data',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Channel = Channel::get();
        $Project = Project::get();
        $Supplier = Supplier::get();
        $team = Team::get();
        return view('admin.task.create', compact('Channel', 'Project', 'Supplier', 'team'));
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
        $task = new Task();
        $task->user_id = Auth::User()->id;
        $task->price = str_replace( array(',') , '', $data['price'] );
        $task->channel_id = $data['channel_id'];
        $task->project_id = $data['project_id'];
        $task->supplier_id = $data['supplier_id'];
        $task->team_id = $data['team_id'];
        $task->u_id = $data['u_id'];
        $task->date = $data['date'];
        $task->name = $data['name'];
        $task->content = $data['content'];
        $task->save();
        return redirect('admin/task')->with('success','successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Channel = Channel::get();
        $Project = Project::get();
        $Supplier = Supplier::get();
        $data = Task::find($id);
        return view('admin.task.edit', compact('Channel', 'Project', 'Supplier', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $task = Task::find($id);
        $task->price = str_replace( array(',') , '', $data['price'] );
        $task->channel_id = $data['channel_id'];
        $task->project_id = $data['project_id'];
        $task->supplier_id = $data['supplier_id'];
        $task->date = $data['date'];
        $task->name = $data['name'];
        $task->content = $data['content'];
        $task->save();

        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Task::find($id)->delete();
        return redirect()->back();
    }
}
