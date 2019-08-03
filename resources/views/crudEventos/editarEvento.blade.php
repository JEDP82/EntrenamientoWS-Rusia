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
                              <tr>
                                <th scope="row">Evento musica</th>
                                <td>15-25-10</td>
                                <td>$200</td>
                                <td class="d-flex row justify-content-around align-items-center ">
                                    <button class="btn btn-success p-2 col-3 m-2">
                                        Lista De Asistentes
                                    </button>
                                    <button class="btn btn-danger p-2 col-3 m-2">
                                        Diagrama De Calificaciones
                                    </button>
                                </td>
                              </tr>
                            
                            </tbody>
                          </table>
                </div> 
            </div>
        </div>
             {{-- Fin de administrador --}}

             
   

    </div>
    
</div>
@endsection
