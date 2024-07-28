@extends('layouts.user')

@section('konten')
<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="bg-white rounded-xl shadow p-4 sm:p-7">
    <form method="POST" action="{{route('updateprofileuser', $individuData->id_user)}}" enctype="multipart/form-data">
      @csrf
      <!-- Section -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
        <div class="sm:col-span-12">
          <h2 class="text-lg font-semibold text-gray-800">
            Ajukan Data Anda Yang Baru Untuk Mengaktifkan Akun Anda.
          </h2>
        </div>
        <!-- End Col -->
        
        <!-- End Col -->
      </div>
      <!-- End Section -->

      <!-- Section -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
        <div class="sm:col-span-12">
          <h2 class="text-lg font-semibold text-gray-800">
          </h2>
        </div>
        <!-- End Col -->
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-submit-application-full-name" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
            Nama Dosen
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="sm:flex">
            <input value="{{$individuData->namadosen}}" name="namadosen" id="af-submit-application-full-name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
            Email
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <input value="{{$individuData->email}}" name="email" id="af-submit-application-email" type="email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <div class="inline-block">
            <label for="af-submit-application-phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
              Phone
            </label>
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <input value="{{$individuData->notelp}}" name="notelp" id="af-submit-application-phone" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>
        <!-- End Col -->
        <div class="sm:col-span-3">
          <div class="inline-block">
            <label for="af-submit-application-current-company" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
              NIDN
            </label>
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <input maxlength="10" value="{{$individuData->nidn}}" name="nidn" id="af-submit-application-current-company" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>

      </div>
      <!-- End Section -->

      <!-- Section -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
        <div class="sm:col-span-12">
          <h2 class="text-lg font-semibold text-gray-800">
            Berkas Dosen
          </h2>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="dokumen1" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
          Berkas 1 <br> (Bukti Pembayaran)
          </label>
          <a target="_blank" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{ asset('data/' . $individuData->dokumen1) }}">Old Berkas 1</a>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        
          <label for="dokumen1" class="sr-only">Berkas 1 (Bukti Pembayaran)</label>

          <input required type="file" accept=".png, .jpg, .jpeg, .pdf" value="" name="dokumen1" id="dokumen1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
            file:bg-gray-50 file:border-0
            file:bg-gray-100 file:me-4
            file:py-2 file:px-4
           ">
        </div>

        
        <div class="sm:col-span-3">
          <label for="dokumen2"  class="inline-block text-sm font-medium text-gray-500 mt-2.5">
          Berkas 2 <br> Bukti Keterangan
          </label>
          <a target="_blank" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{ asset('data/' . $individuData->dokumen2) }}">Old Berkas 2</a>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <label for="dokumen2" class="sr-only">Berkas 2 Bukti Keterangan</label>
          <input required accept=".png, .jpg, .jpeg, .pdf"  type="file" value="" name="dokumen2" id="dokumen2" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
            file:bg-gray-50 file:border-0
            file:bg-gray-100 file:me-4
            file:py-2 file:px-4
           ">
        </div>
        <!-- End Col -->
      </div>
      <!-- End Section -->
      <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Submit & Verifikasi
      </button>
    </form>
  </div>
  <!-- End Card -->
</div>
<!-- End Card Section -->
@endsection