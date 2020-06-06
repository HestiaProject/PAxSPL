<?php

namespace App\Http\Controllers;

use App\Artifact;
use App\Feature;
use App\FeatureArtifact;
use App\FeatureModel;
use App\Project;
use Illuminate\Http\Request;

class FeatureArtifactController extends Controller
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
    public function create(Project $project, FeatureModel $feature_model, Feature $feature)
    {
        
        return view('projects.feature_model.features.artifact.create', compact('project', 'feature_model', 'feature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $feature = Feature::find($request->feature);
        $project = Project::find($request->project);
        $feature_model = FeatureModel::find($request->feature_model);
        $feature_artifact = new FeatureArtifact();
         
        $feature_artifact->artifact_id = $request->artifact_id;
        $feature_artifact->feature_id = $feature->id;
        $feature_artifact->save();


        return redirect()->route('projects.feature_model.features.show', compact('project', 'feature_model', 'feature'))
            ->with('success', 'Artifact added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $feature = Feature::find($request->feature);
        $project = Project::find($request->project);
        $artifact = FeatureArtifact::find($request->artifact);
        $feature_model = FeatureModel::find($request->feature_model);
        return view('projects.feature_model.features.artifact.show', compact('project', 'feature_model', 'feature', 'artifact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, FeatureModel $feature_model, Feature $feature, FeatureArtifact $artifact)
    {
        $artifact->delete();

        return redirect()->route('projects.feature_model.features.show', compact('feature', 'feature_model', 'project'))
            ->with('success', 'Artifact removed from feature successfully');
    }
}
