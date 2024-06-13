
<div class="relative inline-block text-left dropdown">
  <div>
  <button class="bg-orange-300 text-white px-5 font-semibold dropdown-toggle rounded" type="button" id="menu-button" data-bs-toggle="dropdown" aria-expanded="false">
    {{$title}}
    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
    </svg>
  </button>
  </div>
  <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    {{$content}}
  </div>
</div>
