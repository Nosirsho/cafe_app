@extends('layouts.main')
@section('content')
    <div class="row">
        <form method="get" action="{{route('places.create')}}">
            <button type="submit" class="btn btn-lg btn-primary col-2 mb-3">Добавить</button>
        </form>
        <div class="col-3">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">{{$place->place_state->title}}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$place->title}}</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Надценка {{$place->place_category->markup}}</li>
                        <li>Категория{{$place->place_category->title}}</li>
                    </ul>
                    <form action="{{route('places.edit', $place)}}">
                        <button type="submit" class="w-100 btn btn-lg btn-primary">Изменить</button>
                    </form>
                    <form action="{{route('places.destroy', $place)}}">
                        <button type="submit" class="w-100 btn btn-lg btn-danger mt-3">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
</div>

@endsection
