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
            <h2 class="mb-4"><div class="card-header">{{ __('Reset Password') }}</div></h2>
            <div class="card col-md-6 mx-auto">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                        
                            <input type="hidden" name="token" value="{{ $token }}">
                        
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autofocus>
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" required>
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div>
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required>
                            </div>
                        
                            <button type="submit">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
