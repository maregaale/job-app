@extends('layouts.app')

@section('pageTitle')
    Olisails | {{$work->name}}
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

    {{-- titolo --}}
    <h1>Il mio lavoro: '{{$work->name}}'</h1>
    {{-- /titolo --}}

    {{-- tabella lavoro --}}
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
          <table class="table thead-dark">
            <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Settore</th>
                  <th class="description" scope="col">Descrizione</th>
                  <th scope="col">Data e ora</th>
                  <th class="text-center" scope="col">Stato</th>
              </tr>
            </thead>
  
            <tbody>
                
                <tr>
                    <td>
                        <p>{{$work->id}}</p>
                    </td>
                    <td class="font-weight-bold">
                        <p>{{$work->name}}</p>
                    </td>
                    <td>
                        <p>{{$work->type}}</p>
                    </td>
                    <td class="description">
                        <p class="description">{{$work->description}}</p>
                    </td>
                    <td>
                        <p><span>{{$work->created_at->format('d/m/Y H:i')}}</span> </p>
                    </td>
                    <td class="text-center">
                        @if ($work->status == 'created')
                                <p class="d-inline">
                                    <i class="fas fa-arrow-circle-down"></i>
                                </p>
                        @endif
                        @if ($work->status == 'on_work')
                                <p class="d-inline">
                                    <i class="fas fa-hammer"></i>
                                </p>
                        @endif
                        @if ($work->status == 'completed')
                                <p class="d-inline">
                                    <i class="fas fa-check-circle"></i>
                                </p>
                        @endif
                    </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- /tabella lavoro --}}

    <div class="row mb-3">
      <div class="col-md-12 text-center mb-3 mt-3">
          <a href="{{route('work.steps.create', ['work' => $work->id])}}">
              <button class="btn btn-success">Aggiungi un nuovo step</button>
          </a>
      </div>
    </div>

    @foreach ($work->steps as $step)
    <hr>
    <div class="row justify-content-center step_container">
      <div class="col-lg-12 ">
        <h2>Step {{$step->id}}:</h2>

        <div class="d-flex step">
          <div>
            <h4>Nome:</h4>
            <p>{{$step->name}}</p>
          </div>

          <div>
            <h4>Descrizione:</h4>
            <p>{{$step->description}}</p>
          </div>

          @if (isset($step->image))
          <div class="mb-3">
            <h4>Immagine:</h4>
            <img src="{{asset('storage/' . $step->image )}}" alt="{{$step->name}}" style="width:250px">
          </div>
          @endif

        </div> 
        {{-- form della delete --}} 
        {{-- <form class="d-inline-block" action="{{route('work.steps.destroy', ['work' => $work->id, 'step' => $step->id])}}" method="POST"> 
          @method('DELETE')
          @csrf
          <button type="submit" class="btn_invisible"><i class="fas fa-trash"></i></button>
        </form> --}}
        {{-- /form della delete --}}
      </div>
    </div>
    @endforeach
  </div>
@endsection