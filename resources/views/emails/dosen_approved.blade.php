<!-- resources/views/emails/pt_approved.blade.php -->
<p>Yth. {{ $data->namadosen }},</p>

<p>Kami dengan senang hati menginformasikan bahwa akun keanggotaan Dosen Anda dengan Nomor Induk Dosen Nasional (NIDN) {{$data->nidn}} telah berhasil diaktifkan di platform kami, Apbisdi.</p>

<p>Dengan ini, Anda telah mendapatkan akses penuh untuk mengelola dan menggunakan berbagai layanan yang kami sediakan khusus untuk para dosen. Informasi terkait keanggotaan Anda adalah sebagai berikut:</p>

<ul>
    <li>Tanggal Mulai Keanggotaan: {{ $data->start_date }}</li>
    <li>Tanggal Berakhir Keanggotaan: {{ $data->end_date }}</li>
</ul>

<p>Sertifikat Anda Dapat Anda Akses Dilaman Apbisdi atau link berikut ini : {{$data->link}}</p>
<p>Invoice Anda Dapat Anda Akses Dilaman Apbisdi atau link berikut ini : {{$data->link2}}</p>

<p>Jika Link Tidak Bekerja Mohon Hubungi Operator / Contact Tim Apbisdi</p>

<p>Kami berharap Anda dapat memanfaatkan seluruh fasilitas dan layanan yang tersedia dengan baik. Jika terdapat pertanyaan atau kebutuhan bantuan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami.</p>

<p>Terima kasih telah menjadi bagian dari platform Apbisdi. Kami sangat menghargai kontribusi dan partisipasi Anda dalam komunitas akademik kami.</p>

<p>Salam hormat,</p>
<p>Tim Apbisdi</p>
