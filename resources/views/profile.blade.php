@extends('layouts.main')

@section('content')
<div class="py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header card -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body d-flex gap-4 align-items-center">
                    <img
                        src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name ?? 'Bintang').'&background=0d6efd&color=fff&size=128' }}"
                        alt="Avatar"
                        class="rounded-circle"
                        style="width:128px;height:128px;object-fit:cover;"
                    >
                    <div class="flex-grow-1">
                        <h2 class="mb-1">{{ $user->name ?? 'Bintang' }}</h2>
                        <p class="text-muted mb-1">{{ $user->role ?? 'Mahasiswa & Penjual Dimsum Mentai' }}</p>
                        <div class="small text-muted mb-2">
                            <div>Email: {{ $user->email ?? 'masbinsya@gmail.com' }}</div>
                            <div>Telepon: {{ $user->phone ?? '+62 812-3456-7890' }}</div>
                        </div>
                        <div>
                            <a href="{{ url('/berita') }}" class="btn btn-outline-primary btn-sm me-2">Lihat Produk</a>
                            <a href="{{ $user->whatsapp ?? 'https://wa.me/6281234567890' }}" class="btn btn-primary btn-sm">Hubungi via WhatsApp</a>
                            <a href="{{ url('/profile/edit') }}" class="btn btn-light btn-sm ms-2">Edit Profil</a>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="badge bg-success">Toko Aktif</div>
                        <div class="mt-2 text-muted small">Bergabung: {{ $user->joined_at ?? '2023' }}</div>
                    </div>
                </div>
            </div>

            <div class="row gx-4">
                <!-- Left / About -->
                <div class="col-md-8">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">Tentang</h5>
                            <p class="text-muted">
                                {{ $user->bio ?? 'Halo, saya Bintang. Saya menjual Dimsum Mentai dengan resep rumahan, menggunakan bahan segar dan saus mentai kreasi sendiri. Melayani pesanan untuk take away, delivery, dan event kecil.' }}
                            </p>

                            <hr>

                            <h6 class="mb-2">Pengalaman & Peran</h6>
                            <ul class="list-unstyled mb-3">
                                <li class="mb-2">
                                    <strong>Penjual & Pengelola Produksi</strong>
                                    <div class="text-muted small">2023 — Sekarang · Mengelola produksi harian, pengemasan, & pesanan online</div>
                                </li>
                                <li>
                                    <strong>Pemasaran & Layanan Pelanggan</strong>
                                    <div class="text-muted small">Menangani promosi media sosial, diskon promo, dan komunikasi pelanggan</div>
                                </li>
                            </ul>

                            <hr>

                            <h6 class="mb-2">Keahlian</h6>
                            <div class="mb-3">
                                <span class="badge bg-secondary me-1">Kuliner</span>
                                <span class="badge bg-secondary me-1">Manajemen Dapur</span>
                                <span class="badge bg-secondary me-1">Pelayanan Pelanggan</span>
                                <span class="badge bg-secondary me-1">Fotografi Produk</span>
                            </div>

                            <hr>

                            <h6 class="mb-2">Pendidikan</h6>
                            <p class="mb-0">{{ $user->education ?? 'S1 Teknologi Informasi — Universitas Contoh (2022)' }}</p>
                        </div>
                    </div>

                    <!-- Recent orders / sample products -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">Produk Unggulan</h5>
                            <div class="row g-3">
                                <div class="col-6 col-md-4">
                                    <div class="card h-100 border-0">
                                        <img src="{{ asset('images/dimsum_ayam.jpg') }}" class="card-img-top rounded" alt="Dimsum Ayam" onerror="this.src='https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=60'">
                                        <div class="card-body p-2">
                                            <div class="fw-semibold">Dimsum Ayam Mentai</div>
                                            <div class="text-muted small">Rp 20.000 / box</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="card h-100 border-0">
                                        <img src="{{ asset('images/dimsum_udang.jpg') }}" class="card-img-top rounded" alt="Dimsum Udang" onerror="this.src='https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=60'">
                                        <div class="card-body p-2">
                                            <div class="fw-semibold">Dimsum Udang Mentai</div>
                                            <div class="text-muted small">Rp 25.000 / box</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="card h-100 border-0">
                                        <img src="{{ asset('images/promo.jpg') }}" class="card-img-top rounded" alt="Promo" onerror="this.src='https://images.unsplash.com/photo-1543352634-0b9a6960f9f4?auto=format&fit=crop&w=400&q=60'">
                                        <div class="card-body p-2">
                                            <div class="fw-semibold">Paket Hemat 5+1</div>
                                            <div class="text-muted small">Diskon & Gratis 1 box</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ url('/berita') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Produk</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right / Contact & Store Info -->
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h6 class="mb-3">Detail Kontak</h6>
                            <p class="mb-1"><strong>Email:</strong><br><span class="text-muted small">{{ $user->email ?? 'masbinsya@gmail.com' }}</span></p>
                            <p class="mb-1"><strong>Telepon / WA:</strong><br><span class="text-muted small">{{ $user->phone ?? '+62 812-3456-7890' }}</span></p>
                            <p class="mb-1"><strong>Alamat:</strong><br><span class="text-muted small">{{ $user->address ?? 'Jl. Amarta No.4 Purin-Kendal, Jawa Tengah' }}</span></p>
                            <hr>
                            <h6 class="mb-2">Jam Operasional</h6>
                            <p class="mb-0 small text-muted">Senin - Minggu: 09:00 — 21:00</p>
                            <hr>
                            <h6 class="mb-2">Rating</h6>
                            <div class="mb-2">
                                <span class="text-warning">★★★★☆</span>
                                <small class="text-muted ms-2">4.2 (120 ulasan)</small>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="mb-3">Sosial & Pemesanan</h6>
                            <a href="{{ $user->instagram ?? '#' }}" class="btn btn-outline-danger btn-sm w-100 mb-2">Instagram</a>
                            <a href="{{ $user->whatsapp ?? 'https://wa.me/6281234567890' }}" class="btn btn-success btn-sm w-100">Pesan via WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
    </div>
</div>
@endsection