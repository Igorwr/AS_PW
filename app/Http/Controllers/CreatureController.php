<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Http\Request;

class CreatureController extends Controller
{
    public function index()
    {
        $creatures = Creature::all();
        return view('creatures.index', compact('creatures'));
    }

    public function create()
    {
        return view('creatures.create');
    }

    public function store(Request $request)
    {
        Creature::create($request->all());
        return redirect('creatures')->with('success', 'Creature created successfully.');
    }

    public function edit($id)
    {
        $creatures = Creature::findOrFail($id);
        return view('creatures.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $creatures = Creature::findOrFail($id);
        $creatures->update($request->all());
        return redirect('creatures')->with('success', 'Creature updated successfully.');
    }

    public function destroy($id)
    {
        $creatures = Creature::findOrFail($id);
        $creatures->delete();
        return redirect('creatures')->with('success', 'Creature deleted successfully.');
    }

}
