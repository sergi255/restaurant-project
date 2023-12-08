<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex m-2 p-2">
                <a href= "{{route('admin.opinie.index')}}" class = "px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> Powrót </a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 ">
            <form method = "POST" action="{{ route('admin.opinie.update', $opinie->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="sm:col-span-6">
                    <label for="imie" class="block text-sm font-medium text-gray-700"> Imię </label>
                    <div class="mt-1">
                      <input type="text" id="imie" name="imie" value="{{ $opinie->imie }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('imie') border-red-400 @enderror" />
                    </div>
                    @error('imie')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700"> E-mail </label>
                    <div class="mt-1">
                      <input type="text" id="email" name="email"value="{{ $opinie->email }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" />
                    </div>
                    @error('email')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="sm:col-span-6 pt-5">
                    <label for="opinia" class="block text-sm font-medium text-gray-700">Opinia</label>
                    <div class="mt-1">
                      <textarea id="opinia" name="opinia" rows="3" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('opinia') border-red-400 @enderror">
                      {{ $opinie->opinia }}
                      </textarea>
                  </div>
                    @error('opinia')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
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
