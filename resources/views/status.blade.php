@extends('layouts.app')

@section('pageTitle')
    Olisails | dashboard
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('overlay')
    <div class="overlay over_status">
    </div>
@endsection

@section('content')
   
    <div class="status container d-flex flex-column align-items-center">

      {{-- bottone link a dashboard --}}
      <div>
        <a href="{{route('dashboard')}}">
          <button class="btn btn-dark"">Torna alla Dashboard senza salvare</button>
        </a>
      </div>
      {{-- /bottone link a dashboard --}}


      
      @foreach ($myWork as $work)
        {{-- titolo --}}
        <h1 class="mt-5">Modifica lo stato di '{{$work->name}}'</h1>
        {{-- /titolo --}}

        {{-- form --}}
        <form action="{{route('status.update', ['id' => $work->id])}}" method="POST"  class="my-5">
          @method('PATCH')
          @csrf
            <div>
              <label class="lab_name" for="created">Creato</label>
              <input type="radio" name="status" id="created" value="created" {{$work->status == 'created'? 'checked' : null}}>
              <label for="created"><i class="fas fa-arrow-circle-down"></i></label>
            </div>

            <div class="mt-2">
              <label class="lab_name" for="on_work">In lavoro</label>
              <input type="radio" name="status" id="on_work" value="on_work" {{$work->status == 'on_work'? 'checked' : null}}>
              <label for="on_work"><i class="fas fa-hammer"></i></label>
            </div>

            <div class="mt-2">
              <label class="lab_name" for="completed">Completato</label>
              <input type="radio" name="status" id="completed" value="completed" {{$work->status == 'completed'? 'checked' : null}}>
              <label for="completed"><i class="fas fa-check-circle"></i></label>
            </div>

            <div class="form-fields text-center mt-3">
              <button type="submit" class="btn btn-success mt-3">Salva!</button>
            </div>
        </form>
        {{-- /form --}}          
      @endforeach

    </div>
@endsection
