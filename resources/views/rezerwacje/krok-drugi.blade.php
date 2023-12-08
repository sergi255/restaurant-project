<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col">
                    <div class="flex items-center justify-center p-6 sm:p-12">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Dokończ rezerwację</h3>

                            <h4 class="font-bold"> Krok 2 </h4>

                            <form method="POST" action="{{ route('rezerwacje.store.krok.drugi') }}">
                                @csrf
                                <div class="sm:col-span-6 pt-5">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Stolik</label>
                                    <div class="mt-1">
                                        <select id="stolik_id" name="stolik_id"
                                            class="form-multiselect block w-full mt-1">
                                            @foreach ($stoliki as $stolik)
                                                <option value="{{ $stolik->id }}" @selected($stolik->stolik_id == $rezerwacje->stolik_id)>
                                                    {{ $stolik->nazwa }}
                                                    ({{ $stolik->liczba_osob }} osób)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('stolik_id')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('rezerwacje.krok.pierwszy') }}"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Powrót</a>
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Rezerwuj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
