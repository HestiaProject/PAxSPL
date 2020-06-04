<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureModel;
use App\Project;
use App\User;
use Exception;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, FeatureModel $feature_model)
    {
        return  view('projects.feature_model.features.index', compact('feature_model', 'project'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, FeatureModel $feature_model, Request $request)
    {

        $phase = $request->phase;
        return view('projects.feature_model.features.create', compact('project', 'feature_model'));
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

        $feature = new Feature();
        $feature->name = $request->name;
        $feature->type = $request->type;
        $feature->parent = $request->parent;

        if ($request->abstract != null) {
            $feature->abstract = $request->abstract;
        } else {
            $feature->abstract = 0;
        }
        $parent = Feature::find($request->parent);
        $feature->height = $parent->height + 1;

        $feature->description = $request->description;



        $feature->feature_model_id = $request->feature_model;

        $feature->save();

        $feature_model = FeatureModel::find($request->feature_model);


        $project = Project::where('id', $request->project)->first();


        return redirect()->route('projects.feature_model.features.index', compact('feature_model', 'project'))
            ->with('success', 'Feature information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $feature = Feature::where('id', $request->feature)->first();
        $feature_model = FeatureModel::where('id', $request->feature_model)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.feature_model.features.show', compact('project', 'feature_model', 'feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $feature = Feature::where('id', $request->feature)->first();
        $project = Project::where('id', $request->project)->first();
        $feature_model = FeatureModel::where('id', $request->feature_model)->first();
        return view('projects.feature_model.features.edit', compact('feature', 'feature_model', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        $feature =  Feature::find($request->feature);
        $parent = Feature::find($request->parent);
        $feature->height = $parent->height + 1;
        if ($request->abstract != null) {
            $feature->abstract = $request->abstract;
        } else {
            $feature->abstract = 0;
        }
         
        $feature->update($request->all());


        $project = $request->project;
        $feature_model = $request->feature_model;

        return redirect()->route('projects.feature_model.features.index', compact('feature_model', 'project'))
            ->with('success', 'Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, FeatureModel $feature_model, Feature $feature)
    {

        $feature->delete();

        return redirect()->route('projects.feature_model.features.index', compact('project', 'feature_model'))
            ->with('success', 'Feature deleted successfully');
    }

    /**
     * Generate report 
     *
     * @param  \Illuminate\Http\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function generateDocx(Project $project, FeatureModel $feature_model)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/activities.docx');


        $user = User::find(auth()->id());

        $document->setValue('doc', "Assembled Retrieval Process");
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);
        $document->setValue('process', $feature_model->name);

        $activities = $feature_model->activities;
        $i = 0;
        $document->cloneRow('act', count($activities));
        foreach ($activities as $feature) {
            $i++;

            $document->setValue('act#' . $i, $i);
            $document->setValue('act.name#' . $i, $feature->name);
            $document->setValue('act.phase#' . $i, $feature->phase());
            $document->setValue('act.description#' . $i, $feature->description);
            $document->setValue('act.technique#' . $i, $feature->technique->name);
        }






        $name = 'RetrievalFeaturesSelected-' .  "$date" . '.docx';





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
