<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D&D - Adventurers League</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    body {
        padding-top: 50px;
    }
</style>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">D&D - Adventurers League</a>
        </div>

    </div>
</nav>

<div class="container">
    <div class="row col-sm-10 col-sm-offset-1">
        @yield('content')
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#gerar").click(function () {
            $.get("/personagem/show", function(result){
                $("input[name='forca']").val(result.forca);
                $("input[name='destreza']").val(result.destreza);
                $("input[name='agilidade']").val(result.agilidade);
                $("input[name='inteligencia']").val(result.inteligencia);
                $("input[name='constituicao']").val(result.constituicao);
                $("input[name='sabedoria']").val(result.sabedoria);
                $("input[name='carisma']").val(result.carisma);
            });
        });
    });
</script>
</body>
</html>