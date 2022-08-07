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
            data = JSON.parse(data
                );
            if(data.status == 201){
                 const imagen = document.getElementById("imagen-" + idImagen);
                 imagen.style.display = 'none';
            }else{
                console.log("nooo")
            }
        }
    });
}

function deleteAlbum(idAlbum){
     $.ajax({
        type: "POST",
        url: "admin/models/urls.php",
        data: {
            "id" : idAlbum,
            "deleteAlbum" : "deleteAlbum",
        },
        success: function(data){
            data = JSON.parse(data
                );
            if(data.status == 201){
                location.reload();
            }else{
                console.log("nooo")
            }
        }
    });
}