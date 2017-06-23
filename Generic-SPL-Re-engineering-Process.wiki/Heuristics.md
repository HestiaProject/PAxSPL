# Definition:
A proposed approach that uses a practical method not guaranteed to be perfect, but sufficient to obtain immediate goals.

# Variations:
Some heuristics proposed by some authors will be introduced here. To obtain more details about each heuristic, please access the reference.



## Filtering: 
Filter elements that are not part of diff sets. In other words, elements that do not contribute directly to the feature retrieved. The filtering can be applied to any feature location approach, mainly on dynamic or static analysis [(Rubin and Chechik 2012a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#rubin-j--chechik-m-locating-distinguishing-features-using-diff-sets-in---proceedings-of-the-27th-ieeeacm-international-conference-on-automated-software-engineering-2012-s-242--245).

## Score Modification:
Can be used in location algorithms that employ an iterative, multi-staged program exploration approach. This algorithms return to the user a ranked list of relevant program elements. Score modification, rank these elements based on their lexical and syntactical properties. Scored is used to determine which elements should be analyzed in the next iteration [(Rubin and Chechik 2012a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#rubin-j--chechik-m-locating-distinguishing-features-using-diff-sets-in---proceedings-of-the-27th-ieeeacm-international-conference-on-automated-software-engineering-2012-s-242--245).

## Compare: 
Calculates the similarity degree for each pair of input model elements [(Rubin and Chechik, 2012b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#rubin-j--chechik-m-combining-related-products-into-product-lines-in---international-conference-on-fundamental-approaches-to-software-engineering-2012-s-285--300).

## Match: 
Uses empirical similarity thresholds and analyse a pair of model elements. returns those pairs that are considered similar in a match result. Unmatched elements are copied to the result without modification  [(Rubin and Chechik, 2012b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#rubin-j--chechik-m-combining-related-products-into-product-lines-in---international-conference-on-fundamental-approaches-to-software-engineering-2012-s-285--300).

## Syntactical heuristics: 
Utilizes metrics based on words' morphology to determine the similarity of two features in order to find parent-child dependencies [(Bécan et al., 2013)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#b%C3%89can-g-acher-m-baudry-b--nasr-s-b-breathing-ontological-knowledge-into-feature-model-management-in--2013).

## Semantical heuristics: 
Utilizes general ontologies to semantically compare feature names [(Bécan et al., 2013)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#b%C3%89can-g-acher-m-baudry-b--nasr-s-b-breathing-ontological-knowledge-into-feature-model-management-in--2013).

# Inputs:
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements)
* [Design Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#design-models)

# Outputs:
N/A

# Examples:

# Related Techniques 
* [Clustering](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Clustering)
* [Dependency Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Dependency-Analysis)
* [Rule-Based](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Rule-Based)
* [Data Flow Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Data-Flow-Analysis)
* [Formal Concept Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Formal-Concept-Analysis)
* [Latent Semantic Indexing](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Latent-Semantic-Indexing)
* [Vector Space Model](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Vector-Space-Model)


# Recommended Situations: 
Heuristics can be called "supporting techniques", so they can be used in different situations but always along other techniques such as clustering and information retrieval techniques.

# Not Recommended Situations: 
N/A
