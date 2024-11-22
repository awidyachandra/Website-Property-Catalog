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

    .detail-container {
      position: relative; /* Agar ikon dapat diposisikan secara absolut di dalamnya */
      max-width: 100%; /* Mengatur lebar maksimum kontainer */
    }

    .detail-image {
      width: 100%; /* Gambar mengisi lebar kontainer */
      height: 300px; /* Menentukan tinggi gambar */
      object-fit: cover; /* Gambar mengisi ruang dengan kemungkinan terpotong */
    }
    .custom-container {
        max-width: 95%; /* Lebar khusus sesuai kebutuhan */
        margin: 0 auto; /* Agar berada di tengah */
    }
    
    .btn-back {
      position: absolute;
      background-color: rgba(255,255,255,0.8);
      border: 1px solid #36241C;
      border-radius: 100%;
      margin-top: 30px;
      left: 2%;
    }
    .icon-back {
      top: 10px; /* Jarak dari atas */
      left: 30px; /* Jarak dari kiri */
      font-size: 20px; /* Ukuran ikon */
      color: #4D3328; /* Warna ikon */
      cursor: pointer; /* Menunjukkan bahwa ikon dapat diklik */
      z-index: 10; /* Memastikan ikon berada di atas gambar */
    }

    /* Styling untuk teks agar bisa di-custom */
    .detail-text {
      margin-top: 20px;
      color: #36241C; /* Warna teks default */
      text-transform: uppercase;
      border-bottom: 1px solid #4D3328;
      position: relative; /* Menetapkan posisi relatif untuk kontainer */
      display: inline-block; /* Agar elemen tetap berada dalam satu baris */
      width: 100%; /* Agar kontainer bisa menampung teks dan ikon */      
    }
    /* Custom styling tambahan */
    .custom-font {
      font-weight: bold;
    }
    .location {
      color: #4D3328; /* Warna teks */
      font-size: 15px; /* Ukuran font */
      margin-bottom: 20px; /* Jarak bawah */
      text-transform: none; /* Tidak mengubah teks menjadi kapital */
      font-weight: bold; /* Teks dengan font tebal */
      font-style: normal; /* Menghilangkan gaya italic */
      display: inline-block; /* Menjaga teks berada dalam satu baris */
    }
    .love {
      font-size: 30px; /* Ukuran ikon */
      color: #4D3328; /* Warna ikon, disesuaikan dengan warna teks */
      position: absolute; /* Menempatkan ikon secara absolut */
      top: 0; /* Menempatkan ikon di bagian atas */
      right: 0; /* Menempatkan ikon di sebelah kanan */
      cursor: pointer; /* Menambahkan cursor pointer saat hover */
      margin-right: 30px;
    }
    .galery{
      margin-top: 10px;
      border-radius: 0;
      cursor: pointer;
    }
    .description-text{
      color: #36241C;
      text-transform: uppercase;
      font-weight: bold;
    }
    .description-text p {
      font-weight: normal;
      text-transform: none;
    }
    .property-details {
      display: flex;
      align-items: center; /* Menyelaraskan item secara vertikal di tengah */
      flex-wrap: nowrap; /* Menjaga elemen tetap dalam satu baris */
      gap: 40px;
      margin: 0;
      padding: 0;
      width: auto;
    }

    .detail-item {
      display: flex;
      flex-direction: column; /* Mengatur agar judul berada di atas */
      align-items: flex-start; /* Menyelaraskan elemen ke kiri */
      margin: 0;
      padding: 0;
      width: auto;
    }

    .detail-title {
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
      color: #36241C;
    }

    .detail-content {
      display: flex;
      align-items: center;
      gap: 8px; /* Mengatur jarak antara ikon dan teks menjadi lebih kecil */
    }

    .detail-content i {
      font-size: 20px; /* Ukuran ikon */
      color: #4D3328; /* Warna ikon */
    }

    .detail-content span {
      font-size: 15px; /* Ukuran teks deskripsi */
      color: #36241C; /* Warna teks */
    }

  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="{{asset('assets/image/logo.png')}}" width="120px"></a>
    </div>
  </nav>
  <div style="position: relative;">
      <button onclick="window.history.back();" class="btn-back">
      <i class="bi bi-arrow-left icon-back" ></i>  
    </button> 
    <img src="{{ asset('img/' . $properties->image) }}" alt="{{ $properties->nama_aset }}" class="detail-image">
  </div>
  <div class="custom-container mt-4">
    <!-- Detail Teks -->
    <div class="detail-text custom-font custom-color">
      <h2>{{ $properties->nama_aset }}</h2>
      <div class="location-wrapper d-flex align-items-center justify-content-between">
        <div class="bi bi-geo-alt location">{{ $properties->lokasi }}</div>
        <i class="bi bi-heart love"></i>
        </div>
    </div>
  
    <!-- Galeri -->
    <div class="galery mt-4">
      @if($properties->images->count())
          <div class="row">
              @foreach($properties->images as $image)
                  <div class="col-md-3 mb-3">
                      <div class="card">
                          <!-- Image thumbnail that will trigger modal -->
                          <img src="{{ asset('img/' . $image->image) }}" alt="Current Image" class="card-img-top" 
                               style="max-width: 100%; height: auto;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $image->id }}">
                      </div>
                  </div>
  
                  <!-- Modal for each image -->
                  <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <img src="{{ asset('img/' . $image->image) }}" alt="Full Image" class="img-fluid">
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      @endif
  </div>
  
    <!-- Deskripsi -->
    <div class="deskripsi mt-4">
      <div class="description-text mb-3">
        <h4>Description</h4>
        <p>{{ $properties->deskripsi }}</p>
      </div>
  
      <!-- Detail Properti -->
      <div class="property-details row">
        <div class="col-md-4 detail-item">
          <p class="detail-title">TYPE</p>
          <div class="detail-content d-flex align-items-center">
            <i class="bi bi-buildings"></i>
            <span>{{ $properties->type_aset }}</span>
          </div>
        </div>
        <div class="col-md-4 detail-item">
          <p class="detail-title">CONDITION</p>
          <div class="detail-content d-flex align-items-center">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span>{{ $properties->kondisi }}</span>
          </div>
        </div>
        <div class="col-md-4 detail-item">
          <p class="detail-title">AREA</p>
          <div class="detail-content d-flex align-items-center">
            <i class="bi bi-rulers"></i>
            <span>{{ $properties->luas_tanah }} m²</span>
          </div>
        </div>
        <div class="col-md-4 detail-item">
          <p class="detail-title">FLOOR</p>
          <div class="detail-content d-flex align-items-center">
            <i class="bi bi-building"></i>
            <span>{{ $properties->jml_lantai }} lantai</span>
          </div>
        </div>
        <div class="col-md-4 detail-item">
          <p class="detail-title">ROOM</p>
          <div class="detail-content d-flex align-items-center">
            <i class="bi bi-door-closed"></i>
            <span>{{ $properties->jml_ruangan }} room</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</html>
