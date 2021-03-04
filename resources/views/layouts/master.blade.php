<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/dashboard-fti.css?v=1.0.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
</head>
<body class="">
    <div class="container-fluid">
        <div class="row d-inline p-2">
            <div class="col-sm-3 sidebar">
                <div class="sidebar-wrapper rounded">
                    <div class="logo d-flex justify-content-center align-items-center border-bottom border-dark d-block p-2">
                        <img src="../assets/img/logo-fti.png" class="rounded-circle w-25 h-25">
                        <h7 class="">ADMIN FTI</h7>
                    </div>
                        <div class="sidebar-nav">
                        <div class="list-group list-group-flush" id="list-tab" role="tablist">
                            <a class="mb-3 list-group-item list-group-item-action active" id="list-dashboard-list" data-toggle="list" href="/" role="tab" aria-controls="dashboard">
                            <i class="fas fa-th-large fa-fw me-3"></i>
                            Dashboard
                            </a>
                            <a class="mb-3 list-group-item list-group-item-action" id="list-pra-evaluasi-list" data-toggle="list" href="/pra-evaluasi" role="tab" aria-controls="pra-evaluasi">
                            <i class="fas fa-bolt fa-fw me-3"></i>
                            Pra-Evaluasi
                            </a>
                            <a class="mb-3 list-group-item list-group-item-action" id="list-evaluasi-list" data-toggle="list" href="/evaluasi" role="tab" aria-controls="evaluasi">
                            <i class="fas fa-users fa-fw me-3"></i>
                            Evaluasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 main-panel">
                @yield('content')
            </div>
        </div>      
    </div>
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!-- Extra Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="../assets/js/dashboard-fti.js"></script>

</html>