// ...existing code...
@extends('layouts.main')

@section('content')
<section class="py-4">
    <style>
        .hero-compact{ background:linear-gradient(120deg,#fff8f0,#fff3f6); padding:1rem; border-radius:.5rem; }
        .hero-title{ color:#e85d04; font-weight:700; font-size:1.25rem; margin:0; }
        .hero-sub{ color:#6c757d; font-size:.95rem; margin:0.25rem 0; }
        .product-small{ border-radius:.5rem; overflow:hidden; }
        .product-small img{ width:100%; height:120px; object-fit:cover; display:block; }
        .product-body{ padding:.5rem; }
        .btn-compact{ padding:.4rem .75rem; font-size:.9rem; }
        @media (min-width:768px){ .hero-title{ font-size:1.6rem; } .product-small img{ height:140px; } }
    </style>

    <div class="hero-compact d-flex flex-column flex-md-row align-items-center gap-3 mb-3">
        <div class="flex-grow-1">
            <h1 class="hero-title">Dimsum Mentai — Lezat & Praktis</h1>
            <p class="hero-sub">Saus mentai creamy, bahan segar, siap antar. Promo: Beli 5 gratis 1.</p>
            <div class="d-flex gap-2">
                <a href="{{ url('/berita') }}" class="btn btn-sm btn-warning btn-compact">Lihat Produk</a>
                <a href="https://wa.me/6281234567890" class="btn btn-sm btn-success btn-compact">Pesan via WhatsApp</a>
            </div>
        </div>
        <div style="width:160px;min-width:120px;">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=60" alt="Dimsum" class="img-fluid rounded">
        </div>
    </div>

    <h6 class="mb-2">Produk Unggulan</h6>
    <div class="row g-2">
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card product-small shadow-sm">
                <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=60" alt="Ayam">
                <div class="product-body">
                    <div class="fw-semibold">Dimsum Ayam Mentai</div>
                    <div class="text-muted small">Rp 20.000</div>
                    <a href="{{ url('/berita') }}" class="btn btn-sm btn-outline-primary btn-compact mt-2 w-100">Pesan</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="card product-small shadow-sm">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=60" alt="Udang">
                <div class="product-body">
                    <div class="fw-semibold">Dimsum Udang Mentai</div>
                    <div class="text-muted small">Rp 25.000</div>
                    <a href="https://wa.me/6281234567890" class="btn btn-sm btn-success btn-compact mt-2 w-100">Pesan</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="card product-small shadow-sm">
                <img src="https://images.unsplash.com/photo-1543352634-0b9a6960f9f4?auto=format&fit=crop&w=400&q=60" alt="Paket">
                <div class="product-body">
                    <div class="fw-semibold">Paket Hemat 5+1</div>
                    <div class="text-muted small">Hemat & Praktis</div>
                    <a href="{{ url('/berita') }}" class="btn btn-sm btn-outline-primary btn-compact mt-2 w-100">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="card product-small shadow-sm">
                <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=400&q=60" alt="Custom">
                <div class="product-body">
                    <div class="fw-semibold">Custom Order</div>
                    <div class="text-muted small">Event & Catering</div>
                    <a href="{{ url('/contact') }}" class="btn btn-sm btn-outline-secondary btn-compact mt-2 w-100">Hubungi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        <a href="https://wa.me/6281234567890" class="btn btn-sm btn-success">Pesan Sekarang</a>
    </div>
</section>
@endsection
// ...existing code...
```// filepath: