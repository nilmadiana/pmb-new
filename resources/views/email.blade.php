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
            <h2 class="mb-4">{{ __('Reset Password') }}</h2>
            <div class="card col-md-6 mx-auto">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                        
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <button type="submit">Send Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
