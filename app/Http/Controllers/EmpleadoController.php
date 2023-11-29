<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Requests\EmpleadoStoreRequest;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //traer todos los empleados con el ORM
        $empleados = Empleado::all();

        //retornar una respuesta Json
        return response()->json([
            "message" => 'Lista de usuarios',
            "empleados" => $empleados
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoStoreRequest $request)
    {
        //con el EmpleadoStoreRequest validamos los datos para crear o actualizar 
        try {
            //creamos el empleado con lo que llega de la request
            Empleado::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'razon_social' => $request->razon_social,
                'cedula' => $request->cedula,
                'telefono' => $request->telefono,
                'pais' => $request->pais,
                'ciudad' => $request->ciudad,
            ]);

            //respuesta 201 para confirmar la creacion del usuario
            return response()->json([
                'tipo' => 'success',
                'message' => 'Empleado creado exitosamente'
            ], 201);

        } catch (\Throwable $e) {
            //si hay un error en la base de datos retorna mensaje de error
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            //traer el empleado con el id;
            $empleado = Empleado::find($id);

            //retornar una respuesta Json
            return response()->json([
                "message" => 'Usuarios solicitado',
                "empleado" => $empleado
            ], 200);
        } catch (\Throwable $e) {
            //si no encuentra el usuario a eliminar o surge un error de BD
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }


    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoStoreRequest $request, string $id)
    {

        try {
            $empleado = Empleado::find($id);
            //actializamos los datos menos la Cedula
            $empleado->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'razon_social' => $request->razon_social,
                'telefono' => $request->telefono,
                'pais' => $request->pais,
                'ciudad' => $request->ciudad
            ]);
            //retornar una respuesta Json
            return response()->json([
                'tipo' => 'success',
                'message' => 'Empleado actualizado exitosamente'
            ], 200);

        } catch (\Throwable $e) {
            //si hay un error en la base de datos retorna mensaje de error
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            //buscamos el usuario
            $empleado = Empleado::find($id);
            //eliminamos el empleado
            $empleado->delete();
            //retornar una respuesta Json
            return response()->json([
                'message' => 'Usuario eliminado exitosamente'
            ]);
        } catch (\Throwable $e) {
            //si no encuentra el usuario a eliminar o surge un error de BD
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }
    }
}