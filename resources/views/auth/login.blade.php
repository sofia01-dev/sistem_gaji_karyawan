<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: #198754;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login Sistem Gaji</h3>
                    </div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/login-proses" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Login</button>
                        </form>

                        <div>
                            <a href="/register">Belum punya akun? Daftar di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>