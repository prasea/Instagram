@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5 ps-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user -> username}}</h1>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                @can('update', $user->profile)
                <a href="/p/create">Add New Posts</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="ps-4"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="ps-4"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="fw-bold pt-4">{{$user->profile->title}}</div>
            <div> {{$user->profile->description}} </div>
            <div><a href="#">{{$user->profile->url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection