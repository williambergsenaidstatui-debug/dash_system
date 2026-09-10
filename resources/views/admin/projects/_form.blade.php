@php($editing = isset($project))

<div class="grid gap-6 lg:grid-cols-[minmax(0,2fr)_minmax(260px,1fr)]">
    <section class="space-y-6" aria-labelledby="project-content-title">
        <h2 id="project-content-title" class="text-lg font-semibold text-gray-900">Informa&ccedil;&otilde;es do projeto</h2>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nome *</label>
            <input id="name" name="name" type="text" required maxlength="120" value="{{ old('name', $project->name ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Categoria *</label>
                <input id="category" name="category" type="text" required maxlength="100" value="{{ old('category', $project->category ?? '') }}" placeholder="Ex.: Sistema de gestao" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div>
                <label for="client" class="block text-sm font-medium text-gray-700">Cliente</label>
                <input id="client" name="client" type="text" maxlength="120" value="{{ old('client', $project->client ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
                <x-input-error :messages="$errors->get('client')" class="mt-2" />
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descri&ccedil;&atilde;o *</label>
            <textarea id="description" name="description" rows="6" required maxlength="5000" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">{{ old('description', $project->description ?? '') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <label for="delivery" class="block text-sm font-medium text-gray-700">Resumo da entrega</label>
            <textarea id="delivery" name="delivery" rows="3" maxlength="1000" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">{{ old('delivery', $project->delivery ?? '') }}</textarea>
            <x-input-error :messages="$errors->get('delivery')" class="mt-2" />
        </div>

        <div>
            <label for="technologies" class="block text-sm font-medium text-gray-700">Tecnologias</label>
            <input id="technologies" name="technologies" type="text" maxlength="1000" value="{{ old('technologies', $editing ? implode(', ', $project->technologies ?? []) : '') }}" placeholder="Laravel, Tailwind CSS, MySQL" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
            <p class="mt-1 text-xs text-gray-500">Separe cada tecnologia por v&iacute;rgula.</p>
            <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
        </div>

        <div>
            <label for="link" class="block text-sm font-medium text-gray-700">Link do projeto</label>
            <input id="link" name="link" type="url" maxlength="2048" value="{{ old('link', $project->link ?? '') }}" placeholder="https://" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
            <x-input-error :messages="$errors->get('link')" class="mt-2" />
        </div>
    </section>

    <aside class="admin-editor__aside space-y-7 border-t border-gray-200 pt-6 lg:border-l lg:border-t-0 lg:pl-6 lg:pt-0" aria-labelledby="publishing-title">
        <div>
            <h2 id="publishing-title" class="text-lg font-semibold text-gray-900">Publica&ccedil;&atilde;o</h2>
            <div class="mt-4 space-y-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                    <select id="status" name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
                        <option value="draft" @selected(old('status', $project->status ?? 'draft') === 'draft')>Rascunho</option>
                        <option value="published" @selected(old('status', $project->status ?? '') === 'published')>Publicado</option>
                    </select>
                </div>
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700">Ordem *</label>
                    <input id="sort_order" name="sort_order" type="number" required min="0" max="9999" value="{{ old('sort_order', $project->sort_order ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700">
                </div>
            </div>
        </div>

        <div>
            <label for="images" class="block text-sm font-medium text-gray-700">Imagens</label>
            <input id="images" name="images[]" type="file" multiple accept="image/jpeg,image/png,image/webp" class="mt-2 block w-full text-sm text-gray-600 file:mr-3 file:rounded-md file:border-0 file:bg-gray-100 file:px-3 file:py-2 file:font-semibold file:text-gray-700 hover:file:bg-gray-200">
            <p class="mt-1 text-xs text-gray-500">At&eacute; 10 arquivos JPG, PNG ou WebP, 5 MB cada. A primeira ser&aacute; a capa.</p>
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
            <x-input-error :messages="$errors->get('images.*')" class="mt-2" />

            @if ($editing && filled($project->images))
                <div class="mt-4 grid grid-cols-2 gap-3">
                    @foreach ($project->images as $image)
                        <label class="overflow-hidden rounded border border-gray-200 bg-white">
                            <img src="{{ $image }}" alt="" class="aspect-[4/3] w-full object-cover">
                            <span class="flex items-center gap-2 p-2 text-xs text-gray-700">
                                <input type="checkbox" name="remove_images[]" value="{{ $image }}" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> Remover
                            </span>
                        </label>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="video" class="block text-sm font-medium text-gray-700">V&iacute;deo de demonstra&ccedil;&atilde;o</label>
            <input id="video" name="video" type="file" accept="video/mp4,video/webm,video/quicktime" class="mt-2 block w-full text-sm text-gray-600 file:mr-3 file:rounded-md file:border-0 file:bg-gray-100 file:px-3 file:py-2 file:font-semibold file:text-gray-700 hover:file:bg-gray-200">
            <p class="mt-1 text-xs text-gray-500">MP4, WebM ou MOV, at&eacute; 50 MB.</p>
            <x-input-error :messages="$errors->get('video')" class="mt-2" />
            @if ($editing && $project->video_path)
                <label class="mt-3 flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="remove_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500"> Remover v&iacute;deo atual
                </label>
            @endif
        </div>
    </aside>
</div>

<div class="admin-editor__actions mt-8 flex flex-wrap items-center gap-3 border-t border-gray-200 pt-6">
    <x-primary-button class="admin-submit">{{ $editing ? 'Salvar alterações' : 'Criar projeto' }}</x-primary-button>
    <a href="{{ route('dashboard') }}" class="inline-flex min-h-10 items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Cancelar</a>
</div>
