<!DOCTYPE HTML>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <title>Turnbyte</title>
    <link href="<?=$url?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?=$url?>css/estilo.css" rel="stylesheet" media="screen">
    <link href="<?=$url?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="<?=$url?>favicon.ico" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?=$url?>js/nicedt.js"></script>
    <script src="<?=$url?>js/login.js"></script>
    <script src="<?=$url?>bootstrap/js/bootstrap.min.js"></script>
    <script>  
      var CI_ROOT = "<?=$url?>";
    </script>
    </head>
<body>

    <?=$menu?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?=$contenido?>
      </div>

      <hr>

      <?=$footer?>

    </div>

  </body>
</html>