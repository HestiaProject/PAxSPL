<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureModel;
use App\Product;
use App\ProductFeatures;
use App\Project;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, FeatureModel $feature_model)
    {
        return  view('projects.feature_model.product.index', compact('project', 'feature_model'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::find($request->product);
        $project = Project::find($request->project);
        $feature_model = FeatureModel::find($request->feature_model);




        return view('projects.feature_model.product.show', compact('product', 'project', 'feature_model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, FeatureModel $feature_model)
    {
        return view('projects.feature_model.product.create', compact('project', 'feature_model'));
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

        $product = new Product();
        $feature_model = FeatureModel::find($request->feature_model);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->feature_model_id =  $feature_model->id;
        $product->xml = $request->features;
        $product->save();
        $features = explode("/>", $request->features);
        foreach ($features as $f) {
            if (strpos($f, '"selected"') !== false) {
                $productFeature = new ProductFeatures();
                $productFeature->product_id = $product->id;
                $featureName = strstr($f, 'name');
                $featureName = str_replace('name="', '', $featureName);
                $featureName = str_replace('"', '', $featureName);
                print($featureName);
                $feature = Feature::where('feature_model_id', $feature_model->id)->where('name', $featureName)->first();
                $productFeature->feature_id = $feature->id;
                $productFeature->save();
            }
        }




        $project = Project::find($request->project);


        return redirect()->route('projects.feature_model.product.index', compact('project', 'feature_model'))
            ->with('success', 'Product created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, FeatureModel $feature_model, Product $product)
    {
        foreach ($product->pro_features as $pf) {
            $pf->delete();
        }
        $product->delete();

        return redirect()->route('projects.feature_model.product.index', compact('project', 'feature_model'))
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Generate XML
     */
    public function generateXML(Request $request)
    {


        $product = Product::find($request->product);
        $xml = $product->xml;

        $response = Response::create($xml, 200);
        $response->header('Content-Type', 'text/xml');
        $response->header('Cache-Control', 'public');
        $response->header('Content-Description', 'File Transfer');
        $response->header('Content-Disposition', 'attachment; filename=' . $product->name . '-configuration.xml');
        $response->header('Content-Transfer-Encoding', 'binary');
        return $response;
    }

    public function generateDocx(Request $request)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/products.docx');


        $user = User::find(auth()->id());
        $product = Product::find($request->product);
        $project = Project::find($request->project); 
        $document->setValue('doc', "Features");
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);
        $document->setValue('product', $product->name);
        $document->setValue('description', $product->description);

        $features = $product->pro_features;
        $i = 0;
        $document->cloneRow('f', count($features));
        foreach ($features as $f) {
            $feature = $f->feature;
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








        $name = 'Product-' .$product->name.  "-$date" . '.docx';





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
