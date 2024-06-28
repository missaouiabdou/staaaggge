<?php

namespace App\Http\Controllers;

use App\Models\agen;
use App\Models\diplom;
use Illuminate\Http\Request;
use Storage;

class diplomecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    if(session('diploms')){
        $diplom = session('diploms');

        }else{
            $diplom = diplom::orderBy('id')->paginate('10');
}

        return view('diplomes.index',["diplom"=>$diplom]);
    }

    public function search_diplomes(){
        $filliere =request('filliere');

        $diplom = diplom::where('filliere','LIKE','%'.$filliere.'%')->paginate('10');

        return redirect()->route('diplomes.index')->with('diploms',$diplom);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agens=agen::all();
        return view('diplomes.create',["agens"=>$agens]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'date_obtenu' => 'required|date',
            'mention' => 'required|string|max:255',
            'filliere' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'ID_Dipolm' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $diploma = new diplom;
        $diploma->name = $request->name;
        $diploma->niveau = $request->niveau;
        $diploma->institution = $request->institution;
        $diploma->date_obtenu = $request->date_obtenu;
        $diploma->mention = $request->mention;
        $diploma->filliere = $request->filliere;
        $diploma->cin = $request->cin;
        $diploma->ID_Dipolm = $request->ID_Dipolm;


        if ($request->hasFile('photo')) {
            $imageName = $request->file('photo')->getClientOriginalName();
            $image = time() . '_' . $imageName;
            $request->file('photo')->move(public_path('diplomesphotos'), $image);
            $diploma->photo = $image;
        }
        $diploma->save();


        return redirect()->route('diplomes.index')->with('success', 'Diplome créé avec succès!');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $diplome = Diplom::findOrFail($id);

        // Pass the diploma data to the show view
        return view('diplomes.show', compact('diplome'));

        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(diplom $diplome)
    {

        return view('diplomes.edit',['diplome'=>$diplome]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, diplom $diplome)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'date_obtenu' => 'required|date',
            'mention' => 'required|string|max:255',
            'filliere' => 'required|string|max:255',

            'ID_Dipolm' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);




        if ($request->hasFile('photo')) {
            $imageName = $request->file('photo')->getClientOriginalName();
            $image = time() . '_' . $imageName;
            $request->file('photo')->move(public_path('diplomesphotos'), $image);
            $validatedData['photo'] = $image;
        }
        $diplome->update($validatedData);


        return redirect()->route('diplomes.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deplom = diplom::findOrFail($id);

        $deplom->delete();

        return redirect()->route('diplomes.index');
    }



}
