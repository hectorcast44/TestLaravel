@extends('layouts.app')
@section('title', 'Detalle del Empleado')
@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <h1 class="text-2xl font-semibold">Empleado #{{ $empleado->id }}</h1>
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
            <dl class="divide-y divide-gray-100">
                <div class="grid grid-cols-3 gap-4 py-3">
                    <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                    <dd class="col-span-2 text-sm text-gray-900">{{ $empleado->nombre }}</dd>
                </div>
                <div class="grid grid-cols-3 gap-4 py-3">
                    <dt class="text-sm font-medium text-gray-500">Apellido</dt>
                    <dd class="col-span-2 text-sm text-gray-900">{{ $empleado->apellido }}</dd>
                </div>
                <div class="grid grid-cols-3 gap-4 py-3">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="col-span-2 text-sm text-gray-900">{{ $empleado->email }}</dd>
                </div>
            </dl>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('empleados.edit', $empleado) }}" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-white hover:bg-gray-800">Editar</a>
            <a href="{{ route('empleados.index') }}" class="text-gray-700 hover:underline">Volver</a>
        </div>
    </div>
@endsection
