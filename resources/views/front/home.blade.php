 @extends('front/layouts/app')

 @section('content')

 <!-- //Main banner -->
 <div class="site-section bg-light">
     <div class="container">
         <div class="card-body">
             <form action="{{url('/')}}">
                 <div class="input-group">
                     <input type="text" class="form-control" name="q" placeholder="Search this blog">
                     <div class="input-group-append">
                         <button class="btn btn-secondary" type="button">
                             <i class="fa fa-search"></i>
                         </button>
                     </div>
                 </div>
             </form>
         </div>

         <div class="row align-items-stretch retro-layout-2">

             <!-- first posts -->
             <div class="col-md-4">
                 @foreach($firstposts as $post)
                 <a href="{{route('website.post',['slug'=>$post->slug])}}" class="h-entry mb-30 v-height gradient "
                     style="background-image: url('{{ $post->image }}'); ">
                     <div class="text">
                         <h2>{{ $post->title }}</h2>
                         <span class="date">{{ ($post->created_at)->format('M ,d Y') }}</span>
                     </div>
                 </a>
                 @endforeach
             </div>
             <!-- end of first posts -->
             <!-- middle post -->
             <div class="col-md-4">
                 @foreach($middlepost as $post)
                 <a href="{{route('website.post',['slug'=>$post->slug])}}" class="h-entry img-5 h-100 gradient"
                     style="background-image: url('{{ $post->image }}');">
                     <div class="text">
                         <div class="post-categories mb-3">
                             <span class="post-category bg-danger">{{ $post->Category->name }}</span>
                         </div>
                         <h2>{{ ($post->title) }}</h2>
                         <span class="date">{{ ($post->created_at)->format('M ,d Y') }}</span>
                     </div>
                 </a>
                 @endforeach
             </div>
             <!-- end of middle post-->
             <!-- last post -->
             <div class="col-md-4">
                 @foreach($lastposts as $post)
                 <a href="{{route('website.post',['slug'=>$post->slug])}}" class="h-entry mb-30 v-height gradient"
                     style="background-image: url('{{ ($post->image)}}');">
                     <div class="text">
                         <h2>{{ ($post->title) }}</h2>
                         <span class="date">{{ ($post->created_at)->format('M ,d Y') }}</span>
                     </div>
                 </a>
                 @endforeach
             </div>
             <!-- end last post -->
         </div>
     </div>
 </div>
 <!-- //posts -->
 <div class="site-section">
     <div class="container">
         <div class="row mb-5">
             <div class="col-12">
                 <h2>Recent Posts</h2>
             </div>
         </div>
         <div class="row">
             @foreach($recentposts as $post)
             <div class="col-lg-4 mb-4">
                 <div class="entry2">
                     <a href="{{route('website.post',['slug'=>$post->slug])}}"><img
                             src="@if($post->image){{ $post->image }} @else   {{asset('storage/posts/'.$post->id.'/'.$post->image)}} @endif"
                             alt="{{ ($post->image) }}" class="img-fluid rounded"></a>
                     <div class="excerpt">
                         <span class="post-category text-white bg-{{ ($post->category->color->name) }} mb-3"><a
                                 href="{{route('website.category',['slug'=>$post->category->slug])}}"></a>{{ ($post->category->name)  }}</span>

                         <h2><a href="{{route('website.post',['slug'=>$post->slug])}}">{{ ($post->title) }}</a></h2>
                         <div class="post-meta align-items-center text-left clearfix">
                             <figure class="author-figure mb-0 mr-3 float-left"><a
                                     href="{{route('website.bio',['id'=>$post->user->id])}}"><img
                                         src="{{asset('storage/users/'.$post->user->id.'/'.$post->user->image)}}"
                                         alt="Image" class="img-fluid"></a></figure>
                             <span class="d-inline-block mt-1">By <a
                                     href="{{route('website.bio',['id'=>$post->user->id])}}">{{ ucfirst($post->user->name) }},{{$post->id}}</a></span>
                             <span>&nbsp;-&nbsp; {{ ($post->created_at)->format('M ,d Y') }}
                                 <span class="badge badge-light">
                                     {{ strtolower(\Carbon\Carbon::parse($post->created_at)->diffForHumans()) }}
                                 </span>
                             </span>

                         </div>
                         <p>{!! Str::limit( $post->description , 100)!!}</p>

                         <p><a href="{{route('website.post',['slug'=>$post->slug])}}">Read More</a></p>
                     </div>
                 </div>
             </div>
             @endforeach
         </div>
         <div class="row text-center pt-5 border-top">
             <div class="col-md-12">
                 {{ $recentposts->links() }}
             </div>
         </div>
     </div>
 </div>
 <!-- //down banner -->
 <div class="site-section bg-light">
     <div class="container">

         <div class="row align-items-stretch retro-layout">

             <div class="col-md-5 order-md-2">
                 @foreach( $ffirstposts as $post)
                 <a href="{{route('website.post',['slug'=>$post->slug])}}" class="hentry img-1 h-100 gradient"
                     style="background-image: url('{{ ($post->image) }}');">
                     <span class="post-category text-white bg-danger">{{$post->category->name }}</span>
                     <div class="text">
                         <h2>{{ $post->title }}</h2>
                         <span>{{ ($post->created_at)->format('M ,d Y') }}</span>
                     </div>
                 </a>
                 @endforeach
             </div>

             <div class="col-md-7">
                 @foreach( $fmiddlepost as $post)
                 <a href="{{route('website.post',['slug'=>$post->slug])}}" class="hentry img-2 v-height mb30 gradient"
                     style="background-image: url('{{ ($post->image) }}');">
                     <span class="post-category text-white bg-danger">{{$post->category->name }}</span>
                     <div class="text">
                         <h2>{{ $post->title }}</h2>
                         <span>{{ ($post->created_at)->format('M ,d Y') }}</span>
                     </div>
                 </a>
                 @endforeach
                 <div class="two-col d-block d-md-flex">
                     @foreach( $flastposts as $post)
                     <a href="{{route('website.post',['slug'=>$post->slug])}}"
                         class="hentry v-height img-2 ml-auto gradient"
                         style="background-image: url('{{ ($post->image) }}');">
                         <span class="post-category text-white bg-danger">{{$post->category->name }}</span>
                         <div class="text">
                             <h2>{{ $post->title }}</h2>
                             <span>{{ ($post->created_at)->format('M ,d Y') }}</span>
                         </div>
                     </a>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- //news letter -->
 <div class="site-section bg-lightx">
     <div class="container">
         <div class="row justify-content-center text-center">
             <div class="col-md-5">
                 <div class="subscribe-1 ">
                     <h2>Subscribe to our newsletter</h2>
                     <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum
                         a explicabo, ipsam nostrum.</p>
                     <form action="#" class="d-flex">
                         <input type="text" class="form-control" placeholder="Enter your email address">
                         <input type="submit" class="btn btn-primary" value="Subscribe">
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @endsection
