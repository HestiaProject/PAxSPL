<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureModel;
use App\Product;
use App\ProductFeatures;
use App\Project;
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
}
