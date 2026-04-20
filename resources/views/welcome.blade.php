<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVLOOM | Services, Programming, Innovation</title>
    <!-- Google Fonts: Outfit and Montserrat for modern tech look -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --bg-color: #0b0f19; /* Deep dark blue/black */
            --accent-cyan: #00f0ff;
            --accent-blue: #0051ff;
            --accent-purple: #8b5cf6;
            --text-main: #ffffff;
            --text-muted: #a0aabf;
            --nav-bg: rgba(11, 15, 25, 0.7);
            --border-glow: rgba(0, 240, 255, 0.2);
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
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(0, 81, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 85% 30%, rgba(0, 240, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 80%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
        }

        /* Tech Grid Background Overlay */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: 
                linear-gradient(to right, rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: -1;
            mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
            -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--nav-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0;
            text-decoration: none;
        }

        .logo-text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: -15px; /* Pull text closer to the image */
        }

        .logo-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            color: #f0fbff; /* Ice white / pale cyan */
            line-height: 1.1;
        }

        .logo-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.8rem;
            font-weight: 400;
            letter-spacing: 1.8px;
            color: #a0aabf;
            margin-top: 2px;
        }

        .logo-icon-container {
            position: relative;
            height: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-icon {
            height: 100%;
            width: auto;
            object-fit: contain;
            position: relative;
            z-index: 1;
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-main);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-blue));
            transition: width 0.3s ease;
            box-shadow: 0 0 10px var(--accent-cyan);
        }

        .nav-links a:hover {
            color: var(--accent-cyan);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .btn-contact {
            background: linear-gradient(135deg, rgba(0, 81, 255, 0.2), rgba(0, 240, 255, 0.2));
            border: 1px solid var(--border-glow);
            color: var(--text-main);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-contact:hover::before {
            left: 100%;
        }

        .btn-contact:hover {
            background: linear-gradient(135deg, rgba(0, 81, 255, 0.4), rgba(0, 240, 255, 0.4));
            border-color: var(--accent-cyan);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Hero placeholder */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        .hero h1 {
            font-size: 5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #fff, var(--text-muted));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .highlight {
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue), var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }

        @media (max-width: 768px) {
            nav {
                padding: 1rem 2rem;
            }
            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="grid-overlay"></div>

    <nav>
        <a href="#" class="logo">
            <div class="logo-icon-container">
                <img src="/Gemini_Generated_Image_kb1lcqkb1lcqkb1l.png" alt="Devloom Logo" class="logo-icon">
            </div>
            <div class="logo-text-container">
                <span class="logo-title">DEVLOOM</span>
                <span class="logo-subtitle">SERVICES | PROGRAMMING | INNOVATION</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#portafolio">Portafolio</a></li>
            <li><a href="#productos">Productos</a></li>
        </ul>

        <div class="nav-actions">
            <a href="#contacto" class="btn-contact">
                <span>Contáctanos</span>
                <i data-lucide="arrow-right" size="18"></i>
            </a>
        </div>
    </nav>

    <section class="hero">
        <h1>INNOVAMOS TU <span class="highlight">FUTURO</span></h1>
        <p style="color: var(--text-muted); font-size: 1.2rem; max-width: 600px; margin-top: 1rem;">
            Desarrollo de software a la medida, diseño moderno y soluciones tecnológicas para escalar tu negocio.
        </p>
    </section>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
