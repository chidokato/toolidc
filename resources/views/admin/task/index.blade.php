@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Quản lý chi phí marketing INDOCHINE</h2>
    <form action="{{ route('task.upfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="txt_file">
        <button type="submit">Upload</button>
    </form>
    <a class="add-iteam" href="{{route('task.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>

<form class="width100" action="{{ url()->current() }}" method="GET">
    <div class="row">
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Dự án</label>
                <select id="baba" name="project_id" class="form-control select2">
                    <option value="">...</option>
                    @foreach($Project as $val)
                    <option <?php if(request()->project_id==$val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Kênh chạy</label>
                <select name="channel_id" class="form-control select2">
                    <option value="">...</option>
                    <?php addeditcat ($Channel,0,$str='',request()->channel_id); ?> 
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Nhà cung cấp</label>
                <select name="supplier_id" class="form-control select2">
                    <option value="">...</option>
                    @foreach($Supplier as $val)
                    <option <?php if(request()->supplier_id==$val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Đội nhóm</label>
                <select name="team_id" class="form-control select2">
                    <option value="">...</option>
                    @foreach($team as $val)
                    <option <?php if(request()->team_id==$val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class="">Thời gian</label>
                <input class="form-control" type="text" name="datefilter" value="{{request()->datefilter}}" />
            </div>
        </div>
        <div class="col-xl-2 col-lg-2">
            <div class="form-group">
                <label class=""></label>
                <div class="input-group">
                    <button type="submit" class="form-control btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
                    <button type="button" class="form-control btn btn-secondary" onclick="window.location.href='{{ url()->current() }}'"><i class="fas fa-sync-alt"></i></button>
                </div>
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
                    <div class="tab-pane active">
                        <table class="table">
                            <form action="{{ route('task.destroy') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <thead>
                                <tr class="main-check">
                                    <th>
                                        <label class="container"><input type="checkbox" id='select-all' ><span class="checkmark"></span></label>
                                        <div class="option" style="display: none;">
                                            <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i> Xóa các bản ghi đã chọn</button>
                                        </div>
                                    </th>
                                    <th>Dự án</th>
                                    <th>Chi phí</th>
                                    <th>Xác nhận</th>
                                    <th>Kênh chạy</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Nhân viên</th>
                                    <th>Thời gian</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($data as $val)
                                <tr>
                                    <td>
                                        <label class="container"><input name="id[]" value="{{$val->id}}" type="checkbox" id="task_{{ $val->id }}" class="task-checkbox" ><span class="checkmark"></span></label>
                                    </td>
                                    <td>
                                        <div>{{$val->Project->name}}</div>
                                        <div class="small">Hỗ trợ: {{$val->support_rate}}</div class="sm">
                                    </td>
                                    <td>
                                        <div><strong>{{ number_format($val->actual_costs) }}</strong></div>
                                        <div class="small">{{ number_format($val->expected_costs) }}</div>
                                    </td>
                                    <td>
                                        <label class="container"><input <?php if($val->confirm == 'TRUE' || $val->confirm == 'true'){echo "checked";} ?> type="checkbox" id='hot_post' ><span class="checkmark"></span></label>
                                    </td>
                                    <td>{{$val->Channel->name}}</td>
                                    <td>{{$val->Supplier->name}}</td>
                                    <td>
                                        <div>{{ $val->u_id?$val->User->yourname:'' }}</div>
                                        <div class="small">{{ $val->team_id?$val->Team->name:'' }}</div>
                                    </td>
                                    <td>
                                        <div>{{ \Carbon\Carbon::parse($val->date_start)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($val->date_end)->format('d/m/Y') }} </div>
                                    </td>
                                    <td style="display: flex;">
                                        <a href="{{route('task.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <form action="{{route('task.destroy', [$val->id])}}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </form>
                            <div class="tatall">Tổng tiền: {{number_format($totalCosts)}} đ</div>
                        </table>
                        <div class="search paginate-search">
                            <div>Hiển thị: </div>
                            <select class="form-control paginate" name="per_page" onchange="this.form.submit()">
                                <option value="30" {{ request()->per_page == 30 ? 'selected' : '' }}>30</option>
                                <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
                                <option value="500" {{ request()->per_page == 500 ? 'selected' : '' }}>500</option>
                            </select>
                            <div> Từ {{ $data->firstItem() }} đến {{ $data->lastItem() }} trên tổng {{ $data->total() }} </div>
                            {{ $data->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<style type="text/css">
    .table{ position: relative; }
    .tatall{ position: absolute; top: 10px; right: 20px; color: red; font-weight: bold; }
    .small{ font-size:.8rem }
    .main-check{ position:relative; }
    .option{ position:absolute; background:#f4f6f8; top: 0;
    left: 40px;
    width: 90%;
    height: 40px; line-height:40px; padding-left:30px;  }
    .option button{ color:#858796 }
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

<script type="text/javascript">
// Lấy các checkbox con
const taskCheckboxes = document.querySelectorAll('.task-checkbox');
// Lấy checkbox "Chọn tất cả"
const selectAllCheckbox = document.getElementById('select-all');
// Lấy div.option
const optionDiv = document.querySelector('.option');

// Theo dõi sự thay đổi trạng thái của các checkbox con
taskCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Kiểm tra xem ít nhất một checkbox con được check hay không
        const isAnyChecked = Array.from(taskCheckboxes).some(cb => cb.checked);
        
        // Nếu có ít nhất một checkbox được chọn, check "Chọn tất cả"
        selectAllCheckbox.checked = isAnyChecked;
    });
});

// Sự kiện khi nhấn checkbox "Chọn tất cả"
selectAllCheckbox.addEventListener('click', function() {
    const isChecked = selectAllCheckbox.checked;
    
    // Cập nhật trạng thái của tất cả các checkbox con
    taskCheckboxes.forEach(cb => cb.checked = isChecked);
});

// Sự kiện khi checkbox "select-all" được thay đổi
selectAllCheckbox.addEventListener('change', function() {
    if (selectAllCheckbox.checked) {
        // Nếu checkbox được tick, hiển thị div.option
        optionDiv.style.display = 'block';
    } else {
        // Nếu checkbox không được tick, ẩn div.option
        optionDiv.style.display = 'none';
    }
});

// Hàm kiểm tra xem có bất kỳ checkbox nào được tick hay không
function updateOptionDisplay() {
    const isAnyChecked = selectAllCheckbox.checked || Array.from(taskCheckboxes).some(checkbox => checkbox.checked);
    
    if (isAnyChecked) {
        // Hiển thị div.option nếu có ít nhất một checkbox được chọn
        optionDiv.style.display = 'block';
    } else {
        // Ẩn div.option nếu không có checkbox nào được chọn
        optionDiv.style.display = 'none';
    }
}

// Sự kiện khi checkbox "select-all" được thay đổi
selectAllCheckbox.addEventListener('change', updateOptionDisplay);

// Sự kiện khi checkbox con được thay đổi
taskCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateOptionDisplay);
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