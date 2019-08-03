@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-row">
        <div class="col-md-8">

           
            {{-- Usuario --}}
            <div class="card ">
                <div class="card-header flex flex-row ">Creador De usuario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <section class="col-12 flex container-fluid row flex-column">
                        <form class="form" id="addUserForm">

                            <div class="form-group">
                                <label for="name">Nombre del asistente</label>
                                <input type="text" name="name" placeholder="Nombre del asistente" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Apellido del asistente</label>
                                <input type="text" name="last_name" placeholder="Apellido del asistente" class="form-control">
                            </div>

                            <div class="form-group row flex flex-row justify-content-around">
                                        
                                <div class="form-group">
                                    <label for="username">Usuario del asistente</label>
                                    <input type="text" name="username" placeholder="Usuario del asistente" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo del asistente</label>
                                    <input type="text" name="email" placeholder="Correo del asistente" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="registration_type">Tipo del registro</label>
                                    <select name="registration_type" class="form-control">
                                        <option value="general">general</option>
                                        <option value="vip">vip</option>
                                        <option value="early_bird">early bird</option>
                                    </select>
                                </div>    

                                

                                <div class="form-group">
                                    <label for="registration_date">Fecha del registro</label>
                                    <input type="date" name="registration_date" class="form-control">
                                </div>
                                   
                            </div>

                            
                            <div class="form-group">
                                <label for="password">Usuario del asistente</label>
                                <input type="password" name="password" placeholder="Contraseña del asistente" class="form-control">
                            </div>


                            <div class="form-group row flex flex-row justify-content-around">
                                        
                                <label for="event_id">Evento a Asistir</label>
                                <select name="event_id" class="form-control">
                                    @foreach($infoEvento as $evento_id)
                                        <option value="{{$evento_id->id}}">{{$evento_id->title}}</option>
                                    @endforeach
                                </select>
                                   
                            </div> 

                            <div class="form-group">
                                <input type="submit" class="btn btn-success col-4 p-2" value="Crear Usuario"></button>
                            </div>
                        </form>

                      
            </div>
        </div>
             {{-- Fin de administrador --}}

             
   

    </div>
    
</div>
@endsection
