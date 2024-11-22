<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      overflow-x: hidden;
    }
    .navbar {
      padding: 0px 20px;
    }
    .navbar-nav .nav-link {
      color: #36241C; 
      padding: 10px 20px; 
      font-size: 16px; 
      transition: color 0.3s ease-in-out; 
      opacity: 50%;
      margin-left: 10px;
    }
    .navbar-nav .nav-link:hover {
      color: #36241C;
      opacity: 100%;
    }
    .navbar-nav .nav-link.active {
      color: #36241C;
      opacity: 100%; 
    }
    .profile-icon {
    font-size: 40px;
    color: #6D7E8E; 
    margin-left: 20px;
    }
    .custom-cont {
            background: linear-gradient(rgba(77, 51, 40, 1)40%, rgba(129, 95, 81, 1));
            padding: 150px;
            padding-top: 40px;
            padding-left: 40px;
            display: flex;
    }
    .heading-text {
            color: white;
            text-align: left;
            font-weight: bold;
            position: relative;
    }
    .under-text {
        font-weight: normal;
    }
    .card-container {
        margin-top: -120px;
        margin: -120px 40px 0 40px;
    }

    .card-item {
        background-color: #ffffff;
        padding: 30px;
        padding-left: 40px;
        border-radius: 8px;
        background: linear-gradient( rgba(255,255,255,1), rgba(166, 158, 156, 1));
        box-shadow: 2px 4px 8px rgba(77, 51, 40, 0.7);
    }

    .asset, .guest {
        font-size: 100px; /* Ukuran ikon */
        color: #4D3328;
    }

    .card-title {
        font-size: 30px;
        font-weight: bold;
        margin: 0;
        color: #36241C;    
    }
    .card-text {
        font-size: 30px;
        color: #36241C;
        font-weight: bold;
    }
    .icon-cust {
      text-align: right;
    }
    table {
            width: 100% !important;
            margin: 0 auto;
            border-collapse: separate; 
            border-spacing: 0;
            border: 2px solid #4D3328 !important;
            overflow: hidden; 
        }
        th {
            background-color: #5F483E !important;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #5F483E;
            height: 55px;
            vertical-align: middle;
        }
        td {
            border: 1px solid #5F483E;
            padding: 7px !important;
            text-align: center ;
            vertical-align: middle;
            border-bottom: 1px solid #5F483E !important;
        }
        tr:hover {
            background-color: #cfd5f5;
        }
    .chart-container {
      margin: 20px 40px 0px 40px;
    }
    .container-like {
      border-radius: 10px;
      border: 1.5px solid #36241C;
      color: #36241C;
      padding: 20px;
      box-shadow: 2px 4px 8px rgba(77, 51, 40, 0.7);
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{asset('assets/image/logo.png')}}" width="120px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('guest-book') }}">Guest Book</a></li>
              <li class="nav-item"><a class="nav-link" href="#">User Management</a></li>
              <li class="nav-item"><a class="nav-link" href="#">System Log</a></li>
            </ul>
            <a class="nav-link" href="#"><i class="bi bi-person-circle profile-icon"></i></a>
          </div>
        </div>
      </nav>
      <div class="row">
        <div class="col-12 mb-3">
          <div class="container-fluid custom-cont">
            <div class="heading-text">
                <h2>HELLO, </h2>
                <div class="under-text">
                    <span>Welcome to Admin Dashboard</span>
                </div>
            </div>
          </div>
        <div class="card-container">
          <div class="row">
            <div class="col-md-6">
            <div class="card-item">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-12 mb-5">
                      <h3 class="card-title">TOTAL ASSET</h3>
                    </div>
                    <div class="col-12">
                      <p class="card-text">{{ $total }}</p>
                    </div>
                  </div>                  
                </div>
                <div class="col icon-cust">
                  <i class="bi bi-buildings asset"></i>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-6">
              <div class="card-item">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-12 mb-5">
                        <h3 class="card-title">TOTAL GUEST</h3>
                      </div>
                      <div class="col-12">
                        <p class="card-text">{{$guesttotal}}</p>
                      </div>
                    </div>                  
                  </div>
                  <div class="col icon-cust">
                    <i class="bi bi-person-workspace guest"></i>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="chart-container">
          <div class="row">
            <!-- Kolom untuk Tabel 1 -->
            <div class="col-md-6">
              <div class="container-like">
                <h5>TOP 10 ASSETS</h5>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Likes</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($galeri as $item)
                    <tr>
                      <td>{{ $item->id}}</td>
                      <td>{{ $item->nama_aset}}</td>
                      <td>{{ $item->type_aset}}</td>  
                    </tr>
                    @endforeach
                  </tbody> 
                </table>
              </div>
            </div>
            </div>
            <!-- Kolom untuk Tabel 2 -->
            <div class="col-md-6">
              
            </div>
          </div>
        </div>
      </div>
      </div>
    

</body>