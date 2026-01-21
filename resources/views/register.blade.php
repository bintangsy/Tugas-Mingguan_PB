<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Laravel</title>
    <style>
        /* Import modern font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 420px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            backdrop-filter: blur(10px);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            color: #667eea;
        }

        .title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 16px;
            color: #718096;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 400;
            transition: all 0.3s ease;
            background: #ffffff;
            outline: none;
        }

        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: #ffffff;
        }

        .form-input::placeholder {
            color: #a0aec0;
        }

        .form-button {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 24px;
        }

        .form-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .form-button:active {
            transform: translateY(0);
        }

        .login-section {
            text-align: center;
        }

        .login-text {
            font-size: 14px;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .login-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #764ba2;
        }

        /* Error message styling */
        .error-message {
            background: #fed7d7;
            border: 1px solid #feb2b2;
            color: #c53030;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .register-card {
                padding: 30px 24px;
            }

            .title {
                font-size: 24px;
            }

            .form-input {
                padding: 14px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card">
            <div class="logo-section">
                <svg class="logo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <h1 class="title">Create Account</h1>
                <p class="subtitle">Join us today</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-input"
                        placeholder="Full name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="form-input"
                        placeholder="Email address"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="form-input"
                        placeholder="Password"
                        required
                    >
                </div>

                <div class="form-group">
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="form-input"
                        placeholder="Confirm password"
                        required
                    >
                </div>

                <button type="submit" class="form-button">
                    Create Account
                </button>

                @if (Route::has('login'))
                    <div class="login-section">
                        <p class="login-text">Already have an account?</p>
                        <a href="{{ route('login') }}" class="login-link">
                            Sign in here
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>