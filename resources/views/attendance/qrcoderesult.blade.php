<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if(isset($result))
        @if($result == 'success')
            
        <div class="text-center text-lg text-green-500">
                Điểm danh thành công
        </div>
        @endif
        @if($result == 'error')
            
        <div class="text-center text-lg text-ref-500">
                Điểm danh thất bại, kiểm tra lại thông tin
        </div>
        @endif
    @endif
    <script>
    </script>
</x-guest-layout>
