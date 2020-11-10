<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Marchent</title>
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Marchent Pannel</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            > 
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="users" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="create_user.php">Add</a>
                                    <a class="nav-link" href="user_list.php">List</a></nav>
                            </div>
                               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#request" aria-expanded="false" aria-controls="request"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Requests
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="request" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="request.php">Add</a><a class="nav-link" href="request_list.php">List</a></nav>
                            </div>
                            <a class="nav-link" href="payments.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Payments</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Billing</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 
                          if($_SESSION['logged']==true)
                            { 
                              echo $_SESSION["email"];
                            }
                          ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Requests</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item ">Requests</li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">Add Request</div>
                            <div class="card-body">
                            	<div id="alert2"></div>
                                <div class="table-responsive">
                                       <form name="test">
                                        <div class="modal-body">
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input name="to" id="to" type="email" class="form-control" placeholder="To" required="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input name="cc" type="email" id="cc" class="form-control" placeholder="Cc">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input name="bcc" type="email" id="bcc" class="form-control" placeholder="Bcc">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                             <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                             <input name="reference" id="reference" type="text" class="form-control" placeholder="Reference" required="">
                                            </div>
                                            
                                        </div>
                                            <div class="form-group">
                                             <textarea name="body" id="body" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a style="width: 10%;margin-left: 79.5%;" href="request_list.php" class="btn-block btn btn-dark">Cancel</a> 
                                            <button type="submit" id="send" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send</button>
                                        </div>
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; emailsystem 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/datatables-demo.js"></script>
        <script type="text/javascript">

$("#send").click(function(e){
 e.preventDefault(); 
    const url = 'http://localhost:8888/phpapi/api/product/create.php';
    let json = JSON.stringify({
   sender :$('#to').val(),
     cc :$('#cc').val(),
     bcc : $('#bcc').val(),
    subject : $('#subject').val(),
     reference : $('#reference').val(),
     body : $('#body').val()
});
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url,true);
    //Send the proper header information along with the request
    xhr.setRequestHeader('Content-Type', 'application/json:charset=utf-8');
    xhr.responseType = 'json';
    xhr.onreadystatechange = function() {
        if ((xhr.readyState === 4) && (xhr.status != 200)) {
                console.log(xhr.response.message);
                window.location ="request_list.php"
            }
    }
    xhr.send(json);
});
        </script>
    </body>
</html>