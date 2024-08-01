@extends('layouts.pt')

@section('konten')
<!-- Table Section -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8  mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
              <h2 class="text-xl font-semibold text-gray-800">
                Daftar Berkas Sertifikat & Invoice Perguruan Tinggi 
              </h2>
              <p class="text-sm text-gray-600">
                Tenggat Waktu Sertifikat & Invoice PT Dapat Diakses Disini
              </p>
            </div>
            <!-- Search Form -->
            <form action="{{ route('pt/sertifikatpt') }}" method="GET" class="sm:col-span-1">
              <label for="search" class="sr-only">Search</label>
              <div class="relative">
                <input type="text" id="search" name="search" value="{{ request()->input('search') }}" class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                  <svg class="flex-shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
              </div>
            </form>
            <!-- End Search Form -->
          </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                

                <th scope="col" class="px-6 py-3 text-start">
                  <a class="group inline-flex items-center gap-x-2" href="#">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Tanggal Mulai
                    </span>
                    <svg class="flex-shrink-0 size-3.5 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                  </a>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <a class="group inline-flex items-center gap-x-2" href="#">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Tenggal Berakhir
                    </span>
                    <svg class="flex-shrink-0 size-3.5 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                  </a>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <a class="group inline-flex items-center gap-x-2" href="#">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Status
                    </span>
                    <svg class="flex-shrink-0 size-3.5 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                  </a>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <a class="group inline-flex items-center gap-x-2" href="#">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Link Download
                    </span>
                    <svg class="flex-shrink-0 size-3.5 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                  </a>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
              @foreach($ptData as $data)
              <tr class="bg-white hover:bg-gray-50">
                
                <td class="size-px whitespace-nowrap">
                  <a class="block relative z-10" href="#">
                    <div class="px-6 py-2">
                    {{$data->tglmulai}}
                    </div>
                  </a>
                </td>
                <td class="size-px whitespace-nowrap">
                  <a class="block relative z-10" href="#">
                  {{$data->tglberakhir}}
                  </a>
                </td>
                <td class="size-px whitespace-nowrap">
                  <a class="block relative z-10" href="#">
                    <div class="px-6 py-2 flex -space-x-2">
                    @if($data->status == 'active')
                    <p class="text-green-500"> Active </p>
                    @elseif($data->status == 'pending')
                    <p class="text-yellow-500"> Pending </p>
                    @elseif($data->status == 'ditolak')
                    <p class="text-red-500"> Ditolak </p>
                    @elseif($data->status == 'nonactive')
                      <p class="text-gray-500"> Non Active </p>
                    @endif
                    </div>
                  </a>
                </td>
                <td>
                                      <div class="flex flex-row gap-3">
                    <a class="text-blue-300" target="_blank" href="{{ strpos($data->link, 'http') === 0 ? $data->link : 'https://' . $data->link }}">Download Sertifikat</a>
                    ||
                    <a class="text-blue-300" target="_blank" href="{{ strpos($data->link2, 'http') === 0 ? $data->link2 : 'https://' . $data->link2 }}">Download Invoice</a>
                  </div>
                </td>
                
                @endforeach
              </tr>
            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
  <div>
    <p class="text-sm text-gray-600">
      <span class="font-semibold text-gray-800">{{ $ptData->total() }}</span> results
    </p>
  </div>

  <div>
    <div class="inline-flex gap-x-2">
      <!-- Previous Page Button -->
      @if($ptData->onFirstPage())
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" disabled>
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          Prev
        </button>
      @else
        <a href="{{ $ptData->previousPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          Prev
        </a>
      @endif

      <!-- Next Page Button -->
      @if($ptData->hasMorePages())
        <a href="{{ $ptData->nextPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
          Next
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
      @else
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" disabled>
          Next
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
      @endif
    </div>
  </div>
</div>
<!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->
@endsection