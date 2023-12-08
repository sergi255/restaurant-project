<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nazwa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cena
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuń
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($koszyki as $koszyk)
                        <td class="px-6 py-4">
                            {{ $koszyk->menu_nazwa }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $koszyk->cena }}

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                            <a href="{{route('koszyki.destroy', $koszyk->id)}}">
                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">Usuń</button>
                            </a>
                            
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                    <tr class="border-2">
                    <td class="px-6 py-4 text-xl">
                        Razem :
                    </td>
                    <td class="px-6 py-4 text-xl">
                        {{$suma}}.00
                    </td>
                    <td class="px-6 py-4">
                    <a href="{{route('zamowienia.index')}}">
                        @if($suma > 0)
            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white">Zamów</button>
            @endif
            </a>
                    </td>
                </tbody>
            </table>
            
        </div>

        </div>
    </div>
</x-guest-layout>
