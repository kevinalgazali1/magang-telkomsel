<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Skul.Id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            color: #252f35;
            font-size: 13px;
            background-color: #fff;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 999;
        }

        .container-box {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 100px auto;
            padding: 30px;
            position: relative;
        }

        .logo-skulid {
            position: absolute;
            top: 15px;
            left: 20px;
            height: 40px;
        }

        .inner-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .icon-besar {
            flex: 1;
            min-width: 250px;
            text-align: center;
        }

        .icon-besar img {
            max-width: 100%;
            height: auto;
        }

        .login-form {
            flex: 1;
            min-width: 250px;
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

        @media (max-width: 768px) {
            .inner-content {
                flex-direction: column;
                text-align: center;
            }

            .logo-skulid {
                position: static;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Tombol Back -->
    <a href="{{ url()->previous() }}" class="btn-back">
        <img src="{{ url('img/back.png') }}" alt="Back" width="30" />
    </a>

    <!-- Kontainer Utama -->
    <div class="container-box">

        <!-- Logo Skul.id -->
        <img src="{{ url('img/logo.png') }}" alt="Logo Skul.id" class="logo-skulid" />

        @if ($errors->any())
            <div class="alert alert-danger" id="error-message">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('login_error'))
            <div class="alert alert-danger">
                {{ session('login_error') }}
            </div>
        @endif


        <div class="inner-content">

            <!-- Icon besar -->
            <div class="icon-besar">
                <img src="{{ url('img/login-mitra.png') }}" alt="Icon Besar" style="width: 350px;">
            </div>

            <!-- Form Login -->
            <div class="login-form">
                <div class="text">
                    <h1>Login Alumni / Siswa</h1>
                    <p>Belum memiliki akun? <a href="{{ route('register.alumni') }}" class="text-danger">Daftar
                            Sekarang</a></p>
                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="login_type" value="alumnisiswa">
                    <!-- Input Nomor HP -->
                    <div class="mb-3 position-relative">
                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Nomor HP Telkomsel" name="identifier"
                            required>
                        <div class="text-danger mt-1 small" id="phoneError"></div>
                    </div>

                    <!-- Input Password -->
                    <div class="mb-3 position-relative">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" placeholder="Password" class="form-control" name="password"
                            minlength="8" required>
                        <div class="text-danger mt-1 small" id="passwordError"></div>
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
            </div>
        </div>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            const phoneInput = document.querySelector('input[name="identifier"]');
            const passwordInput = document.querySelector('input[name="password"]');

            const phoneError = document.getElementById("phoneError");
            const passwordError = document.getElementById("passwordError");

            // Reset pesan error
            phoneError.textContent = "";
            passwordError.textContent = "";

            const phonePattern = /^08(11|12|13|21|22|51|52|53)[0-9]{5,8}$/;
            const passwordValue = passwordInput.value;
            const phoneValue = phoneInput.value;

            let hasError = false;

            if (!phonePattern.test(phoneValue)) {
                phoneError.textContent = "Gunakan nomor Telkomsel yang valid (0811, 0812, dst).";
                hasError = true;
            }

            if (passwordValue.length < 8) {
                passwordError.textContent = "Password minimal 8 karakter.";
                hasError = true;
            }

            if (hasError) {
                e.preventDefault(); // Mencegah form dikirim
            }
        });

        // Hilangkan alert server-side setelah 3 detik
        window.addEventListener("DOMContentLoaded", function() {
            const alerts = document.querySelectorAll(".alert");
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                }, 3000);
            });
        });
    </script>
</body>

</html>
