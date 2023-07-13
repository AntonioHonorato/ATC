<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Technical;
use Illuminate\Http\Request;

/**
 * Class IncidentController
 * @package App\Http\Controllers
 */
class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::paginate();

        return view('incident.index', compact('incidents'))
            ->with('i', (request()->input('page', 1) - 1) * $incidents->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incident = new Incident();
        $technical = Technical::pluck('name','id');
        return view('incident.create', compact('incident','technical'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Incident::$rules);

        $incident = Incident::create($request->all());

        return redirect()->route('incidents.index')
            ->with('success', 'Incident created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incident = Incident::find($id);

        return view('incident.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incident = Incident::find($id);

        return view('incident.edit', compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Incident $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        request()->validate(Incident::$rules);

        $incident->update($request->all());

        return redirect()->route('incidents.index')
            ->with('success', 'Incident updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $incident = Incident::find($id)->delete();

        return redirect()->route('incidents.index')
            ->with('success', 'Incident deleted successfully');
    }
}
