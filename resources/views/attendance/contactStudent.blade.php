<x-app-layout>
    <x-slot name="content">

        <div class="w-full h-full mx-1 my-1">
            <x-card-info :Attendance="$attendance" :student="$student" :parent="$parents">

            </x-card-info>
        </div>
    </x-slot>
</x-app-layout>