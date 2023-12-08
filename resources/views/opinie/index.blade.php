<x-guest-layout>
<div
      class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
      style="background-image: url('https://ipla.pluscdn.pl/dituel/cp/b5/b5yby4d6f9gitz7o3ftkbku4kdoe1abe.jpg')">
      <div class="mx-auto mt-2 text-red-400 font-bold md:text-center lg:text-lg">
      Odwiedziłeś nasz lokal? Zostaw po sobie opinię aby ułatwić wybór innym.
      </div>
      <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <a href="{{ route('opinie.create') }}" type="button"
            class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-red-600 rounded-full lg:w-full md:w-auto hover:bg-red-700 focus:outline-none">
            Napisz opinię.
          </a>
      </div>
    </div>
<div class="my-16 text-center">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-rose-400 to-red-700">
          Opinie </h2>
        <p class="text-xl text-red-800">Przejrzyj opinie o naszym lokalu</p>
      </div>
      @foreach($opinie as $opinia)
            <h4 class="text-2xl font-semibold text-black"> Dodana przez : {{ $opinia -> imie }}</h4>
            <h4 class="text-l font-semibold text-black"> Email : {{ $opinia -> email }}</h4>
            <h4 class="text-l font-semibold text-black"> Dodana : {{ $opinia->created_at }}</h4>
            <p class=" text-black"> Opinia : {{ $opinia -> opinia }}</p>
</br></br>
<hr class="border-3 border-red-500  " />
     @endforeach


</x-guest-layout>
