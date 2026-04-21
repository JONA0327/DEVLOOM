<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido | DEVLOOM</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --bg-color: #0b0f19;
            --accent-cyan: #00f0ff;
            --accent-blue: #0051ff;
            --accent-purple: #8b5cf6;
            --text-main: #ffffff;
            --text-muted: #a0aabf;
            --border-glow: rgba(0, 240, 255, 0.2);
            --error: #ff4d6d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image:
                radial-gradient(circle at 15% 50%, rgba(0, 81, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 85% 30%, rgba(0, 240, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 80%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
        }

        .grid-overlay {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 0;
            mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
            -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 1rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-glow);
            border-radius: 20px;
            padding: 2.5rem 2.5rem 2rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow:
                0 0 40px rgba(0, 240, 255, 0.05),
                0 20px 60px rgba(0, 0, 0, 0.4);
        }

        .lock-icon {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .lock-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 81, 255, 0.2), rgba(0, 240, 255, 0.2));
            border: 1px solid var(--border-glow);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.15);
        }

        .login-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            text-align: center;
            letter-spacing: 1.5px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.4rem;
        }

        .login-subtitle {
            text-align: center;
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 2rem;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 0.85rem 1rem 0.85rem 2.75rem;
            color: var(--text-main);
            font-size: 0.95rem;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
        }

        .form-input:focus {
            border-color: rgba(0, 240, 255, 0.4);
            box-shadow: 0 0 0 3px rgba(0, 240, 255, 0.08);
        }

        .form-input::placeholder {
            color: rgba(160, 170, 191, 0.4);
        }

        .form-input.is-error {
            border-color: rgba(255, 77, 109, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 77, 109, 0.08);
        }

        .error-message {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 1.5rem;
        }

        .remember-row input[type="checkbox"] {
            accent-color: var(--accent-cyan);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .remember-row label {
            color: var(--text-muted);
            font-size: 0.85rem;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
            border: none;
            border-radius: 10px;
            color: #0b0f19;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 240, 255, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin: 1.75rem 0 1.25rem;
        }

        .footer-text {
            text-align: center;
            font-size: 0.75rem;
            color: rgba(160, 170, 191, 0.4);
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="grid-overlay"></div>

    <div class="login-wrapper">
        <div class="login-card">

            <div class="lock-icon">
                <div class="lock-circle">
                    <i data-lucide="shield-check" style="color: var(--accent-cyan); width: 28px; height: 28px;"></i>
                </div>
            </div>

            <h1 class="login-title">ACCESO RESTRINGIDO</h1>
            <p class="login-subtitle">Panel de administración DEVLOOM</p>

            <form method="POST" action="{{ route('superadmin.login.store') }}" autocomplete="off">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">Correo electrónico</label>
                    <div class="input-wrapper">
                        <i data-lucide="mail" class="input-icon" style="width:16px;height:16px;"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                            value="{{ old('email') }}"
                            placeholder="admin@devloom.com"
                            required
                            autofocus
                        >
                    </div>
                    @error('email')
                        <p class="error-message">
                            <i data-lucide="alert-circle" style="width:13px;height:13px;"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <div class="input-wrapper">
                        <i data-lucide="lock" class="input-icon" style="width:16px;height:16px;"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="••••••••"
                            required
                        >
                    </div>
                </div>

                <div class="remember-row">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Mantener sesión iniciada</label>
                </div>

                <button type="submit" class="btn-login">
                    Ingresar al panel
                </button>
            </form>

            <hr class="divider">
            <p class="footer-text">DEVLOOM &copy; {{ date('Y') }} &mdash; Acceso solo para administradores autorizados</p>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
