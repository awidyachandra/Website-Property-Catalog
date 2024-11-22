<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .navbar {
      padding: 0px 20px;
      border-bottom: 35px solid #4D3328; 
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
    .text-container {
      display: flex;             
      align-items: center;       
      margin-left: 50px;
      padding: 20px;
      color: #36241C;
    }
    .custom-text {
      font-size: 40px;
      font-weight: bold;
    }
    table {
            width: 90% !important;
            margin: 0 auto;
            border-collapse: separate; 
            border-spacing: 0;
            border: 2px solid #4D3328 !important;
            border-radius: 5px; 
            overflow: hidden;
            table-layout: fixed; 
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
            padding: 2px !important;
            text-align: center ;
            vertical-align: middle;
            border-bottom: 1px solid #5F483E !important;
        }
        th:first-child {
            border-top-left-radius: 5px;
        }

        th:last-child {
            border-top-right-radius: 5px;
        }
        tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
        }
        tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
        }
        tr:hover {
            background-color: #cfd5f5;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="{{asset('assets/image/logo.png')}}" width=120px>
      </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> 
                <li class="nav-item">
                  <a class="nav-link" href="#">Dashboard</a>
                </li>    
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('guest-book') }}">Guest Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manajemen.index') }}">Management User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">System Log</a>
                </li>
              </ul>
          <a class="nav-link" href="#">
              <i class="bi bi-person-circle profile-icon"></i>
            </a>    
      </div>
    </nav>
    <div class="text-container">
        <p class="custom-text">Guest's List</p> 
    </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guest as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp}}</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                            @endforeach
                        </tbody>        
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $guest->links() }} 
                    </div>
</body>
  </html>
