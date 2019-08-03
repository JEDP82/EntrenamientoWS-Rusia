$(document).ready(e=>{

    

    $('#addRatingForm').submit(e=>{
        e.preventDefault();

        var dataRating = new FormData;
        let ratingForm = $('#addRatingForm').serializeArray();

        ratingForm.forEach(e=>{
            dataRating.append(e.name, e.value);
        })

        $.ajax({
            data: dataRating,
            method: 'POST',
            url: 'api/addEvento',
            processData: false,
            cache: false,
            contentType: false,
            success(data){
                alert(data.mensaje);
                $('#addRatingForm input[type="text"]').val("");
            }
        })
    })
})