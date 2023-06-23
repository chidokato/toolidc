<div class="col iteam-product">
    <!-- Property Grid -->
    <div class="property-grid-1 property-block bg-white transation-this hover-shadow">
        <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
            <a href="{{$data->category->slug}}/{{$val->post->slug}}"><img class="img-col-3" src="data/product/{{$val->post->img}}" alt="{{$val->name}}"></a>
            <a href="{{$data->category->slug}}" class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>{{$val->CategoryTranslation->name}}</span></a>
            <ul class="position-absolute quick-meta">
                <!-- <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li> -->
            </ul>
        </div>
        <div class="property_text p-4">
            <span class="listing-price">{{$val->price}} <small> {{$val->unit}} </small></span>
            <h5 class="listing-title"><a href="{{$data->category->slug}}/{{$val->post->slug}}">{{$val->name}}</a></h5>
            <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{$val->address}}, {{$val->DistrictTranslation->name}}, {{$val->ProvinceTranslation->name}} </span>
        </div>
    </div>
</div>