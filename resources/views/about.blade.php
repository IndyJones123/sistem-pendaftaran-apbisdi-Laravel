@extends('layouts.anonim')

@section('navbar')
<a class="font-medium text-gray-500 hover:text-gray-400" href="{{ route('/') }}">Home</a>
<a class="font-medium text-blue-600 hover:text-blue-400" href="{{ route('about') }}"  aria-current="page">About</a>
<a class="font-medium text-gray-600 hover:text-gray-400" href="{{ route('alur') }}">Alur</a>

@endsection

@section('konten')
<!-- FAQ -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-3xl md:leading-tight ">
      About Us
    </h2>
  </div>
  <!-- End Title -->

  <div class="max-w-5xl mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
      <div>
        <h3 class="text-lg font-semibold ">
          Apa Itu Sistem PT?
        </h3>
        <p class="mt-2 text-gray-600">
          Sistem PT Adalah Singkatan Dari Sistem Perguruan Tinggi Untuk Membantu Pendataan Sertifikat Keangotaan Perguruan Tinggi & Individu 
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          Mengapa Menggunakan Sistem PT ?
        </h3>
        <p class="mt-2 text-gray-600">
          Membuat Data Keangotaan Dapat Dengan Mudah Dikelola Serta Pengiriman Sertifikat Dengan Cepat
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          Mengapa Akun Saya Belum Terverifikasi ?
        </h3>
        <p class="mt-2 text-gray-600">
          Anda Perlu Menunggu Operator Selesai Dalam Melakukan Evaluasi Berkas Anda 
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          Mengapa Saya Belum Mendapatkan Email Sertifikat ?
        </h3>
        <p class="mt-2 text-gray-600">
          Berkas Anda Belum Memenuhi Atau Operator Belum Meninjau Pendaftaran Anda Harap Menunggu.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
          Kapan Sertifikat Saya Terkirim di Email ?
        </h3>
        <p class="mt-2 text-gray-600">
          Sertifikat Akan Dikirimkan Pada Jam Kerja Operator.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold ">
         Mengapa Saya Tidak Mendapatkan Sertifikat ?
        </h3>
        <p class="mt-2 text-gray-600">
          Anda Perlu Untuk Mendaftar Ulang Berkas Sertifikat Di Website Apabila Mendapatkan Email Jika Berkas Yang Anda Upload Dinyatakan Tidak Memenuhi
        </p>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End FAQ -->
@endsection