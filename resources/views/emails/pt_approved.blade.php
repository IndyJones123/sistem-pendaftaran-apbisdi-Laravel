<!-- resources/views/emails/pt_approved.blade.php -->
<p>Yth. {{ $data->namakaprodi }},</p>

<p>Kami ingin menginformasikan bahwa akun universitas Anda dengan nama {{$data->namapt}} telah berhasil diaktifkan di platform kami, Apbisdi.</p>

<p>Detail keanggotaan Anda adalah sebagai berikut:</p>
<ul>
    <li>Nama Universitas: {{$data->namapt}}</li>
    <li>Tanggal Mulai Keanggotaan: {{ $data->start_date }}</li>
    <li>Tanggal Berakhir Keanggotaan: {{ $data->end_date }}</li>
</ul>

<p>Sertifikat Anda Dapat Anda Akses Dilaman Apbisdi atau link berikut ini : {{$data->link}}</p>
<p>Jika Link Tidak Bekerja Mohon Hubungi Operator / Contact Tim Apbisdi</p>

<p>Kami berharap aktivasi akun ini dapat mendukung kebutuhan akademik dan administrasi universitas Anda. Anda sekarang memiliki akses penuh untuk menggunakan semua fitur dan layanan yang disediakan oleh platform kami.</p>

<p>Jika ada pertanyaan atau memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi tim dukungan kami. Kami siap membantu Anda kapan pun diperlukan.</p>

<p>Terima kasih atas kerjasama dan kepercayaan Anda kepada Apbisdi. Kami berharap dapat memberikan pelayanan terbaik untuk mendukung kegiatan akademik di universitas Anda.</p>

<p>Salam hormat,</p>
<p>Tim Apbisdi</p>
