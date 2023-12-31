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

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
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

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
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
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dự án</h6>
            </div>
            <div class="card-body">
                <table class="table display myTable">
                    <thead>
                        <tr>
                            <th style="text-align: right;">Tổng tiền</th>
                            <th>Tên dự án</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project as $val)
                        <tr>
                            <td style="text-align: right;">
                                <?php $Tasks = Task::where('project_id',$val->id)->get(); ?>
                                <?php $i = 0; ?>
                                <?php foreach ($Tasks as $key => $Task) {
                                    $i = $i + $Task->price;
                                } ?>
                                {{ number_format($i) }}
                            </td>
                            <td>{{$val->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Đội nhóm</h6>
            </div>
            <div class="card-body">
                <table class="table display myTable" >
                    <thead>
                        <tr>
                            <th style="text-align: right;">Tổng tiền</th>
                            <th>Tên dự án</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Team as $val)
                        <tr>
                            <td style="text-align: right;">
                                <?php $Tasks = Task::where('team_id',$val->id)->get(); ?>
                                <?php $i = 0; ?>
                                <?php foreach ($Tasks as $key => $Task) {
                                    $i = $i + $Task->price;
                                } ?>
                                {{ number_format($i) }}
                            </td>
                            <td>{{$val->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thành viên</h6>
            </div>
            <div class="card-body">
                <table class="table display myTable" >
                    <thead>
                        <tr>
                            <th style="text-align: right;">Tổng tiền</th>
                            <th>Tên dự án</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($User as $val)
                        <tr>
                            <td style="text-align: right;">
                                <?php $Tasks = Task::where('u_id',$val->id)->get(); ?>
                                <?php $i = 0; ?>
                                <?php foreach ($Tasks as $key => $Task) {
                                    $i = $i + $Task->price;
                                } ?>
                                {{ number_format($i) }}
                            </td>
                            <td>{{$val->yourname}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

@endsection

