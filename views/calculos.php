
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400&family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300;400&family=Pacifico&family=Pattaya&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="container-header" style="margin-top: 30px">
            <div class="row">
                <div class="col-10">
                    <h1 class=" text-black animate__animated animate__bounceInLeft" style="font-family: 'Newsreader', serif ">Calculos De Las Dotaciones</h1> 
                </div>
                <div class="col-2 animate__animated animate__bounceInLeft" style="margin-top: 30px">
                    <a style="color: black; font-family: 'Pacifico' , cursive; font-weight: 100" href="<?= site_url() ?>" id="btn_home"><i class="fas fa-laptop-house fa-3x "></i>Inicio</a>
                </div>
            </div>
        </div>
        <br>
        <p><strong>Note:</strong> En el siguiente cuadro podremos calcular el volumen de tanque elevado, cisterna y diametro de la tuberia</p>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Volumen De Tanque Elevado</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <strong>T.E : 1/3 (<input readonly="">) = <input>/100 </strong>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Cisterna</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Diametro De La Tuberia</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                </div>
            </div>
        </div> 
    </div>
</body>



