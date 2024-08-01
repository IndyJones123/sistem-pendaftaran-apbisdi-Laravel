<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apbisdi</title>
    <link rel="icon" href="{{ asset('favicon-16x16.png') }}" type="image/x-icon">
    {{-- ... --}}
            <!-- Favicon -->
            
    @vite('resources/js/app.js')
</head>
<body class="flex flex-col gap-12">
    <!-- Navbar -->
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-4">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between " aria-label="Global">
        <div class="flex items-center justify-between">
        <a class="inline-flex items-center gap-x-2 text-xl font-semibold" href="{{ route('/') }}">
            <img class="w-20 h-auto" src="{{asset('apbisdi.png')}}" alt="Logo">
            Sistem Keangotaan APBISDI 
        </a>
        <div class="sm:hidden">
            <button type="button" class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-collapse="#navbar-image-and-text-2" aria-controls="navbar-image-and-text-2" aria-label="Toggle navigation">
            <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
            <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
        </div>
        <div id="navbar-image-and-text-2" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
        <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
            @yield('navbar')
        </div>
        </div>
    </nav>
    </header>
    <!-- end of navbar -->
    
    <!-- Konten -->
    <div class="">
        @yield('konten')
    </div>
    <!-- end of konten -->


    <!-- Footer -->
<!-- ========== FOOTER ========== -->
<footer class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto ">
  <!-- Grid -->
  <div class="text-center">
    <!-- <div>
      <a class="flex-none text-xl font-semibold text-black" href="#" aria-label="Brand">Brand</a>
    </div> -->
    <!-- End Col -->

    <div class="mt-3">
      <p class="text-gray-500">We're part of the <a class="font-semibold text-blue-600 hover:text-blue-700" href="#">Apbisdi Indonesia</a>.</p>
      <p class="text-gray-500">©Apbisdi {{$currentYear}}. All rights reserved.</p>
    </div>
    <!-- Social Brands -->
    <div class="mt-3 space-x-2">
      <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" target="_blank" href="{{ strpos($ig->link, 'http') === 0 ? $ig->link : 'https://' . $ig->link }}">
        <svg class="h-8 w-8 text-gray-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" /></svg>
      </a>
      <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" target="_blank" href="{{ strpos($wa->link, 'http') === 0 ? $wa->link : 'https://' . $wa->link }}">
        <svg class="h-8 w-8 text-gray-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="5" y="2" width="14" height="20" rx="2" ry="2" />  <line x1="12" y1="18" x2="12.01" y2="18" /></svg>
      </a>
      <div class="relative group inline-block">
          <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
              <svg class="h-8 w-8 text-gray-400" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  
                  <path stroke="none" d="M0 0h24v24H0z"/>  
                  <rect x="3" y="5" width="18" height="14" rx="2" />  
                  <polyline points="3 7 12 13 21 7" />
              </svg>
          </a>
          <!-- Tooltip -->
          <div class="absolute left-full ml-2 top-1/2 transform -translate-y-1/2 w-48 bg-gray-800 text-white text-xs rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              {{ $wa->link }}
          </div>
      </div>
    </div> 
    <!-- End Social Brands -->
  </div>
  <!-- End Grid -->
</footer>
<!-- ========== END FOOTER ========== -->
    <!-- End of Footer -->
</body>
</html>