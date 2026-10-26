@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Registrar libro nuevo</h1>
        <a href="{{ route('libros.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">← Volver al Catálogo</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.store') }}" method="POST" class="bg-white shadow overflow-hidden sm:rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Titulo del Libro</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Codigo ISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Año de Publicacion</label>
            <input type="number" name="published_year" value="{{ old('published_year') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Editorial</label>
            <select name="publisher_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border">
                <option value="">Seleccione una editorial</option>
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Autores</label>
            <div class="grid grid-cols-2 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3 bg-gray-50">
                @foreach($autores as $autor)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="autores[]" value="{{ $autor->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">{{ $autor->name ?? $autor->nombre }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Categorias</label>
            <div class="grid grid-cols-2 gap-2 max-h-40 overflow-y-auto border border-gray-300 rounded-md p-3 bg-gray-50">
                @foreach($categorias as $categoria)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">{{ $categoria->name ?? $categoria->nombre }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('libros.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancelar</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">Guardar libro</button>
        </div>
    </form>
</div>
@endsection