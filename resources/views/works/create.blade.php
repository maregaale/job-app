@extends('layouts.app')

@section('pageTitle')
    Olisails | create new work
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('overlay')
    <div class="overlay over_work_create">
    </div>
@endsection


@section('content')
  <div class="container create">
    {{-- errori --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- /errori --}}
    
    {{-- bottone link a dashboard --}}
    <div class="text-center mt-3">
      <a href="{{route('dashboard')}}">
        <button class="btn btn-dark"">Torna alla Dashboard</button>
      </a>
    </div>
    {{-- /bottone link a dashboard --}}

    <h1 class="text-center">Crea un nuovo lavoro</h1>

    <form action="{{route('works.store')}}" method="POST" class="" enctype="multipart/form-data">
      @method('POST')
      @csrf

      {{-- input info lavoro --}}
      <div class="form-group form-fields mb-3">
          <label for="name"><h4>Nome:</h4></label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci il nome del nuovo lavoro" value="{{ old('name') }}">
      </div>

      <div class="form-group form-fields mb-3" >
          <label for="type"><h4>Settore:</h4></label>
          <input type="text" class="form-control" name="type" id="type" placeholder="Inserisci il settore del nuovo lavoro" value="{{ old('type') }}">
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
          <input type="file" id="image" name="image" value="{{ old('image') }}">
      </div>
      {{-- /upload immagine --}}

      {{-- status --}}
      <h4 class="mb-3 mt-4">Stato:</h4>

      <div>
        <label class="lab_name" for="created">Creato</label>
        <input type="radio" name="status" id="created" value="created" checked>
        <label for="created"><i class="fas fa-arrow-circle-down"></i></label>
      </div>

      <div class="mt-2">
        <label class="lab_name" for="on_work">In lavoro</label>
        <input type="radio" name="status" id="on_work" value="on_work">
        <label for="on_work"><i class="fas fa-hammer"></i></label>
      </div>

      <div class="mt-2">
        <label class="lab_name" for="completed">Completato</label>
        <input type="radio" name="status" id="completed" value="completed">
        <label for="completed"><i class="fas fa-check-circle"></i></label>
      </div>
      {{-- /status --}}

      {{-- bottone submit --}}
      <div class="form-fields pb-3 text-center">
          <button type="submit" class="btn btn-success mt-3 ">Salva!</button>
      </div>
      {{-- /bottone submit --}}
    </form>
  </div>
@endsection