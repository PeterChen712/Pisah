@extends('layouts.app')

@section('title', 'Panduan Forum Diskusi')

@section('styles')
<style>
    .guidelines {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .guidelines h2 {
        margin-bottom: 20px;
    }

    .guidelines ul {
        list-style-type: disc;
        padding-left: 20px;
    }

    .guidelines li {
        margin-bottom: 10px;
    }

    .guidelines .important {
        color: #d9534f;
        font-weight: bold;
    }

    .back-link {
        margin-top: 20px;
    }

    .back-link a {
        color: #007bff;
        text-decoration: none;
    }

    .back-link a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="guidelines">
        <h2>Panduan dan Peraturan Diskusi</h2>
        <p>Selamat datang di forum diskus! Untuk menjaga kualitas dan kenyamanan diskusi, harap perhatikan peraturan berikut:</p>
        <ul>
            <li><strong>Hormati Sesama Anggota:</strong> Selalu bersikap sopan dan hormat terhadap anggota lain. Hindari bahasa yang menyinggung atau menghina.</li>
            <li><strong>Cari Sebelum Bertanya:</strong> Sebelum membuat pertanyaan baru, gunakan fitur pencarian untuk memastikan pertanyaan Anda belum pernah ditanyakan sebelumnya.</li>
            <li><strong>Gunakan Judul yang Jelas:</strong> Pastikan judul pertanyaan Anda mencerminkan isi dari pertanyaan tersebut sehingga mudah ditemukan dan dipahami oleh anggota lain.</li>
            <li><strong>Berikan Detail yang Cukup:</strong> Saat mengajukan pertanyaan, sertakan detail yang relevan seperti kode, pesan error, atau langkah-langkah yang sudah Anda coba.</li>
            <li><strong>Hindari Spam:</strong> Jangan memposting konten yang tidak relevan, promosi, atau tautan yang tidak berkaitan dengan diskusi.</li>
            <li><strong>Gunakan Kategori yang Tepat:</strong> Pastikan Anda menempatkan pertanyaan Anda pada kategori atau tag yang sesuai untuk memudahkan anggota lain menemukannya.</li>
            <li><strong>Tandai Jawaban yang Benar:</strong> Jika pertanyaan Anda telah terjawab, tandai jawaban yang paling membantu agar anggota lain mengetahui solusi yang tepat.</li>
            <li><strong>Laporan Konten Tidak Pantas:</strong> Jika Anda menemukan konten yang melanggar peraturan, gunakan fitur laporan untuk memberi tahu moderator.</li>
            <li><strong>Dilarang Plagiarisme:</strong> Jika Anda membagikan kode atau konten dari sumber lain, pastikan untuk memberikan kredit kepada sumber aslinya.</li>
            <li><span class="important">Privasi dan Keamanan:</span> Jangan membagikan informasi pribadi seperti nomor telepon, alamat, atau informasi sensitif lainnya di forum.</li>
        </ul>
        <p>Dengan mengikuti peraturan di atas, Anda membantu menciptakan lingkungan diskusi yang positif dan bermanfaat bagi semua anggota. Terima kasih atas kerjasamanya!</p>
    </div>
    <div class="back-link">
        <a href="{{ route('diskusi') }}">← Kembali ke Forum Diskusi</a>
    </div>
</div>
@endsection
