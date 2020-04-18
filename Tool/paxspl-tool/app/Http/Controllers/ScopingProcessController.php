<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssembleProcess;
use App\Project;

class ScopingProcessController extends Controller
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
        return  view('projects.scoping_process.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.scoping_process.create', compact('project'));
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

        ]);

        $assemble_process = new AssembleProcess();
        $assemble_process->name = $request->name;
        $assemble_process->type = 's';
        $assemble_process->project_id = $request->project_id;
        $assemble_process->save();

        $project = Project::find($request->project_id);

        return redirect()->route('projects.scoping_process.index', compact('project'))
            ->with('success', 'Process created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.scoping_process.activities.index', compact('scoping_process', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.scoping_process.edit', compact('scoping_process', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $assemble_process =  AssembleProcess::find($request->scoping_process);


        $assemble_process->update($request->all());


        $project = $request->project;

        return redirect()->route('projects.scoping_process.index', compact('project'))
            ->with('success', 'Process information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $scoping_process)
    {
        $scoping_process->delete();

        return redirect()->route('projects.scoping_process.index', compact('project'))
            ->with('success', 'Process deleted successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function finish(Project $project, AssembleProcess $assemble_process)
    {
        $assemble_process->status = 'assembled';


        $assemble_process->update();
    }
}
