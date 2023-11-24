@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-3">
            <form action="{{route('places.update', $place->id)}}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$place->title}}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Категория</label>
                    <select class="form-select form-select-sm" name="place_categories_id">
                        @foreach($place_categories as $place_category)
                            <option value="{{$place_category->id}}"
                                @if($place_category->id == $place->place_categories_id)
                                    selected
                                @endif
                            >{{$place_category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Статус</label>
                    <select class="form-select form-select-sm" name="place_states_id">
                        @foreach($place_states as $place_state)
                            <option value="{{$place_state->id}}"
                                @if($place_state->id==$place->place_states_id)
                                    selected
                                    @endif
                            >{{$place_state->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
