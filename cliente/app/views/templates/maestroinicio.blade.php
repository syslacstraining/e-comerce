<!DOCTYPE html>
<html>
<head>
  <title></title>
      @section("tible")
      @show 
  
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
      @section("head")
      @show 
</head>
<body>
  <header>
  <section style="background: #3299f9" class="container">
    <div class="row">
      <div class="col-sm-6">
        <img src="/img/logo.png" style=" width: 80px; padding-top: 7px; float: left;">
        <h1 style="float: left;"> YYCD</h1>
      </div>
      <div class="col-sm-3">
        <h3>Ventas Online</h3>
      </div>
      <div style="padding-top: 20px;" class="pull-right">
      <?php
          if(!Session::has('cliente'))
          {
      ?>
      <a href="/login"><button class="btn btn-default btn-sm">Iniciar Session</button> </a>
      <?php
        }
        else
        {
          $usuario = json_decode(Session::get("cliente"));
      ?>
      
      <a href="/usuarios/salirsession"><button type="button" class="btn btn-danger">Salir</button> </a><br>
      <label><?echo $usuario->nombres;?></label>
      <?php
        }
      ?>
      </div>
    </div>
  </section>
    <!--! => si exite negacion si la session no exite -->

  </header>
      @section("body")
      @show 

</body>
</html>  