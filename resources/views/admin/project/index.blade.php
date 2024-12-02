@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Danh sách dự án</h2>
    <form action="{{ route('project.upfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="txt_file" accept=".txt">
        <button type="submit" class="btn-success">Save</button>
    </form>
    <a class="add-iteam" href="{{route('project.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">Tất cả</a></li>
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    @if(count($data) > 0)
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $val)
                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection