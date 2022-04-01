@extends('layouts.master')
@section('title','index')
@section('data')

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th scope="col">image</th>
            <th scope="col">link</th>
            <th scope="col">delete</th>
            <th scope="col">update</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->UserName}}</td>
                <td>{{$item->email}}</td>
                <td><a href="{{$item->image}}"><img style="height: 30px ; width: 40px" src="{{$item->image}}" alt=""></a></td>
                <td><a href="{{$item->link}}">link</a></td>
                <td>
                    <form action="{{route('slider.soft',['id'=>$item->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="submit">SoftDelete</button>
                    </form>
                </td>
{{--                <td><a class="btn text-danger" href="{{route('slider.soft',['id'=>$item->id])}}">Delete</a></td>--}}
                <td><a class="btn text-white" href="{{route('slider.edit',['id'=>$item->id])}}">Update</a></td>
            </tr>

        @empty
            <h1>there is no data</h1>
        @endforelse

        </tbody>
    </table>
{{$data->links()}}
    <a href="{{route('slider.trash')}}" class="btn btn-warning">Trash</a>
@endsection
