<?php use App\Models\CategoryTranslation; ?>
<!--============== Header Section Start ==============-->
<header class="header-style nav-on-top bg-white">
    <div class="main-nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg nav-secondary nav-primary-hover nav-line-active">
                        <a class="navbar-brand" href="{{asset('')}}"><img class="nav-logo" src="frontend/assets/img/logo_bg.png" alt="Image not found !"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon flaticon-menu flat-small text-primary"></span>
                          </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('')}}">{{__('lang.home')}}</a>
                                </li>
                                @foreach($category as $val)
                                <?php $subcats = CategoryTranslation::where('parent', $val->id)->get(); ?>
                                @if(count($subcats) > 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{$val->category->slug}}">{{$val->name}}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($subcats as $subcat)
                                        <li><a class="dropdown-item" href="{{$subcat->category->slug}}">{{$subcat->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{$val->category->slug}}">{{$val->name}}</a>
                                </li>
                                @endif
                                @endforeach
                                <li class="nav-item dropdown lang_icon">
                                    <a class="nav-link dropdown-toggle" href="#">{{__('lang.Language')}}</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('lang/vi')}}">{{__('lang.Vietnamese')}}</a></li>
                                        <li><a class="dropdown-item" href="{{url('lang/en')}}">{{__('lang.English')}}</a></li>
                                        <li><a class="dropdown-item" href="{{url('lang/cn')}}">{{__('lang.Chinese')}}</a></li>
                                        <!-- <li><a class="dropdown-item" href="index-14.html">Home 13 <span class="text-primary ps-3 font-mini">New</span></a></li> -->
                                    </ul>
                                </li>
                            </ul>
                            <!-- <a href="#" class="btn btn-primary add-listing-btn">+ Create Listing</a> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--============== Header Section End ==============-->