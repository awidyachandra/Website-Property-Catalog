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
    .custom-text {
      font-size: 40px;
      font-weight: bold;
    }
    .add-user-btn {
      background-color: #4D3328; 
      color: #fff; 
      padding: 10px 20px; 
      border-radius: 30px; 
      margin-right: 50px;
    }
    .content {
      margin-top: 20px;
    }
    table {
            width: 90% !important;
            margin: 0 auto;
            border-collapse: separate; 
            border-spacing: 0;
            border: 2px solid #4D3328 !important;
            border-radius: 5px; 
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
    .search-input {
        width: 300px;
        height: 50px; 
        border-radius: 30px; 
        padding: 5px 15px; 
        border: 1px solid #5F483E;
    }
    .custom-btn{
        color: white;
        background-color: #CAAD8C;
        border: none;
        border-radius: 30px; 
        width: 45%;
        padding: 2px 20px;
    }
    .custom-btn:hover{
        background-color: #815F51;
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
  
    <div class="text-container">
      <p class="custom-text">User's List</p>
      <div class="d-flex">
        <form action="/manajemen/search" method="GET" class="d-flex">
          <input type="text" name="search" class="form-control search-input" placeholder="Search by name" aria-label="Search">
        </form>
        <button type="button" class="btn add-user-btn ms-2" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add User</button>
      </div>
    </div>
  
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">INPUT DATA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('manajemen.store') }}" method="POST">
              @csrf
              <div class="mb-3"><label for="username" class="form-label">Username</label><input type="text" name="username" class="form-control" id="username" required></div>
              <div class="mb-3"><label for="password" class="form-label">Password</label><input type="password" name="password" class="form-control" id="password" required></div>
              <div class="mb-3"><label for="role" class="form-label">Role</label>
                <select name="role" class="form-select" id="role" required>
                  <option value="" disabled selected>Select a role</option>
                  <option value="admin">Admin</option>
                  <option value="operator">Operator</option>
                </select>
              </div>
              <div class="mb-3"><label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status" required>
                  <option value="" disabled selected>Select a status</option>
                  <option value="active">active</option>
                  <option value="nonactive">nonactive</option>
                </select>
              </div>
              <div class="modal-footer"><button type="submit" class="btn btn-primary">Save</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($user as $item)
            <tr>
              <td>{{ $item->username }}</td>
              <td>{{ $item->role }}</td>
              <td>{{ $item->status }}</td>
              <td><a href="{{ route('manajemen.edit', $item->username) }}" class="btn custom-btn">Edit</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">{{ $user->links() }}</div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>