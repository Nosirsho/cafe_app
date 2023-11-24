@extends('layouts.main')
@section('content')
    <div class="row">
        <form method="get" action="{{route('places.create')}}">
            <button type="submit" class="btn btn-lg btn-primary col-2 mb-3">Добавить</button>
        </form>

        <table class="table table-striped">
            <thead class="border-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Категория</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{{$place->id}}</td>
                    <td><a href="{{route('places.show', $place)}}">{{$place->title}}</a></td>
                    <td>{{$place->place_category->title}}</td>
                    <td>{{$place->place_state->title}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div>
        {{$places->links()}}
    </div>
@endsection
