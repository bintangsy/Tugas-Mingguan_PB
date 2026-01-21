@extends('layouts.main')

@section('content')
<style>
    /* Modern News Page Styles */
    .news-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
        color: white;
        margin-bottom: 60px;
    }

    .news-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="news-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23news-pattern)"/></svg>');
    }

    .news-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .news-hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e8f4fd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .news-hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem);
        opacity: 0.9;
        font-weight: 300;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Search and Filter Section */
    .news-controls {
        background: white;
        padding: 30px 0;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }

    .search-box {
        position: relative;
        max-width: 500px;
        margin: 0 auto;
    }

    .search-input {
        width: 100%;
        padding: 15px 50px 15px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .search-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .filter-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .filter-btn {
        background: transparent;
        border: 2px solid #e2e8f0;
        color: #718096;
        padding: 8px 20px;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    /* Featured Article */
    .featured-article {
        margin-bottom: 60px;
    }

    .featured-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
        transition: all 0.3s ease;
    }

    .featured-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 80px rgba(0,0,0,0.15);
    }

    .featured-image {
        height: 300px;
        overflow: hidden;
        position: relative;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .featured-card:hover .featured-image img {
        transform: scale(1.05);
    }

    .featured-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .featured-content {
        padding: 2rem;
    }

    .featured-title {
        font-size: 2rem;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .featured-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        color: #718096;
    }

    .featured-excerpt {
        font-size: 1.1rem;
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .featured-read-more {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .featured-read-more:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    /* News Grid */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .news-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
        transition: all 0.3s ease;
        position: relative;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    .news-image {
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-image img {
        transform: scale(1.1);
    }

    .news-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(102, 126, 234, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .news-content {
        padding: 1.5rem;
    }

    .news-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.75rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-title:hover {
        color: #667eea;
    }

    .news-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
        font-size: 0.85rem;
        color: #718096;
    }

    .news-author {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .news-date {
        color: #a0aec0;
    }

    .news-excerpt {
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-read-more {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .news-read-more:hover {
        color: #764ba2;
        text-decoration: none;
    }

    .news-read-more i {
        margin-left: 5px;
        transition: transform 0.3s ease;
    }

    .news-read-more:hover i {
        transform: translateX(3px);
    }

    /* Sidebar */
    .news-sidebar {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
        height: fit-content;
        position: sticky;
        top: 100px;
    }

    .sidebar-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .trending-item {
        display: flex;
        gap: 15px;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .trending-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .trending-number {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .trending-content h6 {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.25rem;
        line-height: 1.3;
    }

    .trending-content small {
        color: #718096;
        font-size: 0.8rem;
    }

    /* Pagination */
    .news-pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 60px;
    }

    .pagination-btn {
        background: white;
        border: 2px solid #e2e8f0;
        color: #718096;
        padding: 12px 18px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination-btn:hover,
    .pagination-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
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

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out;
        animation-fill-mode: both;
    }

    .fade-in-up:nth-child(1) { animation-delay: 0.1s; }
    .fade-in-up:nth-child(2) { animation-delay: 0.2s; }
    .fade-in-up:nth-child(3) { animation-delay: 0.3s; }
    .fade-in-up:nth-child(4) { animation-delay: 0.4s; }
    .fade-in-up:nth-child(5) { animation-delay: 0.5s; }
    .fade-in-up:nth-child(6) { animation-delay: 0.6s; }

    /* Responsive */
    @media (max-width: 768px) {
        .news-hero {
            padding: 60px 0;
        }

        .news-hero-title {
            font-size: 2.5rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .featured-content {
            padding: 1.5rem;
        }

        .featured-title {
            font-size: 1.5rem;
        }

        .filter-buttons {
            justify-content: flex-start;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .filter-btn {
            white-space: nowrap;
        }

        .news-sidebar {
            position: static;
            margin-top: 40px;
        }
    }
</style>

<!-- News Hero Section -->
<section class="news-hero">
    <div class="container">
        <div class="news-hero-content">
            <h1 class="news-hero-title">Berita & Artikel</h1>
            <p class="news-hero-subtitle">
                Temukan berita terbaru, artikel menarik, dan informasi terkini seputar teknologi, bisnis, dan inovasi.
            </p>
        </div>
    </div>
</section>

<!-- Search and Filter Controls -->
<section class="news-controls">
    <div class="container">
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Cari berita...">
            <button class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="filter-buttons">
            <button class="filter-btn active">Semua</button>
            <button class="filter-btn">Teknologi</button>
            <button class="filter-btn">Bisnis</button>
            <button class="filter-btn">Inovasi</button>
            <button class="filter-btn">Tutorial</button>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Featured Article -->
            @if(count($beritas) > 0)
            <div class="featured-article">
                <div class="featured-card">
                    <div class="featured-image">
                        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80"
                             alt="{{ $beritas[0]['judul'] }}">
                        <div class="featured-badge">Featured</div>
                    </div>
                    <div class="featured-content">
                        <h2 class="featured-title">
                            <a href="/berita/{{ $beritas[0]['slug'] }}" class="text-decoration-none text-dark">
                                {{ $beritas[0]['judul'] }}
                            </a>
                        </h2>
                        <div class="featured-meta">
                            <div class="news-author">
                                <i class="fas fa-user-circle"></i>
                                {{ $beritas[0]['penulis'] }}
                            </div>
                            <div class="news-date">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ date('d M Y', strtotime($beritas[0]['created_at'] ?? 'now')) }}
                            </div>
                        </div>
                        <p class="featured-excerpt">
                            {{ Str::limit($beritas[0]['konten'], 200) }}
                        </p>
                        <a href="/berita/{{ $beritas[0]['slug'] }}" class="featured-read-more">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- News Grid -->
            <div class="news-grid">
                @foreach($beritas as $index => $berita)
                    @if($index > 0)
                    <div class="news-card fade-in-up">
                        <div class="news-image">
                            <img src="https://images.unsplash.com/photo-{{ rand(1000000000000, 9999999999999) }}?auto=format&fit=crop&w=400&q=80"
                                 alt="{{ $berita['judul'] }}"
                                 onerror="this.src='https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=400&q=80'">
                            <div class="news-category">
                                @php
                                    $categories = ['Teknologi', 'Bisnis', 'Inovasi', 'Tutorial', 'Berita'];
                                    $randomCategory = $categories[array_rand($categories)];
                                @endphp
                                {{ $randomCategory }}
                            </div>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">
                                <a href="/berita/{{ $berita['slug'] }}" class="text-decoration-none">
                                    {{ $berita['judul'] }}
                                </a>
                            </h3>
                            <div class="news-meta">
                                <div class="news-author">
                                    <i class="fas fa-user-circle"></i>
                                    {{ $berita['penulis'] }}
                                </div>
                                <div class="news-date">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ date('d M Y', strtotime($berita['created_at'] ?? 'now')) }}
                                </div>
                            </div>
                            <p class="news-excerpt">
                                {{ Str::limit($berita['konten'], 120) }}
                            </p>
                            <a href="/berita/{{ $berita['slug'] }}" class="news-read-more">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="news-pagination">
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn">Next</a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="news-sidebar">
                <h5 class="sidebar-title">
                    <i class="fas fa-fire text-danger"></i>
                    Trending Now
                </h5>
                <div class="trending-item">
                    <div class="trending-number">1</div>
                    <div class="trending-content">
                        <h6>Inovasi AI Terbaru 2025</h6>
                        <small>2.1K views • 2 hours ago</small>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-number">2</div>
                    <div class="trending-content">
                        <h6>Startup Teknologi Indonesia</h6>
                        <small>1.8K views • 4 hours ago</small>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-number">3</div>
                    <div class="trending-content">
                        <h6>Tutorial React Modern</h6>
                        <small>1.5K views • 6 hours ago</small>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-number">4</div>
                    <div class="trending-content">
                        <h6>Digital Marketing Tips</h6>
                        <small>1.2K views • 8 hours ago</small>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-number">5</div>
                    <div class="trending-content">
                        <h6>Cloud Computing Guide</h6>
                        <small>980 views • 12 hours ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
