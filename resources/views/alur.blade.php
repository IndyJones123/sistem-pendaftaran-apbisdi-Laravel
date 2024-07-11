@extends('layouts.anonim')

@section('navbar')
<a class="font-medium text-gray-500 hover:text-gray-400" href="{{ route('/') }}">Home</a>
<a class="font-medium text-gray-600 hover:text-gray-400" href="{{ route('about') }}"  >About</a>
<a class="font-medium text-blue-600 hover:text-blue-400" href="{{ route('alur') }}"aria-current="page">Alur</a>


@endsection

@section('konten')
<!-- FAQ -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-3xl md:leading-tight ">
      Alur Pendaftaran
    </h2>
  </div>
  <!-- End Title -->

  <div class="max-w-5xl mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
      <div>
        <h3 class="text-lg font-semibold ">
          1. Menyiapkan Berkas
        </h3>
        <p class="mt-2 text-gray-600">
          Berkas Yang Perlu Disiapkan Antara Lain Dokumen Identitas dan Dokumen Bukti Pembayaran
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          2. Melakukan Pendaftaran Melalui Website
        </h3>
        <p class="mt-2 text-gray-600">
          Daftar Dengan Cara Click Daftar Pendaftaran atau Perpanjang Keangotaan Jika Sudah Mendaftar Sebelumnya
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          3. Menunggu Verifikasi Operator
        </h3>
        <p class="mt-2 text-gray-600">
          Setelah Anda Melakukan Pendaftaran Berkas Anda Akan Diverifikasi oleh Tim Operator
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          4. Verifikasi
        </h3>
        <p class="mt-2 text-gray-600">
         Apabila Verifikasi Berhasil Anda Mendapatkan Sertifikat Keangotaan Melalui Email Yang Telah Didaftarkan
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          5. Jika Verifikasi Ditolak (Optional)
        </h3>
        <p class="mt-2 text-gray-600">
          Kembali Ke Step 1
        </p>
      </div>



      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End FAQ -->
@endsection