<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skul.Id</title>

  <!-- Font & Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    header img {
      margin-left: 2rem;
    }

    .container-fluid {
      background: linear-gradient(to right, #08BADC, #B2EEFF);
      height: 330px;
      padding: 5rem 10%;
      border-radius: 0 0 20px 20px;
    }

    .profile-img {
      width: 170px;
      height: 170px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
    }

    .text p {
      font-size: 15px;
      padding: 2px 0;
    }

    #fitur {
      max-width: 1000px;
      margin: 2rem auto;
    }

    .fitur-box {
      border-radius: 15px;
      padding: 1.25rem;
      min-height: 160px;
      transition: transform 0.2s ease;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .fitur-box:hover {
      transform: scale(1.03);
    }

    .fitur-title {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .fitur-box p {
      font-size: 0.95rem;
      font-weight: 400;
    }

    .sertifikasi {
      background-color: #DAF2FF;
    }

    .sertifikasi .fitur-title {
      color: #196BE7;
    }

    .sertifikasi p {
      color: #428EFF;
    }

    .loker {
      background-color: #9BFFB9;
    }

    .loker .fitur-title {
      color: #00924E;
    }

    .loker p {
      color: #00C569;
    }

    .pelatihan {
      background-color: #81F082;
    }

    .pelatihan .fitur-title {
      color: #007B1F;
    }

    .pelatihan p {
      color: #00A92A;
    }

    .alumni {
      background-color: #F6C371;
    }

    .alumni .fitur-title {
      color: #91641B;
    }

    .alumni p {
      color: #B98128;
    }

    .magang {
      background-color: #D9D9D9;
    }

    .magang .fitur-title {
      color: #7D7D7D;
    }

    .magang p {
      color: #8E8E8E;
    }

    a.card-role {
      text-decoration: none;
    }
  </style>
</head>
<body>

  <header class="d-flex p-2">
    <img src="{{ url('img/logo.png') }}" alt="icon" width="7.5%" />
  </header>

  <div class="container-fluid">
    <div class="profile-header text-white d-flex align-items-center gap-4">
      <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile Image" class="profile-img" />
      <div class="text">
        <h1>Halo, {{ Auth::user()->name }}</h1>
        <p class="mb-0">Alumni, SMKN 8 Makassar</p>
        <p class="mb-0">feline@skul.id</p>
        <p class="mb-0">0852-2584-5253</p>
      </div>
    </div>
  </div>
  

  <div class="container my-5">
    <div id="fitur">
      <h5 class="mb-4 text-primary">Fitur Utama :</h5>

      <div class="row gx-4 gy-4 mb-4">
        <div class="col-md-4">
          <a href="{{ route('mitra.sertifikasi') }}" class="card-role">
            <div class="fitur-box sertifikasi h-100">
              <div class="fitur-title">Sertifikasi</div>
              <p>Meningkatkan anda mencantumkan yang anda butuhkan</p>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="{{ route('mitra.loker') }}" class="card-role">
            <div class="fitur-box loker h-100">
              <div class="fitur-title">Loker</div>
              <p>Temukan pekerjaan yang anda impikan</p>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="{{ route('mitra.pelatihan') }}" class="card-role">
            <div class="fitur-box pelatihan h-100">
              <div class="fitur-title">Pelatihan</div>
              <p>Ikuti pelatihan untuk meningkatkan skill anda</p>
            </div>
          </a>
        </div>
      </div>
      </div>
    </div>
  </div>
</body>
</html>