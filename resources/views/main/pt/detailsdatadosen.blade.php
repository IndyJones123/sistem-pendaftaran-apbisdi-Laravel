@extends('layouts.pt')

@section('konten')
<!-- Hero -->
<div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
  <!-- Grid -->
  <div class="grid lg:grid-cols-7 lg:gap-x-8 xl:gap-x-12 lg:items-center">
    <div class="lg:col-span-3">
      <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl lg:text-4xl">Details Data</h1>
      <p class="mt-3 text-lg text-gray-800">Name: {{$individuData->namadosen}}</p>

      <!-- List of additional data -->
      <ul class="mt-3 text-lg text-gray-800 space-y-2">
        <li>NIDN: {{$individuData->nidn}}</li>
        <li>Phone: {{$individuData->notelp}}</li>
        <li>Email: {{$individuData->email}}</li>
        <li>Status: {{$individuData->status}}</li>
        <li>Dokumen 1 Bukti Pembayaran : <div class="py-2 first:pt-0 last:pb-0">
                          <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" target="_blank" href="{{asset('/data/'. $individuData->dokumen1)}} ">
                          
                          Berkas 1 ( Bukti Pembayaran )
                          </a>
                          <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" target="_blank" href="{{asset('/data/'. $individuData->dokumen2)}}">
                            Berkas 2 ( Bukti Surat Keterangan )
                          </a>
                        </div></li>
        <!-- Add more fields as necessary -->
        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2" aria-labelledby="hs-table-dropdown-1">
                        
                      </div>
      </ul>
      
    </div>
    <!-- End Col -->

    <div class="lg:col-span-4 mt-10 lg:mt-0">
      <img class="w-full rounded-xl" src="https://media.istockphoto.com/id/1593404921/id/foto/ilustrasi-rendering-ikon-3d-kartu-id-mengambang-dengan-latar-belakang-ungu-ikon-kartu.jpg?s=1024x1024&w=is&k=20&c=_NKlt49mqftTDRojXhrkRB-wgbBx5JDuHE1ikusVbXc=" alt="Image Description">
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Hero -->

@endsection