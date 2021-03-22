@extends('front/layouts/app')
<link rel="stylesheet" href="{{asset ('amr/profile/profile.css') }}">
@section('content')

<body class="profile-page sidebar-collapse">

    <div class="page-header header-filter" data-parallax="true" style="background-image:url('{{asset('storage/users/'.$user->id.'/'.$user->image)}}');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{asset('storage/users/'.$user->id.'/'.$user->image)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ ucfirst($user->name) }}</h3>
                                <h6>{{ ucfirst($user->name) }}</h6>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                        <div class="follow">
                            <button class="btn btn-fab btn-primary btn-round" rel="tooltip" title="" data-original-title="Follow this user">
                                <i class="material-icons">add</i></button>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ ucfirst($user->description) }}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active" href="#work" role="tab" data-toggle="tab">
                                        <i class="material-icons">palette</i> Recent posts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#studio" role="tab" data-toggle="tab">
                                        <i class="material-icons">favorite</i> Top Posts
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-space">
                    <div class="tab-pane work active show" id="work">
                        <div class="row">
                            <div class="col-md-7 ml-auto mr-auto ">
                                <h4 class="title">Recent Posts</h4>
                                <div class="row collections">
                                    @foreach ($posts as $post)
                                    <div class="col-md-6">
                                        <div class="entry2">
                                            <a href="{{route('website.post',['slug'=>$post->slug])}}"><img src="@if($post->image){{ $post->image }} @else   {{asset('storage/posts/'.$post->id.'/'.$post->image)}} @endif" alt="{{ ($post->image) }}" class="img-fluid rounded"></a>
                                            <div class="excerpt">
                                                <span class="post-category text-white bg-{{ ($post->category->color->name) }} mb-3"><a href="{{route('website.category',['slug'=>$post->category->slug])}}"></a>{{ ($post->category->name)  }}</span>

                                                <h2><a href="{{route('website.post',['slug'=>$post->slug])}}">{{ ($post->title) }}</a></h2>
                                                <div class="post-meta align-items-center text-left clearfix">
                                                    <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('storage/users/'.$post->user->id.'/'.$post->user->image)}}" alt="Image" class="img-fluid"></figure>
                                                    <span class="d-inline-block mt-1">By <a href="#">{{ ucfirst($post->user->name) }},{{$post->id}}</a></span>
                                                    <span>&nbsp;-&nbsp; {{ ($post->created_at)->format('M ,d Y') }}</span>
                                                </div>
                                                <p>{!! Str::limit( $post->description , 100)!!}</p>

                                                <p><a href="{{route('website.post',['slug'=>$post->slug])}}">Read More</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="row text-center pt-5 border-top">
                                    <div class="col-md-12 pagination pagination-info">
                                        {{ $posts->links() }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mr-auto ml-auto stats">
                                <h4 class="title">Stats</h4>
                                <ul class="list-unstyled">
                                    <li><b>{{$myposts->count()}}</b> Posts</li>
                                    <li><b>{{$myposts->sum('views')}}</b> Total Post views</li>
                                    <li><b>331</b> Followers</li>
                                    <li><b>1.2K</b> Likes</li>
                                </ul>
                                <hr>
                                <h4 class="title">Focus</h4>
                                @foreach ($unique as $unique)
                                <span class="badge badge-{{ $unique->category->color->name}}">{{ $unique->category->name }}</span>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane connections" id="studio">
                        <div class="col-md-7 ml-auto mr-auto ">
                            <h4 class="title">Top Posts</h4>
                            <div class="row">
                                <div class="row collections">
                                    @foreach ($topposts as $post)
                                    <div class="col-md-6">
                                        <div class="entry2">
                                            <a href="{{route('website.post',['slug'=>$post->slug])}}"><img src="@if($post->image){{ $post->image }} @else   {{asset('storage/posts/'.$post->id.'/'.$post->image)}} @endif" alt="{{ ($post->image) }}" class="img-fluid rounded"></a>
                                            <div class="excerpt">
                                                <span class="post-category text-white bg-{{ ($post->category->color->name) }} mb-3"><a href="{{route('website.category',['slug'=>$post->category->slug])}}"></a>{{ ($post->category->name)  }}</span>

                                                <h2><a href="{{route('website.post',['slug'=>$post->slug])}}">{{ ($post->title) }}</a></h2>
                                                <div class="post-meta align-items-center text-left clearfix">
                                                    <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('storage/users/'.$post->user->id.'/'.$post->user->image)}}" alt="Image" class="img-fluid"></figure>
                                                    <span class="d-inline-block mt-1">By <a href="#">{{ ucfirst($post->user->name) }},{{$post->id}}</a></span>
                                                    <span>&nbsp;-&nbsp; {{ ($post->created_at)->format('M ,d Y') }}</span>
                                                </div>
                                                <p>{!! Str::limit( $post->description , 100)!!}</p>

                                                <p><a href="{{route('website.post',['slug'=>$post->slug])}}">Read More</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="row text-center pt-5 border-top">
                                <div class="col-md-12 pagination pagination-info">
                                    {{ $topposts->links() }}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
<br>
@section('foot')
<script src="{{asset ('amr/profile/profile.js') }}"></script>
@endsection
@endsection
