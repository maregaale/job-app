@extends('layouts.app')

@section('pageTitle')
    Olisails | Nuovo Step
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection


@section('content')
  <div class="container create">
    {{-- bottone link a work --}}
    <div class="text-center mt-3">
      <a href="{{route('works.show', ['work' => $work])}}">
        <button class="btn btn-dark"">Torna al tuo lavoro</button>
      </a>
    </div>
    {{-- /bottone link a work --}}

    <h1 class="text-center">Crea un nuovo step</h1>

    <form action="{{route('work.steps.store', ['work' => $work])}}" method="POST" class="" enctype="multipart/form-data">
      @method('POST')
      @csrf

      {{-- input info lavoro --}}
      <div class="form-group form-fields mb-3">
          <label for="name"><h4>Nome:</h4></label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci il nome del nuovo step" value="{{ old('name') }}">
      </div>

      <div class="form-group form-fields mb-3">
          <label for="description"><h4>Descrizione:</h4></label>
          <textarea name="description" class="form-control" id="description" rows='4' placeholder="Descrizione">{{ old('description') }}</textarea>
      </div>
      {{-- /input info lavoro --}}

      {{-- upload immagine --}}
      <div class="form-group form-fields mt-3">
          <div>
            <label for="image"><h4>Immagine:</h4></label>
          </div>
          <input type="file" id="image" name="image">
      </div>
      {{-- /upload immagine --}}

      {{-- bottone submit --}}
      <div class="form-fields pb-3 text-center">
          <button type="submit" class="btn btn-success mt-3 ">Salva il nuovo step!</button>
      </div>
      {{-- /bottone submit --}}
    </form>

  </div>

@endsection
