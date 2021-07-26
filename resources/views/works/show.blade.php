@extends('layouts.app')

@section('pageTitle')
    Olisails | {{$work->name}}
@endsection


@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('overlay')
    <div class="overlay over_work_show">
    </div>
@endsection


@section('content')
  <div id="work-show" class="container create">
    {{-- bottone link a dashboard --}}
    <div class="text-center mt-3">
      <a href="{{route('dashboard')}}">
        <button class="btn btn-dark">Torna alla Dashboard</button>
      </a>
    </div>
    {{-- /bottone link a dashboard --}}

    {{-- titolo --}}
    <h1>Il mio lavoro: <span>{{$work->name}}</span></h1>
    {{-- /titolo --}}

    {{-- tabella lavoro --}}
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="show_work table-responsive table-wrapper-scroll-y my-custom-scrollbar">
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

          <div class="work_img_container text-center mb-3">
            @if (isset($work->image))
            <img src="{{asset('storage/' . $work->image)}}" alt="{{$work->name}}">                
            @endif
          </div>
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

    <div v-for="(step, index) in steps">
      <hr>
      <div class="row justify-content-center step_container">
        <div class="col-lg-12 ">
          <h2 class="step_index mb-3">Step @{{index + 1}}:</h2>

          <div class="d-flex step">
            <div>
              <h4 class="step_name">Nome:</h4>
              <p>@{{step.name}}</p>
            </div>

            <div>
              <h4 class="step_description">Descrizione:</h4>
              <p>@{{step.description}}</p>
            </div>

            <div v-if="step.image != null" class="mb-3">
              <h4 class="step_image">Immagine:</h4>
              @foreach ($work->steps as  $el)
                <div v-if="step.id == {{ json_encode($el->id) }}">

                  @if (isset($el->image))
                  <img src="{{asset('storage/' . $el->image)}}" alt="{{$el->name}}" style="width:250px">
                  @endif
                </div>
              @endforeach
            </div>
          </div> 
        </div>
      </div>
    </div>

  </div>
@endsection

@section('script')
  <script>
    new Vue ({
      el: "#work-show",
      data: {
        steps: [],

      },
      methods: {

      },
      mounted: function mounted() {
        var _this = this;

        axios.get('http://localhost:8000/api/show/' + {{$work->id}}).then(function (resp) {
          console.log(resp.data);
          _this.steps = resp.data;
        });
      },
    });
  </script>
@endsection 