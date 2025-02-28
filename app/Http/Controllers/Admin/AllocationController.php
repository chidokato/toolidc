<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Report;
use App\Models\Team;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use File;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Report::where('parent',0)->get();
        return view('admin.allocation.index' , compact('data'));
    }

    public function export(Request $request)
    {
        $data = $request->all();

        $dates = explode(' - ', $data['datefilter']); // Tách chuỗi thành mảng
        if (count($dates) == 2) {
            $start_date = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->format('Y-m-d');
            $end_date = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->format('Y-m-d');
        }

        $report = new Report();
        $report->user_id = Auth::User()->id;
        $report->name = $data['name'];
        $report->start_date = $start_date;
        $report->end_date = $end_date;
        $report->classify = $data['classify'];
        $report->parent = 0;
        $report->save();

        $tasks = Task::where('date_end', $data['datefilter'])->get();

        // Thêm danh sách công ty, sàn /  chi nhánh vào báo cáo
        if ($data['classify'] == 'Báo cáo theo sàn / chi nhánh') {
            $teams_ctys = Team::where('parent',0)->get();
            foreach($teams_ctys as $teams_cty){
                $report_cty = new Report();
                $report_cty->user_id = Auth::User()->id;
                $report_cty->name = $teams_cty->name;
                $report_cty->team_id = $teams_cty->id;
                $report_cty->parent = $report['id'];
                $report_cty->save();

                $teams_sans = Team::where('parent',$teams_cty->id)->get();
                foreach($teams_sans as $teams_san){
                    $report_san = new Report();
                    $report_san->user_id = Auth::User()->id;
                    $report_san->name = $teams_san->name;
                    $report_san->team_id = $teams_san->id;
                    $report_san->parent = $report_cty['id'];
                    $report_san->save();
                }
            }
        }

        return redirect()->back();
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
        $datas = Report::where('parent', $request->id)->get();
        foreach($datas as $val){
            // Lấy tổng actual_costs theo từng classify_id trong 1 truy vấn
            $totals = Task::whereBetween('date_end', [$request->start_date, $request->end_date])
                ->where('cty_id', $val->team_id)
                ->whereIn('classify_id', [3, 4, 5, 6])
                ->selectRaw('classify_id, SUM(actual_costs) as total_cost')
                ->groupBy('classify_id')
                ->pluck('total_cost', 'classify_id'); // Kết quả sẽ có dạng [3 => total_3, 4 => total_4, 6 => total_6]
            $update_report = Report::find($val->id);
            if ($update_report) {
                $update_report->mkt_price = $totals[3] ?? 0; // Marketing
                $update_report->luong_price = $totals[4] ?? 0; // Lương
                $update_report->bhxh_price = $totals[5] ?? 0; // Bảo hiểm xã hội
                $update_report->vhnp_price = $totals[6] ?? 0; // Vận hành VP
                $update_report->save();
            }

            foreach($val->children as $child){
                // Lấy tổng actual_costs theo từng classify_id trong 1 truy vấn
                $totals = Task::whereBetween('date_end', [$request->start_date, $request->end_date])
                    ->where('san_id', $child->team_id)
                    ->whereIn('classify_id', [3, 4, 5, 6])
                    ->selectRaw('classify_id, SUM(actual_costs) as total_cost')
                    ->groupBy('classify_id')
                    ->pluck('total_cost', 'classify_id'); // Kết quả sẽ có dạng [3 => total_3, 4 => total_4, 6 => total_6]
                $update_report = Report::find($child->id);
                if ($update_report) {
                    $update_report->mkt_price = $totals[3] ?? 0; // Marketing
                    $update_report->luong_price = $totals[4] ?? 0; // Lương
                    $update_report->bhxh_price = $totals[5] ?? 0; // Bảo hiểm xã hội
                    $update_report->vhnp_price = $totals[6] ?? 0; // Vận hành VP
                    $update_report->save();
                }
            }

        }

        // dd($datas);
        return redirect()->back();
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
        $data = Report::with('children')->find($id);
        return view('admin.allocation.edit', compact('data'));
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
    public function destroy(Request $request, $id)
    {
        $this->deleteChildren($id); // Xóa tất cả bản ghi con & cháu

        // Xóa bản ghi gốc
        Report::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Xóa thành công!');
    }

    // Hàm đệ quy xóa tất cả con và cháu
    private function deleteChildren($parentId)
    {
        // Lấy danh sách các bản ghi con có parent = $parentId
        $children = Report::where('parent', $parentId)->get();

        foreach ($children as $child) {
            // Gọi đệ quy để xóa tiếp các bản ghi cháu của child
            $this->deleteChildren($child->id);

            // Xóa bản ghi con sau khi đã xóa hết cháu
            $child->delete();
        }
    }



}
