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
    </head>

    <!--    <div class="row border border-danger">
                <input class="text-center m-auto" type='file' accept="image/*" onchange="readURL(this);" />
            </div>-->
    
    <body class="h-100">
        <div class="mb-3">
            <form action="/archivo" method="post" enctype="multipart/form-data">
                @csrf
                <label for="formFile" class="form-label">Subir archivo</label>

                <input type="file" name="sarahZX">

                <input type="text" value="hola" name="sarah">

                <input type="submit">
                hola
            </form>
        </div>
    </body>
</html>