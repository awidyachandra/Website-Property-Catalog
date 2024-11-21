<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    
        body{
            justify-content: center;
            align-items: center;    
        } 
        
        .navbar {
            padding: 0px 20px;
        }
        
        .custom-width {
            position: relative;
            max-width: 1220px;
            margin: 0 auto;
        }
        .custom-rounded {
            border-radius: 20px;
            width: 100%;
            height: auto;
        }
        .overlay-card {
            
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(107, 93, 90, 0.6)65%, rgba(255, 255, 255, 0.6));
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            z-index: 10;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .btn-custom {
            border-radius: 60px;
            color: #747474;
            font-size: 13px;
        }
        .custom-input {
            border-radius: 18px;
            height: 45px;
            font-size: 13px;
            color: #747474;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .custom-label {
            font-size: 13px;
        }
        .custom-alert {
            justify-content: center;
            align-items: center;
            display: flex;
        }
        @media (max-width: 768px) {
            .login-form {
                max-width: 50%;
            }
        }
        @media (max-width: 576px) {
            .custom-rounded {
                border-radius: 0px;
            }
            .overlay-card {
                border-radius: 0px;
            }
            .navbar-brand img {
                width: 80px;
            }
            .login-form {
                padding: 15px;
                max-width: 100%;
                background-color: rgba(107, 93, 90, 0.6);
                margin-top: 535px;
                border-radius: 0px
            }
           
        }

        .container-fluid {
            --bs-gutter-x: 0rem;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/image/logo_ptpn.png" alt=" " width="120px">
            </a>

            
        </div>
    </nav>
    
    <div class="container-fluid custom-width">
        <img src="assets/image/fotogedung.jpg" class="img-fluid custom-rounded" alt=" " >
        <div class="overlay-card">
            <form class="login-form" action="{{ url('/') }}" method="POST">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger custom-alert">
                    @foreach ($errors->all() as $item)
                       {{$item}}
                    @endforeach
                </div>
                @endif
                <h4 class="text-center">LOGIN TO YOUR ACCOUNT</h4>
                <p class="text-center">Enter your details and start journey with us!</p>
                <div class ="text-field">
                    <div class="mb-1">
                        <label for="username" class="form-label custom-label">Username</label>
                        <input type="text" class="form-control custom-input" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label custom-label">Password</label>
                        <input type="password" class="form-control custom-input" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-light w-100 btn-custom mt-4">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
