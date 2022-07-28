function deleteImg(idImagen, urlImg){
    $.ajax({
        type: "POST",
        url: "admin/models/urls.php",
        data: {
            "id" : idImagen,
            "urlImg" : urlImg,
            "deleteImg" : "deleteImg",
        },
        success: function(data){
            data = JSON.parse(data);
            console.log(data)
            console.log(data.status)
            if(data.status == 201){
                 const imagen = document.getElementById("imagen-" + idImagen);
                 imagen.style.display = 'none';
            }else {
                console.log("nooo")
            }
        }
    });
}