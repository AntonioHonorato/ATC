<?php

namespace App\Http\Controllers;

use App\Models\Technical;
use Illuminate\Http\Request;

/**
 * Class TechnicalController
 * @package App\Http\Controllers
 */
class TechnicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technical = Technical::paginate();

        return view('technical.index', compact('technical'))
            ->with('i', (request()->input('page', 1) - 1) * $technical->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technical = new Technical();
        return view('technical.create', compact('technical'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Technical::$rules);

        $technical = Technical::create($request->all());

        return redirect()->route('technical.index')
            ->with('success', 'Technical created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technical = Technical::find($id);

        return view('technical.show', compact('technical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technical = Technical::find($id);

        return view('technical.edit', compact('technical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Technical $technical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technical $technical)
    {
        request()->validate(Technical::$rules);

        $technical->update($request->all());

        return redirect()->route('technicals.index')
            ->with('success', 'Technical updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $technical = Technical::find($id)->delete();

        return redirect()->route('technicals.index')
            ->with('success', 'Technical deleted successfully');
    }
}
