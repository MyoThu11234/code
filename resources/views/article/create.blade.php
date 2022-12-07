@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-6">
                    <form action=""method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea name="content" id="" rows="3" class="form-control mb-2" placeholder="What is your mind?"></textarea>
                        <input type="file" class="form-control mb-3" placeholder="Upload your photo" name="image" width="640" height="480">
                        <select name="category_id" id="" class="form-select mb-3">
                            <option value="1">Ecudation</option>
                            <option value="2">Funny</option>
                            <option value="3">For You</option>
                            <option value="4">News</option>
                        </select>
                        <input type="submit" value="Post" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
@endsection
