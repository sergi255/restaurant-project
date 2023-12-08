<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-white uppercase bg-gray-800 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Imię
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Opinia
                </th>
                <th scope="col" class="px-6 py-3">
                    Data opinii
                </th>
                <th scope="col" class="px-6 py-3">
                    Akcje
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($opinie as $opinia)
            <tr >
            <td class="px-6 py-4 border">
                {{ $opinia ->imie }}
                </td>
                <td class="px-6 py-4 border">
                {{ $opinia ->email }}
                </td>
                <td class="px-6 py-4 border">
                {{ $opinia->opinia }}
                </td>
                <td class="px-6 py-4 border">
                {{ $opinia->created_at }}
                </td>
                <td class="px-6 py-4 border">
                            <div class="flex space-x-2">
                            <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                method="POST"
                                action="{{ route('user.opinie.destroy', $opinia->id)}}"
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
