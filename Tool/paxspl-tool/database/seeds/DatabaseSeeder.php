<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('techniques')->insert([
            'id' => 1,
            'name' => "Clustering",
            'inputs' => "Development",
            'definition' => "Group features based on their dependencies.",
            'type' => "Static Analysis",
            'priority_order' => "Group > Extraction > Categorize",
            'variations' => "Agglomerative Hierarchical Clustering, Divisive Hierarchical Clustering.",
            'recommended_situation' => "Clustering is highly recommended in products that possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.",
            'not_recommended_situation' => "As an static analysis technique, clustering may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.",
        ]);

        DB::table('techniques')->insert([
            'id' => 2,
            'name' => "Dependency Analysis",
            'inputs' => "Development",
            'definition' => "Leverages static dependencies between program elements. Can be used to validate and describe the interdependence between elements.",
            'type' => "Static Analysis",
            'priority_order' => "Extraction > Categorize > Group",
            'variations' => "Data Dependency, Control Dependency, Structural Dependency",
            'recommended_situation' => "To perform Dependency Analysis is almost mandatory that the products have high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.",
            'not_recommended_situation' => "As an static analysis technique, dependency analysis may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.",
        ]);

        DB::table('techniques')->insert([
            'id' => 3,
            'name' => "Data Flow Analysis",
            'inputs' => "Development",
            'definition' => "Gather information about possible values calculated at different points of an software system. This information is used to determine in which parts of that program a particular value might propagate.",
            'type' => "Static Analysis",
            'priority_order' => "Extraction > Categorize > Group",
            'variations' => "Forward Analysis, Backward Analysis",
            'recommended_situation' => "To apply this technique in a satisfactory way, source code must be well written. Better results can be reached when source code possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.",
            'not_recommended_situation' => "Not recommended if the products source code does not have low coupling and high cohesion. Also, if the source code possesses a high variable flow data flow analysis may have uncertain results.",
        ]);

        DB::table('techniques')->insert([
            'id' => 4,
            'name' => "Formal Concept Analysis",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "A mathematical method that provides a way to identify meaningful groupings of objects that have common attributes.",
            'type' => "Information Retrieval Techniques",
            'priority_order' => "Extraction > Categorize > Group",
            'variations' => "Clarified, Reduced",
            'recommended_situation' => "Formal Concept Analysis is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.",
            'not_recommended_situation' => "A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don't recommend the use of Formal Concept Analysis or any other Information Retrieval Technique in those situations.",
        ]);

        DB::table('techniques')->insert([
            'id' => 5,
            'name' => "Latent Semantic Indexing",
            'inputs' => "Development; Requirements",
            'definition' => "A mathematical method that provides a way to identify meaningful groupings of objects that have common attributes.",
            'type' => "Information Retrieval Techniques",
            'priority_order' => "Extraction > Categorize > Group",
            'variations' => "Latent semantic analysis, Semantic hashing",
            'recommended_situation' => "Latent Semantic Indexing is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.",
            'not_recommended_situation' => "A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don't recommend the use of Latent Semantic Indexing or any other Information Retrieval Technique in those situations.",
        ]);

        DB::table('techniques')->insert([
            'id' => 6,
            'name' => "Vector Space Model",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "An algebraic model for representing text documents in a way where the objects retrieved are modeled as elements of a vector space.",
            'type' => "Information Retrieval Techniques",
            'priority_order' => "Extraction > Categorize > Group",
            'variations' => "",
            'recommended_situation' => "Vector Space Model is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.",
            'not_recommended_situation' => "A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don't recommend the use of Vector Space Model (VSM) or any other Information Retrieval Technique in those situations.",
        ]);

        DB::table('techniques')->insert([
            'id' => 7,
            'name' => "Expert Driven",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "This strategy is based on knowledge and experiences of specialists, such as domain engineers, software engineers, stakeholders, etc. This may include the addition of techniques that are not in this process documentation.",
            'type' => "Support",
            'priority_order' => "Categorize > Group > Extraction",
            'variations' => "",
            'recommended_situation' => "To apply the expert driven strategy is highly recommended to have a team with skills and knowledge involving the re-engineering process of SPL. We also recommend to use Expert Driven as a support strategy along Static Analysis and Information Retrieval.",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 8,
            'name' => "Heuristics",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "A proposed approach that uses a practical method not guaranteed to be perfect, but sufficient to obtain immediate goals.",
            'type' => "Support",
            'priority_order' => "Categorize > Group > Extraction",
            'variations' => "",
            'recommended_situation' => "Heuristics can be called supporting techniques, so they can be used in different situations but always along other techniques such as clustering and information retrieval techniques.",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 9,
            'name' => "Rule Based",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "A set of rules is created to guide and help whoever is performing the feature extraction.",
            'type' => "Support",
            'priority_order' => "Categorize > Group > Extraction",
            'variations' => "",
            'recommended_situation' => "Rule based techniques are usually created in a specific scenario. For that reason they can only be performed in similar scenarios.",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 10,
            'name' => "Market Analysis",
            'inputs' => "Domain",
            'definition' => "Analyze the market to obtain information about related products and to scale the size of the domain.",
            'type' => "Domain",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 11,
            'name' => "Cost-Benefit Analysis",
            'inputs' => "Domain",
            'definition' => "This type of analysis is crucial when developing/migrating a SPL. 
            As complex as it may be, is important to use a set of Cost Models, as well as understand the Customer Needs.",
            'type' => "Domain",
            'priority_order' => "",
            'variations' => "Cost Models, Customer Needs, Mathematical Models, Algorithms.",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 12,
            'name' => "Product RoadMap",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "This roadmap may be defined by several tasks: defining the common and variable features of the SPL, as well as prioritizing 
            them based on customer or market needs. Plan the schedule of development.",
            'type' => "Domain",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 13,
            'name' => "Prioritize Products",
            'inputs' => "Requirements; Design; Domain",
            'definition' => "This kind of task is performed alongside the product roadmap, where the products of this roadmap receive 
            their priority in the development schedule. Based on that, assets will also be prioritized.",
            'type' => "Asset",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 14,
            'name' => "Architecture Definition",
            'inputs' => "Requirements; Design;",
            'definition' => "The reference architecture (RA) is important in SPL development. 
            This architecture is defined is composed of the features that are relevant to the product core. 
            Non-functional features may also be present in the RA.",
            'type' => "Asset",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 15,
            'name' => "Variability Analysis",
            'inputs' => "Requirements; Design; Domain",
            'definition' => "Defining the variation points in the SPL. This variability is performed by analyzing these variation
             points in terms of variability type. Another important aspect is the dependency analysis among these variation points.",
            'type' => "Asset",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);


        DB::table('techniques')->insert([
            'id' => 16,
            'name' => "Candidate Analysis",
            'inputs' => "Requirements; Design; Domain",
            'definition' => "Analyze the possible products-to-be is important to determine if they are viable and if they will 
            satisfy customer and company needs. These candidates are part of the product roadmap, and may share their architecture 
            with others.",
            'type' => "Product",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 17,
            'name' => "Feature Definition",
            'inputs' => "Requirements; Domain",
            'definition' => "Define the features that will or not be part of each product is mandatory for defining a product portfolio.",
            'type' => "Product",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 18,
            'name' => "Metrics Definition",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "Define metrics for scoping. These metrics may measure costs, market, size of products and features among other important characteristics.",
            'type' => "SupportS",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 19,
            'name' => "Scoping Meta-Model",
            'inputs' => "Requirements; Design; Domain",
            'definition' => "A scoping meta-model may be used for defining some scoping concepts such as requirements, tests, and project and risk management.",
            'type' => "SupportS",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);

        DB::table('techniques')->insert([
            'id' => 20,
            'name' => "Evolution Planning",
            'inputs' => "Development; Requirements; Design; Domain",
            'definition' => "Plan the evolution of a SPL may be used to provide additional information and depth to any concept 
            within the scoping type. The evolution plan may consider environment evolution, market evolution and variability evolution.",
            'type' => "SupportS",
            'priority_order' => "",
            'variations' => "",
            'recommended_situation' => "",
            'not_recommended_situation' => "",
        ]);


        DB::table('related_techniques')->insert([
            'related_from' => 1,
            'related_to' => 4,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 2,
            'related_to' => 4,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 3,
            'related_to' => 1,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 4,
            'related_to' => 1,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 4,
            'related_to' => 5,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 5,
            'related_to' => 1,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 5,
            'related_to' => 4,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 6,
            'related_to' => 1,
        ]);

        DB::table('related_techniques')->insert([
            'related_from' => 6,
            'related_to' => 4,
        ]);
    }
}
