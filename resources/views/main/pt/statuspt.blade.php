@extends('layouts.pt')

@section('konten')

@if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

@if ($ptData)

    @if ($ptData->status == 'pending')
    <div class="flex">
    </div>
    <!-- Hero -->
<div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
  <!-- Grid -->
  <div class="grid lg:grid-cols-7 lg:gap-x-8 xl:gap-x-12 lg:items-center">
    <div class="lg:col-span-3">
      <h1 class="block text-2xl font-bold text-yellow-400 sm:text-4xl md:text-5xl lg:text-4xl">Akun Anda Sedang Diverifikasi</h1>
      <p class="mt-3 text-lg text-gray-800">Mohon Menunggu Operator Untuk Menyelesaikan Verifikasi Sebelum Mendapatkan Akses</p>
      
    </div>
    <!-- End Col -->
    <div class="lg:col-span-4 mt-10 lg:mt-0">
      <img class="w-full rounded-xl" src="https://plus.unsplash.com/premium_photo-1677093906217-9420a5f16322?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dmVyaWZpY2F0aW9ufGVufDB8fDB8fHww" alt="Image Description">
    </div>
    
    <!-- End Col -->
  </div>
  <p class="mt-12 text-center mx-auto" >Data Saya Salah Saya Ingin Memperbaruinya <a href="{{route('pt/editprofile')}}" class="text-blue-500">Click Here</a></p>
  <!-- End Grid -->
</div>
<!-- End Hero -->
    @elseif ($ptData->status == 'active')
    <div class="flex">
    </div>
    <!-- Hero -->
<div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
  <!-- Grid -->
  <div class="grid lg:grid-cols-7 lg:gap-x-8 xl:gap-x-12 lg:items-center">
    <div class="lg:col-span-3">
      <h1 class="block text-2xl font-bold text-gray-800 sm:text-4xl md:text-5xl lg:text-5xl">Akun Anda Terverifikasi</h1>
      <p class="mt-3 text-lg text-gray-800">Anda Sudah Memiliki Akses Untuk Mengelola Layanan Perguruan Tinggi Anda</p>
      <a class="w-full lg:mt-8 sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{route('pt/datadosen')}}">
          Data Dosen
        </a>
      <div class="mt-5 lg:mt-8 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">

        <a class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{route('pt/sertifikatdosen')}}">
          Data Sertifikat Dosen
        </a>
        <a class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{route('pt/sertifikatpt')}}">
          Data Sertifikat PT
        </a>
      </div>
    </div>
    <!-- End Col -->

    <div class="lg:col-span-4 mt-10 lg:mt-0">
      <img class="w-full rounded-xl" src="https://plus.unsplash.com/premium_photo-1683842188982-e2920f594fda?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image Description">
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Hero -->


    @elseif ($ptData->status == 'ditolak' || $ptData->status == 'nonactive')
    <div class="flex">
    </div>
    <!-- Hero -->
<div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
  <!-- Grid -->
  <div class="grid lg:grid-cols-7 lg:gap-x-8 xl:gap-x-12 lg:items-center">
    <div class="lg:col-span-3">
      <h1 class="block text-2xl font-bold text-red-400 sm:text-4xl md:text-5xl lg:text-4xl">Akun Anda Ditolak atau NonActive</h1>
      <p class="mt-3 text-lg text-gray-800">Mohon Memperbarui Berkas Baru Untuk Dilakukan Verifikasi Ulang Oleh Admin Agar Dapat Mengakses Akun Anda</p>
      <a class="w-full lg:mt-8 sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{route('pt/editprofile')}}">
          >> Perbarui Data Saya <<
      </a>
    </div>
    <!-- End Col -->
    <div class="lg:col-span-4 mt-10 lg:mt-0">
      <img class="w-full rounded-xl" src="https://static.vecteezy.com/system/resources/previews/006/566/282/non_2x/rejected-stamp-in-rubber-style-red-round-grunge-rejected-sign-rubber-stamp-on-white-illustration-free-vector.jpg" alt="Image Description">
    </div>
    
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Hero -->
    @endif




  <!-- End Grid -->
</div>
<!-- End Hire Us -->
@endif
@endsection