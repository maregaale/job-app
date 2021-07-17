@extends('layouts.app')

@section('pageTitle')
    Olisails | dashboard
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <table class=" table ">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Settore</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Data</th>
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
                            @if ($work->status == 'created')
                                <p><i class="fas fa-arrow-circle-down"></i></p>
                            @endif
                            @if ($work->status == 'on_work')
                                <p><i class="fas fa-hammer"></i></p>
                            @endif
                            @if ($work->status == 'completed')
                                <p><i class="fas fa-check-circle"></i></p>
                            @endif
                           
                        </td>
                        <td>
                            <p>{{$work->created_at}}</p>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
</div>
@endsection
