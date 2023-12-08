<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($kategorie as $kategoria)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($kategoria->zdjecie) }}" alt="Image" />
                    <div class="px-6 py-4">

                        <a href="{{ route('kategorie.show', $kategoria->id) }}">
                            <h4
                                class="mb-3 text-xl font-semibold tracking-tight text-red-600 hover:text-red-400 uppercase">
                                {{ $kategoria->nazwa }}</h4>
                                <p class="leading-normal text-gray-700">{{ $kategoria->opis }}</p>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-guest-layout>
