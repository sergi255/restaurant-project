<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        <div class="flex justify-end m-2 p-2">
            <a href= "{{route('admin.kategorie.create')}}" class = "px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> Utwórz kategorie </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-gray-800 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nazwa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Zdjęcie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opis
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Akcja
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        @foreach($kategorie as $kategoria)
                        <td class="px-6 py-4 border">
                            {{ $kategoria ->nazwa }}
                        </td>
                        <td class="px-6 py-4 border">
                           <img src = "{{Storage::url($kategoria->zdjecie)}}" class="w-16 h-16 rounded" >
                        </td>
                        <td class="px-6 py-4 border">
                            {{ $kategoria ->opis }}
                        </td>
                        <td class="px-6 py-4 border">
                            <div class="flex space-x-2">
                            <a href="{{route('admin.kategorie.edit', $kategoria->id)}}" class="px-4 py-2 bg-green-500 hover: bg-green-700 rounded-lg text-white">Edytuj</a>
                            <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                method="POST"
                                action="{{ route('admin.kategorie.destroy', $kategoria->id) }}"
                                onsubmit="return confirm('Jesteś pewien?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Usuń</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        </div>
    </div>
</x-admin-layout>
