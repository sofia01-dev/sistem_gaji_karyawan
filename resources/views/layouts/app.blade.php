<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>

        body{
            overflow-x: hidden;
        }

        .sidebar{
            width: 220px;
            height: 100vh;
            position: fixed;
            background-color: #198754;
            padding-top: 20px; 
        }

        .sidebar .nav-link{
            color: white;
            padding: 15px 20px;
        }

        .sidebar .nav-link:hover{
            background-color: rgba(255,255,255,0.2);
        }

        .content{
            margin-left: 220px;
            padding: 20px;
        }

    </style>

</head>

<body>
        <div class="sidebar">

            <h4 class="text-white text-center py-4">Sistem Gaji</h4>                
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link" href="/">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/departemen">Departemen</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/jabatan">Jabatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/karyawan">Karyawan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/absensi">Absesni</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/lembur">Lembur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gaji">Penggajian</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
                </li>
            </ul>
        </div>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>