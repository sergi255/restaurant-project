<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 ">
                    <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="nazwa" class="block text-sm font-medium text-gray-700"> Nazwa </label>
                            <div class="mt-1">
                                <input type="text" id="nazwa" name="nazwa" value="{{ $menu->nazwa }}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nazwa') border-red-400 @enderror" />
                            </div>
                            @error('nazwa')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
  
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="zdjecie" class="block text-sm font-medium text-gray-700"> Zdjęcie </label>
                            <div>
                                <img class="w-32 h-32" src="{{ Storage::url($menu->zdjecie) }}">
                            </div>
                            <div class="mt-1">
                                <input type="file" id="zdjecie" name="zdjecie"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('cena') border-red-400 @enderror" />
                            </div>
                            @error('cena')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror

                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="cena" class="block text-sm font-medium text-gray-700"> Cena </label>
                            <div class="mt-1">
                                <input type="number" min="0.00" max="10000.00" step="0.01" id="cena" name="cena"
                                    value="{{ $menu->cena }}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('zdjecie') border-red-400 @enderror" />
                            </div>
                            @error('zdjecie')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror

                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="opis" class="block text-sm font-medium text-gray-700">Opis</label>
                            <div class="mt-1">
                                <textarea id="body" rows="3" name="opis"
                                    class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('opis') border-red-400 @enderror">
                                {{ $menu->opis }}
                                </textarea>
                            </div>
                            @error('opis')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
   
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Kategorie</label>
                            <div class="mt-1">
                                <select id="kategoria" name="kategoria[]" class="form-multiselect block w-full mt-1"
                                    multiple>
                                    @foreach ($kategorie as $kategoria)
                                        <option value="{{ $kategoria->id }}" @selected($menu->kategoria->contains($kategoria))>
                                            {{ $kategoria->nazwa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" pt-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Edytuj</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
