<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Incident') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

@if(!empty($incidents))
@foreach ($incidents as $incident)
    <div
         class="flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:max-w-xl md:flex-row" style="display: flex">
    <img
        class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
        src="{{ URL::asset('images/'.$incident->image)}}" height="560px" width="500px"
        alt="" />
    <div class="flex flex-col justify-start p-6">
    <h5
        class="mb-2 text-3xl font-bold text-neutral-800 dark:text-neutral-50">
        {{$incident->libelle}}
    </h5>
    <p class="mb-4 text-2xl dark:text-neutral-200">
        {{$incident->description}}
    </p>
    <p class="mb-4 text-2xl dark:text-neutral-200">
        {{$incident->lieu}}
    </p>
    <p class="text-xl text-neutral-500 dark:text-neutral-300">
        {{$incident->updated_at}}
    </p>
    </div>
    </div>
@endforeach
@else
    <h3>La Liste des incidents est vide!</h3>
@endif


            </div>
        </div>
    </div>
</x-app-layout>

