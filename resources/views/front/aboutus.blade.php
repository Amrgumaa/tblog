@extends('front/layouts/app')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('front') }}/images/img_4.jpg');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <h1 class="">About Us</h1>
                    <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row  dflex d-flex justify-content-around">
            @foreach ( $users as $user )
            <div class="card">
                <img class="card-img-top" src="{{asset('storage/users/'.$user->id.'/'.$user->image)}}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">{{ ucfirst($user->name) }}</h4>
                    <p class="card-text">{{ $user->description }}</p>
                    <a href="#" class="btn btn-secondary">Read my bio</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
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
