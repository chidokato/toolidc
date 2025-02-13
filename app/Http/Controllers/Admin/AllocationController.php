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

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $teams = Team::with('children.children', 'tasks')
        ->leftJoin('tasks', 'teams.id', '=', 'tasks.team_id')
        ->select(
            'teams.id',
            'teams.name',
            'teams.parent',
            \DB::raw('COALESCE(SUM(tasks.actual_costs), 0) as total_cost')
        )
        ->groupBy('teams.id', 'teams.name', 'teams.parent')
        ->orderBy('teams.parent', 'ASC') // Sắp xếp theo cấp bậc
        ->get();

        // Hàm xây dựng cây đa cấp
    function buildTeamHierarchy($teams, $parentId = 0)
    {
        $groupedTeams = [];

        foreach ($teams as $team) {
            if ($team->parent == $parentId) {
                // Gọi đệ quy để lấy danh sách con
                $team->children = buildTeamHierarchy($teams, $team->id);

                // Chỉ cộng tổng chi phí của con cháu, KHÔNG cộng lại chi phí của team cha
                $totalChildCost = array_sum(array_column($team->children, 'total_cost'));

                // Gán tổng chi phí đúng
                $team->total_cost += $totalChildCost;

                $groupedTeams[] = $team;
            }
        }

        return $groupedTeams;
    }


    // Nhóm dữ liệu theo cây đa cấp
    $nestedTeams = buildTeamHierarchy($teams);

    return view('admin.allocation.index', compact('nestedTeams'));
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
