@foreach ($items as $item)
<div class="col-xl-4 col-lg-6">
    <div class="tour-one__single">
        <div class="tour-one__image">
            <img src="/storage/featured_image/{{ $item->featured_image }}" alt="">
            <a href="{{route('details', ['product' => $item->id])}}"><i class="fa fa-heart"></i></a>
        </div><!-- /.tour-one__image -->
        <div class="tour-one__content">
            <div class="tour-one__stars">
                <i class="fa fa-star"></i> 8.0 Superb
            </div><!-- /.tour-one__stars -->
            <h3><a href="{{route('details', ['product' => $item->id])}}">{{$item->name}}</a></h3>
            <p><span>{{ currency($item->price) }}</span> </p>
            <ul class="tour-one__meta list-unstyled">
                <li><a href="{{route('details', ['product' => $item->id])}}"><i class="far fa-clock"></i>{{$item->adults}} </a></li>
                <li><a href="{{route('details', ['product' => $item->id])}}"><i class="far fa-user-circle"></i> {{$item->bed}}</a></li>
                <li><a href="{{route('details', ['product' => $item->id])}}"><i class="far fa-map"></i> {{$item->location}}</a></li>
            </ul><!-- /.tour-one__meta -->
        </div><!-- /.tour-one__content -->
    </div><!-- /.tour-one__single -->
</div><!-- /.col-lg-4 -->
@endforeach