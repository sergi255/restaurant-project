<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
            <a href= "{{route('admin.stoliki.create')}}" class = "px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> Utwórz stolik </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-white uppercase bg-gray-800 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nazwa
                </th>
                <th scope="col" class="px-6 py-3">
                    Liczba osób
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Lokalizacja
                </th>
                <th scope="col" class="px-6 py-3">
                    Akcja
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($stoliki as $stolik)
            <tr>
                <td class="px-6 py-4 border">
                {{ $stolik ->nazwa }}
                </td>
                <td class="px-6 py-4 border">
                {{ $stolik -> liczba_osob }}
                </td>
                <td class="px-6 py-4 border">
                {{ $stolik ->status }}
                </td>
                <td class="px-6 py-4 border">
                {{ $stolik ->lokalizacja }}
                </td>
                <td class="px-6 py-4 border">
                <div class="flex space-x-2">
                            <a href="{{route('admin.stoliki.edit', $stolik->id)}}" class="px-4 py-2 bg-green-500 hover: bg-green-700 rounded-lg text-white">Edytuj</a>
                            <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                method="POST"
                                action="{{ route('admin.stoliki.destroy', $stolik->id) }}"
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
