<!-- ========== MAIN CONTENT ========== -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apbisdi || Admin </title>
    <link rel="icon" href="{{ asset('favicon-16x16.png') }}" type="image/x-icon">
    {{-- ... --}}
    @vite('resources/js/app.js')
</head>
@include('layouts.navigation')
<!-- Page Heading -->
@isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
<!-- Sidebar Toggle -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden">
  <div class="flex items-center py-4">
    <!-- Navigation Toggle -->
    <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand" aria-label="Toggle navigation">
      <span class="sr-only">Admin</span>
      <svg class="size-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
      </svg>
    </button>
    <!-- End Navigation Toggle -->

    <!-- Breadcrumb -->
    <ol class="ms-3 flex items-center whitespace-nowrap">
      <li class="flex items-center text-sm text-gray-800">
        Admin Page
        <svg class="flex-shrink-0 mx-3 overflow-visible size-2.5 text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </li>
      <li class="text-sm font-semibold text-gray-800 truncate" aria-current="page">
        Dashboard
      </li>
    </ol>
    <!-- End Breadcrumb -->
  </div>
</div>
<!-- End Sidebar Toggle -->

<!-- Sidebar -->
<div id="application-sidebar-brand" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-blue-700 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
  <div class="px-6">
    <a class="flex-none text-xl font-semibold text-white" href="#" aria-label="Brand">Admin</a>
  </div>

  <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="space-y-1.5">
      <li>
        <a class="flex items-center gap-x-3 py-2 px-2.5 bg-blue-600 text-sm text-white rounded-lg" href="{{route('admin/dashboard')}}">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Dashboard
        </a>
      </li>

      <li class="hs-accordion" id="account-accordion">
        <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">
          <svg class="flex-shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="m21.7 16.4-.9-.3"/><path d="m15.2 13.9-.9-.3"/><path d="m16.6 18.7.3-.9"/><path d="m19.1 12.2.3-.9"/><path d="m19.6 18.7-.4-1"/><path d="m16.8 12.3-.4-1"/><path d="m14.3 16.6 1-.4"/><path d="m20.7 13.8 1-.4"/></svg>
          User MasterData

          <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

          <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </button>

        <div id="account-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
          <ul class="pt-2 ps-2">
            <li>
              <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600" href="{{route('admin/operator')}}">
                 Operator MasterData
              </a>
            </li>
            <li>
              <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600" href="{{route('admin/individu')}}">
              Dosen MasterData
              </a>
            </li>
            <li>
              <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600" href="{{route('admin/pt')}}">
               PT MasterData
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600-300" href="{{route('admin/biaya')}}">
      <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
        Biaya MasterData
      </a></li>

      <li class="hs-accordion" id="account-accordion">
        <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          Sertifikat MasterData

          <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

          <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </button>

        <div id="account-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
          <ul class="pt-2 ps-2">
            <li>
              <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600" href="{{route('admin/sertifikatpt')}}">
                Sertifikat PT
              </a>
            </li>
            <li>
              <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600" href="{{route('admin/sertifikatindividu')}}">
              Sertifikat Dosen
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600-300" href="{{route('admin/link')}}">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        Documentation Link
      </a></li>
    </ul>
  </nav>
</div>
<!-- End Sidebar -->

<!-- Content -->
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
  <!-- your content goes here ... -->
  @yield('konten')
</div>
<!-- End Content -->
<!-- ========== END MAIN CONTENT ========== -->