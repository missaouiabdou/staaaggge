<?php

namespace App\Http\Controllers;

use App\Models\agen;

use App\Models\conges;
use Illuminate\Http\Request;

class CongesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Handle search functionality (leverage existing search logic)
        if ($request->has('cin_ag')) {
            return $this->search($request, $request->get('cin')); // Delegate to search function
        }

        // Retrieve all conges entries if no search is performed
        $conges = Conges::where('D
        ate_Fin', '>=', now())->orderBy('date_fin')->paginate(10);

        return view('conges.index', compact('conges'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function addconger(agen $agen)

    {
        return view('conges.create',['agen'=>$agen]);}

    public function search()
    {
        // Validate input
        $cin_ag =request('cin_ag');




        // Search using Query Builder
        $conges = Conges::where('cin_ag', 'like', '%'.$cin_ag.'%')->get();

        // Check for empty results
        if ($conges->isEmpty()) {
            return view('conges.index', compact('conges'));
        }

        // Return view with results
        return view('conges.index', compact('conges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cin_ag' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'date_debut' => 'required|date|max:255',
            'date_fin' => 'required|date|max:255',
        ]);

        if ($request->date_debut > $request->date_fin) {
            return redirect()->back()->with('message', 'Les dates sont incorrectes');
        } else {
            // Find the agent by CIN
            $agen = Agen::where('cin', $request->cin_ag)->firstOrFail();

            // Calculate the days taken
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date_debut);
            $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date_fin);
            $daysTaken = $endDate->diffInDays($startDate) ; // +1 to include the end date

            // Get allowed days based on agent type
            $allowedDays = ($agen->type == 'urbain') ? 22 : 15;

            // Get the last remaining days
            $lastConges = Conges::where('cin_ag', $request->cin_ag)->orderBy('id', 'desc')->first();
            $restDays = $lastConges ? $lastConges->reste : $allowedDays;

            // Calculate remaining days
            $remainingDays = max(0, $restDays - $daysTaken);

            // Save the new leave request
            $conges = new Conges;
            $conges->cin_ag = $request->cin_ag;
            $conges->status = $request->status;
            $conges->date_debut = $request->date_debut;
            $conges->date_fin = $request->date_fin;
            $conges->reste = $remainingDays;

            $conges->save();
        }

        $conges = Conges::all();

        return view('Conges.index', ["conges" => $conges]);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $conges = Conges::findorfail($id);

        // Pass the diploma data to the show view
        return view('Conges.show', compact('conges'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(conges $conges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, conges $conges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(conges $conges)
    {
        //
    }
}
