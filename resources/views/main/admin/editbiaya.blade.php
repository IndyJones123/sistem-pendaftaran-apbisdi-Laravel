@extends('layouts.admin')

@section('konten')
<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="bg-white rounded-xl shadow p-4 sm:p-7">
    <form method="POST" action="{{route('updatebiaya', $data->id)}}">
      @csrf
      <!-- Section -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
        <div class="sm:col-span-12">
          <h2 class="text-lg font-semibold text-gray-800">
            Ubah Harga Keangotaan
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
            Nama Biaya
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="sm:flex">
            <input readonly value="{{$data->keterangan}}" name="keterangan" id="af-submit-application-full-name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
            Biaya
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <input value="{{$data->biaya}}" name="biaya" id="af-submit-application-email" type="number" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>
        <!-- End Col -->

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