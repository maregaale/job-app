@extends('layouts.app')

@section('pageTitle')
    Olisails | Modifica {{$work->name}}
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection


@section('content')
  <div class="container create">
    {{-- bottone link a dashboard --}}
    <div class="text-center mt-3">
      <a href="{{route('dashboard')}}">
        <button class="btn btn-dark"">Torna alla Dashboard</button>
      </a>
    </div>
    {{-- /bottone link a dashboard --}}

    <h1 class="text-center">Modifica il tuo lavoro '{{$work->name}}'</h1>

    <form action="{{route('works.update', ['work' => $work->id])}}" method="POST" class="" enctype="multipart/form-data">
      @method('PUT')
      @csrf

      {{-- input info lavoro --}}
      <div class="form-group form-fields mb-3">
          <label for="name"><h4>Nome:</h4></label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci il nome del nuovo lavoro" value="{{$work->name}}">
      </div>

      <div class="form-group form-fields mb-3" >
          <label for="type"><h4>Settore:</h4></label>
          <input type="text" class="form-control" name="type" id="type" placeholder="Inserisci il settore del nuovo lavoro" value="{{$work->type}}">
      </div>

      <div class="form-group form-fields mb-3">
          <label for="description"><h4>Descrizione:</h4></label>
          <textarea name="description" class="form-control" id="description" rows='4' placeholder="Descrizione" value="{{$work->description}}">{{$work->description}}</textarea>
      </div>
      {{-- /input info lavoro --}}

      {{-- upload immagine --}}
      <div class="form-group form-fields mt-3">
          <div>
            <label for="image"><h4>Immagine:</h4></label>
          </div>
          <input type="file" id="image" name="image" value="{{$work->image}}">
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
