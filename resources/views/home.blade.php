@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://i1.sndcdn.com/avatars-000326709935-8bqnrw-t240x240.jpg" class="rounded-circle">
        </div>
        <div class="col-9 pt-5 ps-5">
            <div>
                <h1>{{$user->username}}</h1>
            </div>
            <div class="d-flex">
                <div><strong>441</strong> posts</div>
                <div class="ps-4"><strong>90.2k</strong> followers</div>
                <div class="ps-4"><strong>340</strong> following</div>
            </div>
            <div class="fw-bold pt-4">{{$user->profile->title}}</div>
            <div> {{$user->profile->description}} </div>
            <div><a href="#">{{$user->profile->url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="/post_image/1.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="/post_image/2.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="/post_image/3.jpg" alt="" class="w-100">
        </div>
    </div>
</div>
@endsection