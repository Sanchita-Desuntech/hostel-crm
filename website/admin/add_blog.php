<?php include("include/config.php");
// print_r($_SESSION['id']);

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}
if (isset($_POST['submit'])) {

  $target_dir = "upload/";
  $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
  $image = $target_dir . basename($_FILES['feature_img']['name'], 'JPEG');
  $image_tep_name = $_FILES['feature_img']['tmp_name'];
  $short_desc = isset($_POST["short_desc"]) ? trim($_POST["short_desc"]) : "";
  $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
  $published_status = isset($_POST["published_status"]) ? trim($_POST["published_status"]) : "";
  $published_on = date("Y/m/d H:i:s");
  //print_r($image);


  $err = [];
  if ($title == "") {
    $err['title'] = "Title is  Required";
  }
  if ($title != "") {
    $sql = "SELECT * FROM `blog` WHERE title='$title'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
      $err['title'] = "Title is Already Exists";
    }
  }
  if ($image == "") {
    $err["image"] = "Please enter image  ";
  }
  if ($short_desc == "") {
    $err["short_desc"] = "Please enter short description";
  }
  if ($content == "") {
    $err["content"] = "Please enter the content  ";
  }

  if (empty($err)) {
    $slug = slugify($title);
    $query = "INSERT INTO `blog`(`title`,`slug`, `author`, `feature_img`,`short_desc`,`content`,`published_on`,`published_status`) VALUES ('" . $title . "','" . $slug . "','" . $_SESSION['id']  . "','" . $image  . "','" . $short_desc  . "','" . $content  . "','" . $published_on . "','" . $published_status . "')";
    $result = mysqli_query($conn, $query);

    // die;
    if ($result) {
      //die;
      move_uploaded_file($image_tep_name, $image);
      // $err['add'] = 'Form Submit Successfully';
      header("location:view_blog.php?add=Form Submit Successfully");
    } else {
      $err['add'] = ' Not Worked please check Your code ';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    label {
      color: black;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Testimonials</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Testimonials</h6>
            <a class="collapse-item" href="Testimonials.php">Testimonials View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Services</span>
        </a>
        <div id="collapseT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Services</h6>
            <a class="collapse-item" href="view_service.php">Services View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#faq" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>FAQ</span>
        </a>
        <div id="faq" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Question&Answer</h6>
            <a class="collapse-item" href="faq.php">FAQ View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Contact" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Contact</span>
        </a>
        <div id="Contact" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Contact</h6>
            <a class="collapse-item" href="view_contact.php">Contact View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#banner" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Banner</span>
        </a>
        <div id="banner" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Banner</h6>
            <a class="collapse-item" href="view_banner.php">Banner View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Blog</span>
        </a>
        <div id="blog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Blog</h6>
            <a class="collapse-item" href="view_blog.php">Blog View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#port" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Portfolio</span>
        </a>
        <div id="port" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Portfolio</h6>
            <a class="collapse-item" href="view_portfolio.php">Portfolios View</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master</span>
        </a>
        <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master</h6>
            <a class="collapse-item" href="view_master.php">Master View</a>
          </div>
        </div>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= @$_SESSION['user_name']; ?></span>
                <img class="img-profile rounded-circle" src=<?= $_SESSION['user_image'] ?>>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="change_password.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800" style="margin-left:  1.25rem !important;">Blog</h1>
          <?php if (isset($err['add'])) { ?>
            <div class="alert alert-success"><?= $err['add']; ?></div>
          <?php } ?>
          <!-- DataTales Example -->
          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add New Blog</h1>
                      </div>
                      <form class="user" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label for="exampleFormControlTitle" class="form-label">Title:</label>
                          <input type="text" class="form-control form-control-user" name="title" id="title" placeholder="">
                          <?php if (isset($err['title'])) { ?><div class="small alert-danger"><?= $err['title']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group">
                          <label for="formFileLg" class="form-label">Feature Image:</label>
                          <input class="form-control form-control-lg" id="feature_img" type="file" name="feature_img">
                        </div>
                        <?php if (isset($err['image'])) { ?><div class="small alert-danger"><?= $err['image']; ?></div> <?php } ?>

                        <div class="form-group ">
                          <label for="exampleFormControlTitle" class="form-label">Short desp :</label>
                          <textarea type="name" name="short_desc" rows="8" class="form-control" id="short_desp" rows="5" placeholder=""></textarea>
                          <?php if (isset($err['short_desc'])) { ?><div class="small alert-danger"><?= $err['short_desc']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="exampleFormControlTitle" class="form-label">Content :</label>
                          <textarea type="name" name="content" rows="8" class="form-control" id="contentt" rows="5" placeholder=""></textarea>
                          <?php if (isset($err['content'])) { ?><div class="small alert-danger"><?= $err['content']; ?></div> <?php } ?>
                        </div>
                        <div class="form-group ">
                          <label for="formFileLg" class="form-label">Published Status:</label>
                          <select type="status" name="published_status" class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="Draft" selected>Draft</option>
                            <option value="Published">Published</option>
                          </select>
                        </div>

                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit ">
                      </form>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- ck_editor -->

  <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
  <!-- <script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script> -->
  <script>
    ClassicEditor
      .create(document.querySelector('#short_desp'))
      .then(short_desp => {
        console.log(short_desp);
        short_desp.editing.view.change((writer) => {
            writer.setStyle(
              "height",
              "200px",
              short_desp.editing.view.document.getRoot()
            );
          })
          .catch(error => {
            console.error(error);
          });
      });
  </script>
  <script>
    ClassicEditor
      .create(document.querySelector('#contentt'))
      .then(contentt => {
        console.log(contentt);
        contentt.editing.view.change((writer) => {
            writer.setStyle(
              "height",
              "200px",
              contentt.editing.view.document.getRoot()
            );
          })
          .catch(error => {
            console.error(error);
          });
      });
  </script>

</body>

</html>