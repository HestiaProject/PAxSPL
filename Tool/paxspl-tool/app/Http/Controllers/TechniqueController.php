<?php

namespace App\Http\Controllers;

use App\Technique;
use App\Project;
use App\TechniqueProject;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return  view('projects.techniques.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $tech_pro = new TechniqueProject();
        $tech_pro->project_id = $request->project_id;

        $tech_pro->technique_id = $request->technique;

        $tech_pro->save();
        $project = Project::find($request->project_id);

        return redirect()->route('projects.technique_projects.index', compact('project'))
            ->with('success', 'Technique added to project successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function show(Technique $technique)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function edit(Technique $technique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technique $technique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technique $technique)
    {
        //
    }
}
