<?php

namespace App\Http\Controllers;

use App\Project;
use App\Technique;
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
        $tech_pro = new TechniqueProject();
        $tech_pro->project_id = $request->project;

        $tech_pro->technique_id = $request->technique;

        $tech_pro->save();
        $project = Project::find($request->project);

        return redirect()->route('projects.technique_projects.index', compact('project'))
            ->with('success', 'Technique added to project!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TechniqueProject  $techniqueProject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $technique = Technique::where('id', $request->technique)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.technique_projects.show', compact('project', 'technique'));
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
    public function destroy(Project $project, Technique $technique_project)
    {
        $techniqueProject = TechniqueProject::where("technique_id", $technique_project->id)->where("project_id", $project->id);
        $techniqueProject->delete();

        return redirect()->route('projects.technique_projects.index', compact('project'))
            ->with('success', 'Technique Removed from project!');
    }
}
