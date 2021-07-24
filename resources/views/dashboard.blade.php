@extends('layouts.app')

@section('pageTitle')
    Olisails | dashboard
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('overlay')
    <div class="overlay over_dash">
    </div>
@endsection

@section('content')
<div id="dashboard" class="container">
    {{-- toast success --}}
    @if (session('create'))
    <div class="alert alert-success">
      {{ session('create') }}
      <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    {{-- /toast success --}}

    {{-- toast success --}}
    @if (session('update'))
    <div class="alert alert-success">
      {{ session('update') }}
      <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    {{-- /toast success --}}

    {{-- toast success --}}
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
      <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    {{-- /toast success --}}

    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <a href="{{route('works.create')}}">
                <button class="btn btn-success">Aggiungi un nuovo lavoro</button>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">

                <table class=" table table-striped table-hover thead-dark">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Settore</th>
                        <th class="description" scope="col">Descrizione</th>
                        <th scope="col">Data e ora</th>
                        <th class="text-center" scope="col">Stato</th>
                        <th scope="col">Azioni</th>
                        <th scope="col">Steps</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($works as $work)
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
                                    <a href="{{ route('status', ['id' => $work->id]) }}">
                                        <p class="d-inline">
                                            <i class="fas fa-arrow-circle-down"></i>
                                        </p>
                                    </a>
                                @endif
                                @if ($work->status == 'on_work')
                                    <a href="{{ route('status', ['id' => $work->id]) }}">
                                        <p class="d-inline">
                                            <i class="fas fa-hammer"></i>
                                        </p>
                                    </a>
                                @endif
                                @if ($work->status == 'completed')
                                    <a href="{{ route('status', ['id' => $work->id]) }}">
                                        <p class="d-inline">
                                            <i class="fas fa-check-circle"></i>
                                        </p>
                                    </a>
                                @endif
                            
                            </td>
                            <td>
                                <a href="{{route('works.edit', ['work' => $work->id] )}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                {{-- form della delete --}} 
                                <form class="d-inline-block" action="{{route('works.destroy', ['work' => $work->id] )}}" method="POST"> 
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn_invisible"><i class="fas fa-trash"></i></button>
                                  </form>
                              {{-- /form della delete --}}
                            </td>
                            <td>
                                <a href="{{ route('works.show', ['work' => $work]) }}">
                                    <button class="btn btn-primary">Vedi Steps</button>
                                </a>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</div>
@endsection

@section('script')
    
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
