@extends('layouts.app')

@section('content')
<div class="container">
    {{ $articles->links()}}
        @if(session('article-delete'))
            <div class="alert alert-success">
                {{session('article-delete')}}
            </div>
        @endif
        @if(session('done'))
        <div class="alert alert-success">
            {{session('done')}}
        </div>
        @endif
        @foreach ($articles as $article)
            <div class="card mb-4">
                <div class="card-header">
                    @auth
                        <a href="{{url("/article/delete/$article->id")}}" class="float-end text-danger" ><i class="fa-solid fa-xmark"></i></a>
                    @endauth
                    <h6 class="text-primary">{{ $article->user->name}}</h6>
                    <small>{{$article->date}}</small>
                </div>
                <div class="card-body">
                    <p>{{ $article->content }}</p><hr>
                    <div class="">
                        {{-- for create image --}}
                        {{-- <img src="{{ asset('files/'.$article->image) }}" alt="image" width="640" height="500" class="rounded img"> --}}
                        {{-- for database seeder --}}
                        <img src="{{ $article->image }}" alt="image" width="640" height="500" class="rounded img">
                    </div>
                </div>
                <div class="card-footer">
                       <form action="{{url("/like/$article->id")}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$article->id}}" name="article_id">

                        {{-- <input type="submit" class="btn btn-primary" value="{{count($article->like)}}
                        like"> --}}
                        <button class="btn btn-danger"><i class="fa-brands fa-gratipay"></i> {{count($article->like)}}Like</button>
                       </form>
                       <a href="{{ url("/comment/$article->id") }}" class="btn btn-secondary float-end d-inline"><i class="fas fa-comment me-1"></i>Comment</a>
                    </div>

            </div>
        @endforeach
</div>

@endsection
