<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function create(Request $request)
    {
        return view('exercises.create');
    }

    public function store(Request $request, $exercicio_id)
    {
        $request->validate([
            'name' => 'required',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'carga' => 'required|numeric', // Adicionando validação para carga
        ]);

        $exercise = $request->only(['name', 'sets', 'reps', 'carga']); // Incluindo carga

        $workouts = $request->session()->get('workouts', []);
        $workouts[$exercicio_id]['exercises'][] = $exercise;
        $request->session()->put('workouts', $workouts);

        return redirect('/home');
    }

    public function edit($exercicio_id, $exerciseId, Request $request)
    {
        $workouts = $request->session()->get('workouts', []);
        $exercise = $workouts[$exercicio_id]['exercises'][$exerciseId];

        return view('exercises.edit', compact('exercise', 'exercicio_id', 'exerciseId'));
    }

    public function update(Request $request, $exercicio_id, $exerciseId)
    {
        $request->validate([
            'name' => 'required',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'carga' => 'required|numeric',
        ]);

        $workouts = $request->session()->get('workouts', []);
        $workouts[$exercicio_id]['exercises'][$exerciseId] = $request->only(['name', 'sets', 'reps','carga']);
        $request->session()->put('workouts', $workouts);

        return redirect('/home');
    }

    public function destroy($exercicio_id, $exerciseId, Request $request)
    {
        $workouts = $request->session()->get('workouts', []);
        unset($workouts[$exercicio_id]['exercises'][$exerciseId]);
        $workouts[$exercicio_id]['exercises'] = array_values($workouts[$exercicio_id]['exercises']);
        $request->session()->put('workouts', $workouts);

        return redirect('/home');
    }
}
{
    //
}
