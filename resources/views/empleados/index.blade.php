@extends('layouts.app')
@section('title', 'Lista de Empleados')
@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Lista de Empleados</h1>

        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">ID</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nombre</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Apellido</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Email</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($empleados as $empleado)
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-900">{{ $empleado->id }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $empleado->nombre }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $empleado->apellido }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $empleado->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
