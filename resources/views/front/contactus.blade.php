@extends('front/layouts/app')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('front') }}/images/img_4.jpg');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <h1 class="">Contact Us</h1>
                    <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-10 comment-form-wrap pt-5 ">
    <h3 class="mb-5">Send us a message</h3>
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <x-alert />
            <form role="form" class="card-body p-5 bg-light" action="{{route('website.contactus')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="subject" name="subject" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Message</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter your message here" name="message" value=" ">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send us a message</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>
@endsection
