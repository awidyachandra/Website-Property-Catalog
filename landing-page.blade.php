<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
        }
        .navbar {
            padding-left: 30px;
            padding-right: 45px;
            padding-top: 0px;
            height: 60px;
        }
        .navbar-brand {
            padding-top: 0px;
        }
        .nav-item {
            color: #3B71CA;
            font-weight: 500;
        }
        .nav-item:hover {
            color: #d9d9d9;
        }
        .modal-content {
            border-radius: 12px;
            padding: 20px;
            position: relative;
            z-index: 1051; 
            background-color: #FBFAFA;
            box-shadow: inset 4px 4px 8px rgba(0, 0, 0, 0.2), 5px 5px 10px rgba(0, 0, 0, 0.2);;
        }
        .btn-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 15px;
        }
        .modal-header {
            border-bottom: none;
            text-align: center;
        }        
        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3e2c1c; 
        }
        .modal-body {
            padding-bottom: 5px;
        }
        .text-modal p {
            margin-top: -10px;
            margin-left: 17px;
            margin-bottom: 1rem;
            color: #3e2c1c;
            font-size: 1rem;
        }        
        .form-label {
            font-weight: bold;
            color: #3e2c1c;
        }
        .form-control {
            border: 1.5px solid #3e2c1c;
            border-radius: 30px;
            padding-left: 15px;
            line-height: 2;
        }
        .form-control::placeholder {
            color: #9e8c84;
        }
        .modal-footer {
            padding: 0px;
            border: none;
        }
        .btn-save {
            background-color: #3e2c1c; 
            color: #fff;
            border-radius: 20px;
            width: 120px;
            justify-content: end;
        }
        .custom-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(62, 44, 28, 0.6); 
            z-index: 1050; 
            display: none; 
        }
        .custom-width {
            position: relative;
            max-width: 1180px;
            margin: 0 auto;
        }
        .custom-rounded {
            border-radius: 10px;
            width: 100%;
            height: auto;
        }
        .overlay-card {           
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(107, 93, 90, 0.5)65%, rgba(255, 255, 255, 0.6));
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container-fluid {
            --bs-gutter-x: 0rem;
        }
        .custom-search {
            margin-top:-30px;
            width: 100%;
            max-width: 700px;
        }
        .custom-input-group {
            border-radius: 50px;
            overflow: hidden;
            border: 2px solid rgb(107, 93, 90, 0.75) ;
        }
        .custom-input-group input {
            border: none;
            padding: 15px;
            height: 50px;
            box-shadow: none;
            outline: none;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .custom-input-group .input-group-text {
            background-color: transparent;
            border: none;
            padding: 0 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .custom-input-group .input-group-text i {
            font-size: 24px;
            color: rgb(77, 51, 40, 0.8);
            padding-left: 20px;
        }
        .custom-input-group input::placeholder {
            color: rgb(77, 51, 40, 0.8);
            font-size: 18px;
        }
        .heading-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 30px 0;
        }
        .heading-line {
            border: none;
            height: 3px;
            flex-grow: 1; 
            background-color: #4D3328; 
        }
        .heading-text {
            font-weight: bold;
            font-size: 35px;
            color: #4D3328; 
            margin-left: 15px; 
            margin-right: 60px;
            white-space: nowrap;
        }
        .none h6{
            text-align: center;
            margin-bottom: 40px;
            color:rgba(62, 44, 28, 0.6);
        }
        .cust-card {
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
            width: 100%;
        }
        .cust-card:hover {
            transform: scale(1.05);
        }
        .card-body {
            background-color: #5F483E;
            color: #fff;
            border-radius: 0 0 10px 10px;
        }
        .card-body i{
            font-size: 18px;
        }
        .luas i{
            font-size: 15px;
        }
        .badge {
            background-color: #fff;
            border: 1.5px solid #5F483E;
            border-radius: 30px;
            color: #5F483E;
        }
        .cust-btn {
            background-color: #36241C;
            color: #fff;
        }
        .image-container {
            position: relative;
        }
        .image-container img {
            border-radius: 10px;
            width: 100%;
            height: auto;
        }
        .text-section1 {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding-left: 50px;
            padding-top: 30px;
        }
        .text-section1 h1 {
            color: #4b3621;
            font-size: 36px;
            font-weight: bold;
        }
        .card-overlay {
            background-color: rgba(77, 51, 40, 0.9); 
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            font-size: 18px;
        }
        .text-section {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column; 
            justify-content: flex-start;
        }
        .text-section h1{
            color: #4b3621;
            font-size: 55px;
            font-weight: bold;
        }
        .text-section h2{
            color: #4b3621;
            font-size: 20px;
            font-weight: bold;
        }
        .custom-card {
            margin-top: -60px;
            position: relative;
        }
        .custom-container {
            background-color: #5F483E;
            height: 500px;
        }
        .text {
            color:#fff;
            text-align: center;
            padding: 30px;
        }
        .text h1{
            font-size: 30px;
            font-weight: bold;
        }
        .faq-container {
            width: 100%;
            max-width: 800px;
            margin: 10px auto;
            font-family: Arial, sans-serif;
        }
        .faq-question {
            background-color: #f1f1f1;
            padding: 15px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin-bottom: 0px;
            transition: background-color 0.3s;
        }
        .faq-answer {
            display: none;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 0px 0px 15px 15px;
            background-color: #fafafa;
            margin-bottom: 10px;
            margin-top: -12px;
        }
        .btn-custom {
            background-color: rgba(54, 36, 28, 0.6);
            border-radius: 40px;
            border: none;
        }
        .btn-custom i{
            color:white;
        }
        .custom-cont {
            background: linear-gradient(180deg, rgba(255, 255, 255, 1.0)70%, rgba(95, 72, 62, 1.0)30%);
            padding-bottom: 15px;
        }
        .text-footer {
            color:#36241C;
            text-align: center;
            padding: 20px;
        }
        .text-footer h1 {
            font-size: 30px;
            font-weight: bold;
        }
        .text-footer p {
            padding-top: 16px;
            font-size: 16px;
        }
        .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: #36241C;
        }
        .icon {
            background-color: #5c4033;
            padding: 15px;
            border-radius: 45%;
            margin-bottom: 10px;
            width: 50px;
        }
        .icon i {
            color: white;
            font-size: 22px;
            align-items: center;
            justify-content: center;
            display: flex;
        }
        .icon-title {
            font-weight: bold;
            font-size: 16px;
        }
        .custom-image {
            width: 60%;
            border: 2px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s ease;
            margin: 40px auto; 
            margin-bottom: 15px;
            display: block;
        }
        .custom-image:hover {
            transform: scale(1.05); 
            border-color: #aaa;
        }
        .footer {
            background-color: #5F483E; 
            color: white;
        }
        .footer .social-icons a {
            text-decoration: none;
            color: white;
            margin: 0 10px;
            font-size: 15px;
        }
        .footer .social-icons a:hover {
            color: #ddd;
        }
        .footer hr {
            border-top: 1px solid white;
            width: 1px;
            height: 24px;
            display: inline-block;
            vertical-align: middle;
            margin: 0 15px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="{{ asset('assets/image/logo_ptpn.png') }}" alt=" " width="120px">
            </a>  
             <div class="nav-item">
             <a class="nav-link" href="{{ route('privacy.policy')}}">Privacy Policy</a>
            </div>   
        </div>
    </nav>
    <div class="container-fluid mt-1">
        <div class="custom-overlay" id="customOverlay"></div>
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true" data-bs-backdrop="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Please Fill In Your Information</h5>
                    </div>
                    <div class="text-modal">
                        <p>Enter your details and start journey with us!</p>
                    </div>
                    <div class="modal-body">
                    @if(session('success'))                            
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('guest.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name" class="form-label">Name <br><span style="font-weight: normal; font-size: 0.8rem;">Nama</span></label>
                                </div>  
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                            </div>                        
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="email" class="form-label">Email <br><span style="font-weight: normal; font-size: 0.8rem;">Email</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="phone" class="form-label">Phone <br><span style="font-weight: normal; font-size: 0.8rem;">Telepon</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Number">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="city" class="form-label">City <br><span style="font-weight: normal; font-size: 0.8rem;">Kota</span></label>
                                </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-save">Save</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-12 mb-3">    
                <div class="container-fluid custom-width">
                    <img src="{{ asset('assets/image/landingphotos.png') }}" class="img-fluid custom-rounded" alt=" " >
                    <div class="overlay-card"></div>     
                </div>
                <div class="container custom-search">
                    <form action="{{ route('properties.search') }}" method="GET">
                        <input type="hidden" name="showModal" value="false">
                        <div class="input-group custom-input-group">
                            <span class="input-group-text bg-white ">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="query" class="form-control custom-form-control" placeholder="Search" value="{{ request('query') }}">
                        </div>
                    </form>
                </div>
            </div>
            
                <div class="heading-container">
                    <hr class="heading-line">
                    <span class="heading-text">GALERY ASSET</span>
                </div>
            <div class="col-12 mb-3">
                <div class="container my-4">
                    @if(isset($properties) && count($properties) <= 0)   
                    <div class="none">
                        <h6>Tidak ada hasil yang ditemukan untuk "{{ $query }}"</h6>
                    </div>
                    @endif
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-md-4 mb-4">
                                <div class="card cust-card">
                                    <div class="card-img-top" style="background-image: url('{{ $property->image }}'); height: 250px; background-size: cover; background-position: center;">
                                        <span class="badge position-absolute p-2" style="top: 15px; left: 15px; text-transform: uppercase;">{{ $property->status }}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $property->nama_aset }}</h5>
                                        <div class="card-text"><i class="bi bi-geo-alt"></i> {{ $property->lokasi }}</div>
                                        <div class="luas"><i class="bi bi-rulers"></i>  Area : {{ $property->luas_tanah }} m²</div>
                                        <div class="d-flex" style="gap: 20px;">
                                            <span><i class="bi bi-building"></i> {{ $property->jml_lantai }} lt</span>
                                            <span><i class="bi bi-door-closed"></i> {{ $property->jml_ruangan }} room</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{ route('katalog.show') }}" class="btn cust-btn">See More</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="image-container">
                                <img src="{{ asset('assets/image/image.png') }}" class="img-fluid rounded" alt="Gedung Perusahaan">
                            </div>
                        </div>
                        <div class="col-md-2 text-section1">
                            <h1>ABOUT OUR COMPANY</h1>
                        </div>
                        <div class="col-md-4 mt-3 text-section">
                            <h1>X+</h1>
                            <h2>Jumlah Aset</h2>
                        </div>
                        <div class="col-md-8 custom-card">
                        <div class="card-overlay">
                            <p>PT Perkebunan Nusantara I Regional 4 merupakan unit usaha perkebunan di bawah Subholding 
                                PT Perkebunan Nusantara I yang merupakan hasil integrasi bisnis dari eks PTPN X dan eks PTPN 
                                XI dengan komoditas utama berupa tebu, kopi, tembakau, dan karet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-0 mt-3">
            <div class="container-fluid mt-5 custom-container">
                <div class="text">
                    <h1>FREQUENTLY ASKED QUESTIONS</h1>
                </div>
                <div class="container mt-1">
                    <div class="row">
                        <div class="col-12 md-6">
                            <div class="faq-container">
                                <div class="faq-question">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="faq-text"> Apa itu FAQ?</div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn-custom" onclick="toggleFAQ('faq1')"><i class="bi bi-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-answer" id="faq1">
                                    FAQ (Frequently Asked Questions) adalah daftar pertanyaan dan jawaban umum yang sering ditanyakan oleh pengguna terkait suatu topik tertentu.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 md-6">
                            <div class="faq-container">
                                <div class="faq-question">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="faq-text"> Apa itu FAQ?</div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn-custom" onclick="toggleFAQ('faq2')"><i class="bi bi-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-answer" id="faq2">
                                    FAQ (Frequently Asked Questions) adalah daftar pertanyaan dan jawaban umum yang sering ditanyakan oleh pengguna terkait suatu topik tertentu.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 md-6">
                            <div class="faq-container">
                                <div class="faq-question">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="faq-text"> Apa itu FAQ?</div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn-custom" onclick="toggleFAQ('faq3')"><i class="bi bi-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-answer" id="faq3">
                                    FAQ (Frequently Asked Questions) adalah daftar pertanyaan dan jawaban umum yang sering ditanyakan oleh pengguna terkait suatu topik tertentu.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 md-6">
                            <div class="faq-container">
                                <div class="faq-question">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="faq-text"> Apa itu FAQ?</div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn-custom" onclick="toggleFAQ('faq4')"><i class="bi bi-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-answer" id="faq4">
                                    FAQ (Frequently Asked Questions) adalah daftar pertanyaan dan jawaban umum yang sering ditanyakan oleh pengguna terkait suatu topik tertentu.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-0">
            <div class="container-fluid mt-5 custom-cont">
                <div class="text-footer">
                    <h1>LET'S STAY CONNECTED</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                </div>
                <div class="row">
                    <div class="col-md-4 icon-container">
                        <div class="icon">
                          <i class="bi bi-envelope"></i>
                        </div>
                        <div class="icon-title">Email Address</div>
                        <div>abcdef@gmail.com</div>
                      </div>
                      <div class="col-md-4 icon-container">
                        <div class="icon">
                          <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="icon-title">Location</div>
                        <div>Jl Merak No.1 Surabaya, Surabaya, Indonesia 60175</div>
                      </div>
                      <div class="col-md-4 icon-container">
                        <div class="icon">
                          <i class="bi bi-telephone"></i>
                        </div>
                        <div class="icon-title">Phone Number</div>
                        <div>12345678910</div>
                      </div>
                </div>
                <a href="https://maps.app.goo.gl/4X2rywjdoMdj8XYr7" target="_blank">
                    <img src="{{ asset('assets/image/mapss.png') }}" alt=" " class="custom-image">
                </a>
                <div class="footer text-center">
                    <div class="container">
                        <span>Copyright © 2024.</span>
                        <hr>
                        <div class="social-icons d-inline">
                            <a href="https://facebook.com" target="_blank" class="fab fa-facebook-f"></a>
                            <a href="https://www.youtube.com/@satunusantaratv" target="_blank" class="fab fa-youtube"></a>
                            <a href="https://www.instagram.com/ptpn1regional4/" target="_blank" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>
</body>
<script>
    function toggleFAQ(id) {
        var allAnswers = document.getElementsByClassName("faq-answer");

        for (var i = 0; i < allAnswers.length; i++) {
            if (allAnswers[i].id !== id) { 
                allAnswers[i].style.display = "none";
            }
        }

        var answer = document.getElementById(id);
        if (answer.style.display === "block") {
            answer.style.display = "none"; 
        } else {
            answer.style.display = "block"; 
        }
    }

    window.addEventListener('load', function() {
    @if (!session('searchPerformed'))
        var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
        infoModal.show();
        document.getElementById('customOverlay').style.display = 'block'; // Tampilkan overlay
        document.body.style.overflow = 'auto';
    @endif
    });

    document.getElementById('infoModal').addEventListener('shown.bs.modal', function () {
        document.body.classList.remove('modal-open');
    });
    document.getElementById('infoModal').addEventListener('hidden.bs.modal', function () {
    @php
        session()->forget('searchPerformed');
    @endphp
    document.getElementById('customOverlay').style.display = 'none';
});

    document.getElementById('infoModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('customOverlay').style.display = 'none';
    });
    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById('infoModal'));
            setTimeout(() => {
                modal.hide();
            }, 1500); 
        });
    </script>
@endif



</script>
</html>