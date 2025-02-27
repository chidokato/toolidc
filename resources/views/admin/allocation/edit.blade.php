@extends('admin.layout.main')

@section('content')
@include('admin.alert')

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('allocation.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mobile-hide">
            <button type="reset" class="btn-danger mr-2 form-control"><i class="fas fa-sync"></i> Làm mới</button>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <button type="submit" class="btn-success form-control"><i class="far fa-save"></i> Lưu lại</button>
        </li>
    </ul>
</nav>

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Chi tiết báo cáo: <strong>{{$data->name}}</strong> ({{$data->classify}}) </h2>
    <div class="flex">
        <!-- <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm báo cáo</button> -->
    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">Tất cả</a></li>
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active">
                    <table class="table">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>Tên</th>
                                <th>Cấp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->children as $child)
                                <tr>
                                    <!-- <td>{{ $child->id }}</td> -->
                                    <td>{{ $child->name }}</td>
                                    <td>Công ty</td>
                                </tr>
                                @foreach($child->children as $grandChild)
                                    <tr>
                                        <!-- <td>{{ $grandChild->id }}</td> -->
                                        <td>-- {{ $grandChild->name }}</td>
                                        <td>Sàn</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection