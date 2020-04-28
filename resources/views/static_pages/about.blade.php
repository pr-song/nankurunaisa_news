<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funny with on loading</title>
    <link rel="stylesheet" href="{{ asset('css/style_about.css') }}">
</head>

<body>
    <div class="content">
        <img src="https://picsum.photos/300/300/?random" />
    </div>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>

</html>