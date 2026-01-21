@extends('layouts.main')

@section('content')
<style>
    /* Modern Students Page Styles */
    .students-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
        color: white;
        margin-bottom: 60px;
    }

    .students-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="students-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23students-pattern)"/></svg>');
    }

    .students-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .students-hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e8f4fd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .students-hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem);
        opacity: 0.9;
        font-weight: 300;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        padding: 60px 0;
        margin-bottom: 60px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
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

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .stat-label {
        font-size: 1rem;
        color: #718096;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Controls Section */
    .controls-section {
        background: white;
        padding: 30px 0;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }

    .controls-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .search-box {
        position: relative;
        flex: 1;
        max-width: 400px;
    }

    .search-input {
        width: 100%;
        padding: 12px 45px 12px 15px;
        border: 2px solid #e2e8f0;
        border-radius: 25px;
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
        width: 30px;
        height: 30px;
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

    .add-student-btn {
        background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
        border: none;
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .add-student-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
        color: white;
        text-decoration: none;
    }

    /* Students Table */
    .students-table-section {
        margin-bottom: 60px;
    }

    .students-table-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
    }

    .table-responsive {
        border-radius: 20px;
    }

    .modern-table {
        margin-bottom: 0;
        border-radius: 20px;
        overflow: hidden;
    }

    .modern-table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 1.5rem 1rem;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .modern-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f5f9;
    }

    .modern-table tbody tr:hover {
        background: rgba(102, 126, 234, 0.05);
        transform: scale(1.01);
    }

    .modern-table tbody td {
        padding: 1.2rem 1rem;
        border: none;
        vertical-align: middle;
        color: #4a5568;
    }

    .student-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.1rem;
        margin-right: 12px;
        flex-shrink: 0;
    }

    .student-info {
        display: flex;
        align-items: center;
    }

    .student-name {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 2px;
    }

    .student-nim {
        font-size: 0.85rem;
        color: #718096;
    }

    .student-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        cursor: pointer;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    /* Alert Styles */
    .alert-modern {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        border-radius: 15px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-icon {
        font-size: 1.2rem;
    }

    /* Pagination */
    .pagination-modern {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 40px;
    }

    .pagination-btn {
        background: white;
        border: 2px solid #e2e8f0;
        color: #718096;
        padding: 10px 15px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .pagination-btn:hover,
    .pagination-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #718096;
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #4a5568;
    }

    .empty-text {
        font-size: 1rem;
        margin-bottom: 2rem;
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

    /* Responsive */
    @media (max-width: 768px) {
        .students-hero {
            padding: 60px 0;
        }

        .students-hero-title {
            font-size: 2.5rem;
        }

        .controls-container {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box {
            max-width: none;
            margin-bottom: 15px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .modern-table {
            font-size: 0.9rem;
        }

        .modern-table thead th,
        .modern-table tbody td {
            padding: 0.8rem 0.5rem;
        }

        .student-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }

        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }
    }

    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .modern-table {
            font-size: 0.8rem;
        }

        .student-avatar {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
    }
</style>

<!-- Students Hero Section -->
<section class="students-hero">
    <div class="container">
        <div class="students-hero-content">
            <h1 class="students-hero-title">Data Mahasiswa</h1>
            <p class="students-hero-subtitle">
                Kelola data mahasiswa dengan mudah dan efisien. Pantau informasi akademik dan kontak mahasiswa dalam satu tempat.
            </p>
        </div>
    </div>
</section>

<div class="container">
    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card fade-in-up">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ count($data) }}</div>
                <div class="stat-label">Total Mahasiswa</div>
            </div>
            <div class="stat-card fade-in-up">
                <div class="stat-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stat-number">
                    @php
                        $prodiList = [];
                        foreach($data as $m) {
                            if(isset($m['prodi']) && !in_array($m['prodi'], $prodiList)) {
                                $prodiList[] = $m['prodi'];
                            }
                        }
                        echo count($prodiList);
                    @endphp
                </div>
                <div class="stat-label">Program Studi</div>
            </div>
            <div class="stat-card fade-in-up">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-number">
                    @php
                        $emailCount = 0;
                        foreach($data as $m) {
                            if(isset($m['email']) && !empty($m['email'])) {
                                $emailCount++;
                            }
                        }
                        echo $emailCount;
                    @endphp
                </div>
                <div class="stat-label">Email Terdaftar</div>
            </div>
            <div class="stat-card fade-in-up">
                <div class="stat-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="stat-number">
                    @php
                        $phoneCount = 0;
                        foreach($data as $m) {
                            if(isset($m['nohp']) && !empty($m['nohp'])) {
                                $phoneCount++;
                            }
                        }
                        echo $phoneCount;
                    @endphp
                </div>
                <div class="stat-label">Nomor HP</div>
            </div>
        </div>
    </section>

    <!-- Controls Section -->
    <section class="controls-section">
        <div class="container">
            <div class="controls-container">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Cari mahasiswa...">
                    <button class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="/tambahmahasiswa" class="add-student-btn">
                    <i class="fas fa-plus"></i>
                    Tambah Mahasiswa
                </a>
            </div>
        </div>
    </section>

    <!-- Success Alert -->
    @if ($message = Session::get('success'))
    <div class="alert-modern fade-in-up">
        <div class="alert-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div>
            <strong>Berhasil!</strong> {{ $message }}
        </div>
    </div>
    @endif

    <!-- Students Table Section -->
    <section class="students-table-section">
        <div class="students-table-card">
            <div class="table-responsive">
                <table class="table modern-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mahasiswa</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data) > 0)
                            @php $i = 1 @endphp
                            @foreach ($data as $mahasiswa)
                            <tr class="fade-in-up">
                                <td>{{ $i }}</td>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">
                                            {{ strtoupper(substr($mahasiswa['name'], 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="student-name">{{ $mahasiswa['name'] }}</div>
                                            <div class="student-nim">NIM: {{ $mahasiswa['nim'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="student-badge">{{ $mahasiswa['nim'] }}</span>
                                </td>
                                <td>{{ $mahasiswa['prodi'] }}</td>
                                <td>
                                    @if($mahasiswa['email'])
                                        <a href="mailto:{{ $mahasiswa['email'] }}" class="text-decoration-none">
                                            <i class="fas fa-envelope text-primary me-1"></i>{{ $mahasiswa['email'] }}
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($mahasiswa['nohp'])
                                        <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $mahasiswa['nohp']) }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-whatsapp text-success me-1"></i>{{ $mahasiswa['nohp'] }}
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('tampildata', $mahasiswa['id']) }}" class="btn-edit">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('deletedata', $mahasiswa['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data mahasiswa {{ $mahasiswa['name'] }}?')">
                                            @csrf
                                            <button type="submit" class="btn-delete">
                                                <i class="fas fa-trash me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @php $i++ @endphp
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <h3 class="empty-title">Belum ada data mahasiswa</h3>
                                        <p class="empty-text">Tambahkan data mahasiswa pertama untuk memulai mengelola informasi akademik.</p>
                                        <a href="/tambahmahasiswa" class="add-student-btn">
                                            <i class="fas fa-plus me-2"></i>Tambah Mahasiswa Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    @if(count($data) > 10)
    <div class="pagination-modern">
        <a href="#" class="pagination-btn active">1</a>
        <a href="#" class="pagination-btn">2</a>
        <a href="#" class="pagination-btn">3</a>
        <a href="#" class="pagination-btn">Next</a>
    </div>
    @endif
</div>

<script>
// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const tableRows = document.querySelectorAll('.modern-table tbody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach(row => {
            const studentName = row.querySelector('.student-name');
            const studentNIM = row.querySelector('.student-nim');
            const studentEmail = row.cells[4].textContent.toLowerCase();
            const studentPhone = row.cells[5].textContent.toLowerCase();

            if (studentName && studentNIM && studentEmail && studentPhone) {
                const nameMatch = studentName.textContent.toLowerCase().includes(searchTerm);
                const nimMatch = studentNIM.textContent.toLowerCase().includes(searchTerm);
                const emailMatch = studentEmail.includes(searchTerm);
                const phoneMatch = studentPhone.includes(searchTerm);

                if (nameMatch || nimMatch || emailMatch || phoneMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
});
</script>
@endsection