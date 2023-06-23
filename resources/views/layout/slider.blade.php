<!--============== Slider Area Start ==============-->
<div class="full-row p-0 overflow-hidden">
    <div id="slider" class="overflow-hidden" style="width:1200px; height:580px; margin:0 auto;margin-bottom: 0px;">
        @foreach($slider as $key => $val)
        <!-- Slide 1-->
        <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:12000; transition2d:104; kenburnsscale:1.00;">
            <img src="data/home/{{$val->slider->img}}" class="ls-bg" alt="" />
            <!-- <p style="font-size:20px; font-weight:400; top:320px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:500; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">{{$val->heading1}}</p>
            <p style="font-size:48px; font-weight:700; top:370px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:1000; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">{{$val->heading1}}</p>
            <p style="top:450px; left:50%; text-align:center; font-weight:400; font-style:normal; text-decoration:none; width:650px; font-size:18px; color:#ffffff; line-height:30px; white-space:normal;" class="ls-l ls-hide-phone" data-ls="offsetyin:100%; durationin:1500; delayin:1500; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">{{$val->text1}}</p> -->
            <!-- <a style="" class="ls-l ls-hide-phone" href="property-grid-v1.html" target="_self" data-ls="offsetyin:40; delayin:2000; clipin:0 0 100% 0; durationout:400; hover:true; hoverdurationin:300; hoveropacity:1; hoverbgcolor:#222; hovercolor:#aa8453;">
                <p style="font-weight:500; text-align:center; cursor:pointer; padding-right:35px; padding-left:35px; font-weight: 500; font-size:16px; font-family: 'Sen', sans-serif; line-height:40px; top:550px; left:50%; color:#fff; border-radius:30px; padding-top:10px; padding-bottom:10px; background:#aa8453; white-space:normal;"
                    class="">Preview Listing</p>
            </a> -->
        </div>
        <!-- Slide 2 -->
        @endforeach
    </div>
</div>
<!--============== Slider Area End ==============-->

<!--============== Property Search Form Start ==============-->
<div class="full-row p-0 property-search-form on-slider">
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="bg-white shadow-sm quick-search form-icon-right position-relative" action="#" method="post">
                    <div class="row row-cols-lg-4 row-cols-md-4 row-cols-1 g-4">
                        <div class="col">
                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa...">
                        </div>
                        <div class="col">
                            <select class="form-control">
                                <option>-- Danh mục --</option>
                                <option>Chung cư</option>
                                <option>Biệt thự</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control">
                                <option>-- Khu Vực --</option>
                                <option>Hà Nội</option>
                                <option>Hồ Chí Minh</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--============== Property Search Form End ==============-->