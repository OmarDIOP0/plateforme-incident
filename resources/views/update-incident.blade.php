<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Incident') }}
        </h2>
        @if (Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative" role="alert">
            {{ Session::get('success') }}
            <button class="bg-green-400 text-white rounded border border-green-400 px-3 py-3 hover:bg-green-700 " style="margin-left:60%"><a href="/dashboard">Voir la liste des incident</a></button>
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
                    @foreach ($incidents as $incident)
                <form action="/incident" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-6 mx-12 mt-5">
                        <label for="libelle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Libelle</label>
                        <input type="text" id="libelle" value="{{$incident->libelle}}" name="libelle" placeholder="Saisir le libelle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <div class="ui red">
                            @error('libelle')
                                <span class="bg-red-100 text-red-700 px-4 py-4 rounded relative">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6 mx-12">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" value="{{$incident->description}}" name="description" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Faire la description"></textarea>
                        <div class="ui red">
                            @error('description')
                                <span class="bg-red-100 text-red-700 px-4 py-4 rounded relative">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6 mx-12 mt-5">
                        <label for="Lieu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu</label>
                        <input type="text" id="lieu" value="{{$incident->lieu}}" name="lieu" placeholder="Saisir le libelle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <div class="ui red">
                            @error('lieu')
                                <span class="bg-red-100 text-red-700 px-4 py-4 rounded relative" style="margin-top: 30px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6 mx-12 ">
                        <input name="image" value="{{$incident->image}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        <div class="ui red">
                            @error('image')
                                <span class="bg-red-100 text-red-700 px-4 py-4 rounded relative">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      <button type="submit" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-6 mx-12">Modifier</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
