<?php
    // Database connection parameters
    $servername = "localhost"; // Change this if your database server is on a different host
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "proteaclinic";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    try {
        $pdo = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
?>
<html>

<head>
    <title>Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../SiteAssets/css/vendors/bootstrap.min.css" />
    <link rel="stylesheet" href="../SiteAssets/css/vendors/line-awesome.min.css" />
    <link rel="stylesheet" href="../SiteAssets/css/pages/layout.css" />
    <link rel="icon" href="../SiteAssets/images/covid-19.ico" />
    <script src="../SiteAssets/js/vendors/jquery.min.js"></script>
    <script src="../SiteAssets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="../SiteAssets/js/global.js"></script>
    <link rel="stylesheet" href="../SiteAssets/css/pages/dashboard.css" />
    <link rel="stylesheet" href="../SiteAssets/css/vendors/Chart.min.css" />
    <script src="../SiteAssets/js/vendors/Chart.bundle.min.js"></script>
    <script src="../SiteAssets/js/dashboard.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg shadow-sm fixed-top">
            <a class="navbar-brand" href=""><img src="../SiteAssets/images/hospital-website.svg" /><span>ProteaClinics</span></a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link"><i class="las la-question-circle"></i></a></li>
                    <li class="nav-item dropdown dropleft"><a class="nav-link notification-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;"></span><i class="las la-bell"></i></a>
                        <div class="dropdown-menu notification-dropdown-menu shadow-lg" aria-labelledby="notification-dropdown">
                            <div class="dropdown-title"><a href="appointments.php">Appointments<span class="ml-2 notifications-count">(3)</span></a><a class="float-right" href="">mark all as read</a></div>
                            <div class="dropdown-body">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <a class="notification-card" href=""><img class="mr-3" src="../SiteAssets/images/inbox.svg" alt="..." />
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">collaboration tools available</h6>
                                                <p>Cras sit amet nibh libero, in gravida nulla.</p><small class="text-muted">21.03.2020, 13.02</small></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a class="notification-card" href=""><img class="mr-3" src="../SiteAssets/images/inbox.svg" alt="..." />
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">use the new app launcher</h6>
                                                <p>Cras sit amet nibh libero, in gravida nulla.</p><small class="text-muted">21.03.2020, 13.02</small></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a class="notification-card" href=""><img class="mr-3" src="../SiteAssets/images/inbox.svg" alt="..." />
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">the new dashboard abailable</h6>
                                                <p>Cras sit amet nibh libero, in gravida nulla.</p><small class="text-muted">21.03.2020, 13.02</small></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-footer text-center"><a href="notifications.html">view more</a></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link"><span class="vertical-divider"></span></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" src="../SiteAssets/images/person.jpg" /><span class="d">Dr Backleyz</span></a>
                        <div class="dropdown">
                            <div class="dropdown-menu shadow-lg profile-dropdown-menu" aria-labelledby="profile-dropdown"><a class="dropdown-item" href="#"><i class="las la-user mr-2"></i>profile</a><a class="dropdown-item" href="#"><i class="las la-cog mr-2"></i>settings</a></div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="side-nav">
            <ul class="list-group list-group-flush"><a class="list-group-item" href="dashboard.php" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="las la-shapes la-lw"></i><span>dashboard</span></a><a class="list-group-item" href="patients.php" data-toggle="tooltip"
                    data-placement="bottom" title="Patients"><i class="las la-user-injured la-lw"></i><span>patients</span></a><a class="list-group-item" href="specialists.php" data-toggle="tooltip" data-placement="bottom" title="Specialists"><i class="las la-clinic-medical la-lw"></i><span>specialists</span></a>
                <a class="list-group-item" href="procurement.php" data-toggle="tooltip" data-placement="bottom" title="Procurement"><i class="las la-shopping-cart la-lw"></i><span>procurement</span></a>
                <a class="list-group-item" href="appointments.php" data-toggle="tooltip" data-placement="bottom" title="Appointments"><i class="las la-sms la-lw"></i><span>Appointments</span></a>
                <a class="list-group-item" href="settings.php" data-toggle="tooltip" data-placement="bottom" title="Settings"><i class="las la-cogs la-lw"></i><span>settings</span></a>
                <hr class="divider" />
                <div class="aob-items">
                    <div class="card">
                        <div class="card-header"><img src="" alt="logo" /></div>
                        <div class="card-body">
                            <p><u><i class="las la-globe"></i>Protea</u></p>
                            <p>Clinics -<u>Started</u></p>
                            <p>In -<u>2020</u></p>
                        </div>
                        <div class="card-footer"><a class="btn btn-dark-red-f-gr btn-sm" href="https://covid19.who.int" target="_blank">view COVID-19 info</a></div>
                    </div>
                </div>
            </ul>
        </div>
        <div class="main-content">
            <div class="container-fluid">
                <div class="section welcome-section">
                    <div class="section-content">
                        <div class="card-deck">
                            <div class="card welcome-content-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 welcome-text-wrapper align-self-center">
                                            <h5>Hello, Dr. Backleyz </h5>
                                            <p>Welcome to your dashboard</p>
                                        </div>
                                        <div class="col-md-6 welcome-img-wrapper"><img src="../SiteAssets/images/hello.svg" /></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card app-stats-card">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-4"><i class="las la-user-injured la-3x align-self-center"></i>
                                        <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM approved_appointments";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                            echo " <p>Total Patients</p>";
                                            echo " <h4><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                        ?>
                                        </div>
                                        <div class="col-md-4"><i class="las la-user-md la-3x align-self-center"></i>
                                        <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM specialists";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                            echo " <p>Total Doctors</p>";
                                            echo " <h4><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                        ?>
                                        </div>
                                        <div class="col-md-4"><i class="las la-clinic-medical la-3x align-self-center"></i>
                                        <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM treatments";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                            echo " <p>Total Treatments</p>";
                                            echo " <h4><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section functionality-section">
                    <div class="section-content">
                        <div class="card-deck">
                            <a class="card text-center" href="add_clinics.php">
                                <div class="card-title">
                                    <div class="icon-wrapper"><i class="las la-clinic-medical"></i></div>
                                </div>
                                <div class="card-body">
                                    <p>Add a clinic</p>
                                </div>
                            </a>
                            <a class="card text-center" href="specialists_form.php">
                                <div class="card-title">
                                    <div class="icon-wrapper"><i class="las la-user-md"></i></div>
                                </div>
                                <div class="card-body">
                                    <p>Add a specialist</p>
                                </div>
                            </a>
                            <a class="card text-center" href="add_admin.php">
                                <div class="card-title">
                                    <div class="icon-wrapper"><i class="las la-user-plus"></i></div>
                                </div>
                                <div class="card-body">
                                    <p>Add a user</p>
                                </div>
                            </a>
                            <a class="card text-center" href="add_admin.php">
                                <div class="card-title">
                                    <div class="icon-wrapper"><i class="las la-user-lock"></i></div>
                                </div>
                                <div class="card-body">
                                    <p>Add an admin</p>
                                </div>
                            </a>
                            <a class="card text-center" href="add_admin.php">
                                <div class="card-title">
                                    <div class="icon-wrapper"><i class="las la-plus-circle"></i></div>
                                </div>
                                <div class="card-body">
                                    <p>Add a Staff</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="section card-summaries">
                    <div class="section-content">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Recent Activities</h5>
                                </div>
                                <div class="card-body"><canvas id="recent-activity-chart"></canvas></div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Total Bookings</h5>
                                </div>
                                <div class="card-body"><canvas id="bookings-chart"></canvas></div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Diseases summary</h5>
                                </div>
                                <div class="card-body"><canvas id="diseases-chart"></canvas></div>
                            </div>
                        </div>
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Top Treatments</h5>
                                </div>
                                <div class="card-body">
                                    <ol type="1">
                                    <?php
            include "conf.php";
            // Assuming you have a database connection
            $query = "SELECT * FROM approved_appointments";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
               
                echo "<li>" . $row['p_sickness'] . "</li>";
            }
            ?>
                                    </ol>
                                </div>
                                <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                            </div>
                            <div class="card total-counts-summary">
                                <div class="card-header">
                                    <h5>Total counts</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center text-capitalize">
                                        <div class="col-md-6"><i class="las la-users la-2x mb-1"></i>
                                        <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM users";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                           
                                            echo " <h4  class='mb-1'><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                            echo " <p>Total Patients</p>";
                                        ?> 
                                        </div>
                                        <div class="col-md-6"><i class="las la-user-md la-2x mb-1"></i>
                                        <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM specialists";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                           
                                            echo " <h4><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                            echo " <p>Total Patients</p>";
                                        ?> 
                                        </div>
                                        <div class="col-md-6"><i class="las la-user-injured la-2x mb-1"></i>
                                        <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM approved_appointments";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                           
                                            echo " <h4  class='mb-1'><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                            echo " <p>Total Patients</p>";
                                        ?>  
                                        </div>
                                        <div class="col-md-6"><i class="las la-hospital la-2x mb-1"></i>
                                           <?php
                                            // Assuming you have a database connection
                                            $query = "SELECT COUNT(*) FROM treatments";
                                            $statement= $pdo->query($query);
                                            $result = $statement->fetch(PDO::FETCH_ASSOC);
                                           
                                            echo " <h4><a href=''>" .  $result['COUNT(*)'] . "</a></h4>";
                                            echo " <p>Total Treatments</p>";
                                             }
                                            catch( PDOException $exception ) {
                                                echo "Connection error :" . $exception->getMessage();
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Recent Patients</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-responsive-md table-borderless">

                                        <tbody>
                                           <?php
            include "conf.php";
            // Assuming you have a database connection
            $query = "SELECT * FROM approved_appointments";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['p_name'] . "</td>";
                echo "<td>" . $row['p_sickness'] . "</td>";
                echo "<td>" . $row['doctor_name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
               
                echo "</tr>";
                }
            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                            </div>
                        </div>
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Staff Lists</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-hover table-responsive-md">
                                        <tbody>
                                        <?php
            include "conf.php";
            // Assuming you have a database connection
            $query = "SELECT * FROM specialists";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['proffesional'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
               
                echo "</tr>";
            }
            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Upcoming Appointments</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-hover table-responsive-md">
                                        <tbody>
                                        <?php
            include "conf.php";
            // Assuming you have a database connection
            $query = "SELECT * FROM appointments";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['problem_description'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
               
                echo "</tr>";
            }
            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal onboarding-modal" tabindex="=1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Welcome</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="las la-times-circle"></i></button></div>
                            <div class="modal-body">
                                <div class="carousel slide" id="carouselExampleCaptions" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active"><img class="d-block" src="../SiteAssets/images/undraw_dashboard_nklg.svg" alt="..." />
                                            <div class="carousel-caption d-md-block">
                                                <p><a href="" data-dismiss="modal">ProteaClinics<i class="las la-external-link-alt"></i></a></p>
                                            </div>
                                        </div>
                                        <div class="carousel-item"><img class="d-block" src="../SiteAssets/images/undraw_medicine_b1ol.svg" alt="..." />
                                            <div class="carousel-caption d-md-block">
                                                <p>access to<a href="specialists.php">specialists<i class="las la-external-link-alt"></i></a></p>
                                            </div>
                                        </div>
                                        <div class="carousel-item"><img class="d-block" src="../SiteAssets/images/undraw_receipt_ecdd.svg" alt="..." />
                                            <div class="carousel-caption d-md-block">
                                                <p>simple<a href="procurement.html">procurement<i class="las la-external-link-alt"></i></a>process</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item"><img class="d-block" src="../SiteAssets/images/undraw_new_notifications_fhvw.svg" alt="..." />
                                            <div class="carousel-caption d-md-block">
                                                <p>comprehensive<a href="notifications.html">notification<i class="las la-external-link-alt"></i></a>center</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item"><img class="d-block" src="../SiteAssets/images/undraw_Preferences_re_49in.svg" alt="..." />
                                            <div class="carousel-caption d-md-block">
                                                <p>minimalist<a href="settings.html">settings<i class="las la-external-link-alt"></i></a>center</p>
                                            </div>
                                        </div>
                                    </div><a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"><i class="las la-chevron-circle-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleCaptions"
                                        role="button" data-slide="next"><i class="las la-chevron-circle-right"></i><span class="sr-only">Next</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div class="page-footer text-center">
                    <div class="fixed-bottom shadow-sm">
                        <a href="proteaclinics" target="_blank"><img src="../SiteAssets/images/covid-19.svg" /><span>ProteaClinics</span></a>
                    </div>
                </div>
            </footer>
        </div>
    </main>
</body>

</html>