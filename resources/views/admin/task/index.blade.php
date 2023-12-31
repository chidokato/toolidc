@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Quản lý chi phí marketing INDOCHINE</h2>
    <a class="add-iteam" href="{{route('task.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>
<form id="search" action="admin/task/search" method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Dự án</label>
                <select id="baba" name="project" class="form-control">
                    <option value="">...</option>
                    <?php addeditcat ($Project,0,$str='',old('parent_id')); ?> 
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Kênh chạy</label>
                <select name="channel" class="form-control select2">
                    <option value="">...</option>
                    <?php addeditcat ($Channel,0,$str='',old('parent_id')); ?> 
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Nhà cung cấp</label>
                <select name="supplier" class="form-control select2">
                    <option value="">...</option>
                    <?php addeditcat ($Supplier,0,$str='',old('parent_id')); ?> 
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Đội nhóm</label>
                <select name="team" class="form-control select2">
                    <option value="">...</option>
                    <?php addeditcat ($team,0,$str='',old('parent_id')); ?> 
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Thời gian</label>
                <input class="form-control" type="text" name="datefilter" value="" />
            </div>
        </div>
        <div class="col-xl-1 col-lg-1">
            <div class="form-group">
                <label class="">Bản ghi/trang</label>
                <select name="paginate" class="form-control select2">
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="col-xl-1 col-lg-1">
            <div class="form-group">
                <label class=""></label>
                <button type="submit" class="form-control">Tìm kiếm</button>
            </div>
        </div>
    </div>
</form>
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
                <div class="tab-pane active" id="loadchat">
                    @if(count($data) > 0)
                        @include('admin.task.load')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .table{ position: relative; }
    .tatall{ position: absolute; top: 10px; right: 20px; color: red; font-weight: bold; }
</style>

<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>

<?php 
    function addeditcat ($data, $parent=0, $str='',$select=0)
    {
        foreach ($data as $value) {
            if ($value['parent'] == $parent) {
            if($select != 0 && $value['id'] == $select )
            { ?>
            <option value="<?php echo $value['id']; ?>" selected> <?php echo $str.$value['name']; ?> </option>
            <?php } else { ?>
            <option value="<?php echo $value['id']; ?>" > <?php echo $str.$value['name']; ?> </option>
            <?php }
            addeditcat ($data, $value['id'], $str.'__',$select);
            }
        }
    }
?>

@endsection