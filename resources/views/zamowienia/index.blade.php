<x-guest-layout>
    Podsumowanie
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
                        
                    </tr>
                    @endforeach
                    <tr class="border-2">
                    <td class="px-6 py-4 text-xl">
                        Razem :
                    </td>
                    <td class="px-6 py-4 text-xl">
                        {{$suma}}.00
                    </td>
                </tbody>
            </table>
            
        </div>
        </div>
    </div>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col ">
                    <div class="flex items-center justify-center p-6 ">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Podaj dane do zamówienia</h3>
                            <form method="POST" action="{{ route('zamowienia.store') }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="imie" class="block text-sm font-medium text-gray-700"> Imię
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="imie" name="imie"
                                            value="{{ $zamowienie->imie ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('imie')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="nazwisko" class="block text-sm font-medium text-gray-700"> Nazwisko
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="nazwisko" name="nazwisko"
                                            value="{{ $zamowienie->nazwisko ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('nazwisko')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email"
                                            value="{{ $zamowienie->email ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('email')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="nr_telefonu" class="block text-sm font-medium text-gray-700"> Numer telefonu
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="nr_telefonu" name="nr_telefonu"
                                            value="{{ $zamowienie->numer_telefonu ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('numer_telefonu')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="adres" class="block text-sm font-medium text-gray-700"> Adres
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="adres" name="adres"
                                            value="{{ $zamowienie->numer_telefonu ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('numer_telefonu')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Dalej</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
