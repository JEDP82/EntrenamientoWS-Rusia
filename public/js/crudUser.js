$(document).ready(function(){


$('#addUserForm').submit(e=>{
    e.preventDefault();
    var dataUserForm = new FormData;
    let formUser = $('#addUserForm').serializeArray();

    formUser.forEach(e=>{
        dataUserForm.append(e.name, e.value);
    });

    $.ajax({
        url: '/addUser',
        data: dataUserForm,
        method: 'POST',
        processData: false,
        contentType: false,
        cache: false,

        success:(data)=>{
            alert(data.mensaje);
            $('#addUserForm input[type="text"]').val("");
            $('#addUserForm input[type="date"]').val("");
            $('#addUserForm input[type="password"]').val("");
        }
    })

})

});