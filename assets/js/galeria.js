$(document).ready(function(){

	loadImagenes();


	let json_vali = {
        "file": "#formFile",
        "titulo" : "#nameImg",
    }

    let errores = {
        "file": "¡Agregar un formato de imagen!",
        "titulo" : "¡Caracteres no permitidos!",
    }

    let estado = {
        "file": 0,
        "titulo" : 0,
    }

    $file = $("#formFile");
    $tite = $("#nameImg");

    $tite.on("keypress",
        function(event){
        let er = /^[a-zA-ZáéíóúÁÉÍÓÚñ0-9 !·#$%_/*\?¿¡!|.,-]*$/;
        validarkeypresss(er,event, 2);
    });

    $tite.on("keyup", function(){
        let er = /^[A-Za-záéíóúÁÉÍÓÚñ0-9 !·#$%_/*\?¿¡!|.,-]{2,80}$/;
        validars(er,this, "titulo");
    });


    function validars(er,etiqueta, tipo){
        a = er.test(etiqueta.value);
        if(a){
            $(json_vali[tipo]).removeClass("invalid");
            $($(json_vali[tipo])[0].nextElementSibling).addClass("hidden");
            estado[tipo] = 1;
        }else{
            $($(json_vali[tipo])[0].nextElementSibling).removeClass("hidden");
            $($(json_vali[tipo])[0].nextElementSibling).html(errores[tipo]);
            $(json_vali[tipo]).addClass("invalid");
            estado[tipo] = 0;
        }
    }



    function validarkeypresss(er,e, numero){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        a = er.test(tecla);
        if(!a){
            e.preventDefault();
        }
    }


    $("#formFile").on("change", function(){
        var avatar = $("#formFile").val();
        var extension = avatar.split('.').pop().toUpperCase();
        if (extension!="PNG" && extension!="JPG" ){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡Solo imagen .PNG o .JPG!',
            })
            estado["file"] = 0;
            return;
        }
        estado["file"] = 1;
        $("#errorTotal").addClass("hidden");
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#Render').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]); // convert to base64 string
        }

    })

    $("#envioData").on("submit", function(e){
    	e.preventDefault();
    	if(estado["file"] === 1 && estado["titulo"] === 1){
    		enviarArchivos();
    	}else{
    		Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡Agregar contenido en los inputs!',
            })
    	}
    })

})


function enviarArchivos(){
	var img = $("#formFile").prop('files')[0];

    var form_data = new FormData();
   	form_data.append('file', img);
    form_data.append('nameImg', $("#nameImg").val()); 
	$.ajax({
        type: "POST",
        data: form_data,
        dataType: "json",
        processData: false, 
        contentType: false,
        xhr: function(){
                var xhr = new window.XMLHttpRequest();
                $("#displayProgreso").show(); 
                xhr.upload.addEventListener("progress", function(evt){
                    if(evt.lengthComputable){
                        percentComplete = parseInt( (evt.loaded / evt.total * 100), 10);
                        $('#bulk-action-progbar').data("aria-valuenow",percentComplete);
                        $('#bulk-action-progbar').css("width",percentComplete+'%');
                        $('#bulk-action-progbar').html(percentComplete+'%');
                    }
                }, false);
                xhr.addEventListener("progress", function(e){
                console.log("Descargando imagen...");
                if (e.lengthComputable) {
                    percentComplete = parseInt( (e.loaded / e.total * 100), 10);
                    $('#bulk-action-progbar').data("aria-valuenow",percentComplete);
                    $('#bulk-action-progbar').css("width",percentComplete+'%');
                    $('#bulk-action-progbar').html(percentComplete+'%');
               	}else{
                    $('#bulk-action-progbar').html("Upload");
                }
            }, false);
            return xhr;
        },
        complete: function(data){
        	$("#displayProgreso").hide(); 
            $("#EnvioRegistro").attr("disabled", false);
        	if(data.responseJSON === undefined){
        		return;
        	}
        	if(data.responseJSON["msj"] === "Good"){
        		alert("Se ah registrado!");
        		loadImagenes();
        	}else{
        		console.log("Error!");
        	}
        }
    })
}

function loadImagenes(){
	form_data = {"LoadAlbum": "Si"};
	$.ajax({
		type: "POST",
        data: form_data,
        dataType: "json",
        url: "",
        success: function(data){
        	if(data["respuesta"][0] === undefined){
        		$("#Imagenes").html("<h1 class='text-center' style='color:blue'>No poseee Imagenes registradas</h1>");
        	}else{
        		$("#Imagenes").html(" ");
        		data["respuesta"].map((key, map) => {
        			$("#Imagenes").append('<div class="col-xxl-4 mb-3"><img src="'+key["rutaImg"]+'" id="img0'+map+'" style="width:100%;"></div>');
        		})
        	}
        },
        error: function(data){
        	console.log(data);
        }
	})
}