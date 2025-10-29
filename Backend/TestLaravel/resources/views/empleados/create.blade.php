@extends('layouts.app')
@section('title', 'Crear Empleado')
@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <h1 class="text-2xl font-semibold">Crear Empleado</h1>
        <form action="{{ route('empleados.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900" required>
                @error('nombre') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900" required>
                @error('apellido') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900" required>
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-white hover:bg-gray-800">Guardar</button>
                <a href="{{ route('empleados.index') }}" class="text-gray-700 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
