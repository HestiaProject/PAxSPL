<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureModel;
use App\Project;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
        if ($request->parent != null) {

            $parent = Feature::find($request->parent);
            $feature->height = $parent->height + 1;
        }


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
     * Generate XML
     */
    public function generateXML(Project $project, FeatureModel $feature_model){

        // $output = View::make('site.contabilidad.adeudosXML')->with(compact(('xml_datos', 'total'))->render();

        $xml = $feature_model->generate_xml();

        $response = Response::create($xml, 200);
        $response->header('Content-Type', 'text/xml');
        $response->header('Cache-Control', 'public');
        $response->header('Content-Description', 'File Transfer');
        $response->header('Content-Disposition', 'attachment; filename=' . $feature_model->name . '.xml');
        $response->header('Content-Transfer-Encoding', 'binary');
        return $response;

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

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/features.docx');


        $user = User::find(auth()->id());
        $document->setValue('doc', "Features");
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);
        $document->setValue('fm', $feature_model->name);

        $features = $feature_model->features_order();
        $i = 0;
        $document->cloneRow('f', count($features));
        foreach ($features as $feature) {
            $i++;
            $abs = 'No';
            if ($feature->abstract) {
                $abs = 'Yes';
            }
            $document->setValue('f#' . $i, $i);
            $document->setValue('f.name#' . $i, $feature->name);
            $document->setValue('f.type#' . $i, $feature->type);
            $document->setValue('f.description#' . $i, $feature->description);
            $document->setValue('f.abstract#' . $i, $abs);
            $j = 0;
            $artifacts = $feature->artifacts;
            $document->cloneRow('art#' . $i, count($artifacts));
            foreach ($artifacts as $artifact) {
                $j++;
                $newdate = date_create($artifact->artifact->last_update_date);
                $updated_date = date_format($newdate, 'm-d-Y');
                $document->setValue('art#' . $i . '#' . $j, $j);
                $io = 'Input';
                if ($artifact->io == 'o') {
                    $io = 'Output';
                }
                $document->setValue('art.io#' . $i . '#' . $j, $io);
                $document->setValue('art.name#' . $i . '#' . $j, $artifact->artifact->name);
                $document->setValue('art.type#' . $i . '#' . $j, $artifact->artifact->type);
                $document->setValue('art.description#' . $i . '#' . $j, $artifact->artifact->description);
                $document->setValue('art.extension#' . $i . '#' . $j, $artifact->artifact->extension);
                $document->setValue('art.external_link#' . $i . '#' . $j, $artifact->artifact->external_link);
                $document->setValue('art.last_update_date#' . $i . '#' . $j, $updated_date);
                $document->setValue('art.last_update_user#' . $i . '#' . $j, $artifact->artifact->update_user->name);
            }
        }








        $name = 'Features-' .  "$date" . '.docx';





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
