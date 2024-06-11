<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create A Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-auto w-2xl space-y-4 mx-auto sm:px-6 lg:px-8">
        <x-button icon="arrow-left" href="{{ route('notes') }}">All Notes</x-button>   
        <livewire:notes.create-note/>
        </div>
    </div>
</x-app-layout>
