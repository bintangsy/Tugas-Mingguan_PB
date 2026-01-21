@extends('layouts.main')

@section('content')
<style>
    /* Modern Contact Page Styles */
    .contact-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
        color: white;
        margin-bottom: 60px;
    }

    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="contact-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23contact-pattern)"/></svg>');
    }

    .contact-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .contact-hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e8f4fd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .contact-hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem);
        opacity: 0.9;
        font-weight: 300;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Contact Cards */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .contact-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .contact-card::before {
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

    .contact-card:hover::before {
        transform: scaleX(1);
    }

    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    .contact-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .contact-card:hover .contact-icon {
        transform: scale(1.1);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    .contact-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .contact-value {
        font-size: 1.1rem;
        color: #4a5568;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .contact-action {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .contact-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    /* Contact Form */
    .contact-form-section {
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        padding: 80px 0;
        margin-bottom: 60px;
    }

    .contact-form-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
    }

    .form-title {
        font-size: 2rem;
        font-weight: 800;
        color: #2d3748;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .form-subtitle {
        text-align: center;
        color: #718096;
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-control::placeholder {
        color: #a0aec0;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        color: white;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        color: white;
    }

    /* Business Hours */
    .hours-section {
        margin-bottom: 60px;
    }

    .hours-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
    }

    .hours-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .hours-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .hours-item:hover {
        background: rgba(102, 126, 234, 0.05);
        transform: translateX(5px);
    }

    .hours-day {
        font-weight: 600;
        color: #2d3748;
    }

    .hours-time {
        color: #4a5568;
        font-weight: 500;
    }

    .hours-status {
        background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Map Section */
    .map-section {
        margin-bottom: 60px;
    }

    .map-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.8);
    }

    .map-header {
        padding: 2rem;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .map-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .map-subtitle {
        color: #718096;
        margin-bottom: 0;
    }

    .map-container {
        height: 400px;
        position: relative;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Social Links */
    .social-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 0;
        color: white;
    }

    .social-content {
        text-align: center;
    }

    .social-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

    .social-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .social-link {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .social-link:hover {
        transform: translateY(-5px) scale(1.1);
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    /* FAQ Section */
    .faq-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
    }

    .faq-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-title {
        font-size: 2rem;
        font-weight: 800;
        color: #2d3748;
        text-align: center;
        margin-bottom: 3rem;
    }

    .faq-item {
        background: white;
        border-radius: 15px;
        margin-bottom: 1rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: 1px solid rgba(255,255,255,0.8);
        overflow: hidden;
    }

    .faq-question {
        width: 100%;
        background: none;
        border: none;
        padding: 1.5rem;
        text-align: left;
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3748;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: rgba(102, 126, 234, 0.05);
    }

    .faq-question:focus {
        outline: none;
    }

    .faq-icon {
        font-size: 1.2rem;
        color: #667eea;
        transition: transform 0.3s ease;
    }

    .faq-answer {
        padding: 0 1.5rem 1.5rem;
        color: #4a5568;
        line-height: 1.6;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-item.active .faq-answer {
        max-height: 200px;
    }

    .faq-item.active .faq-icon {
        transform: rotate(180deg);
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
        .contact-hero {
            padding: 60px 0;
        }

        .contact-hero-title {
            font-size: 2.5rem;
        }

        .contact-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .contact-form-card {
            padding: 2rem;
        }

        .social-links {
            gap: 1rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .hours-grid {
            grid-template-columns: 1fr;
        }

        .map-container {
            height: 300px;
        }
    }
</style>

<!-- Contact Hero Section -->
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-content">
            <h1 class="contact-hero-title">Hubungi Kami</h1>
            <p class="contact-hero-subtitle">
                Kami siap membantu Anda dengan layanan terbaik. Jangan ragu untuk menghubungi kami melalui berbagai cara yang tersedia.
            </p>
        </div>
    </div>
</section>

<div class="container">
    <!-- Contact Information Cards -->
    <div class="contact-grid">
        <div class="contact-card fade-in-up">
            <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3 class="contact-title">Lokasi</h3>
            <p class="contact-value">Kendal, Jawa Tengah</p>
            <a href="https://maps.google.com/?q=Kendal,Jawa Tengah" target="_blank" class="contact-action">
                <i class="fas fa-directions me-2"></i>Lihat Peta
            </a>
        </div>

        <div class="contact-card fade-in-up">
            <div class="contact-icon">
                <i class="fab fa-whatsapp"></i>
            </div>
            <h3 class="contact-title">WhatsApp</h3>
            <p class="contact-value">+62 812 299 03256</p>
            <a href="https://wa.me/6281229903256" target="_blank" class="contact-action">
                <i class="fab fa-whatsapp me-2"></i>Kirim Pesan
            </a>
        </div>

        <div class="contact-card fade-in-up">
            <div class="contact-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3 class="contact-title">Email</h3>
            <p class="contact-value">masbinsya@gmail.com</p>
            <a href="mailto:masbinsya@gmail.com" class="contact-action">
                <i class="fas fa-envelope me-2"></i>Kirim Email
            </a>
        </div>

        <div class="contact-card fade-in-up">
            <div class="contact-icon">
                <i class="fab fa-instagram"></i>
            </div>
            <h3 class="contact-title">Instagram</h3>
            <p class="contact-value">@bntgsflb_</p>
            <a href="https://instagram.com/bntgsflb_" target="_blank" class="contact-action">
                <i class="fab fa-instagram me-2"></i>Follow Kami
            </a>
        </div>
    </div>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="contact-form-card">
                <h2 class="form-title">Kirim Pesan</h2>
                <p class="form-subtitle">Ada pertanyaan atau ingin bekerja sama? Kirim pesan kepada kami dan kami akan segera merespons.</p>

                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subjek pesan" required>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Business Hours -->
    <div class="hours-section">
        <div class="hours-card">
            <h3 class="hours-title">
                <i class="fas fa-clock text-primary"></i>
                Jam Operasional
            </h3>
            <div class="hours-grid">
                <div class="hours-item">
                    <span class="hours-day">Senin - Jumat</span>
                    <span class="hours-time">09:00 - 21:00</span>
                </div>
                <div class="hours-item">
                    <span class="hours-day">Sabtu</span>
                    <span class="hours-time">10:00 - 22:00</span>
                </div>
                <div class="hours-item">
                    <span class="hours-day">Minggu</span>
                    <span class="hours-time">11:00 - 20:00</span>
                </div>
                <div class="hours-item">
                    <span class="hours-day">Status</span>
                    <span class="hours-status">Buka</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <div class="map-card">
            <div class="map-header">
                <h3 class="map-title">
                    <i class="fas fa-map-marked-alt text-primary"></i>
                    Temukan Lokasi Kami
                </h3>
                <p class="map-subtitle">Kunjungi kami di Kendal, Jawa Tengah untuk pengalaman yang lebih personal.</p>
            </div>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.489402932832!2d110.58000431477736!3d-7.068050494899092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ef57f7e3e5f3%3A0x123456789abcdef!2sDemak%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1695975600000!5m2!1sid!2sid"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- Social Media Section -->
<section class="social-section">
    <div class="container">
        <div class="social-content">
            <h2 class="social-title">Ikuti Kami</h2>
            <p class="social-subtitle">
                Tetap terhubung dengan kami di media sosial untuk update terbaru dan informasi menarik lainnya.
            </p>
            <div class="social-links">
                <a href="https://instagram.com/bntgsflb_" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/6281229903256" target="_blank" class="social-link">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="mailto:masbinsya@gmail.com" class="social-link">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="https://maps.google.com/?q=Kendal,Jawa Tengah" target="_blank" class="social-link">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="faq-content">
            <h2 class="faq-title">Pertanyaan Umum</h2>

            <div class="faq-item">
                <button class="faq-question">
                    Bagaimana cara memesan produk?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    Anda dapat memesan produk melalui WhatsApp atau datang langsung ke lokasi kami. Kami akan memproses pesanan Anda dengan segera dan memberikan konfirmasi.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Apakah ada pengiriman ke seluruh Indonesia?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    Ya, kami melayani pengiriman ke seluruh Indonesia melalui jasa kurir terpercaya. Biaya pengiriman akan disesuaikan dengan lokasi tujuan.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Berapa lama waktu pemrosesan pesanan?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    Waktu pemrosesan pesanan biasanya 1-2 hari kerja. Untuk pesanan dalam jumlah besar, waktu pemrosesan mungkin lebih lama tergantung kompleksitasnya.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Apakah bisa request rasa atau varian tertentu?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    Tentu saja! Kami menerima request khusus untuk rasa atau varian tertentu dengan minimum order tertentu. Silakan hubungi kami untuk diskusi lebih lanjut.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// FAQ Accordion Functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            const isActive = faqItem.classList.contains('active');

            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        });
    });
});
</script>
@endsection
