@extends('layouts.app')

@section('content')
<div class="container">
        @if (session('error'))
            <div class="alert alert-info">
                {{session('error')}}
            </div>
        @endif

            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="text-primary">{{ $articles->user->name }}</h6>
                    <small class="float-end me-3"> {{$articles->amPm}}</small>
                    <small class="float-end me-1">{{ $articles->clock}}</small>
                    <small class="d-block">{{ $articles->day}}</small>
                </div>
                <div class="card-body">
                    <p>{{ $articles->content }}</p>
                    <div class="m-1 border p-3">
                        <img src="{{ $articles->image }}" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <ul class="list-group mb-3">
                        <li class="list-group-item active">{{count($articles->comments)}}comments</li>
                            @foreach ($articles->comments as $comment)
                                <i>{{ $comment->user->name }}</i><li class="list-group-item">{{ $comment->content}}<a href="{{url("/comment/delete/$comment->id")}}" class="text-danger"><i class="fa-solid fa-trash ms-2"></i>dele</a></li>
                            @endforeach
                    </ul>
                    @auth
                        <form action="{{url("/comment")}}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $articles->id }}" name="article_id">
                            <textarea name="content" class="form-control mb-2" placeholder="Comment"></textarea>
                            <button class="btn btn-info"><i class="fa-solid fa-location-arrow me-2"></i>Send</button>
                        </form>
                    @endauth
                </div>
            </div>

</div>
@endsection
