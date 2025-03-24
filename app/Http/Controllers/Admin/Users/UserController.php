<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Team;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $users = User::orderBy('id', 'DESC')->get();
    //     return view('admin.user.index', compact('users'));
    // }

    public function index(Request $request)
    {
        $teams = Team::orderBy('id', 'DESC')->get();
        $perPage = $request->get('per_page', 20); // Mặc định là 20 nếu không có lựa chọn
        $key = $request->get('key', '');
        $permission = $request->get('permission', '');
        
        $query = User::query();

        if ($key) {
            $query->where('yourname', 'like', '%' . $key . '%');
        }

        if ($permission) {
            $query->where('permission', $permission);
        }

        $users = $query->orderBy('id', 'DESC')->paginate($perPage);

        return view('admin.user.index', compact(
            'teams',
            'users',
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
        return view('admin.user.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'password' => 'Required',
            'passwordagain' => 'Required|same:password',
            'email'=>'required|email|unique:users,email',
        ],
        [
            'email.unique'=>'Email đã tồn tại',
        ] );
        $data = $request->all();
        $User = new User();
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->permission = $request->permission;
        $User->yourname = $request->yourname;
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->facebook = $request->facebook;
        $User->team_id = $request->team_id;
        $User->save();
        return redirect('admin/users')->with('success','successfully');
    }

    public function upfile(Request $request)
    {
        // $request->validate([
        //     'txt_file' => 'required|file|mimes:txt',
        // ]);

        $file = $request->file('txt_file');

        $fileContent = file($file->getRealPath(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // dd($fileContent);

        foreach ($fileContent as $line) {
            $data = explode(',', $line);
            DB::table('users')->insert([
                'yourname' => $data[1],
                'sku' => $data[0],
            ]);
        }

        return back()->with('success', 'success.');
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
        $data = User::find($id);
        $team = Team::get();
        return view('admin.user.edit', compact(
            'data',
            'team',
        ));
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
        $User = User::find($id);

        if($request->changepassword == "on")
        {
            $this->validate($request,
            [
                'password' => 'Required',
                'passwordagain' => 'Required|same:password'                
            ],
            [] );
            $User->password = bcrypt($request->password);
        }

        $User->email = $request->email;
        $User->permission = $request->permission;
        $User->yourname = $request->yourname;
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->sku = $request->sku;
        $User->facebook = $request->facebook;
        $User->team_id = $request->team_id;
        $User->save();
        return redirect()->back()->with('success','Thành công');
        // return redirect('admin/users')->with('success','successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "ok";
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
