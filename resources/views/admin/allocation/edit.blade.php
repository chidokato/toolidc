@extends('admin.layout.main')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
@endsection

@section('content')
@include('admin.alert')
<form method="post" action="{{route('allocation.store')}}">
@csrf
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('allocation.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mobile-hide">
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="start_date" value="{{$data->start_date}}">
            <input type="hidden" name="end_date" value="{{$data->end_date}}">
            <button type="submit" class="btn-success mr-2 form-control"><i class="fas fa-sync"></i> Cập nhật báo cáo</button>
        </li>
    </ul>
</nav>
</form>

<div class="d-sm-flex align-items-center justify-content-between flex">
    <div>
        <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Chi tiết báo cáo: <strong>{{$data->name}}</strong> ({{$data->classify}}) </h2>
        <div>{{$data->start_date}} - {{$data->end_date}}</div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        @foreach($data->children as $child)
        <div class="card shadow mb-4 mt-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{ $child->name }}</a></li>
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active">
                    <table class="table myTable">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>
                                    <div class="d-sm-flex align-items-center justify-content-between flex">
                                        <div>Marketing</div>
                                        <div>{{ number_format($child->mkt_price, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-sm-flex align-items-center justify-content-between flex">
                                        <div>Bảo hiểm xã hội</div>
                                        <div>{{ number_format($child->bhxh_price, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-sm-flex align-items-center justify-content-between flex">
                                        <div>Lương</div>
                                        <div>{{ number_format($child->luong_price, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-sm-flex align-items-center justify-content-between flex">
                                        <div>Vận hành văn phòng</div>
                                        <div>{{ number_format($child->vhnp_price, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($child->children as $grandChild)
                            <tr>
                                <td>{{ $grandChild->name }}</td>
                                <td>{{ number_format($grandChild->mkt_price, 0, ',', '.') }}</td>
                                <td>{{ number_format($grandChild->bhxh_price, 0, ',', '.') }}</td>
                                <td>{{ number_format($grandChild->luong_price, 0, ',', '.') }}</td>
                                <td>{{ number_format($grandChild->vhnp_price, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style type="text/css">
    tbody td{ text-align:right; padding-right:30px !important }
    .dt-container .dt-layout-row:first-child{ display:none !important; }
    .dt-container .dt-layout-row{ margin:0 !important }

    /* Tùy chỉnh nút DataTables */
.dt-buttons .dt-button {
    background-color: #007bff !important; /* Màu xanh dương */
    color: #fff !important; /* Chữ trắng */
    border: none;
    padding: 8px 15px;
    font-size: 14px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

/* Hiệu ứng hover */
.dt-buttons .dt-button:hover {
    background-color: #0056b3 !important;
    color: #fff !important;
}

/* Định dạng menu dropdown chọn cột */
.dt-button-collection {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 10px;
}

/* Checkbox chọn cột */
.dt-button-collection .dt-button {
    color: #333 !important;
    background: none !important;
    padding: 5px 10px;
    text-align: left;
    font-size: 14px;
    width: 100%;
}

/* Hover menu */
.dt-button-collection .dt-button:hover {
    background-color: #f1f1f1 !important;
}

</style>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
let table = new DataTable('.myTable', {
    paging: false, // Tắt phân trang
    info: false,   // Ẩn thông tin số dòng hiển thị
    lengthChange: false, // Ẩn tùy chọn số dòng hiển thị
    searching: false, // Ẩn ô tìm kiếm
    ordering: true,
    columnDefs: [
        {
            targets: [1, 2, 3, 4], // Các cột chứa số có dấu phân cách
            type: 'num', // Chắc chắn DataTables hiểu đây là số
            render: function (data, type, row) {
                if (type === 'sort' && typeof data === 'string') {
                    // Xóa dấu chấm ngăn cách hàng nghìn, thay dấu phẩy thành dấu chấm cho phần thập phân
                    let numericValue = data.replace(/\./g, '').replace(/,/g, '.');
                    return parseFloat(numericValue) || 0; // Ép kiểu thành số
                }
                return data; // Hiển thị bình thường
            }
        }
    ],

    dom: 'Bfrtip', // Thêm nút bấm vào giao diện
    buttons: [
        {
            extend: 'colvis', // Kích hoạt tính năng chọn cột
            text: 'Chọn cột hiển thị' // Tuỳ chỉnh nội dung nút
        }
    ]
});




</script>
@endsection