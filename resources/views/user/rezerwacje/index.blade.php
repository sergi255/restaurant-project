<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-white uppercase bg-gray-800 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Imię
                </th>
                <th scope="col" class="px-6 py-3">
                    Nazwisko
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Numer telefonu
                </th>
                <th scope="col" class="px-6 py-3">
                    Data rezerwacji
                </th>
                <th scope="col" class="px-6 py-3">
                    Godzina rezerwacji
                </th>
                <th scope="col" class="px-6 py-3">
                    Id_stolu
                </th>
                <th scope="col" class="px-6 py-3">
                    Liczba osób
                </th>
                <th scope="col" class="px-6 py-3">
                    Akcja
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($rezerwacje as $rezerwacja)
            <tr >
            <td class="px-6 py-4 border">
                {{ $rezerwacja ->imie }}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja ->nazwisko }}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja ->email }}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja ->numer_telefonu }}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja ->data_rezerwacji}}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja ->godzina_rezerwacji}}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja->stolik->nazwa}}
                </td>
                <td class="px-6 py-4 border">
                {{ $rezerwacja ->liczba_osob }}
                </td>
                <td class="px-6 py-4 border">
                            <div class="flex space-x-2">
                            <a href="{{route('user.rezerwacje.edit', $rezerwacja->id)}}" class="px-4 py-2 bg-green-500 hover: bg-green-700 rounded-lg text-white">Edytuj</a>
                            <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                method="POST"
                                action="{{ route('user.rezerwacje.destroy', $rezerwacja->id) }}"
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
</x-user-layout>
