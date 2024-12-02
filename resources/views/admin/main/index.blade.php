@extends('admin.layout.main')

@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
@endsection

@section('js')
<script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    // let table = new DataTable('.myTable', {
    //     responsive: true
    // });

    $(document).ready(function() {
        $('.myTable').DataTable({
            "order": [[0, "desc"]] // Sắp xếp cột thứ 2 (cột Age) từ lớn đến bé
        });
    });

</script>
@endsection

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<?php use App\Models\Task; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<?php 
    $totalAmount = 0;
    $totals_team = [];
    $totals_user = [];
    $totals_project = [];
    foreach ($task as $row) {
        if (isset($totals_team[$row['teams_name']])) {
            $totals_team[$row['teams_name']] += $row['actual_costs'];
        } else {
            $totals_team[$row['teams_name']] = $row['actual_costs'];
        }

        if (isset($totals_user[$row['yourname']])) {
            $totals_user[$row['yourname']] += $row['actual_costs'];
        } else {
            $totals_user[$row['yourname']] = $row['actual_costs'];
        }

        if (isset($totals_project[$row['project_name']])) {
            $totals_project[$row['project_name']] += $row['actual_costs'];
        } else {
            $totals_project[$row['project_name']] = $row['actual_costs'];
        }

        $totalAmount += $row['actual_costs'];
    }
    

    arsort($totals_team);
    arsort($totals_user);
    arsort($totals_project);

    // dd($totals_project);

?>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng tiền thực tế</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalAmount) }} đ</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng số dự án</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format(count($project)) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng số nhân viên
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format(count($User)) }}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Tổng số nhóm</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format(count($Team)) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lọc</h6>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dự án</h6>
            </div>
            <div class="card-body">
                <table class="table display">
                    <thead>
                        <tr >
                            <th>Dự án ({{count($totals_project)}}) </th>
                            <th style="text-align: right;">{{ number_format($totalAmount) }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_project as $project_name => $total)
                        <tr>
                            <td>{{$project_name}}</td>
                            <td style="text-align: right;">
                                {{ number_format($total, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nhóm</h6>
            </div>
            <div class="card-body">
                <table class="table display">
                    <thead>
                        <tr>
                            <th>Nhóm</th>
                            <th style="text-align: right;">{{ number_format($totalAmount) }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_team as $yourname => $total)
                        <tr>
                            <td>{{$yourname}}</td>
                            <td style="text-align: right;">
                                {{ number_format($total, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nhân viên</h6>
            </div>
            <div class="card-body">
                <table class="table display">
                    <thead>
                        <tr>
                            <th>Tên dự án</th>
                            <th style="text-align: right;">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_user as $u_id => $total)
                        <tr>
                            <td>{{$u_id}}</td>
                            <td style="text-align: right;">
                                {{ number_format($total, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    
</div>

@endsection

