<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
        <link href="/styles/style.css" rel="stylesheet">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">  -->
	<link href="bootstrap.min.css" rel="stylesheet">
        <script src="anime.min.js"></script>
        <script src="popper.min.js"></script>
	<script src="bootstrap.bundle.min.js"></script>
        <script src="jquery-3.6.0.js"></script>
        <link href="/path/to/cropper.min.css" rel="stylesheet">
        <script src="/path/to/cropper.min.js"></script>
        
        <style>
            img{
                max-width:20em;
                max-heigh:20em;
              }

            input[type=file] {
                padding:10px;
            }
        </style>
        
        <style>
            body {
                font-family: sans-serif;
                background-color: #eeeeee;
              }

            .file-upload {
                background-color: #ffffff;
                width: 600px;
                margin: 0 auto;
                padding: 20px;
            }

            .file-upload-btn {
                width: 100%;
                margin: 0;
                color: #fff;
                background: #aaaeee;
                border: none;
                padding: 10px;
                border-radius: 4px;
                
                transition: all .2s ease;
                outline: none;
                text-transform: uppercase;
                font-weight: 700;
            }

            .file-upload-btn:hover {
                background: #eeeeee;
                color: #ffffff;
                transition: all .2s ease;
                cursor: pointer;
            }

            .file-upload-btn:active {
                border: 0;
                transition: all .2s ease;
            }

            .file-upload-content {
               
                text-align: center;
            }

            .file-upload-input {
                position: absolute;
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                outline: none;
                opacity: 0;
                cursor: pointer;
            }

            .image-upload-wrap {
                margin-top: 20px;
                border: 4px solid #aaaddd;
                position: relative;
            }

            .image-dropping,
            .image-upload-wrap:hover {
                background-color: #cccddd;
                border: 4px solid #eeeaaa;
            }

            .image-title-wrap {
                padding: 0 15px 15px 15px;
                color: #222;
            }

            .drag-text {
                text-align: center;
            }

            .drag-text h3 {
/*                font-weight: 50px;*/
                font-size: 1.25em;
                text-transform: uppercase;
                color: #559911;
                background-color: #aaafff;
                padding: 60px 0;
            }

            .file-upload-image {
                max-height: 200px;
                max-width: 200px;
                margin: auto;
                padding: 20px;
            }

            .remove-image {
                width: 200px;
                margin: 0;
                color: #fff;
                background: #cd4535;
                border: none;
                padding: 10px;
                border-radius: 4px;
                
                transition: all .2s ease;
                outline: none;
                text-transform: uppercase;
                font-weight: 700;
            }

            .remove-image:hover {
                background: #c13b2a;
                color: #ffffff;
                transition: all .2s ease;
                cursor: pointer;
            }

            .remove-image:active {
                border: 0;
                transition: all .2s ease;
            }
        </style>
    </head>

    <!--    <div class="row border border-danger">
                <input class="text-center m-auto" type='file' accept="image/*" onchange="readURL(this);" />
            </div>-->
    
    <body class="h-100">
        <div class="container border border-primary h-25">
            <div class="row h-75 border border-danger">
                <div class="col-4 file-upload-content border border-primary ">
                        <img id="img" class="file-upload-image" src=""/>
<!--                    <div class="image-title-wrap">
                        
                        </div>-->
                </div>
                <div class="col-6 file-upload border border-danger w-50">
                    <button id="botonSubir" class="file-upload-btn w-50" type="button" onclick="$('.file-upload-input').trigger( 'click' ); cambiarBotones()">Selecciona una imagen</button>
                    <button id="botonEliminar" type="button" onclick="removeUpload()" hidden class="remove-image"> <span class="image-title">Eliminar imagen</span></button>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                        
                        <div class="drag-text">
                            <h3>Arrastra y suelta el archivo</h3>
                        </div>
                    </div>
                    
                </div>
            </div>  
            <button onclick="enviarDatos()">
                Enviar
                </button>
        </div>
        
        <hr>
        <hr>
        <hr>
    
        <h3> Base64 to Image </h3>
            <div id="main"></div>
            <textarea id="log"></textarea>
    </body>
    
    
      
    
    <script>
        function cambiarBotones(modo)
        {
            if (modo == 1){
                document.getElementById("botonSubir").setAttribute("hidden", true);
                document.getElementById("botonEliminar").removeAttribute("hidden");
                return;
            }
            
        }
        
        function readURL(input) {
            if (input.files && input.files[0]) {

              var reader = new FileReader();

              reader.onload = function(e) {
                  //$('.image-upload-wrap').hide();

                  $('.file-upload-image').attr('src', e.target.result);
                  $('.file-upload-content').show();

                  $('.image-title').html(input.files[0].name);
              };

              reader.readAsDataURL(input.files[0]);

            } else {
              removeUpload();
            }
          }

          function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
          }
          $('.image-upload-wrap').bind('dragover', function () {
                          $('.image-upload-wrap').addClass('image-dropping');
                  });
                  $('.image-upload-wrap').bind('dragleave', function () {
                          $('.image-upload-wrap').removeClass('image-dropping');
          });

    
    
    
    
    
    
    
    </script>
      
    <script>
        function enviarDatos()
        {
            let imagen = document.getElementById("img");
            let base64 = getBase64Image(imagen);
            alert(base64);
            var file = dataURLtoFile(base64,'hello.txt');
            alert(file);
        }
   
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    
//        function encode() {
//            var selectedfile = document.getElementById("myinput").files;
//            if (selectedfile.length > 0) {
//                var imageFile = selectedfile[0];
//                var fileReader = new FileReader();
//                fileReader.onload = function(fileLoadedEvent) {
//                    var srcData = fileLoadedEvent.target.result;
//                    var newImage = document.createElement('img');
//                    newImage.src = srcData;
//                    document.getElementById("dummy").innerHTML = newImage.outerHTML;
//                    document.getElementById("txt").value = document.getElementById("dummy").innerHTML;
//                };
//                fileReader.readAsDataURL(imageFile);
//            }
//        }
        
        function getBase64Image(imgElem) {
        // imgElem must be on the same server otherwise a cross-origin error will be thrown "SECURITY_ERR: DOM Exception 18"
            var canvas = document.createElement("canvas");
            canvas.width = imgElem.clientWidth;
            canvas.height = imgElem.clientHeight;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(imgElem, 0, 0);
            var dataURL = canvas.toDataURL("image/png");
            alert(dataURL);
            return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        }
        
        
        
        
        function dataURLtoFile(dataurl, filename) {
 
            var profile = new Image();
            profile.src = 'data:image/png;base64,iLOGIwJD...';
            document.body.appendChild(profile);
        }

        function getBase64Image(src, callback, outputFormat) {
            const profile = new Image();
            profile.crossOrigin = 'Anonymous';
            profile.onload = () => {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                let fullURLPIC;
                canvas.height = profile.naturalHeight;
                canvas.width = profile.naturalWidth;
                ctx.drawImage(profile, 0, 0);
                fullURLPIC = canvas.toDataURL(outputFormat);
                callback(fullURLPIC);
            };
        
            profile.src = src;
            if (profile.complete || profile.complete === undefined) {
              profile.src = "data:image/gif;base64,KDFSGNGFUGGJGGJGJGJGJGD///jdIIDKDJJDJDJDJDKJJSDMNSDSDUCJwAOw==";
              profile.src = src;
            }
        }
        
        
        
        
    </script>
    
</html>

















<!--    <script>
        let elementos = {
                            asd: { 
                                        asd: {
                                                asd: 
                                                        {
                                                            asd: "asd"
                                                        }
                                              },
                                        asd: "hs",
                                        asd: "ds",
                                        asd: "bs"
                                    },
                            asd: ["asd", "asd", "asd"]
                        };
        let xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            let datosRecibidos = JSON.parse(this.responseText)
            alert(datosRecibidos);
        }
        xhttp.open("POST", "/prueba2", false);
        xhttp.setRequestHeader('X-CSRF-TOKEN', document.getElementById("token").getAttribute("content"));
        xhttp.setRequestHeader('Content-Type', 'application/json');
        xhttp.send(JSON.stringify(elementos));
        
    </script>-->