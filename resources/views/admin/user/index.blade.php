@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Quản lý người dùng</h2>
    <form action="{{ route('users.upfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="txt_file" accept=".txt">
        <button type="submit" class="btn-success">Save</button>
    </form>
    <a class="add-iteam" href="{{route('users.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> {{__('lang.add')}}</button></a>
</div>

<div class="row">
<form class="width100" action="{{ url()->current() }}" method="GET">
    <div class="col-xl-12 col-lg-12 search flex-start">
        <input type="text" value="{{ request()->key ?? '' }}" placeholder="Tìm kiếm..." class="form-control" name="key" onchange="this.form.submit()">
        <select name="team" class="form-control" onchange="this.form.submit()">
            <option value="">...</option>
            @foreach($teams as $val)
            <option {{ request()->team == $val->id ? 'selected' : '' }} value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success mr-2">Tìm kiếm</button>
        <a href="{{ url()->current() }}" class="btn btn-warning">
            Reset
        </a>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{__('lang.all')}}</a></li>
                    <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                    <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    @if(count($users) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Mã NV</th>
                                <th>Name</th>
                                <th>Team</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->sku}}</td>
                                <td><a href="{{route('users.edit',[$val->id])}}">{{$val->yourname}}</a></td>
                                <td>{{$val->team_id==''? '' : $val->Team->name}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->permission}}</td>
                                <td>{{$val->created_at}}</td>
                                <td>
                                    <a href="{{route('users.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                    <!-- <form action="{{route('users.destroy', [$val->id])}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button onclick="return confirm('xác nhận')">Delete</button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="search">
                        <div>Hiển thị: </div>
                        <select class="form-control paginate" name="per_page" onchange="this.form.submit()">
                            <option value="20" {{ request()->per_page == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <div> Từ {{ $users->firstItem() }} đến {{ $users->lastItem() }} trên tổng {{ $users->total() }} </div>
                        {{ $users->appends(request()->all())->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection