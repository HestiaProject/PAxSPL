<?php

namespace App\Http\Controllers;

use App\ActivitiesArtifact;
use App\Activity;
use App\Artifact;
use App\AssembleProcess;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExecuteArtifactSProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, AssembleProcess $execute_s_process, Activity $activity, Request $request)
    {
        $io = $request->io;
        return view('projects.execute_s_process.activities.artifact.create', compact('project', 'execute_s_process', 'activity', 'io'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artifact = new Artifact();
        $activity = Activity::find($request->activity_id);
        $execute_s_process = AssembleProcess::find($activity->assemble_process_id);
        $project = Project::find($execute_s_process->project_id);
        if ($request->io == 'o') {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'type' => 'required',
                'extension' => 'required',
            ]);


            $artifact->name = $request->name;
            $artifact->description = $request->description;
            $artifact->external_link = $request->external_link;
            $artifact->type = $request->type;
            $artifact->extension = $request->extension;
            $artifact->project_id = $project->id;
            $artifact->owner_id = auth()->id();
            $artifact->last_update_user = auth()->id();
            $artifact->last_update_date = Carbon::now();
            $artifact->save();
        } else {
            $artifact = Artifact::find($request->artifact_id);
        }
        $artifact_act = new ActivitiesArtifact();
        $artifact_act->io = $request->io;
        $artifact_act->artifact_id = $artifact->id;
        $artifact_act->activity_id = $request->activity_id;
        $artifact_act->save();



        return redirect()->route('projects.execute_s_process.activities.edit', compact('activity', 'execute_s_process', 'project'))
            ->with('success', 'Artifact saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $io = $request->io;
        $activity = Activity::where('id', $request->activity)->first();
        $project = Project::where('id', $request->project)->first();
        $artifact = ActivitiesArtifact::where('id', $request->artifact)->first();
        $execute_s_process = AssembleProcess::where('id', $request->execute_s_process)->first();
        return view('projects.execute_s_process.activities.artifact.show', compact('project', 'execute_s_process', 'activity', 'io','artifact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $artifact = ActivitiesArtifact::where('id', $request->artifact)->first();
        $activity = Activity::where('id', $request->activity)->first();
        $execute_s_process = AssembleProcess::where('id', $request->execute_s_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.execute_s_process.activities.artifact.edit', compact('artifact', 'project', 'activity', 'execute_s_process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'extension' => 'required',
        ]);
        $artifact_act =  ActivitiesArtifact::find($request->artifact);
        $artifact_act->status = 'created';
        $artifact_act->update($request->all());

        $artifact =  Artifact::find($artifact_act->artifact_id);
        $artifact->name = $request->name;
        $artifact->description = $request->description;
        $artifact->external_link = $request->external_link;
        $artifact->type = $request->type;
        $artifact->extension = $request->extension;  
        $artifact->last_update_user = auth()->id();
        $artifact->last_update_date = Carbon::now();
        $artifact->update(); 

        $activity = Activity::where('id', $request->activity)->first();
        $project = Project::where('id', $request->project)->first();
        $execute_s_process = AssembleProcess::where('id', $request->execute_s_process)->first();
        return redirect()->route('projects.execute_s_process.activities.edit', compact('execute_s_process', 'project', 'activity'))
            ->with('success', 'Artifact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $execute_s_process, Activity $activity, ActivitiesArtifact $artifact)
    {
        $artifact->delete();

        return redirect()->route('projects.execute_s_process.activities.edit', compact('activity', 'execute_s_process', 'project'))
        ->with('success', 'Artifact removed from activity successfully');
    }
}
