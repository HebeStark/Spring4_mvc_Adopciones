<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnimalController extends Controller
{
   
    public function index()
    {
        $animales = Animal::latest()->paginate(10);
        return view('animales.index', compact('animales'));
    }

   
    public function create()
    {
        return view ('animales.create');
    }


    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'tipo' => 'required|in:perro,gato',
            'edad' => 'required|integer|min:0|max:30',
            'foto' => 'nullable|url',
        ]);

        try{
            animal::create($datosValidados);

            return redirect()
            ->route('animales.index')
            ->whith('success', 'Animal creado correctamente.');
         } catch (\Exception $e) {
            Log::error('Errot al crear animal', ['error' => $e->getMessage()]);

            return back()
            ->whithInput()
            ->whith('error', 'No se pudo crear el animal.');

         }
    }

    public function show(Animal $animal)
    {
        return view('animales.show', compact('animal'));
    }

   
    public function edit(Animal $animal)
    {
        return view('animales.edit', compact('animal'));
        
    }

    public function update(Request $request, Animal $animal)
    {
       $datosValidados = $request -> validate([
        'nombre' => 'required|string|min:2|max:100',
        'tipo' => 'required|in:perro,gato',
        'edad' => 'required|integer|min:0|max:30',
        'estado' => 'required|in:disponible,adoptado',
        'foto' => 'nullable|url',  
       ]);
       try{
          $animal->update($datosValidados);

          return redirect()
          ->route('animales.index')
          ->with('seccess', 'Animal actualizado correctamente.');
       } catch (\Exception $e) {
        Log::error('Error al actualizar animal', ['error' => $e->getMessage()]);

        return back()
        ->withInput()
        ->with('error', 'No se pudo actualizar el animal');
       }
    }

    public function destroy(Animal $animal)
    {
        try {
            $animal->delete();

            return redirect()
            ->route('animales.index')
            ->with('success', 'Animal eliminado correctamente');
        } catch (\Exception $e) {
            Log::error('Error al eliminar animal', ['error' => $e->getMessage()]);

            return redirect()
            ->route('animales,index')
            ->with('error', 'No se pudo eliminar el animal');
        }
    }
}
