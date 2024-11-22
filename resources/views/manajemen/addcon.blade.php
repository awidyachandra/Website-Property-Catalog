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
      color: #36241C;
    }
    .form-control, .form-select, textarea {
      border-color: #6B5D5A;
      opacity: 80%;
    }
    .form-container {
      padding: 50px;
      border-radius: 10px;
      background-color: #ffffff;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    .custom-btn{
      background-color: #4D3328;
      color: #ffffff;
      border: none;
      border-radius: 30px; 
      padding: 10px 20px;
      margin-left: 85%;
    }
    .icon-back{
        font-size: 40px;
        color: #4D3328;
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
              <a class="nav-link" href="{{ route('content.index') }}">Content Management</a>
            </li>
          </ul>
          <a class="nav-link" href="#">
              <i class="bi bi-person-circle profile-icon"></i>
            </a>    
      </div>
    </nav>
    <div class="container mt-3 d-flex">
        <a class="nav-link me-2" href="{{ route('content.index') }}">
            <i class="bi bi-arrow-left-circle icon-back"></i>
        </a>  
        <p class="custom-text mb-0">ADD CONTENT</p>
    </div>
    <div class="container mt-3 mb-3">
        <div class="row mb-3 mt-3">
            <div class="col-md-11">
                <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="nama_aset">Name:</label>
                            <input type="text" class="form-control" placeholder="Name" name="nama_aset" id="nama_aset">
                        </div>
                        <div class="col">
                            <label for="luas_tanah">Area: (m²)</label>
                            <input type="text" class="form-control" placeholder="Area" name="luas_tanah" id="luas_tanah">
                        </div>
                    </div>
    
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="type_aset">Type:</label>
                            <select name="type_aset" class="form-select" id="type_aset" required onchange="toggleRoomFloor()">
                                <option value="" disabled selected>Select a Type</option>
                                <option value="bangunan">Bangunan</option>
                                <option value="tanah">Tanah</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jml_lantai">Floor:</label>
                            <input type="text" class="form-control" placeholder="Floor" name="jml_lantai" id="jml_lantai" disabled>
                        </div>
                    </div>
    
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="status">Status:</label>
                            <select name="status" class="form-select" id="status" required>
                                <option value="" disabled selected>Select a Status</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak tersedia">Tidak tersedia</option>
                                <option value="tersewa">Tersewa</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jml_ruangan">Room:</label>
                            <input type="text" class="form-control" placeholder="Room" name="jml_ruangan" id="jml_ruangan" disabled>
                        </div>
                    </div>
    
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="lokasi">Location:</label>
                            <input type="text" class="form-control" placeholder="Location" name="lokasi" id="lokasi">
                        </div>
                        <div class="col">
                            <label for="kondisi">Condition:</label>
                            <input type="text" class="form-control" placeholder="Condition" name="kondisi" id="kondisi">
                        </div>
                    </div>
    
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="deskripsi">Description:</label>
                            <textarea class="form-control" rows="5" id="deskripsi" placeholder="Description" name="deskripsi"></textarea>
                        </div>
                            <div class="col">
                            <label for="image" class="form-label">Upload Images:</label>
                            <input type="file" class="form-control" name="image[]" id="image" multiple>
                            <small class="form-text text-muted">You can select multiple images.</small>
                        </div>
                    </div>
    
                    <div class="submit-btn-container d-flex">
                        <button type="submit" class="btn custom-btn">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function toggleRoomFloor() {
            const typeAset = document.getElementById('type_aset').value;
            const roomInput = document.getElementById('jml_ruangan');
            const floorInput = document.getElementById('jml_lantai');
    
            if (typeAset === 'bangunan') {
                roomInput.disabled = false;
                floorInput.disabled = false;
            } else if (typeAset === 'tanah') {
                roomInput.disabled = true;
                floorInput.disabled = true;
                roomInput.value = ''; // Kosongkan input jika disable
                floorInput.value = ''; // Kosongkan input jika disable
            }
        }
    </script>