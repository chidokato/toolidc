<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Channel;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::find(1);
        return view('admin.setting.index', compact(
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
        $channel = Channel::get();
        return view('admin.channel.create', compact('channel'));
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
        $channel = new Channel();
        $channel->user_id = Auth::User()->id;
        $channel->name = $data['name'];
        $channel->parent = $data['parent'];
        $channel->save();
        return redirect('admin/channel')->with('success','successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::get();
        $data = Channel::find($id);
        return view('admin.channel.edit', compact('channel', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        if (!$setting) {
            return redirect()->back()->with('error', 'Record not found');
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Kiểm tra định dạng file
            $allowedExtensions = ['xls', 'xlsx', 'csv'];
            $extension = $file->getClientOriginalExtension();

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
            }

            // Đặt tên file mới
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Lưu file trực tiếp vào thư mục public/uploads
            $file->move(public_path('uploads'), $fileName);

            // Cập nhật vào database
            $setting->update([
                'name'      => $request->name,
                'file_name' => 'uploads/' . $fileName,
            ]);
        } else {
            // Nếu không có file, chỉ cập nhật name
            $setting->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->back()->with('success', 'Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Channel::find($id)->delete();
        return redirect()->back();
    }
}
