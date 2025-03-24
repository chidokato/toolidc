<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $key = $request->get('key', '');
        $cty = $request->get('cty', '');

        $query = Team::query();
        // if ($key) {
        //     $query->where('name', 'like', '%' . $key . '%');
        // }
        if ($cty) {
            $query->where('id', $cty);
        }
        $teams = $query->where('parent', 0)->get();

        return view('admin.team.index', compact(
            'teams',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::get();
        return view('admin.team.create', compact('team'));
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
        $team = new Team();
        $team->user_id = Auth::User()->id;
        $team->name = $data['name'];
        $team->parent = $data['parent'];
        $team->save();
        return redirect('admin/team')->with('success','successfully');
    }

    public function upfile(Request $request)
    {
        $request->validate([
            'txt_file' => 'required|file|mimes:txt',
        ]);

        $file = $request->file('txt_file');

        $fileContent = file($file->getRealPath(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($fileContent as $line) {
            $data = explode(',', $line);
            DB::table('teams')->insert([
                'user_id' => 1,
                'name' => $data[0],
            ]);
        }

        return back()->with('success', 'success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $Team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $Team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::get();
        $data = Team::find($id);
        return view('admin.team.edit', compact('team', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $Team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $team = Team::find($id);
        $team->name = $data['name'];
        $team->parent = $data['parent'];
        $team->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $Team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Team::find($id)->delete();
        return redirect()->back();
    }
}
