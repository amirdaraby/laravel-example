@extends('layouts.master')
@section('title','trash')
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
                    <form action="{{route('slider.force',['id'=>$item])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="submit">ForceDelete</button>
                    </form>

                </td>
                {{--                <td><a class="btn text-danger" href="{{route('slider.soft',['id'=>$item->id])}}">Delete</a></td>--}}
                <td>
                    <form action="{{route('slider.restore',['id'=>$item->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-info" name="submit">Restore</button>
                    </form>
                </td>
            </tr>

        @empty
            <h1>there is no data</h1>
        @endforelse

        </tbody>
    </table>
    {{$data->links()}}
    <a href="{{route('slider.index')}}" class="btn btn-primary">Index</a>
@endsection
