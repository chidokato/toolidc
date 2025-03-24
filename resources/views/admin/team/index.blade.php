@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Danh sách nhóm</h2>
    <form action="{{ route('team.upfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="txt_file" accept=".txt">
        <button type="submit" class="btn-success">Save</button>
    </form>
    <a class="add-iteam" href="{{route('team.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>


<form class="width100" action="{{ url()->current() }}" method="GET">
<div class="row">
    <div class="col-xl-12 col-lg-12 search flex-start">
        <!-- <input type="text" value="{{ request()->key ?? '' }}" placeholder="Tìm kiếm..." class="form-control" name="key" onchange="this.form.submit()"> -->
        <select name="cty" class="form-control" onchange="this.form.submit()">
            <option value="">All</option>
            <option <?php if(request()->cty=='1'){ echo 'selected'; } ?> value="1">INDOCHINE</option>
            <option <?php if(request()->cty=='29'){ echo 'selected'; } ?> value="29">VIETNAM HOMES</option>
        </select>
        <!-- <button type="submit" class="btn btn-success mr-2">Tìm kiếm</button> -->
        <a href="{{ url()->current() }}" class="btn btn-warning">
            Reset
        </a>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">Tất cả</a></li>
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    @if(count($teams) > 0)
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phân cấp</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td><strong>{{$team->name}}</strong></td>
                                    <td>Công ty</td>
                                    <td>{{$team->updated_at}}</td>
                                    <td style="display: flex;">
                                        <a href="{{route('team.edit',[$team->id])}}" class="mr-3"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <form action="{{route('team.destroy', [$team->id])}}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    @foreach($team->children as $chil)
                                    <tr>
                                        <td>--{{$chil->name}}</td>
                                        <td>Sàn/chi nhánh</td>
                                        <td>{{$chil->updated_at}}</td>
                                        <td style="display: flex;">
                                            <a href="{{route('team.edit',[$chil->id])}}" class="mr-3"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                            <form action="{{route('team.destroy', [$chil->id])}}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        @foreach($chil->children as $chil2)
                                        <tr>
                                            <td>----{{$chil2->name}}</td>
                                            <td>Đội nhóm</td>
                                            <td>{{$chil2->updated_at}}</td>
                                            <td style="display: flex;">
                                                <a href="{{route('team.edit',[$chil2->id])}}" class="mr-3"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                                <form action="{{route('team.destroy', [$chil2->id])}}" method="POST">
                                                  @method('DELETE')
                                                  @csrf
                                                  <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</form>


@endsection