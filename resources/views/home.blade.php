
@extends('layouts.main')

@section('content')
<style>
    /* Modern Home Page Styles */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 80vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        color: white;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="50" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        animation: fadeInUp 1s ease-out;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e8f4fd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem);
        margin-bottom: 2rem;
        opacity: 0.9;
        font-weight: 300;
        line-height: 1.6;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
        background: linear-gradient(135deg, #ff5252 0%, #d84315 100%);
    }

    .btn-hero-secondary {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-3px);
    }

    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 1;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }

    .shape:nth-child(1) {
        width: 80px;
        height: 80px;
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .shape:nth-child(2) {
        width: 60px;
        height: 60px;
        top: 20%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape:nth-child(3) {
        width: 100px;
        height: 100px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .shape:nth-child(4) {
        width: 40px;
        height: 40px;
        bottom: 10%;
        right: 20%;
        animation-delay: 1s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Features Section */
    .features-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
    }

    .feature-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 1px solid rgba(255,255,255,0.8);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
        animation-fill-mode: both;
    }

    .feature-card:nth-child(1) { animation-delay: 0.2s; }
    .feature-card:nth-child(2) { animation-delay: 0.4s; }
    .feature-card:nth-child(3) { animation-delay: 0.6s; }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .feature-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .feature-description {
        color: #718096;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 0;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="stats-pattern" width="50" height="50" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23stats-pattern)"/></svg>');
    }

    .stat-item {
        text-align: center;
        position: relative;
        z-index: 2;
        animation: fadeInUp 0.8s ease-out;
        animation-fill-mode: both;
    }

    .stat-number {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .stat-label {
        font-size: 1rem;
        font-weight: 500;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* CTA Section */
    .cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        text-align: center;
    }

    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        animation: fadeInUp 1s ease-out;
    }

    .cta-title {
        font-size: clamp(1.5rem, 3vw, 2.5rem);
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
    }

    .cta-description {
        font-size: 1.1rem;
        color: #718096;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .btn-cta {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        text-decoration: none;
        display: inline-block;
    }

    .btn-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    /* Footer */
    .modern-footer {
        background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
        color: white;
        padding: 40px 0 20px;
        text-align: center;
    }

    .footer-content {
        animation: fadeInUp 1s ease-out;
    }

    .footer-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #e8f4fd;
    }

    .footer-text {
        opacity: 0.8;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 70vh;
            text-align: center;
        }

        .hero-buttons {
            justify-content: center;
        }

        .feature-card {
            margin-bottom: 2rem;
        }

        .stats-section {
            padding: 40px 0;
        }

        .stat-item {
            margin-bottom: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="hero-title">Selamat Datang di StarDust Page</h1>
                    <p class="hero-subtitle">
                        Platform modern untuk pembelajaran dan pengembangan teknologi informasi.
                        Temukan berbagai fitur menarik yang akan membantu perjalanan Anda di dunia digital.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ url('/profile') }}" class="btn-hero-primary">
                            <i class="fas fa-user me-2"></i>Eksplorasi Profile
                        </a>
                        <a href="{{ url('/berita') }}" class="btn-hero-secondary">
                            <i class="fas fa-newspaper me-2"></i>Baca Berita
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="hero-content text-center">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=400&q=60"
                         alt="Welcome" class="img-fluid rounded-3 shadow-lg"
                         style="max-width: 300px; border: 4px solid rgba(255,255,255,0.2);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="feature-title">Ringkas & Modern</h3>
                    <p class="feature-description">
                        Tata letak yang bersih dan modern untuk memudahkan navigasi dan memberikan pengalaman pengguna yang optimal.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Fully Responsive</h3>
                    <p class="feature-description">
                        Desain yang bekerja sempurna di semua perangkat, dari desktop hingga smartphone dengan pengalaman yang konsisten.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="feature-title">Mudah Dikembangkan</h3>
                    <p class="feature-description">
                        Struktur kode yang bersih dan terorganisir memudahkan pengembangan fitur baru dan maintenance di masa depan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number">2025</div>
                    <div class="stat-label">Tahun</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Responsif</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Akses</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number">∞</div>
                    <div class="stat-label">Potensi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Siap Memulai Perjalanan Anda?</h2>
            <p class="cta-description">
                Jelajahi berbagai fitur menarik yang telah kami siapkan untuk membantu Anda dalam dunia teknologi informasi.
            </p>
            <a href="{{ url('/contact') }}" class="btn-cta">
                <i class="fas fa-envelope me-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="modern-footer">
    <div class="container">
        <div class="footer-content">
            <h3 class="footer-title">
                <i class="fas fa-star me-2"></i>Bintang TI
            </h3>
            <p class="footer-text">
                Teknologi Informasi • 2025<br>
                Platform pembelajaran modern untuk masa depan digital
            </p>
        </div>
    </div>
</footer>
@endsection