$(document).ready(function() {


    var sesiones = [];

    checkTable();

    function checkTable(){
        if(sesiones.length == 0){
            $(".tablasSesion").css("display","none");
        }else{
            $(".tablasSesion").css("display","table");
        }
    }

    $(".btnSession").click(e=>{
        
        var dataSesiones = $("#form_sesiones").serializeArray();
        sesiones.push(dataSesiones);

        $("#exampleModalScrollable").modal('hide');
        checkTable();
        fillTableSesion();
    })

    function fillTableSesion(){

      
        $(".tablasSesion tbody").html("");
        console.log(sesiones);
        for(var i = 0 ; i < sesiones.length; i++){
            var estructura = "<tr>";
            sesiones[i].forEach(e=>{
                estructura += "<td>"+e.value+"</td>";
            })
            
            $(".tablasSesion tbody").append(estructura);
        }
    }

   $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
   });


    // ------ Agregar Evento
    $('#addEventForm').submit(e=>{
        e.preventDefault();

        var dataNewEvent = new FormData;
        let formEvent = $('#addEventForm').serializeArray();

        formEvent.forEach(e=>{
            dataNewEvent.append(e.name, e.value);
        })

        dataNewEvent.append('sesiones', JSON.stringify(sesiones));

        $.ajax({
            method:'POST',
            url: '/CreateEvent',
            data: dataNewEvent,
            processData: false,
            cache: false,
            contentType: false,
            success(data){
                alert(data.mensaje);
                $('#addEventForm input[type="text"]').val("");
                $('#addEventForm input[type="number"]').val("");
                $('#addEventForm input[type="date"]').val("");
                $('#addEventForm input[type="time"]').val("");
                $('#addEventForm textArea').val("");    
                sesiones = [];
                checkTable();
            }

        })
    })    




})