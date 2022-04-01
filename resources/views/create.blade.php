@extends('layouts.master')
@section('title','store')
@section('data')

    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" class="jumbotron">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="username">username:</label>
            <input type="text" class="form-control" placeholder="Enter username" name="UserName">
        </div>
        @error("UserName")
            <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
        </div>
        @error("email")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control" name="image">
        </div>
        @error("image")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <div class="form-group">
            <label for="link">link</label>
            <input type="url" class="form-control" placeholder="Enter link" name="link">
        </div>
        @error("link")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <label for="select">publish?</label>
        <select class="custom-checkbox" name="publish">
            <option selected  value="0">No</option>
            <option value="1">Yes</option>
        </select>
        <br>
        <button name="submit" type="submit" class="btn btn-primary mt-4">Store</button>
    </form>


@endsection
