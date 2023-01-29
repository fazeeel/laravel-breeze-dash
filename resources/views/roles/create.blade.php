<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles Create Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{route('roles.store')}}">
                @csrf
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-text-input name="name" required placeholder="Enter a role to create.."/> 
                    <x-primary-button class="ml-3">
                    {{ __('Create') }}
                </x-primary-button>
</br>
                @error('name')
                <span class="text-sm bg-red-400">{{$message}}</span>
                @enderror
            </div>
            </form>
        </div>
    </div>
</x-app-layout>
