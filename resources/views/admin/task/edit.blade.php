@extends('admin.layout.main')

@section('content')
@include('admin.alert')
<form method="POST" action="{{route('task.update', [$data->id])}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('task.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mobile-hide">
            <button type="reset" class="btn-danger mr-2 form-control"><i class="fas fa-sync"></i> Làm mới</button>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <button type="submit" class="btn-success form-control"><i class="far fa-save"></i> Lưu lại</button>
        </li>
    </ul>
</nav>

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex" style="height: 38px;">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Thêm mới</h2>
</div>

<div class="row">
  <div class="col-xl-7 col-lg-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thêm tác vụ</h6>
            </div>
            <div class="card-body">
              

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tổng tiền</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ number_format($data->price) }}" class="form-control" name="price" id="currency-field" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Tổng tiền">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kênh chạy</label>
                <div class="col-sm-10">
                  <select name="channel_id" class="form-control select2" >
                    <option value="">--Chọn kênh chạy--</option>
                    <?php addeditcat ($Channel,0, $str='',$data['channel_id']) ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dự án</label>
                <div class="col-sm-10">
                  <select name="project_id" class="form-control select2" >
                    <option value="">--Chọn dự án--</option>
                    <?php addeditcat ($Project,0, $str='',$data['project_id']) ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nhà cung cấp</label>
                <div class="col-sm-10">
                  <select name="supplier_id" class="form-control select2" >
                    <option value="">--Chọn nhà cung cấp--</option>
                    <?php addeditcat ($Supplier,0, $str='',$data['supplier_id']) ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ngày hoàn thành</label>
                <div class="col-sm-10">
                  <input name="date" value="{{$data->date}}" type="date" class="form-control" placeholder="Ngày hoàn thành">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên tác vụ</label>
                <div class="col-sm-10">
                  <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="Tên tác vụ">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-sm-10">
                  <textarea rows="3" name="content" class="form-control" placeholder="Ghi chú">{!! $data->content !!}</textarea>
                </div>
              </div>



              
            </div>
            </div>
    </div>
    <div class="col-xl-3 col-lg-3">
     
        
      </div>
</div>
</form>


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

@section('js')




<script type="text/javascript">
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});
function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += "";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}



</script>
@endsection