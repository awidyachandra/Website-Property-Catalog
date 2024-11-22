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
    .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
        color: #36241C;
        opacity: 100%;
    }
    .profile-icon {
        font-size: 40px;
        color: #6D7E8E; 
        margin-left: 20px;
    }
    .edit-content {
        font-size: 40px;
        font-weight: bold; 
        color: #36241C;
        margin: 20px 0;
    }    
    .btn-primary {
        background-color: #ffffff;
        border: none;
        color: black;
        margin-top: 20px;
    }
    .btn-primary:hover {
        background-color: #36241C;
    }
    .form-container {
        padding: 20px;
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
        margin-left: 90%;
    }
    .form-control, .form-select, textarea {
        border-color: #6B5D5A;
        opacity: 80%;
    }
    .icon-back{
        font-size: 40px;
        color: #4D3328;
    }
    .custom-text {
      font-size: 40px;
      font-weight: bold;
      color: #36241C;
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
                  <a class="nav-link" href="{{ route('guest-book2') }}">Guest Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('content.index') }}">Content Management</a>
                </li>
              </ul>
            <a class="nav-link" href="#">
                <i class="bi bi-person-circle profile-icon"></i>
            </a>    
          </div>
        </div>
      </nav>
      <div class="container mt-3 d-flex">
        <a class="nav-link me-2" href="{{ route('content.index') }}">
            <i class="bi bi-arrow-left-circle icon-back"></i>
        </a> 
        <p class="custom-text mb-0">EDIT CONTENT</p>
      </div>
      <div class="container mb-3 mt-3">
        <div class="row ">
            <div class="col-md-11">  
                <form action="{{ route('content.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="nama_aset" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="name" name="nama_aset" id="nama_aset" value="{{ $galeri->nama_aset }}">
                        </div>
                        <div class="col">      
                            <label for="luas_tanah" class="form-label">Area: (m²)</label>
                            <input type="text" class="form-control" placeholder="Area" name="luas_tanah" id="luas_tanah" value="{{ $galeri->luas_tanah }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="type_aset" class="form-label">Type:</label>
                            <select name="type_aset" class="form-select" id="type_aset" required onchange="toggleRoomFloor()">
                                <option value="" disabled selected>Select a Type</option>
                                <option value="bangunan" {{ $galeri->type_aset == 'bangunan' ? 'selected' : '' }}>Bangunan</option>
                                <option value="tanah" {{ $galeri->type_aset == 'tanah' ? 'selected' : '' }}>Tanah</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jml_lantai" class="form-label">Floor:</label>
                            <input type="text" class="form-control" placeholder="Floor" name="jml_lantai" id="jml_lantai" value="{{ $galeri->jml_lantai }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="status">Status:</label>
                            <select name="status" class="form-select" id="status" required>
                                <option value="" disabled selected>Select a Status</option>
                                <option value="tersedia" {{ $galeri->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="tidak tersedia" {{ $galeri->status == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                <option value="tersewa" {{ $galeri->status == 'tersewa' ? 'selected' : '' }}>Tersewa</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jml_ruangan">Room:</label>
                            <input type="text" class="form-control" placeholder="Room" name="jml_ruangan" id="jml_ruangan" value="{{ $galeri->jml_ruangan }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="lokasi">Location:</label>
                            <input type="text" class="form-control" placeholder="Location" name="lokasi" id="lokasi" value="{{ $galeri->lokasi}}">
                        </div>
                        <div class="col">
                            <label for="kondisi">Condition:</label>
                            <input type="text" class="form-control" placeholder="Condition" name="kondisi" id="kondisi" value=" {{$galeri->kondisi}}">
                        </div>
                    </div>
                        <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="deskripsi" class="form-label">Description:</label>
                            <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">{{ $galeri->deskripsi }}</textarea>
                        </div> 
                        <div class="col">
                            <label for="image" class="form-label">Upload Picture:</label>
                            <input type="file" class="form-control" name="image[]" id="image" multiple>
                        
                            @if($galeri->images->count())
                                <p>Current Pictures:</p>
                                <div class="row">
                                    @foreach($galeri->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <div class="card">
                                                <img src="{{ asset('img/' . $image->image) }}" alt="Current Image" class="card-img-top" style="max-width: 100%; height: auto;">
                                                <div class="card-body">
                                                    <p><a href="{{ asset('img/' . $image->image) }}" target="_blank">View Full Image</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="submit-btn-container d-flex">
                            <button type="submit" class="btn custom-btn">Update</button>
                        </div>
                </form>
            </div>
        </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
            roomInput.value = ''; 
            floorInput.value = ''; 
        }
    }
</script>
</body>
</html>
