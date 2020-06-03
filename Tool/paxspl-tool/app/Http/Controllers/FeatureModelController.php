<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureModel;
use App\Project;
use Illuminate\Http\Request;

class FeatureModelController extends Controller
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
        return  view('projects.feature_model.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.feature_model.create', compact('project'));
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

        $feature_model = new FeatureModel();
        $feature_model->name = $request->name;
        $xml = '\'<?xml version="1.0" encoding="UTF-8" standalone="no"?>
        <featureModel chosenLayoutAlgorithm="1">
            <struct>
                <and mandatory="true" name="' . $feature_model->name . '">
                    <feature name="Feature1"/>
                    <feature name="Feature2"/>  
                </and>
            </struct>
            <constraints> 
            </constraints>
            <comments/>
            <featureOrder userDefined="false"/>
        </featureModel>\'';
        $feature_model->project_id = $request->project_id;

        $feature_model->xml = $xml;
        $feature_model->save();

        $feature_core = new Feature();
        $feature_core->name = $request->name;
        $feature_core->height = 0;
        $feature_core->type = 'mandatory';
        $feature_core->abstract = true;
        
        $feature_core->description = "SPL core.";
        $feature_core->feature_model_id = $feature_model->id;
        $feature_core->save();
        $project = Project::find($request->project_id);

        return redirect()->route('projects.feature_model.index', compact('project'))
            ->with('success', 'Feature Model created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeatureModel  $featureModel
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $feature_model = FeatureModel::where('id', $request->feature_model)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.feature_model.edit', compact('feature_model', 'project'));
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


        $feature_model =  FeatureModel::find($request->feature_model);

        $request->validate([
            'name' => 'required',
        ]);


        $feature_model->update($request->all());
        

        $feature_core = Feature::find($feature_model->features->first()->id); 
        $feature_core->name=$request->name;
        $feature_core->update();
        $project = $request->project;


        return redirect()->route('projects.feature_model.index', compact('project'))
            ->with('success', 'Feature Model information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, FeatureModel $feature_model)
    {
        $feature_core = Feature::find($feature_model->features->first()->id); 
        $feature_core->delete();
        $feature_model->delete();

        return redirect()->route('projects.feature_model.index', compact('project'))
            ->with('success', 'Feature Model deleted successfully');
    }
}
