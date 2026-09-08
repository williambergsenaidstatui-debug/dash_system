<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800">Dashboard administrativo</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold">Olá, {{ auth()->user()->name }}!</h2>
                <p class="mt-2">Você está na área exclusiva para administradores.</p>
            </div>
        </div>
    </div>
</x-app-layout>
