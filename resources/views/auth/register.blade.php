<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-success text-white">
                        <h3>Register Sistem Gaji</h3>
                    </div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/register-proses" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Register</button>
                        </form>

                        <div>
                            <a href="/login">Sudah punya akun? Login di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>