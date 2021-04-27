<?php

include_once("conexao.php");

$pesquisar = isset($_GET['pesquisar'])?$_GET['pesquisar']:"";

$sql = "
SELECT id, dic,  inscricao, proprietario, fator, tipo, area_imovel, vlr_total, vlr_individual, dic_principal,
	(CASE WHEN (dic_principal) = (dic) THEN 'Im&oacutevel principal'
	ELSE 'Garagem'
	END) AS descricao
	FROM basesj
WHERE dic_principal = '$pesquisar'
";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Imóveis Englobados</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Imóveis Englobados</div>
      </a>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=index.php>
          <i class="fas fa-fw fa-table"></i>
          <span>Iní­cio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"></nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Im&oacuteveis Englobados</h1>
          </div>

          


<form form method="get" action="">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">DIC</label>
      <input type="text" class="form-control mb-2" name="pesquisar" placeholder="Digite aqui o DIC">
    </div>
    <div class="col-auto">
    <input type="submit" value="Pesquisar" class="btn btn-warning mb-2">
    </div>
  </div>
</form>


      <?php

if($pesquisar != null){

print "<br>O DIC $pesquisar est&aacute associado a $registros registros.<br>";

}

print "<br><hr>";

while($exibirRegistros = mysqli_fetch_array($consulta)){
  
  $dic = $exibirRegistros[1];
  $inscricao = $exibirRegistros[2];
  $proprietario = utf8_encode ($exibirRegistros[3]);
  $fator = utf8_encode ($exibirRegistros[4]);
  $tipo = utf8_encode ($exibirRegistros[5]);
  $area = $exibirRegistros[6];
  $vlr_total = $exibirRegistros[7];
  $vlr_individual = $exibirRegistros[8];
  $dic_principal = $exibirRegistros[9];
  $case = $exibirRegistros[10];

  print "<article>";

  print "<strong>$case</strong><br><br>";
  print "DIC Principal: <strong>$dic_principal</strong><br>";
  print "DIC: <strong>$dic</strong><br>";
  print "Inscri&ccedil&atildeo Imobili&aacuteria: <strong>$inscricao</strong><br>";
  print "Propriet&aacuterio: <strong>$proprietario</strong><br>";
  print "Fator: <strong>$fator</strong><br>";
  print "Tipo: <strong>$tipo</strong><br>";
  print "&Aacuterea: <strong>$area</strong><br>";
  print "Valor Individual: <strong>$vlr_individual</strong><br>";
  print "Valor Total: <strong>$vlr_total</strong><br>";
  


  print "</article>";
  print "<hr>";
}


mysqli_close($conexao);

?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Miraceli Bonjardim 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>