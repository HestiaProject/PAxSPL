<?php

namespace App\Http\Controllers;

use App\ActivitiesArtifact;
use App\Activity;
use App\Artifact;
use App\AssembleProcess;
use App\Project;
use Illuminate\Http\Request;

class CheckAArtifactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, AssembleProcess $check_f_process)
    {
        return  view('projects.check_f_process.artifact.index', compact('check_f_process', 'project'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $artifact = ActivitiesArtifact::where('id', $request->artifact)->first();
        $project = Project::where('id', $request->project)->first();
        $check_f_process  = AssembleProcess::where('id', $request->check_f_process)->first();
        return view('projects.check_f_process.artifact.edit', compact('artifact', 'check_f_process', 'project'));
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
        $artifact =  ActivitiesArtifact::find($request->artifact);
        $artifact->status = $request->status;
        $return_message = 'Artifact checked successfully';
        $return_type = 'success';
        if ($artifact->status == 'problem') {
            $request->validate([
                'obs' => 'required',
            ]);
            $artifact->obs = $request->obs;
            $return_message = 'Problem reported successfully';
            $return_type = 'error';
            $activity = Activity::find($artifact->activity_id);
            $activity->status = 'doing';
            $activity->update();
        }


        $artifact->update($request->all());
        $project = $request->project;
        $check_f_process = $request->check_f_process;

        return redirect()->route('projects.check_f_process.artifact.index', compact('check_f_process', 'project'))
            ->with($return_type, $return_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
