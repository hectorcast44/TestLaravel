<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleados::latest()->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:empleados,email'],
        ]);

        Empleados::create($data);

        return redirect()->route('empleados.index')->with('status', 'Empleado creado correctamente');
    }

    public function show(Empleados $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleados $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleados $empleado)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:empleados,email,' . $empleado->id],
        ]);

        $empleado->update($data);

        return redirect()->route('empleados.index')->with('status', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleados $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('status', 'Empleado eliminado correctamente');
    }
}
