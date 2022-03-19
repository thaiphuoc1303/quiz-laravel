<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <script src = "https://www.wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image" > </script> --}}
    <script type="text/javascript" src="{{ asset('public/ckeditor5_wiris-main/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <div id="ckeditor"></div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>

</html>
