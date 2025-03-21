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
                                <?php dequycategory ($data,0,$str='',old('parent')); ?>  
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    function dequycategory ($menulist, $parent=0, $str='')
    {
        foreach ($menulist as $val) 
        {
            if ($val['parent'] == $parent) 
            { 
                ?>
                    <tr style="border-bottom: 1px solid #f3f6f9;">
                        <td>{{$val->id}}</td>
                        <td><a href="{{route('team.edit',[$val->id])}}">{{$str}}{{$val->name}}</a></td>
                        <td class="date">{{date('d/m/Y',strtotime($val->created_at))}} <sup title="Sửa lần cuối: {{date('d/m/Y',strtotime($val->updated_at))}}"><i class="fa fa-question-circle-o" aria-hidden="true"></i></sup> </td>
                        <td style="display: flex;">
                            <a href="{{route('team.edit',[$val->id])}}" class="mr-3"><i class="fas fa-edit" aria-hidden="true"></i></a>
                            <form action="{{route('team.destroy', [$val->id])}}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php
                dequycategory ($menulist, $val['id'], $str.'__');
            }
        }
    }
?>

@endsection