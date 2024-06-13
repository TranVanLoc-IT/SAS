<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('qrcodeAttendance') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="studentId" :value="__('Mã sinh viên: ')" />
            <x-text-input id="studentId" class="block mt-1 w-full" type="text" name="studentId" :value="old('studentId')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="studentName" :value="__('Tên sinh viên: ')" />

            <x-text-input id="studentName" class="block mt-1 w-full"
                            type="text"
                            name="studentName" />

        </div>
        <div class="mt-4 invisible">
            <x-text-input id="lessonId" class="block mt-1 w-full"
                            type="text"
                            value=""
                            name="lessonId" />
        </div>
        <x-primary-button class="ms-3 bg-green-400 hover:bg-green-700">
                {{ __('Điểm danh') }}
        </x-primary-button>
    </form>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        var lessonId = urlParams.get('lessonId');
        alert(lessonId);
        document.getElementById("lessonId").value = lessonId;
    </script>
</x-guest-layout>
