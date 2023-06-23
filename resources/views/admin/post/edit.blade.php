@extends('admin.layout.main')
@section('content')
@include('admin.alert')
<?php use App\Models\CategoryTranslation; ?>
<form method="POST" action="{{route('post.update', [$data->id])}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('post.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
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
  <div class="col-xl-9 col-lg-9">
        <!-- <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
            </div>
            <div class="card-body">
                <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>View</label>
                                  <input name="view" placeholder="View" type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Icon</label>
                                  <input name="icon" placeholder="Icon" type="text" class="form-control">
                              </div>
                          </div>
                          
                          
                      </div>
            </div>

        </div> -->

    
        <div class="card shadow mb-2">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    @foreach($data->PostTranslation as $key => $val)
                    <li><a data-toggle="tab" class="nav-link <?php if($key==1){echo 'active';} ?>" href="#{{$val->locale}}">
                      @if($val->locale == 'vi') Tiếng Việt @endif
                      @if($val->locale == 'en') Tiếng Anh @endif
                      @if($val->locale == 'cn') Tiếng Trung @endif
                    </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content overflow">
                @foreach($data->PostTranslation as $key => $val)
                <div class="tab-pane <?php if($key==1){echo 'active';} ?>" id="{{$val->locale}}">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Name</label>
                                  <input value="{{$val->name}}" name="name:{{$val->locale}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Sort description</label>
                                  <textarea rows="4" name="detail:{{$val->locale}}" class="form-control">{{$val->detail}}</textarea>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Content</label>
                                  <textarea name="content:{{$val->locale}}" class="form-control" id="ckeditor{{ $key==0 ? '' : $key }}">{{$val->content}}</textarea>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Title</label>
                                  <input value="{{$val->title}}" name="title:{{$val->locale}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Description</label>
                                  <input value="{{$val->description}}" name="description:{{$val->locale}}" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                  @foreach($data->PostTranslation as $key => $post)
                  @if($post->locale == $locale)
                    <label class="">Danh mục</label>
                    <select name='parent' class="form-control select2" id="parent">
                      <option value="">--Chọn danh mục--</option>
                      @foreach($category as $val)
                      <option <?php if($val->id == $post->category_tras_id){echo 'selected'; } ?> value="{{$val->category->id}}">{{$val->name}}</option>
                      <?php $subs = CategoryTranslation::where('parent', $val->id)->get(); ?>
                        @foreach($subs as $sub)
                        <option <?php if($sub->id == $post->category_tras_id){echo 'selected'; } ?> value="{{$sub->category->id}}">--{{$sub->name}}</option>
                        @endforeach
                      @endforeach
                    </select>
                    <div id="list_parent"></div>
                  @endif
                  @endforeach
                </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
            </div>
            <div class="card-body">
                <div class="file-upload">
                    <div class="file-upload-content" onclick="$('.file-upload-input').trigger( 'click' )">
                        <img class="file-upload-image" src="{{ isset($data) ? 'data/news/'.$data->img : 'data/no_image.jpg' }}" />
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