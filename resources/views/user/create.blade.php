<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                
                <div class="grid md:grid-cols-2">
                    <div>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div>
                                <x-jet-label for="name" value="{{ __('Name') }}" />
                                <x-jet-input name="name" class="block mt-1 w-full" type="text" :value="old('name')" />
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input  name="email" class="block mt-1 w-full"  type="text" :value="old('email')" />
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input  name="password" class="block mt-1 w-full"  type="password" />
                                @error('password')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-jet-button class="mt-4">
                                {{ __('Save') }}
                            </x-jet-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>