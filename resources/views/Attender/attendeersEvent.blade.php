@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-row">
        <div class="col-md-8">

           
            {{-- Eventos --}}
            <div class="card ">
                <div class="card-header flex flex-row ">Administrador De Asistentes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        <table class="table table-bordered w-100">
                            <thead>
                              <tr>
                                <th scope="col">Registration type</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Event Id</th>
                                <th scope="col">User Id</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- Evento Info --}}

                                
                                <tr>
                                    <th scope="row">Normal</th>
                                    <td>Fecha de registracion</td>
                                    <td>Id del evento</td>
                                    <td>Id del usuario</td>                                  
                                  </tr>
                               
                              
                            
                            </tbody>
                          </table>
                </div> 
            </div>
        </div>
             {{-- Fin de administrador --}}

             <article class="col-2 row flex flex-column justify-content-start align-items-start mt-5">
                    <a class="btn btn-success p-2 flex justify-column-center align-items-center" href="{{route('addAttender')}}">Agregar Usuario</a>
            </article>
   

    </div>
    
</div>
@endsection
