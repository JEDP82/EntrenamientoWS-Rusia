@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-row">
        <div class="col-md-8">

           
            {{-- Eventos --}}
            <div class="card ">
                <div class="card-header flex flex-row ">Administrador De Eventos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        <table class="table table-bordered w-100">
                            <thead>
                              <tr>
                                <th scope="col">Evento</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Edicion</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- Evento Info --}}

                                @foreach ($Eventos as $evento)
                                <tr>
                                    <th scope="row">{{$evento->title}}</th>
                                    <td>{{$evento->date}}</td>
                                    <td>{{$evento->standard_price}}</td>
                                    <td class="d-flex flex-row row justify-content-around align-items-center ">
                                        <p class="col-12 d-flex flex-row justify-content-around row">
                                            <a class="btn btn-success" href="{{route('asistentes', $evento->id)}}">
                                              Lista De Clientes
                                            </a>
                                            <button class="btn btn-primary btnRating" type="button" data-toggle="collapse" data-target="#collapseExample{{$evento->id}}" aria-expanded="false" aria-controls="collapseExample" id="{{$evento->id}}">
                                              Diagrama
                                            </button>
                                          </p>
                                        <div class="collapse flex row col-12" id="collapseExample{{$evento->id}}">
                                            <div class="card card-body col-12">
                                                <canvas id="myChart{{$evento->id}}"></canvas>
                                                
                                            </div>
                                          </div>
                                    </td>
                                  </tr>
                                @endforeach
                              
                            
                            </tbody>
                          </table>
                </div> 
            </div>
        </div>
             {{-- Fin de administrador --}}

             <article class="col-2 row flex flex-column justify-content-start align-items-start mt-5">
                    <a class="btn btn-success p-2 flex justify-column-center align-items-center" href="{{route('addEvent')}}">Agregar Evento</a>
            </article>
   

    </div>
    
</div>


@endsection
