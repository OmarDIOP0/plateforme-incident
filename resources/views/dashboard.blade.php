<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @if (Session::has('success'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-4 rounded relative" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif

        @if (Session::has('fail'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-4 rounded relative" role="alert">
            {{ Session::get('fail') }}
        </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                    @if(!empty($incidents))
                       @foreach ($incidents as $incident)
                    <div class="rounded overflow-hidden shadow-lg">
                      <img class="w-full" src="{{ URL::asset('images/'.$incident->image)}}" style="width:100%" height="100px">
                      <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$incident->libelle}}</div>
                        <p class="text-gray-700 text-base">
                            {{$incident->description}}
                        </p>
                      </div>
                      <div class="mx-4 mb-3" style="display: flex">
                        <a href="/incident/delete/{{$incident->id}}">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                            </svg>
                        </a>
                        <a href="/incident/update/{{$incident->id}}">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                            </svg>

                        </a>
                        <a href="/incident/show/{{$incident->id}}" class="transition ease-in-out delay-150 mx-12 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Voir plus
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                      </div>
                    </div>
                    @endforeach
                </div>


            </div>
            @else
                <h3>La Liste des incidents est vide!</h3>
            @endif
        </div>
    </div>
</x-app-layout>
