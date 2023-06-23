<div class="col">
    <div class="thumb-blog-horizontal clearfix hover-img-zoom transation border p-2 bg-white">
        <div class="post-image overflow-hidden">
            <a href="{{$data->category->slug}}/{{$val->post->slug}}"><img src="data/news/{{$val->post->img}}" alt="Image not found!"></a>
        </div>
        <div class="post-content ps-3">
            <div class="post-meta font-mini text-uppercase list-color-light">
                <a href="{{$data->category->slug}}"><span>{{$data->name}}</span></a>
            </div>
            <h2 class="mb-2">
                <a href="{{$data->category->slug}}/{{$val->post->slug}}" class="transation text-dark hover-text-primary d-block">{{$val->name}}</a>
            </h2>
            <p>{{$val->detail}}</p>
            <div class="post-meta font-general">
                By <a href="#"><span>Admin</span></a>
                <a href="#"><span>{{date('d/m/Y',strtotime($val->updated_at))}}</span></a>
            </div>
        </div>
    </div>
</div>