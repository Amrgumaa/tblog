@extends('front/layouts/app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span>tag</span>
                <h3>{{ $tag->name }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-white">
    <div class="container">
        <div class="row">
            @foreach($relatedposts as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{route('website.post',['slug'=>$post->slug])}}"><img src="@if($post->image){{ $post->image }} @else   {{asset('storage/posts/'.$post->id.'/'.$post->image)}} @endif" alt="{{ ($post->image) }}" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-{{ ($post->category->color->name) }} mb-3">{{ ($post->category->name)  }}</span>
                        <h2><a href="{{route('website.post',['slug'=>$post->slug])}}">{{ ($post->title) }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('front/images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ ucfirst($post->user->name) }},{{$post->id}}</a></span>
                            <span>&nbsp;-&nbsp; {{ ($post->created_at)->format('M ,d Y') }}</span>
                        </div>
                        <p>{{ Str::limit( $post->description  , 100)}}</p>
                        <p><a href="{{route('website.post',['slug'=>$post->slug])}}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                <div class="col-md-12">

                    {{ $relatedposts->links() }}

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
