<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISA - Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9; /* Fondo claro para una lectura cómoda */
            color: #333; /* Texto oscuro para contraste */
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4A90E2; /* Azul suave */
            border-color: #4A90E2;
        }
        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
        }
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #4A90E2;
            text-align: center;
        }
        .form-control-custom {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        .form-control-custom:focus {
            border-color: #4A90E2;
            outline: none;
            box-shadow: 0 0 4px rgba(74, 144, 226, 0.3);
        }
        label {
            font-weight: 600;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="max-width: 400px; width: 100%;">
            <div class="logo mb-3">SISA</div>
            <h4 class="text-center mb-4">Inicio de Sesión</h4>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email">Correo</label>
                    <input id="email" class="form-control form-control-custom" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Password -->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input id="password" class="form-control form-control-custom" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Remember Me -->
                <div class="form-check mb-4">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Recordarme</label>
                </div>
        
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

