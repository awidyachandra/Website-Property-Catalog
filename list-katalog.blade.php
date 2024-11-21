<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog</title>
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
            position: relative;
        }
        .navbar-brand {
            padding-top: 0px;
        }
        .horizontal-line {
            height: 20px;
            background-color: #4D3328;
            margin-top: 5px;
            margin-bottom: 30px;
        }
        .atas {
            margin-left: 20px;
            margin-right: 50px;
        }
        .btn-back {
            border: none;
            font-size: 34px;
            background-color: transparent;
            color: #4D3328;
        }
        .text h1{
            font-weight: bold;
            margin: 0 auto;
            color: #36241C;
        }
        .custom-search {
            margin-top: auto;
            width: 100%;
        }
        .custom-input-group {
            border-radius: 50px;
            overflow: hidden;
            border: 2px solid rgb(107, 93, 90, 0.75) ;
        }
        .custom-input-group input {
            border: none;
            padding: 15px;
            height: 40px;
            box-shadow: none;
            outline: none;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .custom-input-group .input-group-text {
            background-color: transparent;
            border: none;
            padding: 0 0px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .custom-input-group .input-group-text i {
            color: rgb(77, 51, 40, 0.8);
            padding-left: 20px;
            font-size: 20px;
        }
        .custom-input-group input::placeholder {
            color: rgb(77, 51, 40, 0.8);
            font-size: 16px;
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
        .none h6{
            text-align: center;
            margin-bottom: 40px;
            color:rgba(62, 44, 28, 0.6);
        }
        .pagination .page-item:not(.next):not(.prev) .page-link {
            background-color: #ffffff; 
            color: #5F483E; 
            border-color: #dee2e6;
        }

        .pagination .active .page-link {
            background-color: #dee2e6; 
            color: #5F483E; 
            border-color: #5F483E;
        }

        .pagination .page-item.next .page-link,
        .pagination .page-item.prev .page-link {
            background-color: #5F483E; 
            color: #ffffff;
            border-color: #dee2e6;
        }

        .pagination .page-item:not(.next):not(.prev) .page-link:hover {
            background-color: #d0d0d0; 
            color: #5F483E;
            border-color: #d0d0d0;
        }

        .pagination .page-item.next .page-link:hover,
        .pagination .page-item.prev .page-link:hover {
            background-color: #c0c0c0;
            color: #5F483E;
            border-color: #c0c0c0;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="{{ asset('assets/image/logo_ptpn.png') }}" alt="Logo" width="120px">
            </a>     
        </div>
    </nav>
    <div class="horizontal-line"></div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="row align-items-center atas">
                <div class="col-md-1">
                    <button type="button" class="btn-back" onclick="window.location.href='{{ url('/landing') }}'"><i class="bi bi-arrow-left-circle"></i></button>
                </div>
                <div class="col-md-7">
                    <div class="text">
                        <h1>LIST CATALOG</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container custom-search">
                        <form action="{{ route('katalog.search') }}" method="GET">
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
            </div>
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
                                    <div class="card-img-top" style="background-image: url('{{ asset('img/' . $property->image) }}'); height: 250px; background-size: cover; background-position: center;">
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
                    <div class="d-flex justify-content-center mt-4">
                        {{ $properties->links('pagination::bootstrap-5') }}
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
