<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach($kategorie->menus as $menu)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($menu->zdjecie) }}" alt="Image" />
                    <div class="px-6 py-4">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-red-600 uppercase">
                            {{ $menu->nazwa }}</h4>
                        <p class="leading-normal text-gray-700">
                            {{ $menu->opis }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-xl text-red-600">{{ $menu->cena }}zł</span>
                        <a href="{{route('koszyki.store', $menu->id)}}"><button class="px-4 py-2 bg-red-600 text-white" type="submit">Zamów</button> </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
