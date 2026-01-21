@extends('layouts.main')

@section('content')
<style>
    /* Modern Profile Page Styles */
    .profile-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
        color: white;
    }

    .profile-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="hero-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23hero-pattern)"/></svg>');
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 6px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .profile-avatar:hover img {
        transform: scale(1.1);
    }

    .profile-name {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .profile-role {
        font-size: 1.2rem;
        opacity: 0.9;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .profile-stats {
        display: flex;
        gap: 2rem;
        margin-top: 2rem;
    }

    .stat-item {
        text-align: center;
        animation: fadeInUp 0.8s ease-out;
        animation-fill-mode: both;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        display: block;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.8;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Modern Cards */
    .modern-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .modern-card::before {
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

    .modern-card:hover::before {
        transform: scaleX(1);
    }

    .modern-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
    }

    .card-title-modern {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-body-modern {
        padding: 1.5rem;
    }

    /* Skills Section */
    .skill-item {
        margin-bottom: 1rem;
    }

    .skill-name {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #2d3748;
    }

    .skill-bar {
        height: 8px;
        background: #e2e8f0;
        border-radius: 4px;
        overflow: hidden;
    }

    .skill-progress {
        height: 100%;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 4px;
        transition: width 1s ease;
    }

    /* Experience Timeline */
    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #667eea, #764ba2);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
        padding-left: 2rem;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -23px;
        top: 8px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: 3px solid white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    .timeline-title {
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .timeline-period {
        color: #718096;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .timeline-description {
        color: #4a5568;
        line-height: 1.6;
    }

    /* Product Gallery */
    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        height: 180px;
        overflow: hidden;
        position: relative;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-info {
        padding: 1rem;
    }

    .product-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .product-price {
        color: #667eea;
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* Contact Section */
    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        margin-bottom: 0.5rem;
    }

    .contact-item:hover {
        background: rgba(102, 126, 234, 0.05);
        transform: translateX(5px);
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-size: 1.1rem;
    }

    .contact-text {
        flex: 1;
    }

    .contact-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .contact-value {
        color: #718096;
        font-size: 0.9rem;
    }

    /* Action Buttons */
    .btn-modern-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-modern-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-modern-outline {
        background: transparent;
        border: 2px solid #667eea;
        color: #667eea;
        padding: 10px 22px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-modern-outline:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }

    .btn-whatsapp {
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        border: none;
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        color: white;
    }

    /* Rating Stars */
    .rating-stars {
        color: #ffd700;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .rating-text {
        color: #718096;
        font-size: 0.9rem;
    }

    /* Animations */
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

    /* Responsive */
    @media (max-width: 768px) {
        .profile-hero {
            padding: 40px 0;
            text-align: center;
        }

        .profile-name {
            font-size: 2rem;
        }

        .profile-stats {
            justify-content: center;
            gap: 1.5rem;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
        }
    }
</style>

<!-- Profile Hero Section -->
<section class="profile-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                <div class="profile-avatar mx-auto">
                    <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name ?? 'Bintang').'&background=667eea&color=fff&size=150' }}"
                         alt="Avatar">
                </div>
            </div>
            <div class="col-lg-8">
                <h1 class="profile-name">{{ $user->name ?? 'Bintang' }}</h1>
                <p class="profile-role">{{ $user->role ?? 'Mahasiswa & Penjual Dimsum Mentai' }}</p>

                <div class="d-flex flex-wrap gap-3 mb-3">
                    <a href="{{ url('/berita') }}" class="btn btn-modern-outline">
                        <i class="fas fa-shopping-bag me-2"></i>Lihat Produk
                    </a>
                    <a href="{{ $user->whatsapp ?? 'https://wa.me/6281234567890' }}" class="btn btn-whatsapp">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi WhatsApp
                    </a>
                    <a href="{{ url('/profile/edit') }}" class="btn btn-light">
                        <i class="fas fa-edit me-2"></i>Edit Profil
                    </a>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-number">4.2</span>
                        <span class="stat-label">Rating</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">120</span>
                        <span class="stat-label">Ulasan</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $user->joined_at ?? '2023' }}</span>
                        <span class="stat-label">Bergabung</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- About Section -->
                <div class="modern-card mb-4">
                    <div class="card-header-modern">
                        <h5 class="card-title-modern">
                            <i class="fas fa-user text-primary me-2"></i>Tentang
                        </h5>
                    </div>
                    <div class="card-body-modern">
                        <p class="text-muted mb-4">
                            {{ $user->bio ?? 'Halo, saya Bintang. Saya menjual Dimsum Mentai dengan resep rumahan, menggunakan bahan segar dan saus mentai kreasi sendiri. Melayani pesanan untuk take away, delivery, dan event kecil.' }}
                        </p>

                        <!-- Experience Timeline -->
                        <h6 class="mb-3 fw-bold">
                            <i class="fas fa-briefcase text-primary me-2"></i>Pengalaman & Peran
                        </h6>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h6 class="timeline-title">Penjual & Pengelola Produksi</h6>
                                <div class="timeline-period">2023 — Sekarang</div>
                                <p class="timeline-description">Mengelola produksi harian, pengemasan, & pesanan online dengan fokus pada kualitas dan kepuasan pelanggan.</p>
                            </div>
                            <div class="timeline-item">
                                <h6 class="timeline-title">Pemasaran & Layanan Pelanggan</h6>
                                <div class="timeline-period">2023 — Sekarang</div>
                                <p class="timeline-description">Menangani promosi media sosial, diskon promo, dan komunikasi pelanggan untuk membangun brand awareness.</p>
                            </div>
                        </div>

                        <!-- Skills -->
                        <h6 class="mb-3 fw-bold mt-4">
                            <i class="fas fa-star text-primary me-2"></i>Keahlian
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="skill-item">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="skill-name">Kuliner</span>
                                        <span class="text-muted small">95%</span>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="skill-progress" style="width: 95%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="skill-item">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="skill-name">Manajemen Dapur</span>
                                        <span class="text-muted small">90%</span>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="skill-progress" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="skill-item">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="skill-name">Pelayanan Pelanggan</span>
                                        <span class="text-muted small">88%</span>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="skill-progress" style="width: 88%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="skill-item">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="skill-name">Fotografi Produk</span>
                                        <span class="text-muted small">85%</span>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="skill-progress" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Education -->
                        <h6 class="mb-2 fw-bold mt-4">
                            <i class="fas fa-graduation-cap text-primary me-2"></i>Pendidikan
                        </h6>
                        <p class="mb-0 text-muted">{{ $user->education ?? 'S1 Teknologi Informasi — Universitas Contoh (2022)' }}</p>
                    </div>
                </div>

                <!-- Featured Products -->
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h5 class="card-title-modern">
                            <i class="fas fa-star text-primary me-2"></i>Produk Unggulan
                        </h5>
                    </div>
                    <div class="card-body-modern">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="{{ asset('images/dimsum_ayam.jpg') }}"
                                             alt="Dimsum Ayam"
                                             onerror="this.src='https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=60'">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-title">Dimsum Ayam Mentai</div>
                                        <div class="product-price">Rp 20.000 / box</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="{{ asset('images/dimsum_udang.jpg') }}"
                                             alt="Dimsum Udang"
                                             onerror="this.src='https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=60'">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-title">Dimsum Udang Mentai</div>
                                        <div class="product-price">Rp 25.000 / box</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="{{ asset('images/promo.jpg') }}"
                                             alt="Promo"
                                             onerror="this.src='https://images.unsplash.com/photo-1543352634-0b9a6960f9f4?auto=format&fit=crop&w=400&q=60'">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-title">Paket Hemat 5+1</div>
                                        <div class="product-price">Diskon & Gratis 1 box</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ url('/berita') }}" class="btn btn-modern-primary">
                                <i class="fas fa-arrow-right me-2"></i>Lihat Semua Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Details -->
                <div class="modern-card mb-4">
                    <div class="card-header-modern">
                        <h6 class="card-title-modern">
                            <i class="fas fa-address-book text-primary me-2"></i>Detail Kontak
                        </h6>
                    </div>
                    <div class="card-body-modern">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <div class="contact-label">Email</div>
                                <div class="contact-value">{{ $user->email ?? 'masbinsya@gmail.com' }}</div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-text">
                                <div class="contact-label">WhatsApp</div>
                                <div class="contact-value">{{ $user->phone ?? '+62 812-3456-7890' }}</div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <div class="contact-label">Alamat</div>
                                <div class="contact-value">{{ $user->address ?? 'Jl. Amarta No.4 Purin-Kendal, Jawa Tengah' }}</div>
                            </div>
                        </div>

                        <hr>

                        <h6 class="mb-2">
                            <i class="fas fa-clock text-primary me-2"></i>Jam Operasional
                        </h6>
                        <p class="mb-0 small text-muted">Senin - Minggu: 09:00 — 21:00</p>

                        <hr>

                        <h6 class="mb-2">
                            <i class="fas fa-star text-primary me-2"></i>Rating & Ulasan
                        </h6>
                        <div class="rating-stars">★★★★☆</div>
                        <div class="rating-text">4.2 dari 120 ulasan</div>
                    </div>
                </div>

                <!-- Social & Actions -->
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h6 class="card-title-modern">
                            <i class="fas fa-share-alt text-primary me-2"></i>Sosial & Pemesanan
                        </h6>
                    </div>
                    <div class="card-body-modern">
                        <a href="{{ $user->instagram ?? '#' }}" class="btn btn-modern-outline w-100 mb-3">
                            <i class="fab fa-instagram me-2"></i>Follow Instagram
                        </a>
                        <a href="{{ $user->whatsapp ?? 'https://wa.me/6281234567890' }}" class="btn btn-whatsapp w-100">
                            <i class="fab fa-whatsapp me-2"></i>Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection