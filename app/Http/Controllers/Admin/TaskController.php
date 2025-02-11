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
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 30); // Mặc định là 30 nếu không có lựa chọn
        $project_id = $request->get('project_id', ''); // dự án
        $channel_id = $request->get('channel_id', ''); // Kênh
        $supplier_id = $request->get('supplier_id', ''); // Nhà cung cấp
        $team_id = $request->get('team_id', ''); // nhóm
        $sort = $request->get('sort', 'desc'); // Mặc định là sắp xếp giảm dần
        $datefilter = $request->get('datefilter'); // datefilter

        $query = Task::query();

        if ($project_id) {
            $query->where('project_id', $project_id);
        }
        if ($channel_id) {
            $channel_array = [$channel_id];
            $Channels = Channel::where('parent', $channel_id)->get();
            foreach ($Channels as $key => $Channel) {
                $channel_array[] = $Channel->id;
            }
            $query->whereIn('channel_id', $channel_array);
        }
        if ($supplier_id) {
            $query->where('supplier_id', $supplier_id);
        }
        if ($team_id) {
            $query->where('team_id', $team_id);
        }

        // Xử lý datefilter
        if ($datefilter) {
            $dates = explode(' - ', $datefilter);
            if (count($dates) === 2) {
                // Chuyển đổi từ định dạng MM/DD/YYYY sang YYYY-MM-DD
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[0]))->format('Y-m-d');
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[1]))->format('Y-m-d');

                $query->whereBetween('date_start', [$startDate, $endDate]);
            }
        }

        $totalCosts = $query->sum('actual_costs');

        $query->orderBy('id', 'DESC');
        // $query->orderBy('date_start', $sort);

        $data = $query->paginate($perPage);

        $Channel = Channel::get();
        $Project = Project::get();
        $Supplier = Supplier::get();
        $team = Team::get();
        return view('admin.task.index', compact(
            'Channel',
            'Project',
            'Supplier',
            'team',
            'data',
            'totalCosts',
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
        if($request->team){
            $data->where('team_id',$request->team);
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
        $cty = Team::where('parent',0)->get();
        $san = Team::where('parent',1)->get();
        $user = User::get();
        return view('admin.task.create', compact(
            'Channel',
            'Project',
            'Supplier',
            'cty',
            'san',
            'user'
        ));
    }

    public function upfile(Request $request)
    {
        // $request->validate([
        //     'txt_file' => 'required|file|mimes:txt',
        // ]);
        $file = $request->file('txt_file');
        $fileContent = file($file->getRealPath(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($fileContent as $line) {
            $data = explode(',', $line);
            $task = new Task();
            $task->user_id = Auth::User()->id;
            $task->channel_id = $data[5];
            $task->project_id = $data[4];
            $task->supplier_id = $data[6];
            $task->cty_id = $data[3];
            $task->san_id = $data[2];
            $task->team_id = $data[1];
            $task->u_id = $data[0];
            $task->support_rate = $data[8];
            $task->confirm = $data[9];
            $task->expected_costs = str_replace( array('.') , '', $data[7] );
            $task->actual_costs = str_replace( array('.') , '', $data[10] );
            $task->date_start = $data[11];
            $task->date_end = $data[12];
            $task->save();
        }
        return back()->with('success', 'success.');
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
        // dd($data);
        $task = new Task();
        $task->user_id = Auth::User()->id;
        $task->channel_id = $data['channel_id'];
        $task->project_id = $data['project_id'];
        $task->supplier_id = $data['supplier_id'];
        $task->cty_id = $data['cty_id'];
        $task->san_id = $data['san_id'];
        $task->team_id = $data['team_id'];
        $task->u_id = $data['u_id'];
        $task->user_sku = $data['user_sku'];
        $task->support_rate = $data['support_rate'];
        $task->confirm = $request->get('confirm');
        $task->expected_costs = str_replace( array(',') , '', $data['expected_costs'] );
        $task->actual_costs = str_replace( array(',') , '', $data['actual_costs'] );
        // Xử lý datefilter
        if ($request->get('datefilter')) {
            $dates = explode(' - ', $request->get('datefilter'));
            if (count($dates) === 2) {
                // Chuyển đổi từ định dạng MM/DD/YYYY sang YYYY-MM-DD
                $task->date_start = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[0]))->format('Y-m-d');
                $task->date_end = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[1]))->format('Y-m-d');
            }
        }
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
        $data = Task::find($id);
        $Channel = Channel::get();
        $Project = Project::get();
        $Supplier = Supplier::get();
        $cty = Team::where('parent',0)->get();
        $san = Team::where('parent',$data['cty_id'])->get();
        $nhom = Team::where('parent',$data['san_id'])->get();
        $user = User::get();
        return view('admin.task.edit', compact(
            'Channel', 
            'Project', 
            'Supplier', 
            'cty', 
            'san', 
            'nhom', 
            'user', 
            'data'
        ));
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
        $task->channel_id = $data['channel_id'];
        $task->project_id = $data['project_id'];
        $task->supplier_id = $data['supplier_id'];
        $task->cty_id = $data['cty_id'];
        $task->san_id = $data['san_id'];
        $task->team_id = $data['team_id'];
        $task->u_id = $data['u_id'];
        $task->user_sku = $data['user_sku'];
        $task->support_rate = $data['support_rate'];
        $task->confirm = $request->get('confirm');
        $task->expected_costs = str_replace( array(',') , '', $data['expected_costs'] );
        $task->actual_costs = str_replace( array(',') , '', $data['actual_costs'] );
        // Xử lý datefilter
        if ($request->get('datefilter')) {
            $dates = explode(' - ', $request->get('datefilter'));
            if (count($dates) === 2) {
                // Chuyển đổi từ định dạng MM/DD/YYYY sang YYYY-MM-DD
                $task->date_start = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[0]))->format('Y-m-d');
                $task->date_end = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[1]))->format('Y-m-d');
            }
        }
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
        $ids = $request->input('id');

        if (!empty($ids)) {
            Task::whereIn('id', $ids)->delete();
        }

        return redirect()->route('task.index')->with('success', 'Các mục đã được xóa thành công.');
    }

    public function dell_all(Request $request)
    {

        // $ids = $request->input('id');

        // if (!empty($ids)) {
        //     Task::whereIn('id', $ids)->delete();
        // }

        // return redirect()->route('task.index')->with('success', 'Các mục đã được xóa thành công.');
    }
}
