@extends('layouts.master')
@section('title','edit users')
@section('data')

    <form action="{{route('slider.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data" class="jumbotron">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="username">username:</label>
            <input type="text" class="form-control" placeholder="Enter username" value="{{$data->UserName}}" name="UserName">
        </div>
        @error("UserName")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" value="{{$data->email}}" name="email">
        </div>
        @error("email")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control" name="image" value="{{$data->image}}">
        </div>
        @error("image")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <div class="form-group">
            <label for="link">link</label>
            <input type="url" class="form-control" placeholder="Enter link" value="{{$data->link}}" name="link">
        </div>
        @error("link")
        <h5 class="alert-danger">{{$message}}</h5>
        @enderror
        <label for="select">publish?</label>
        <select class="custom-checkbox" name="publish" value="{{$data->publish}}">
            <option selected  value="0">No</option>
            <option value="1">Yes</option>
        </select>
        <br>
        <button name="submit" type="submit" class="btn btn-primary mt-4">Update</button>
    </form>


@endsection
