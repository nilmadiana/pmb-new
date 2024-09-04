<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PMB STAIMA Al-Hikam 2024</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="mb-4">Login PMB STAIMA Al-Hikam 2024</h2>
            <div class="card col-md-6 mx-auto">
                <div class="card-body">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <a href="{{ url('/register') }}">Belum Punya akun? Silahkan Mendaftar</a>
                    <br>
                    {{-- <a href="{{ url('/email') }}">Forgot Your Password?</a> --}}
                    
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
