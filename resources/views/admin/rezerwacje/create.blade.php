<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex m-2 p-2">
                <a href= "{{route('admin.rezerwacje.index')}}" class = "px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> Powrót </a>
            </div>
        
            <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 ">
                <form method = "POST" action ="{{ route('admin.rezerwacje.store')}}">
                  @csrf
                  <div class="sm:col-span-6">
                    <label for="imie" class="block text-sm font-medium text-gray-700"> Imię </label>
                    <div class="mt-1">
                      <input type="text" id="imie" name="imie" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('imie') border-red-400 @enderror" />
                    </div>
                    @error('imie')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="nazwisko" class="block text-sm font-medium text-gray-700"> Nazwisko </label>
                    <div class="mt-1">
                      <input type="text" id="nazwisko" name="nazwisko" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nazwisko') border-red-400 @enderror" />
                    </div>
                    @error('nazwisko')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700"> E-mail </label>
                    <div class="mt-1">
                      <input type="text" id="email" name="email" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" />
                    </div>
                    @error('email')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="numer_telefonu" class="block text-sm font-medium text-gray-700"> Numer telefonu </label>
                    <div class="mt-1">
                      <input type="text" id="numer_telefonu" name="numer_telefonu" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('numer_telefonu') border-red-400 @enderror" />
                    </div>
                    @error('numer_telefonu')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="data_rezerwacji" class="block text-sm font-medium text-gray-700"> Data rezerwacji </label>
                    <div class="mt-1">
                      <input type="date" id="data_rezerwacji" name="data_rezerwacji" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('data_rezerwacji') border-red-400 @enderror" />
                    </div>
                    @error('data_rezerwacji')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="godzina_rezerwacji" class="block text-sm font-medium text-gray-700"> Godzina rezerwacji </label>
                    <div class="mt-1">
                      <input type="time" id="godzina_rezerwacji" name="godzina_rezerwacji" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('godzina_rezerwacji') border-red-400 @enderror" />
                    </div>
                    @error('godzina_rezerwacji')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="liczba_osob" class="block text-sm font-medium text-gray-700"> Liczba osób </label>
                    <div class="mt-1">
                      <input type="number" id="liczba_osob" name="liczba_osob" min = "0" max = "12" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('liczba_osob') border-red-400 @enderror" />
                    </div>
                    @error('liczba_osob')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="stolik_id" class="block text-sm font-medium text-gray-700">Stolik</label>
                            <div class="mt-1">
                                <select id="stolik_id" name="stolik_id" class="form-multiselect block w-full mt-1">
                                @foreach($stoliki as $stolik)
                                  <option value="{{$stolik->id}}"> {{$stolik->nazwa}} ({{$stolik->liczba_osob}})</option>
                                  @endforeach
                                </select>
                            </div>
                  </div>
             <div class="pt-4">
                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Zapisz</button>
              </div>
          </form>
            </div>
            </div>


        </div>
    </div>
</x-admin-layout>
