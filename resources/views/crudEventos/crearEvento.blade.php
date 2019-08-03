@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-row">
        <div class="col-md-8">

           
            {{-- Eventos --}}
            <div class="card ">
                <div class="card-header flex flex-row ">Creador De Eventos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <section class="col-12 flex container-fluid row flex-column">
                        <form class="form" id="addEventForm">

                            <div class="form-group">
                                <label for="title">Titulo del Evento</label>
                                <input type="text" name="title" placeholder="Titulo del evento" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="description">Descripcion del Evento</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Agregar descripcion del evento"></textarea>
                            </div>

                            <div class="form-group row flex flex-row justify-content-around">
                                        
                                    <label for="date">Fecha del evento
                                        <input type="date" name="date" placeholder="fecha del evento" class="form-control">
                                    </label>

                                    <label for="time">Hora del evento
                                        <input type="time" name="time" placeholder="Hora del evento" class="form-control">
                                    </label>

                                    <label for="duration_days">Duracion del evento
                                        <input type="number" name="duration_days" placeholder="Duracion del evento" class="form-control">
                                    </label>
                            </div>

                            <div class="form-group row flex flex-row justify-content-around">
                                        
                                    <label for="location">Ubicacion del evento
                                        <input type="text" name="location" placeholder="Ubicacion del evento" class="form-control">
                                    </label>

                                    <label for="standard_price">Precio del evento
                                        <input type="number" name="standard_price" placeholder="Precio del evento" class="form-control">
                                    </label>

                                    <label for="capacity">Capacidad del evento
                                        <input type="number" name="capacity" placeholder="Capacidad del evento" class="form-control">
                                    </label>
                            </div>

                            <table class="table tablasSesion">
                                    <thead>
                                      <tr>
                                        <th scope="col">Título</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Orador</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                            </table>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary col-12 p-2 mb-2" data-toggle="modal" data-target="#exampleModalScrollable">
                                Agregar Sesion
                            </button>
      
      
                            <div class="form-group">
                                <input type="submit" class="btn btn-success col-4 p-2" value="Crear Evento"></button>
                            </div>
                        </form>

                        <!-- Modal -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Sesion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body"> 
                                    {{-- Body Modal --}}
                                    <form id="form_sesiones">
                                            <div class="form-group">
                                                <label for="title">Titulo de la sesion</label>
                                                <input type="text" name="title" placeholder="Titulo del sesion" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="time">Hora de la sesion</label>
                                                <input type="time" name="time" placeholder="Hora del sesion" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="room">Ubicacion de la sesion</label>
                                                <input type="text" name="room" placeholder="Ubicacon del sesion" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="speaker">Orador de la sesion</label>
                                                <input type="text" name="speaker" placeholder="Orador del sesion" class="form-control">
                                            </div>
                    
                                                
                    
                                    </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btnSession">Guardar sesion</button>
                                </div>
                            </div>
                            </div>
                        </div>
    
                    </section>
                </div> 
            </div>
        </div>
             {{-- Fin de administrador --}}

             
   

    </div>
    
</div>
@endsection
