<?php

namespace App\Http\Controllers;

use App\Project;
use App\TechniqueProject;
use Illuminate\Http\Request;

class TechniqueProjectController extends Controller
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
        return  view('projects.technique_projects.index', compact('project'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TechniqueProject  $techniqueProject
     * @return \Illuminate\Http\Response
     */
    public function show(TechniqueProject $techniqueProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TechniqueProject  $techniqueProject
     * @return \Illuminate\Http\Response
     */
    public function edit(TechniqueProject $techniqueProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TechniqueProject  $techniqueProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechniqueProject $techniqueProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TechniqueProject  $techniqueProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechniqueProject $techniqueProject)
    {
        //
    }
}
