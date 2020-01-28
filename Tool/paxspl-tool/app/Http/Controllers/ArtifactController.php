<?php

namespace App\Http\Controllers;

use App\Artifact; 
use App\Project;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ArtifactController extends Controller
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
        return  view('projects.artifact.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.artifact.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'extension' => 'required',
        ]);

        $artifact = new Artifact(); 
        $artifact->name = $request->name;
        $artifact->description = $request->description;
        $artifact->external_link = $request->external_link;
        $artifact->type = $request->type;
        $artifact->extension = $request->extension;
        $artifact->project_id = $request->project_id;
        $artifact->owner_id = auth()->id();
        $artifact->last_update_user = auth()->id();
        $artifact->last_update_date = Carbon::now();
        $artifact->save();

        $project = Project::find($request->project_id);

        return redirect()->route('projects.artifact.index', compact('project'))
            ->with('success', 'Artifact information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $artifact = Artifact::where('id', $request->artifact)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.artifact.show', compact('project', 'artifact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $artifact = Artifact::where('id', $request->artifact)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.artifact.edit', compact('artifact', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $artifact =  Artifact::find($request->artifact);

        $artifact->last_update_user = auth()->id();
        $artifact->last_update_date = Carbon::now();
        $artifact->update($request->all());


        $project = $request->project;

        return redirect()->route('projects.artifact.index', compact('project'))
            ->with('success', 'Artifact information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Artifact $artifact)
    {
        $artifact->delete();

        return redirect()->route('projects.artifact.index', compact('project'))
            ->with('success', 'Artifact deleted successfully');
    }
}
