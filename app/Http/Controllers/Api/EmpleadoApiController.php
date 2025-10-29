<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class EmpleadoApiController extends Controller
{
    public function index()
    {
        return response()->json(Empleados::latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:empleados,email'],
        ]);

        $empleado = Empleados::create($data);
        return response()->json($empleado, Response::HTTP_CREATED);
    }

    public function show(Empleados $empleado)
    {
        return response()->json($empleado);
    }

    public function update(Request $request, Empleados $empleado)
    {
        $data = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'apellido' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:255', Rule::unique('empleados', 'email')->ignore($empleado->id)],
        ]);

        $empleado->update($data);
        return response()->json($empleado);
    }

    public function destroy(Empleados $empleado)
    {
        $empleado->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
