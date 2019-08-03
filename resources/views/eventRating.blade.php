@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-row">
        <div class="col-md-8">

           
            {{-- Usuario --}}
            <div class="card ">
                <div class="card-header flex flex-row ">Calificador De Eventos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <section class="col-12 flex container-fluid row flex-column">
                        <form class="form" id="addRatingForm">

                           

                            <div class="form-group row flex flex-row justify-content-around">
                                        
                                <div class="form-group">
                                    <label for="email">Correo del asistente</label>
                                    <input type="text" name="email" placeholder="Correo del asistente" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="value">Correo del asistente</label><br>
                                    <div class="flex d-flex flex-row justify-content-around">
                                        <input class="mx-2" type="radio" name="value" value="0" checked> Malo<br>
                                        <input class="mx-2" type="radio" name="value" value="1"> Medio<br>
                                        <input class="mx-2" type="radio" name="value" value="2"> Bueno
                                    </div>
                                    
                                </div>

                                <div class="form-group ">
                                        
                                <label for="event_id">Evento a Calificar</label>
                                <select name="event_id" class="form-control">
                                    @foreach($evento as $evento_id)
                                        <option value="{{$evento_id->id}}">{{$evento_id->title}}</option>
                                    @endforeach
                                </select>
                                   
                            </div> 

                                

                            

                            <div class="form-group col-12">
                                <input type="submit" class="btn btn-success col-12 p-2" value="Calificar"></button>
                            </div>
                        </form>

                      
            </div>
        </div>
             {{-- Fin de administrador --}}

             
   

    </div>
    
</div>
@endsection
