<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skul.Id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            color: #252f35;
            font-size: 13px;
            min-height: 100vh;
            position: relative;
        }

        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 999;
            transition: transform 0.2s ease;
        }

        .btn-back:hover {
            transform: scale(1.1);
        }

        .login-container {
            max-width: 480px;
            margin: 80px auto;
            padding: 30px;
        }
        
        .text {
            width: auto;
        }

        input {
            height: 60px;
        }

        h1 {
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
        }

        .form-control {
            background-color: #f1f8f7;
            border: none;
            padding-left: 40px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .input-group-text {
            background: none;
            border: none;
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-check-label {
            font-size: 13px;
        }

        .form-check a {
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: #ff3c6a;
            border-color: #ff3c6a;
        }

        .login-btn {
            background: #00FFE1;
            color: white;
            font-weight: 600;
            height: 60px;
        }
    </style>
</head>
<body>

    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="btn-back">
        <img src="{{ url('img/back.png') }}" alt="Back" width="30">
    </a>

    <!-- Login Form Container -->
    
    <div class="login-container">
        <div class="text">
            <h1>Login Mitra</h1>
            <p>Belum memiliki akun? <a href="{{ Route('register.mitra') }}" class="text-danger">Daftar Sekarang</a></p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <div class="mb-3 position-relative">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="email" required>
            </div>
    
            <div class="mb-3 position-relative">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
    
            <div class="mb-3 text-end">
                <a href="#" class="text-danger small-link">Lupa Password?</a>
            </div>
    
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                <label class="form-check-label" for="termsCheck">
                    Dengan login menggunakan nomor atau metode lain, saya setuju dengan
                    <a href="#">Ketentuan Pengguna</a> & <a href="#">Kebijakan Privasi</a>
                </label>
            </div>
    
            <button type="submit" class="btn login-btn w-100">LOGIN</button>
        </form>
</body>
</html>