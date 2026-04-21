<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Super Admin | DEVLOOM</title>
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
            --nav-bg: rgba(11, 15, 25, 0.85);
            --border-glow: rgba(0, 240, 255, 0.2);
            --card-bg: rgba(255, 255, 255, 0.03);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            background-image:
                radial-gradient(circle at 15% 50%, rgba(0, 81, 255, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 85% 30%, rgba(0, 240, 255, 0.08) 0%, transparent 50%);
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
        }

        /* Topbar */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--nav-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 2px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border-glow);
            border-radius: 50px;
            padding: 0.45rem 1rem;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .user-badge span {
            color: var(--text-main);
            font-weight: 600;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 77, 109, 0.1);
            border: 1px solid rgba(255, 77, 109, 0.3);
            color: #ff4d6d;
            padding: 0.5rem 1.1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: rgba(255, 77, 109, 0.2);
            box-shadow: 0 0 15px rgba(255, 77, 109, 0.2);
        }

        /* Main content */
        .main {
            position: relative;
            z-index: 1;
            padding: 2.5rem 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .page-header p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Status badge */
        .status-online {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(0, 240, 100, 0.1);
            border: 1px solid rgba(0, 240, 100, 0.3);
            color: #00f064;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.75rem;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #00f064;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        /* Cards grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border-glow);
            border-radius: 14px;
            padding: 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 240, 255, 0.08);
        }

        .stat-card-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-card-value {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Info panel */
        .info-panel {
            background: var(--card-bg);
            border: 1px solid var(--border-glow);
            border-radius: 14px;
            padding: 1.75rem;
        }

        .info-panel h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            color: var(--text-muted);
            text-transform: uppercase;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            font-size: 0.9rem;
        }

        .info-row:last-child { border-bottom: none; }

        .info-row .key { color: var(--text-muted); }
        .info-row .value { font-weight: 600; }

        .badge-super {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(0, 81, 255, 0.2));
            border: 1px solid rgba(139, 92, 246, 0.4);
            color: var(--accent-purple);
            padding: 0.2rem 0.7rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="grid-overlay"></div>

    <header class="topbar">
        <span class="topbar-brand">DEVLOOM &mdash; PANEL</span>
        <div class="topbar-right">
            <div class="user-badge">
                <i data-lucide="user" style="width:15px;height:15px;"></i>
                <span>{{ $user->name }}</span>
            </div>
            <form method="POST" action="{{ route('superadmin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <i data-lucide="log-out" style="width:15px;height:15px;"></i>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </header>

    <main class="main">
        <div class="page-header">
            <h1>
                Bienvenido, {{ $user->name }}
                <span class="status-online">
                    <span class="dot"></span>
                    Activo
                </span>
            </h1>
            <p>Panel de control exclusivo para superadministradores de DEVLOOM</p>
        </div>

        <div class="cards-grid">
            <div class="stat-card">
                <div class="stat-card-label">
                    <i data-lucide="shield" style="width:14px;height:14px;color:var(--accent-cyan);"></i>
                    Nivel de acceso
                </div>
                <div class="stat-card-value" style="font-size:1.1rem;padding-top:4px;">
                    <span class="badge-super">SUPERADMIN</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">
                    <i data-lucide="calendar" style="width:14px;height:14px;color:var(--accent-cyan);"></i>
                    Sesión iniciada
                </div>
                <div class="stat-card-value" style="font-size:1rem;-webkit-text-fill-color:var(--text-main);font-weight:400;">
                    {{ now()->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>

        <div class="info-panel">
            <h2>
                <i data-lucide="user-check" style="width:16px;height:16px;color:var(--accent-cyan);"></i>
                Información de cuenta
            </h2>
            <div class="info-row">
                <span class="key">Nombre</span>
                <span class="value">{{ $user->name }}</span>
            </div>
            <div class="info-row">
                <span class="key">Correo</span>
                <span class="value">{{ $user->email }}</span>
            </div>
            <div class="info-row">
                <span class="key">ID de usuario</span>
                <span class="value">#{{ $user->id }}</span>
            </div>
            <div class="info-row">
                <span class="key">Cuenta creada</span>
                <span class="value">{{ $user->created_at->format('d/m/Y') }}</span>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
