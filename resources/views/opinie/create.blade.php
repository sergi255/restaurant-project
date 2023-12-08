<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col ">
                    <div class="flex items-center justify-center p-6 ">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Napisz opinię</h3>
                           
                            <form method="POST" action="{{ route('opinie.store') }}">
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
                                <div class="sm:col-span-6 pt-5">
                    <label for="opinia" class="block text-sm font-medium text-gray-700">Opinia</label>
                    <div class="mt-1">
                      <textarea id="opinia" name="opinia" rows="3" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('opinia') border-red-400 @enderror"></textarea>
                  </div>
                    @error('opinia')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
            </div>
                                <div class="mt-6 p-4 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Wyślij</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
