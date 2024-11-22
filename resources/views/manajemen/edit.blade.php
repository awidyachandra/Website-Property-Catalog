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
            justify-content: space-between; 
            margin-left: 50px;
            padding: 20px;
            color: #36241C;
        }
        .edit-user-status {
            font-size: 40px;
            font-weight: bold; 
            color: #36241C;
            display: flex;             
            align-items: center;       
            padding: 20px;
        }
        form {
            background-color: #5F483E;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .form-label {
            font-weight: bold; 
        }    
        .btn-primary {
            background-color: #ffffff;
            border: none;
            color: black;
            margin-left: 85%;
        }
        .btn-primary:hover {
            background-color: #36241C;
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

  <div class="container">
    <h2 class="edit-user-status">Edit User Status</h2>
    <form action="{{ route('manajemen.update', $user->username) }}" method="POST">
        @csrf
        @method('PUT')  
        <div class="mb-3 row">
            <label for="username" class="form-label">Username</label>
            <div class="col-sm-10">
                {{$user->username}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="form-label">Role</label>
            <div class="col-sm-10">
                {{$user->role}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" id="status" required>
                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="nonactive" {{ $user->status == 'nonactive' ? 'selected' : '' }}>Nonactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
    </div>
</div>