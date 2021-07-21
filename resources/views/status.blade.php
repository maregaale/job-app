@extends('layouts.app')

@section('pageTitle')
    Olisails | dashboard
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- @foreach ($status as $stat)
        <p>{{$stat}}</p>
    @endforeach --}}
    <div class="container">
      @foreach ($myWork as $work)
        <form action="{{route('status.update', ['id' => $work->id])}}" method="POST"  class="">
          @method('PATCH')
          @csrf
            <div>
              <input type="radio" name="status" id="created" value="created" {{$work->status == 'created'? 'checked' : null}}>
              <label for="created"><i class="fas fa-arrow-circle-down"></i></label>
            </div>

            <div>
              <input type="radio" name="status" id="on_work" value="on_work" {{$work->status == 'on_work'? 'checked' : null}}>
              <label for="on_work"><i class="fas fa-hammer"></i></label>
            </div>

            <div>
              <input type="radio" name="status" id="completed" value="completed" {{$work->status == 'completed'? 'checked' : null}}>
              <label for="completed"><i class="fas fa-check-circle"></i></label>
            </div>

            <div class="form-fields">
              <button type="submit" class="btn btn-success mt-3">Salva!</button>
            </div>
        </form>
          
      @endforeach
    </div>
@endsection
