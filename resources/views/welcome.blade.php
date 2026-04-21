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

        /* ── Services Grid ──────────────────────────────────────── */
        .services-section {
            position: relative;
            z-index: 10;
            padding: 6rem 4rem 7rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(0, 240, 255, 0.07);
            border: 1px solid rgba(0, 240, 255, 0.2);
            color: var(--accent-cyan);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            margin-bottom: 1.25rem;
        }

        .section-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            line-height: 1.15;
            background: linear-gradient(to right, #ffffff, var(--text-muted));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Static grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.25rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 16px;
            padding: 1.75rem;
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.3s;
            cursor: default;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(0,240,255,0.05), transparent 60%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .service-card:hover {
            border-color: rgba(0, 240, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 240, 255, 0.1);
            transform: translateY(-5px);
        }

        .service-card:hover::before { opacity: 1; }

        .card-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .card-desc {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.65;
            position: relative;
            z-index: 1;
        }

        .card-tag {
            display: inline-block;
            margin-top: 1rem;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.25rem 0.65rem;
            border-radius: 50px;
            position: relative;
            z-index: 1;
        }

        .tag-cyan  { background: rgba(0,240,255,0.1);  color: var(--accent-cyan); }
        .tag-blue  { background: rgba(0,81,255,0.15);  color: #6699ff; }
        .tag-purple{ background: rgba(139,92,246,0.15); color: var(--accent-purple); }
        .tag-pink  { background: rgba(236,72,153,0.15); color: #f472b6; }
        .tag-red   { background: rgba(255,77,109,0.12); color: #ff6b87; }

        @media (max-width: 900px) {
            .services-section { padding: 5rem 2rem 6rem; }
            .services-grid { grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); }
        }

        @media (max-width: 768px) {
            nav {
                padding: 1rem 2rem;
            }
            .nav-links {
                display: none;
            }
            .services-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 480px) {
            .services-grid { grid-template-columns: 1fr; }
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

    <!-- ═══════════════════════════════════════════════════════ SERVICES -->
    <section id="servicios" class="services-section">
        <div class="section-header">
            <div class="section-tag">
                <i data-lucide="layers" style="width:13px;height:13px;"></i>
                Lo que hacemos
            </div>
            <h2 class="section-title">Servicios que impulsan<br>tu crecimiento</h2>
            <p class="section-subtitle">Desde el diseño hasta el despliegue, cubrimos todo el ciclo de vida de tu producto digital.</p>
        </div>

        <div class="services-grid">

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(0,240,255,0.1);"><i data-lucide="globe" style="width:22px;height:22px;color:#00f0ff;"></i></div>
                <p class="card-title">Desarrollo Web</p>
                <p class="card-desc">Sitios y aplicaciones web rápidas, modernas y preparadas para escalar.</p>
                <span class="card-tag tag-cyan">Web</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(0,81,255,0.12);"><i data-lucide="smartphone" style="width:22px;height:22px;color:#6699ff;"></i></div>
                <p class="card-title">Apps Móviles</p>
                <p class="card-desc">Aplicaciones iOS y Android nativas o híbridas con UX de primer nivel.</p>
                <span class="card-tag tag-blue">Mobile</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(139,92,246,0.12);"><i data-lucide="code-2" style="width:22px;height:22px;color:#8b5cf6;"></i></div>
                <p class="card-title">Software a la Medida</p>
                <p class="card-desc">Soluciones únicas diseñadas para adaptarse exactamente a tu proceso de negocio.</p>
                <span class="card-tag tag-purple">Custom</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(236,72,153,0.1);"><i data-lucide="figma" style="width:22px;height:22px;color:#f472b6;"></i></div>
                <p class="card-title">Diseño UI/UX</p>
                <p class="card-desc">Interfaces intuitivas y atractivas centradas en la experiencia real del usuario.</p>
                <span class="card-tag tag-pink">Design</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(0,240,255,0.1);"><i data-lucide="shopping-cart" style="width:22px;height:22px;color:#00f0ff;"></i></div>
                <p class="card-title">E-Commerce</p>
                <p class="card-desc">Tiendas en línea con pasarelas de pago, gestión de inventario y analíticas.</p>
                <span class="card-tag tag-cyan">E-Commerce</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(0,81,255,0.12);"><i data-lucide="zap" style="width:22px;height:22px;color:#6699ff;"></i></div>
                <p class="card-title">APIs &amp; Integraciones</p>
                <p class="card-desc">Conectamos sistemas, servicios y plataformas externas de forma segura y eficiente.</p>
                <span class="card-tag tag-blue">API</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(139,92,246,0.12);"><i data-lucide="cloud" style="width:22px;height:22px;color:#8b5cf6;"></i></div>
                <p class="card-title">Cloud &amp; DevOps</p>
                <p class="card-desc">Infraestructura escalable, pipelines CI/CD y despliegue continuo en la nube.</p>
                <span class="card-tag tag-purple">DevOps</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(255,77,109,0.1);"><i data-lucide="shield" style="width:22px;height:22px;color:#ff6b87;"></i></div>
                <p class="card-title">Ciberseguridad</p>
                <p class="card-desc">Auditorías, pentesting y estrategias de protección para tus activos digitales.</p>
                <span class="card-tag tag-red">Security</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(0,240,255,0.1);"><i data-lucide="bar-chart-2" style="width:22px;height:22px;color:#00f0ff;"></i></div>
                <p class="card-title">Analítica &amp; BI</p>
                <p class="card-desc">Dashboards y reportes en tiempo real para tomar decisiones basadas en datos.</p>
                <span class="card-tag tag-cyan">Analytics</span>
            </div>

            <div class="service-card">
                <div class="card-icon-wrap" style="background:rgba(0,81,255,0.12);"><i data-lucide="cpu" style="width:22px;height:22px;color:#6699ff;"></i></div>
                <p class="card-title">Automatización IA</p>
                <p class="card-desc">Bots inteligentes, flujos automáticos e integración de modelos de IA a tu stack.</p>
                <span class="card-tag tag-blue">AI</span>
            </div>

        </div>
    </section>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
