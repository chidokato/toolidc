@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">{{__('lang.district')}}</h2>
    <a class="add-iteam" href="{{route('district.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> {{__('lang.add')}}</button></a>
</div>

<div class="row">
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
                    @if(count($district) > 0)
                    <table class="table">
                        <form method="post" action="admin/district/delete_all"><input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Prefix</th>
                                    <th>Province</th>
                                    <!-- <th>View</th> -->
                                    <th>date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($district as $val)
                                <tr>
                                    <td><a href="{{route('district.edit',[$val->district_id])}}" class="mr-2">{{$val->name}}</a></td>
                                    <td>{{$val->prefix}}</td>
                                    <td>{{$val->ProvinceTranslation->name ? $val->ProvinceTranslation->name : ''}}</td>
                                    <td>{{$val->created_at}}</td>
                                    <td>
                                        <a href="{{route('district.edit',[$val->district_id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <!-- <form action="{{route('district.destroy', [$val->id])}}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button onclick="return confirm('xác nhận')">Delete</button>
                                        </form> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </form>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection