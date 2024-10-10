<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Fetch all superheroes from the database
    $superheroes = Superhero::all();
    
    // Return the view with the superheroes data
    return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view that contains the form for adding a superhero
    return view('superheroes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form input
    $request->validate([
        'real_name' => 'required|max:255',
        'superhero_name' => 'required|max:255',
        'photo_url' => 'required|url',
        'additional_info' => 'nullable|string',
    ]);

    // Create a new superhero in the database
    Superhero::create([
        'real_name' => $request->real_name,
        'superhero_name' => $request->superhero_name,
        'photo_url' => $request->photo_url,
        'additional_info' => $request->additional_info,
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('superheroes.index')->with('success', 'Superhero added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Find the superhero by its ID
    $superhero = Superhero::findOrFail($id);

    // Return the view to display the superhero details
    return view('superheroes.show', compact('superhero'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Find the superhero by its ID
    $superhero = Superhero::findOrFail($id);

    // Return the view to edit the superhero
    return view('superheroes.edit', compact('superhero'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the form input
    $request->validate([
        'real_name' => 'required|max:255',
        'superhero_name' => 'required|max:255',
        'photo_url' => 'required|url',
        'additional_info' => 'nullable|string',
    ]);

    // Find the superhero by its ID and update its details
    $superhero = Superhero::findOrFail($id);
    $superhero->update([
        'real_name' => $request->real_name,
        'superhero_name' => $request->superhero_name,
        'photo_url' => $request->photo_url,
        'additional_info' => $request->additional_info,
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('superheroes.index')->with('success', 'Superhero updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Find the superhero by its ID and delete it
    $superhero = Superhero::findOrFail($id);
    $superhero->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('superheroes.index')->with('success', 'Superhero deleted successfully!');
}
}
