<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col ">
                    <div class="flex items-center justify-center p-6 ">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Zrób rezerwacje</h3>

                                   <h4 class="font-bold"> Krok 1 </h4>
                           

                            <form method="POST" action="{{ route('rezerwacje.store.krok.pierwszy') }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700"> Imię
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="imie" name="imie"
                                            value="{{ $rezerwacje->imie ?? '' }}"
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
                                            value="{{ $rezerwacje->nazwisko ?? '' }}"
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
                                            value="{{ $rezerwacje->email ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('email')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="numer_telefonu" class="block text-sm font-medium text-gray-700"> Numer telefonu
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="numer_telefonu" name="numer_telefonu"
                                            value="{{ $rezerwacje->numer_telefonu ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('numer_telefonu')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="data_rezerwacji" class="block text-sm font-medium text-gray-700"> Data rezerwacji
                                    </label>
                                    <div class="mt-1">
                                        <input type="date" id="data_rezerwacji" name="data_rezerwacji"
                                            value="{{ $rezerwacje->data_rezewarcji ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    <span class="text-xs">Możesz zarezerwować stolik maksymalnie 4 tygodnie w przód.</span>
                                    @error('data_rezerwacji')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="godzina_rezerwacji" class="block text-sm font-medium text-gray-700"> Godzina rezerwacji
                                    </label>
                                    <div class="mt-1">
                                        <input type="time" id="godzina_rezerwacji" name="godzina_rezerwacji"
                                            value="{{ $rezerwacje->godzina_rezerwacji ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    <span class="text-xs">Restauracja jest otwara w godzinach 12:00 - 23:00.</span>
                                    @error('godzina_rezerwacji')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="liczba_osob" class="block text-sm font-medium text-gray-700"> Liczba osób
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="liczba_osob" name="liczba_osob"
                                            value="{{ $rezerwacje->liczba_osob ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('liczba_osob')
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
