<?php
session_start(); // Right at the top of your script
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
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#requests" aria-expanded="false" aria-controls="requests"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Requests
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="requests" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="request.php">Create</a>
                                    <a class="nav-link" href="request_list.php">List</a>
                                </nav>
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
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item ">Users</li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">Add User</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="create.php" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input class="form-control py-4" id="inputFirstName" type="text" 
                                                        name="firstname" placeholder="Enter first name" />
                                                        <small id="fname_check"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input class="form-control py-4" id="inputLastName" type="text" name="lastname" placeholder="Enter last name" />
                                                        <small id="lname_check"></small>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-row">
                                                <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                                <small id="email_check"></small>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="form-group"><label class="small mb-1" for="inputType">Type</label><input class="form-control py-4" id="inputType" type="text" name="type"  placeholder="Enter type" />
                                                <small id="type_check"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"><label class="small mb-1" for="inputRole">Role</label><input class="form-control py-4" id="inputRole" type="text" name="role"  placeholder="Enter Role" />
                                                <small id="role_check"></small>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                                        <small id="password_check"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" id="inputConfirmPassword" name="cpassword" type="password" placeholder="Confirm password" />
                                                        <small id="confirm_password_check"></small>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <input style="width: 13%;float: right;" type="submit" id="submit" class="btn btn-primary btn-block" name="" value="Create Account">
                                                <a style="width: 13%;margin-left: 73%;" href="user_list.php" class="btn btn-dark btn-block">Cancel</a>
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
    </body>
</html>
