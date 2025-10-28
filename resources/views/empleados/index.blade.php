@extends('layouts.app')
@section('title', 'Lista de Empleados')
@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Lista de Empleados</h1>
            <a href="{{ route('empleados.create') }}" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-white hover:bg-gray-800">Nuevo</a>
        </div>

        @if (session('status'))
            <div class="rounded-md bg-green-50 p-4 text-sm text-green-800">{{ session('status') }}</div>
        @endif

        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">ID</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nombre</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Apellido</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Email</th>
                            <th scope="col" class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($empleados as $empleado)
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-900">{{ $empleado->id }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $empleado->nombre }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $empleado->apellido }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $empleado->email }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('empleados.show', $empleado) }}" class="text-gray-700 hover:underline">Ver</a>
                                        <a href="{{ route('empleados.edit', $empleado) }}" class="text-gray-700 hover:underline">Editar</a>
                                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" onsubmit="return confirm('¿Eliminar este empleado?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $empleados->links() }}
        </div>
    </div>
@endsection
