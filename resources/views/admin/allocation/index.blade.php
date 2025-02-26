@extends('admin.layout.main')

@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
@endsection

@section('js')
<script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.myTable').DataTable({
            "order": [[0, "desc"]] // Sắp xếp cột thứ 2 (cột Age) từ lớn đến bé
        });
    });
</script>
@endsection

@section('content')
@include('admin.layout.header')
@include('admin.alert')

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Phân bổ chi phí</h2>
    <div class="flex">
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm báo cáo</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('allocation.export') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhập file dữ liệu tác vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên báo cáo</label>
                        <input required name="name" placeholder="Tên báo cáo" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Thời gian</label>
                        <input required class="form-control" type="text" name="datefilter" value="{{request()->datefilter}}" placeholder="Thời gian" />
                    </div>
                    <div class="form-group">
                        <label>Phân loại báo cáo</label>
                        <select class="form-control">
                            <option value="1">Báo cáo theo sàn / chi nhánh</option>
                            <option value="2">Báo cáo theo dự án</option>
                            <option value="3">Báo cáo theo Kênh</option>
                            <option value="4">Báo cáo theo Nhà cung cấp</option>
                        </select>
                    </div>
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
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

