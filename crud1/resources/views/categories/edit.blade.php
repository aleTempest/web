@extends('layouts.app')
@section('content')
    <form class="w-full max-w-lg" action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Comida"
                       name="name" value="{{ $category->name }}">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Submit">
            </div>

        </div>
    </form>
@endsection

