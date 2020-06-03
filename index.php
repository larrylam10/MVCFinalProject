<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Registration System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Welcome</div>
            <div class="list-group list-group-flush">
                <a href="?request=register" class="list-group-item list-group-item-action bg-light">Register</a>
                <a href="?request=students-list" class="list-group-item list-group-item-action bg-light">List of Students</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?php
                    require "db.php";
                    require "view/registration.php";
                    require "view/studentlist.php";
                    require "controller/StudentController.php";

                    $request = $_REQUEST['request'];
                    if (isset($request)) {
                        $studentController = new StudentController(); 
                        switch($request){
                            case "register":
                                $registrationView = new Registration($studentController);
                                $registrationView->loadRegistrationForm();
                                break;
                            case "students-list":
                                $studentsListView = new StudentList();
                                $studentsListView->studentsList();
                                break;
                            default:
                                echo "url does not exist";
                        }
                    }
                ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="css/vendor/jquery/jquery.min.js"></script>
    <script src="css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>