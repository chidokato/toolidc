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

<!-- @php
    use Illuminate\Support\Collection;

    $totals_user = collect($task)->groupBy('user.yourname')->map(fn($items) => $items->sum('actual_costs'))->sortDesc();
    $totals_project = collect($task)->groupBy('project.name')->map(fn($items) => $items->sum('actual_costs'))->sortDesc();

    
@endphp -->


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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format(count($projects)) }}</div>
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
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format(count($users)) }}</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format(count($totals_team)) }}</div>
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
                            <th>Dự án</th>
                            <th style="text-align: right;">{{ number_format($totalAmount) }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_project as $project_name => $total)
                            <tr>
                                <td>{{ $project_name }}</td>
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
                <h6 class="m-0 font-weight-bold text-primary">Company</h6>
            </div>
            <div class="card-body">
                <table class="table display">
                    <thead>
                        <tr>
                            <th>Công ty</th>
                            <th style="text-align: right;">{{ number_format($totals_company->sum('total_cost'), 0, ',', '.') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_company as $company)
                            <tr>
                                <td>{{ $company->company_name }}</td>
                                <td style="text-align: right;">{{ number_format($company->total_cost, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sàn</h6>
            </div>
            <div class="card-body">
                <table class="table display">
                    <thead>
                        <tr>
                            <th>Tên dự án</th>
                            <th style="text-align: right;">{{ number_format($totals_san->sum('total_cost'), 0, ',', '.') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_san as $san)
                            <tr>
                                <td>{{ $san->san_name }}</td>
                                <td style="text-align: right;">{{ number_format($san->total_cost, 0, ',', '.') }}</td>
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
                            <th>Tên dự án</th>
                            <th style="text-align: right;">{{ number_format($totals_team->sum('total_cost'), 0, ',', '.') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totals_team as $val)
                            <tr>
                                <td>{{ $val->team_name }}</td>
                                <td style="text-align: right;">{{ number_format($val->total_cost, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    
</div>

@endsection

