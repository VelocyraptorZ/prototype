<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-jet-validation-errors class="mb-4" />
                @livewire('company.form',['company'=>$company])
                {{-- <form action="{{ route('company.update',['company'=>$company->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}"/>
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $company->name }}" required autofocus/>
                        @error('name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $company->email }}" required autofocus/>
                        @error('email')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <x-jet-label for="mobile" value="{{ __('Mobile') }}"/>
                        <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" value="{{ $company->mobile }}" required autofocus/>
                        @error('mobile')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <x-jet-button class="mt-4">
                        {{ __('Save') }}
                    </x-jet-button>
                </form> --}}
            </div>
        </div>
    </div>
</x-app-layout>
