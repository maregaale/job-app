@extends('layouts.app')

@section('pageTitle')
    Olisails | dashboard
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="dashboard" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class=" table ">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Settore</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Stato</th>
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
                        <td>
                            <p>{{$work->name}}</p>
                        </td>
                        <td>
                            <p>{{$work->type}}</p>
                        </td>
                        <td>
                            <p>{{$work->description}}</p>
                        </td>
                        <td>
                            <p><span>{{$work->created_at->format('d/m/Y H:i')}}</span> </p>
                        </td>
                        <td>
                            @if ($work->status == 'created')
                                <a href="{{ route('status', ['id' => $work->id]) }}">
                                    <p>
                                        <i class="fas fa-arrow-circle-down"></i>
                                    </p>
                                </a>
                            @endif
                            @if ($work->status == 'on_work')
                                <a href="{{ route('status', ['id' => $work->id]) }}">
                                    <p>
                                        <i class="fas fa-hammer"></i>
                                    </p>
                                </a>
                            @endif
                            @if ($work->status == 'completed')
                                <a href="{{ route('status', ['id' => $work->id]) }}">
                                    <p>
                                        <i class="fas fa-check-circle"></i>
                                    </p>
                                </a>
                            @endif
                           
                        </td>
                        <td>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </td>
                        <td>
                            <a href="">
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
@endsection

@section('script')
    
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
