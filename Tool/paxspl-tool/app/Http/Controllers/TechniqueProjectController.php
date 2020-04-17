<?php

namespace App\Http\Controllers;

use App\Project;
use App\Technique;
use App\User;
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
        $tech_pro->reason = $request->reason;
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
            ->with('error', 'Technique removed from project.');
    }

    /**
     * Generate report 
     *
     * @param  \Illuminate\Http\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function generateDocx(Project $project)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/techniques.docx');

        $techniques = $project->techniques_project;
        $user = User::find(auth()->id());
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);

        $i = 0;
        $document->cloneRow('tech', count($techniques));
        foreach ($techniques as $technique) {
            $i++;
            
            $document->setValue('tech#' . $i, $i);
            $document->setValue('tech.name#' . $i, $technique->techniques_pj->name);
            $document->setValue('tech.definition#' . $i, $technique->techniques_pj->definition);
            $document->setValue('tech.inputs#' . $i, $technique->techniques_pj->inputs);
            $document->setValue('tech.priority_order#' . $i, $technique->techniques_pj->priority_order);
            $document->setValue('tech.level#' . $i, $technique->techniques_pj->recommend_level($project).'%');
            $document->setValue('tech.reasons#' . $i, $technique->reason); 
        }






        $name = 'RetrievalTechniquesSelected-' .  "$date" . '.docx';





        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        try {
            $document->saveAs(storage_path($name));
        } catch (Exception $e) {
        }

        return response()->download(storage_path($name));
    }
}
