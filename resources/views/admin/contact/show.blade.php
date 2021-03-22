@extends('admin.layouts.app')
@section('head')

@endsection
@section('title', 'Message Details')
@section('pagehead', 'Message Details')
@section('maincontent')

<div class="d-flex justify-content-around">
    <div class="col-md-6">
        <div class="card card-info card-outline card-tabs">
            <div class="card-header">
                <div class="d-flex justify-content-between ">
                    <h3 class="card-title btn btn-outline-info">Record ID| {{ $contact->id }}</h3>
                    <div>
                        <a href="{{route('contact.index')}}"> <button type="button" class="btn btn-info ">Back</button></a>
                    </div>

                </div>
            </div>
            <x-alert />
            <form role="form" class="card-body" action="{{route('contact.show',$contact->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Message ID: </label>
                        <text for="name" class="text-secondary"> {{ $contact->id }}</text>
                    </div>
                    <div class="form-group">
                        <label for="name">Contact Name: </label>
                        <text for="name">{{ ucfirst($contact->name) }}</text>
                    </div>


                    <div class="form-group">
                        <label for="email">Email: </label>
                        <text for="email">{{ucfirst($contact->email)}}</text>
                    </div>
                    <div class="form-group">
                        <label for="slug">Subject :</label>
                        <text for="subject">{{ucfirst($contact->subject)}}</text>
                    </div>
                    <div class="form-group">
                        <label for="Message">Message</label>
                        <br>
                        <h6>{{$contact->message}}</h6>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

@section('foot')

@endsection
@endsection
