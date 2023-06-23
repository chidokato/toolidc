@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">{{__('lang.ward')}}</h2>
    <a class="add-iteam" href="{{route('ward.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> {{__('lang.add')}}</button></a>
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
                    @if(count($ward) > 0)
                    <table class="table">
                        <form method="post" action="admin/ward/delete_all"><input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Province</th>
                                    <th>District</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ward as $val)
                                <tr>
                                    <td><a href="{{route('ward.edit',[$val->ward_id])}}" class="mr-2"><i>{{$val->prefix}}</i> {{$val->name}}</a></td>
                                    <td>{{$val->ProvinceTranslation->name}}</td>
                                    <td>{{$val->DistrictTranslation->prefix}} {{$val->DistrictTranslation->name}}</td>
                                    <td>{{$val->created_at}}</td>
                                    <td>
                                        <a href="{{route('ward.edit',[$val->ward_id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
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