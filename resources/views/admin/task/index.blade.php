@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">QUẢN LÝ CHI PHÍ</h2>
    
    <div class="flex">
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-upload" aria-hidden="true"></i> Upload Excel</button>
        <a class="add-iteam" href="{{route('task.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm tác vụ </button></a>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('task.upfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhập file dữ liệu tác vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="chuy">
                        <p>Bạn vui lòng kiểm tra và tải lại file mới để tránh sai lệch dữ liệu</p>
                    </div>
                    <ul>
                        <li>Tải mẫu file nhập <a href="data/files/up.xlsx">tại đây</a></li>
                        <li>File có dung lượng tối đa là 3MB và 5000 dòng</li>
                    </ul>
                    <label for="excel-file" id="custom-file-label" class="custom-file-upload">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" font-size="24" color="#747C87" style="margin-right: 10px;">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4a8.003 8.003 0 0 1 7.763 6.058A5.001 5.001 0 0 1 19 20H6a6 6 0 0 1-.975-11.921A7.997 7.997 0 0 1 12 4Zm-6.652 6.053.948-.155.472-.837a6.003 6.003 0 0 1 11.054 1.481l.322 1.291 1.316.202A3.001 3.001 0 0 1 19 18H6a4 4 0 0 1-.652-7.947Z" fill="#747C87"></path>
                            <path d="M13.45 12H16l-4 4-4-4h2.55V9h2.9v3Z" fill="#747C87"></path>
                        </svg>
                        <span id="file-label-text">Kéo thả file vào đây hoặc tải lên từ thiết bị</span>
                    </label>
                    <input id="excel-file" type="file" name="excel_file" accept=".xls,.xlsx,.csv" required style="display: none;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <ul class="nav nav-pills">
                        <li><a data-toggle="tab" class="nav-link active" href="#tab1">Tất cả</a></li>
                        <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                        <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                    </ul>
                </div>
                <div class="tab-content pd-2">
                    <form class="width100" action="{{ url()->current() }}" method="GET">
                        <div class="row">
                            <!-- <div class="col-xl-1 col-lg-1">
                                <div class="form-group">
                                    <label class="">Admin</label>
                                    <select name="admin_id" class="form-control select2">
                                        <option value="">...</option>
                                        <option <?php //if(request()->admin_id==1){ echo 'selected'; } ?> value="1">Mr. Tuấn</option>
                                        <option <?php //if(request()->admin_id==181){ echo 'selected'; } ?> value="181">Ms. Thúy</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group">
                                    <select id="baba" name="project_id" class="form-control select2">
                                        <option value="">-Dự án-</option>
                                        @foreach($Project as $val)
                                        <option <?php if(request()->project_id==$val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group">
                                    <select name="channel_id" class="form-control select2">
                                        <option value="">-Kênh chạy-</option>
                                        <?php addeditcat ($Channel,0,$str='',request()->channel_id); ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group">
                                    <select name="supplier_id" class="form-control select2">
                                        <option value="">-Nhà cung cấp-</option>
                                        @foreach($Supplier as $val)
                                        <option <?php if(request()->supplier_id==$val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group">
                                    <select name="team_id" class="form-control select2">
                                        <option value="">-Đội nhóm-</option>
                                        <?php addeditcat ($team,0,$str='',request()->team_id); ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="datefilter" value="{{request()->datefilter}}" placeholder="-Thời gian-" />
                                </div>
                            </div>
                            
                            <div class="col-xl-1 col-lg-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <button type="submit" class="form-control btn btn-primary"><i class="fas fa-search"></i> </button>
                                        <button type="button" class="form-control btn btn-secondary" onclick="window.location.href='{{ url()->current() }}'"><i class="fas fa-sync-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                    <th>Kênh / NCC</th>
                                    <th>Sàn / cty</th>
                                    <th>Văn phòng</th>
                                    <th>Nhân viên</th>
                                    <th>Thời gian</th>
                                    <th>Admin</th>
                                    <th></th>
                                </tr>
                                <div class="tatall">Tổng tiền: {{ number_format($totalCosts, 0, ',', '.') }}đ</div>
                            </thead>
                            
                            <tbody>
                                @foreach($data as $val)
                                <tr>
                                    <td>
                                        <label class="container"><input name="id[]" value="{{$val->id}}" type="checkbox" id="task_{{ $val->id }}" class="task-checkbox" ><span class="checkmark"></span></label>
                                    </td>
                                    <td>
                                        <div>{{ $val->Project->name ?? '...' }}</div>
                                        <div class="small">Hỗ trợ: {{$val->support_rate}}</div class="sm">
                                    </td>
                                    <td>
                                        <div><strong>{{ number_format((float) ($val->actual_costs ?? '')) }}</strong></div>
                                        <div class="small">{{ number_format((float) ($val->expected_costs ?? '')) }}</div>
                                    </td>
                                    <td>
                                        <label class="container"><input <?php if($val->confirm == 'TRUE' || $val->confirm == 'true'){echo "checked";} ?> type="checkbox" id='hot_post' ><span class="checkmark"></span></label>
                                    </td>
                                    <td>
                                        <div>{{ $val->Channel->name ?? '...' }}</div>
                                        <div class="small">{{ $val->Supplier->name ?? '...' }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $val->floor->name ?? '...' }} <small>({{ $val->quantity ?? '...' }})</small> </div>
                                        <div class="small">{{ $val->company->name ?? '...'  }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $val->Office->name ?? '...' }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $val->User->yourname ?? '...' }}</div>
                                        <div class="small">{{ $val->team->name ?? '...'  }}</div>
                                    </td>
                                    <td>
                                        <div>{{ \Carbon\Carbon::parse($val->date_start)->format('d/m/Y') }} <div class="small">- {{ \Carbon\Carbon::parse($val->date_end)->format('d/m/Y') }}</div> </div>
                                    </td>
                                    <td>
                                        {{ $val->user_id==1 ? 'Mr. Tuấn':'' }}
                                        {{ $val->user_id==181 ? 'Ms. Thúy':'' }}
                                    </td>
                                    <td style="display: flex;">
                                        <a href="{{route('task.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </form>
                            
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
    .form-group{ margin-bottom:0px }
    .pd-2{ padding:.5rem }


    .custom-file-upload {
        display: inline-block;
        width: 100%;
        text-align: center;
        padding: 10px 20px;
        font-size: 16px;
        border: 1px dashed #ddd;
        border-radius: 5px;
        cursor: pointer;
        font-size: .9rem;
        transition: background-color 0.3s ease;
    }

    .custom-file-upload:hover {
    }

    input[type="file"] {
        display: none;
    }

    .chuy{ background: #FFDBDB; padding: 10px 10px; margin-bottom:15px; }
    .chuy p{ font-size:.8rem; margin:0 }
    .modal-body ul{ padding-left:20px }
    .modal-body ul li{ font-size:.9rem }

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


document.getElementById("excel-file").addEventListener("change", function () {
    let fileLabel = document.getElementById("file-label-text");
    fileLabel.textContent = this.files.length > 0 ? this.files[0].name : "Kéo thả file vào đây hoặc tải lên từ thiết bị";
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