<x-guest-layout> 
    <!-- Main Hero Content -->
    <div
      class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
      style="background-image: url('https://ipla.pluscdn.pl/dituel/cp/b5/b5yby4d6f9gitz7o3ftkbku4kdoe1abe.jpg')">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-rose-400 to-red-700 md:text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block">Taras u Borasa</span>
      </h1>
      <div class="mx-auto mt-2 text-black-400 font-bold md:text-center lg:text-lg">
        Najlepsza kuchnia tajska w Polsce </br>
        Otwarte codziennie w godzinach 12:00 - 23:00
      </div>
      <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <a href="{{ route('rezerwacje.krok.pierwszy') }}" type="button"
            class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-red-600 rounded-full lg:w-full md:w-auto hover:bg-red-700 focus:outline-none">
            Rezerwuj stolik
          </a>
      </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
      <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
          <div class="w-full md:w-1/2 md:px-3">
            <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
              <!-- <h1
              class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
            > -->
              <h3 class="text-xl">Nasza restauracja
              </h3>
              <h2 class="text-4xl text-red-600">Opis</h2>
              <!-- </h1> -->
              <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
              Kuchnia tajska. Powiem tak. Kuchnia dobra, kuchania ze smakiem, kuchania egzotyczna.
              Czy to najlepsza kuchnia na świecie? Tego nie wiem. Ale nasz kucharz Mathieu Borą 
              postara się ją przyrządzić jak najlepiej. Smacznie. Świeżo
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
              <img src="https://bi.im-g.pl/im/e8/a7/1a/z27950056IER,Mateusz-Borek.jpg" />
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="mt-8 bg-white">
      <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Nasze menu</h3>
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-rose-400 to-red-700">
          Dania kuchni tajskiej</h2>
      </div>
      <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
                @foreach ($zibi->menus as $menu)
                    <div class="max-w-s mx-4 mb-2 rounded-lg shadow-lg">
                        <img class="w-full h-48" src="{{ Storage::url($menu->zdjecie) }}" alt="Image" />
                        <div class="px-6 py-4">
                            <h4 class="mb-4 text-xl font-semibold tracking-tight text-red-600 uppercase">
                                {{ $menu->nazwa }}</h4>
                            <p class="leading-normal text-gray-700">{{ $menu->opis }}</p>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <span class="text-xl text-red-600">{{ $menu->cena }} zł</span>
                            <a href="{{route('koszyki.store', $menu->id)}}"><button class="px-4 py-2 bg-red-600 text-white" type="submit">Zamów</button> </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pt-4 pb-12">
      <div class="my-16 text-center">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-rose-400 to-red-700">
          Opinie </h2>
        <p class="text-xl text-red-800">Pare opinii o naszym lokalu</p>
      </div>
      
      <div class="grid gap-2 lg:grid-cols-3">
      @foreach($opinie as $opinia)
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg border-2 border-red-400">
          <div>
            <h2 class="text-3xl font-semibold text-black">{{ $opinia -> imie }}</h2>
            <p class="mt-2 text-black "> {{ $opinia -> opinia }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    

</x-guest-layout>