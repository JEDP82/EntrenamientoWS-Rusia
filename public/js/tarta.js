var datos= null;



$(document).ready(e=>{
    var canvas;
    var ctx;
    $('.btnRating').click(e=>{
       
        datos = [0,0,0];
        var idEvent = e.currentTarget.getAttribute('id');
        console.log(idEvent);
        var element = 'myChart'+idEvent
        canvas = document.getElementById(element);
        ctx =  canvas.getContext('2d');
        console.log(canvas);
        
        $.ajax({
            type: 'GET', 
            url: `/ratingEvento/Api/${idEvent}?`,
            success: function(ratingEventos){
                console.log(ratingEventos);
                var api = ratingEventos.RatingsEventos
                            
                for (let i = 0; i < api.length; i++) {
                    const element = api[i];
                    if(element.value == 0){
                        datos[2]++;
                    }else if(element.value == 1){
                        datos[1]++;
                    }else{
                        datos[0]++;
                    }
                    
                }

                draw();
                
                
                
    
            }
        })
    })



    function draw(){
    
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: datos,
                    backgroundColor: [
                        window.chartColors.green,
                        window.chartColors.yellow,
                        window.chartColors.red,
                        
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    'Bueno',
                    'Medio',
                    'Malo',
                    
                ]
            },
            options: {
                responsive: true
            }
        };
    
        
        window.myPie = new Chart(ctx, config);
        
    }
});


    

    
    
   






