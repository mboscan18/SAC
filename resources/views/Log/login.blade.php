<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Inicio de Sesion</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
  <body class="login-img3-body">

        @include('alerts.errors')
        @include('alerts.request')

    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 titulo-jumbo" >
            <p class="color-crema">S<span class="color-light-blue">AC</span></p>
        </div>

    {!!Form::open(['route'=>'Log.store', 'method'=>'POST', 'class'=>'login-form'])!!}     
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            {!! csrf_field() !!}

            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'E-Mail', 'autofocus'])!!}
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <label class="checkbox">
                <span class="pull-right"> <a href="#"> ¿Olvidó su Contraseña?</a></span>
            </label>
            <br></br>
            <button type="submit" class="btn btn-info btn-lg btn-block" style="width:100%"><i class="fa fa-sign-in"></i> Ingresar</button>
        </div>
      {!!Form::close()!!}

    </div>

{!!Html::script('js/jquery.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}

  </body>
</html>