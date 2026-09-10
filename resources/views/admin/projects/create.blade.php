<x-app-layout>
    <x-slot name="header"><p class="text-sm font-medium text-gray-500">Projetos</p><h1 class="text-xl font-semibold text-gray-900">Novo projeto</h1></x-slot>
    <div class="admin-editor-page py-8">
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="admin-editor mx-auto max-w-6xl">
            @csrf
            @include('admin.projects._form')
        </form>
    </div>
</x-app-layout>
