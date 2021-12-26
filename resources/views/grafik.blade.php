<!doctype html>
@extends('main')
@section('container')
    
</header><!-- /header -->
<!-- Header-->
<body>
</header><!-- /header -->
<!-- Header-->

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-1">
        <div class="card-body pb-0">
            <div class="dropdown float-right">
                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="fa fa-tags"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-menu-content">
                        <a class="dropdown-item" href="/jenisbarang">view detail</a>
                    </div>
                </div>
            </div>
            <h4 class="mb-0">
                <span class="count">10468</span>
            </h4>
            <p class="text-light">Jenis Barang</p>
            <div class="chart-wrapper px-0" style="height:70px;" height="70">
            </div>
        </div>
    </div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-4">
        <div class="card-body pb-0">
            <div class="dropdown float-right">
                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="fa fa-archive"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-menu-content">
                        <a class="dropdown-item" href="/barang">view detail</a>
                    </div>
                </div>
            </div>
            <h4 class="mb-0">
                <span class="count">10468</span>
            </h4>
            <p class="text-light">Barang</p>
            <div class="chart-wrapper px-3" style="height:70px;" height="70">
            </div>
        </div>
    </div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3"> 
    <div class="card text-white bg-flat-color-3">
        <div class="card-body pb-0">
            <div class="dropdown float-right">
                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="fa fa-truck"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-menu-content">
                        <a class="dropdown-item" href="/supplier">view detail</a>
                    </div>
                </div>
            </div>
            <h4 class="mb-0">
                <span class="count">10468</span>
            </h4>
            <p class="text-light">Supplier</p>
        </div>
            <div class="chart-wrapper px-0" style="height:70px;" height="70">
            </div>
    </div>
</div>
<!--/.col-->

@if(auth()->user()->level == 'admin')
<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-2">
        <div class="card-body pb-0">
            <div class="dropdown float-right">
                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-menu-content">
                        <a class="dropdown-item" href="/user">view detail</a>
                    </div>
                </div>
            </div>
            <h4 class="mb-0">
                <span class="count">10468</span>
            </h4>
            <p class="text-light">User</p>
            <div class="chart-wrapper px-0" style="height:70px;" height="70">
            </div>
        </div>
    </div> 
</div>
<!--/.col-->  

    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Penjualan 
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
@endif

<div class="col-lg-6">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-pie me-1"></i>
            Grafik Barang
        </div>
        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="grafik/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="grafik/assets/demo/chart-area-demo.js"></script>
<script src="grafik/assets/demo/chart-bar-demo.js"></script>
<script src="grafik/assets/demo/chart-pie-demo.js"></script> 


<!-- Right Panel -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="style/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="style/assets/js/dashboard.js"></script>
<script src="style/assets/js/widgets.js"></script>
<script src="style/assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="style/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="style/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="style/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>

@endsection
<!-- Right Panel -->
</body>
</html>




