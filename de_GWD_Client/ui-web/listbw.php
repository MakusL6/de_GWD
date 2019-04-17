<?php ob_start(ob_gzhandler); ?> 
<?php require_once('auth.php'); ?>
<?php if (isset($auth) && $auth) {?>
  
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>de_GWD - Blank Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">de_GWD</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item no-arrow mx-1">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pi-hole</span>
        </a>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>概览</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nodeman.php">
          <i class="fas fa-fw fa-stream"></i>
          <span>节点管理</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="listbw.php">
          <i class="fas fa-fw fa-th-list"></i>
          <span>黑白名单</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="donate.php">
          <i class="fas fa-fw fa-yen-sign"></i>
          <span>捐赠</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php" onclick="logout()">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>注销</span></a>
      </li>
    </ul>
<script>
function logout () {
$.get("auth.php", {logout:"true"});
window.location.href="login.php"
}
</script>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">概览</a>
          </li>
          <li class="breadcrumb-item active">黑白名单</li>
        </ol>

        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-th-list"></i>
            名单编辑</div>
          <div class="card-body">
<form>
          <div class="form-group">
          <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
            黑名单<br>
          （走国外线路）<br>
            </span>
          </div>
            <textarea id="listb" class="form-control" aria-label="listb" rows="11"><?php echo shell_exec("cat /var/www/html/listb.txt"); ?></textarea>
          </div>
          </div>

          <div class="form-group">
          <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
            白名单<br>
          （走国内线路）<br>
            </span>
          </div>
            <textarea id="listw" class="form-control" aria-label="listw" rows="11"><?php echo shell_exec("cat /var/www/html/listw.txt"); ?></textarea>
          </div>
          </div>
</form>

<span class="float-left text-secondary">
  <small>
注：<br>
应用后，需等待数秒生效，因重整所有的线路规则。<br>
所有vps节点域名/ip也最好填进白名单里。<br>
尽量填写ip，域名也是解析到ip来实现的，有些域名会有cdn加速，就不会太好用。<br>
一行一个地址，格式如下：<br>
169.169.169.169<br>
baidu.com<br>
  </small>
</span>

<span class="float-right">
<button id="submitlistbw" type="button" class="btn btn-primary" onclick="submitlistbw()">应用</button>
</span>

<script>
function submitlistbw () {
listb=$("#listb").val();
listw=$("#listw").val();
$.get("listbwsave.php", {listb:listb, listw:listw});
alert("黑白名单已提交");
}
</script>
          </div>
          </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © de_GWD by JacyL4 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

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
  <script src="js/sb-admin.min.js"></script>

</body>

</html>

<?php }?>
<?php  if(!$auth){ ?>
<?php header('Location: login.php');} ?>
<?php ob_end_flush(); ?> 