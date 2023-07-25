@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Kênh chạy</h2>
    <a class="add-iteam" href="admin/project/export"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Xuất báo cáo</button></a>
    <a class="add-iteam" href="{{route('project.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">Tất cả</a></li>
                    <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                    <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    @if(count($data) > 0)
                    <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php dequy_list ($data,0,$str='',old('parent_id')); ?> 
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    function dequy_list ($menulist, $parent_id=0, $str='')
    {
        foreach ($menulist as $val) 
        {
            if ($val['parent'] == $parent_id) 
            { 
                ?>
                    <tr id="project">
                        <td>
                            <a href="{{route('project.edit',[$val->id])}}">{{$str}}{{$val->name}}</a>
                        </td>
                        <td>{{$str}}{{$val->name}}</td>
                        <td>{{$val->updated_at}}</td>
                        <td style="display: flex;">
                            <a href="{{route('project.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                            <form action="{{route('project.destroy', [$val->id])}}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php
                dequy_list ($menulist, $val['id'], $str.'__');
            }
        }
    }
?>

@endsection