@extends('admin.layout.main')

@section('content')
@include('admin.alert')
<form method="post" action="{{route('slider.update', [$data->id])}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('slider.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
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
  <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-2">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    @foreach($data->SliderTranslation as $key => $val)
                    <li><a data-toggle="tab" class="nav-link <?php if($key==0){echo 'active';} ?>" href="#{{$val->locale}}">
                      @if($val->locale == 'vi') Tiếng Việt @endif
                      @if($val->locale == 'en') Tiếng Anh @endif
                      @if($val->locale == 'cn') Tiếng Trung @endif
                    </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content overflow">
              @foreach($data->SliderTranslation as $key => $val)
                <div class="tab-pane <?php if($key==0){echo 'active';} ?>" id="{{$val->locale}}">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>heading1</label>
                                  <input name="heading1:{{$val->locale}}" value="{{$val->heading1}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>heading2</label>
                                  <input name="heading2:{{$val->locale}}" value="{{$val->heading2}}"  placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>text1</label>
                                  <input name="text1:{{$val->locale}}" value="{{$val->text1}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>text2</label>
                                  <input name="text2:{{$val->locale}}" value="{{$val->text2}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>link</label>
                                  <input name="link:{{$val->locale}}" value="{{$val->link}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          
                      </div>
                  </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
            </div>
            <div class="card-body">
                <div class="file-upload">
                    <div class="file-upload-content" onclick="$('.file-upload-input').trigger( 'click' )">
                        <img class="file-upload-image" src="data/home/{{$data->img}}" />
                    </div>
                    <div class="image-upload-wrap">
                        <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                    </div>
                </div>
            </div>

        </div>
      </div>
</div>
</form>
@endsection