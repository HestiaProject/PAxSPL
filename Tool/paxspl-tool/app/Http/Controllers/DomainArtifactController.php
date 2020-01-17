<?php

namespace App\Http\Controllers;

use App\Artifact;
use App\DomainArtifact;
use App\Project;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DomainArtifactController extends Controller
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
        return  view('projects.domain.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.domain.create', compact('project'));
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
        ]);

        $domain = new Artifact();
        $domain->type = "domain";
        $domain->name = $request->name;
        $domain->description = $request->description;
        $domain->external_link = $request->external_link;
        $domain->project_id = $request->project_id;
        $domain->owner_id = auth()->id();
        $domain->last_update_user = auth()->id();
        $domain->last_update_date = Carbon::now();
        $domain->save();

        $project = Project::find($request->project_id);

        return redirect()->route('projects.domain.index', compact('project'))
            ->with('success', 'Artifact information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DomainArtifact  $domainArtifact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $domain = Artifact::where('id', $request->domain)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.domain.show', compact('project', 'domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DomainArtifact  $domainArtifact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $domain = Artifact::where('id', $request->domain)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.domain.edit', compact('domain', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DomainArtifact  $domainArtifact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $domain =  Artifact::find($request->domain);

        $domain->last_update_user = auth()->id();
        $domain->last_update_date = Carbon::now();
        $domain->update($request->all());


        $project = $request->project;

        return redirect()->route('projects.domain.index', compact('project'))
            ->with('success', 'Artifact information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artifact  $domainArtifact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Artifact $domain)
    {
        $domain->delete();

        return redirect()->route('projects.domain.index', compact('project'))
            ->with('success', 'Artifact deleted successfully');
    }
}
