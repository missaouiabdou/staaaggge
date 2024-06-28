<?php

namespace App\Http\Controllers;
use App\Exports\dataagens;
use App\Models\agen;
use App\Models\diplom;
use Illuminate\Http\Request;


class agcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
if(session('agents_search')){
            $agens = session('agents_search');
        }
else{
            $agens = agen::orderByDesc('cin')->paginate('9');


}
        return view ('agens.index')->with(['agens'=> $agens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agens.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cin' => 'required|string|max:255|unique:agens|regex:/^[A-Za-z]{1,2}\d{3,6}$/',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:agens',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieux_naissance' => 'required|string|max:255',
            'type' => 'required|string|in:urbain,rural',
            'situation_familiale' => 'required|string|in:celibataire,marie,veuf,divorce',
            'nombre_enfants' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|max:2048',
            'date_embauche' => 'required|date',
            'diploma' => 'required|in:yes,no',
            'Observation'=>'required|string|max:255'
        ], [
            'cin.required' => 'Le champ CIN est obligatoire.',
            'cin.regex' => 'Le format du champ CIN est invalide.',
            'cin.unique' => 'Ce CIN est déjà utilisé.',
            'nom.required' => 'Le champ Nom est obligatoire.',
            'prenom.required' => 'Le champ Prénom est obligatoire.',
            'email.required' => 'Le champ Adresse Email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'adresse.required' => 'Le champ Adresse est obligatoire.',
            'date_naissance.required' => 'Le champ Date de Naissance est obligatoire.',
            'lieux_naissance.required' => 'Le champ Lieu de Naissance est obligatoire.',
            'type.required' => 'Le champ Type est obligatoire.',
            'type.in' => 'Le champ Type doit être soit "urbain" soit "rural".',
            'situation_familiale.required' => 'Le champ Situation Familiale est obligatoire.',
            'situation_familiale.in' => 'La situation familiale doit être soit "celibataire", "marie", "veuf" ou "divorce".',
            'nombre_enfants.integer' => 'Le champ Nombre d\'Enfants doit être un nombre entier.',
            'nombre_enfants.min' => 'Le champ Nombre d\'Enfants doit être au moins :min.',
            'photo.image' => 'Le champ Photo doit être une image.',
            'photo.max' => 'La taille maximale du fichier photo est de 2 Mo.',
            'date_embauche.required' => 'Le champ Date d\'Embauche est obligatoire.',
            'diploma.required' => 'Le champ Diplôme est obligatoire.',
            'diploma.in' => 'Le champ Diplôme doit être soit "yes" soit "no".',
            'Observation.'=>'Le champ observation est obligatoire',
            'photo' => 'nullable|image|max:2048'
        ]);
        $agen=new agen;
        $agen->cin=$request->cin;
        $agen->nom=$request->nom;
        $agen->prenom=$request->prenom;
        $agen->phone=$request->phone;
        $agen->email=$request->email;
        $agen->adresse=$request->adresse;
        $agen->Observation=$request->Observation;
        $agen->date_naissance=$request->date_naissance;
        $agen->lieux_naissance=$request->lieux_naissance;
        $agen->type=$request->type;
        $agen->situation_familiale=$request->situation_familiale;
        $agen->nombre_enfants=$request->nombre_enfants;
        if ($request->hasFile('photo')) {
            $imageName = $request->file('photo');
            $image = time().'.'.$imageName->getClientOriginalExtension();
            $imageName->move(public_path('fichier'), $image);
            $agen->photo = $image;
        }
        $agen->date_embauche = $request->date_embauche;
        $agen->save();



        $diploma = $request->input('diploma');

        if ($diploma === 'yes') {
            return redirect()->route('diplomes.create');
        } else {
            return redirect()->route('agens.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(agen $agen)
{
    $diplomes = diplom::where('cin', $agen->cin)->get(); // Retrieve all diplomas for the agent
    return view('agens.show', ['agen' => $agen,'diplomes'=>$diplomes]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agen = agen::where('cin', $id)->first();
        return view('agens.edit', compact('agen'));
    }
    public function update(Request $request, agen $agen)
    {
        $validatedData = $request->validate([
            'cin' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|email',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieux_naissance' => 'required|string|max:255',
            'type' => 'required|string|in:urbain,rural',
            'situation_familiale' => 'required|string|in:celibataire,marie,veuf,divorce',
            'nombre_enfants' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|max:2048',
            'date_embauche' => 'required|date',
            'Observation' => 'required|string|max:255'
            // Add validation rules for other fields
        ]);

        // Update the existing record
        if ($request->hasFile('photo')) {
            $imageName = $request->file('photo');
            $image = time().'.'.$imageName->getClientOriginalExtension();
            $imageName->move(public_path('fichier'), $image);
            $validatedData['photo'] = $image;
        }

        $agen->update($validatedData);

        return redirect()->route('agens.index');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cin)
    {
        $agens = agen::findOrFail($cin);

        $agens->delete();
        return redirect()->route('agens.index');

    }
    public function search(Request $request)
    {
        $search = $request->search;
        $agens = agen::where('cin', 'like', '%'.$search.'%')
                                ->orWhere('nom', 'like', '%'.$search.'%')
                                ->orWhere('prenom', 'like', '%'.$search.'%')
                                ->orWhere('email', 'like', '%'.$search.'%')
                                ->paginate(9);

        return redirect()->route('agens.index')->with(['agents_search'=>$agens]);
    }
    public function export()
    {
        return Excel::download(new dataagens, 'agens.xlsx');
    }


}





