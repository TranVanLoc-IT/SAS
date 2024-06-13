<x-app-layout>
    <x-slot name="content">
        <div class="flex flex-start mb-0">
            <div class="p-2 bg-gray-100 hover:text-green-500 hover:border-t-4 hover:border-green-300">
                <a href="{{Route('diem-danh')}}">{{__('Điểm danh theo ngày')}}</a>
            </div>
            <div class="p-2 hover:text-green-500 hover:border-t-4 hover:border-green-300 bg-gray-100">
                <a href="{{Route('qrcodeAttendance')}}">{{__('Điểm danh QR Code')}}</a>
            </div>
        </div>
        
        <div class="bg-gray-100 h-100 mx-auto w-max my-5">
            @if (isset($qrcode))
                <img src="data:image/png;base64,{{ $qrcode }}" alt="QR Code">
            @else
                <h2 class="text-orange-500 text-center text-lg">{{$error}}</h2>
            @endif
        </div>

        </x-slot>
</x-app-layout>