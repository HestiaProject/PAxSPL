

# **Definition:** 
A mathematical method that provides a way to identify "meaningful groupings of objects that have common 
attributes".

# **Variations:**

## Clarified: 
The context does not have duplicate rows or columns


## Reduced: 
No context rows can be expressed as intersection of other rows. The lattice of such context is meet-reduced. No 
context columns can be expressed as intersection of other columns. The lattice of such context is join-reduced

# **Inputs:** 
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)

# **Outputs:** 
* Concept lattice.

# **Examples:**
* [(Eisenbarth et al. 2001)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eisenbarth-t-koschke-r--simon-d-derivation-of-feature-component-maps-by-means-of-concept-analysis-in---software-maintenance-and-reengineering-2001-fifth-european-conference-on-2001-s-176--179)
* [(Yang et al. 2009)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#yang-y-peng-x--zhao-w-domain-feature-model-recovery-from-multiple-applications-using-data-access-semantics-and-formal-concept-analysis-in---reverse-engineering-2009-wcre09-16th-working-conference-on-2009-s-215--224)
* [(Eyal-Salman et al. 2014)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-seriai-a-d--dony-c-feature-location-in-a-collection-of-product-variants-combining-information-retrieval-and-hierarchical-clustering-in---seke-software-engineering-and-knowledge-engineering-2014-s-426--430)
* [(Eyal-Salman et al. 2013b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-seriai-a-d--dony-c-feature-to-code-traceability-in-a-collection-of-software-variants-combining-formal-concept-analysis-and-information-retrieval-in---information-reuse-and-integration-iri-2013-ieee-14th-international-conference-on-2013-s-209--216)
* [(AL-Msie'deen et al. 2013)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#al-msiedeen-a-seriai-d-huchard-m-urtado-c--vauttier-s-mining-features-from-the-object-oriented-source-code-of-software-variants-by-combining-lexical-and-structural-similarity-in---international-conference-on-information-reuse-and-integration-2013-s-586--593)
* [(AL-Msie'deen et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#al-msiedeen-r-seriai-a-d-huchard-m-urtado-c-vauttier-s--salman-h-e-an-approach-to-recover-feature-models-from-object-oriented-source-code-in-actes-de-la-journe9e-lignes-de-produits-2012-s-15--26)
* [(Xue et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#xue-y-xing-z--jarzabek-s-feature-location-in-a-collection-of-product-variants-in---reverse-engineering-wcre-2012-19th-working-conference-on-2012-s-145--154)
* [(Maazoun et al. 2014a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#maazoun-j-bouassida-n--ben-abdallah-h-a-bottom-up-spl-design-method-in---model-driven-engineering-and-software-development-modelsward-2014-2nd-international-conference-on-2014-s-309--316)
* [(Maazoun et al. 2014b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#ma%C3%82zoun-j-bouassida-n--ben-abdallah-h-feature-model-recovery-from-product-variants-based-on-a-cloning-technique-in---seke-2014-s-431--436)
* [(Mefteh et al. 2014)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#mefteh-m-bouassida-n--ben-abdallah-h-feature-model-extraction-from-documented-uml-use-case-diagrams-in-ada-user-35-2014-nr-2-s-107)

# **Related Techniques:** 
* [Clustering](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Clustering)
* [Latent Semantic Indexing](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Latent-Semantic-Indexing)

# **Recommended situations**
Formal Concept Analysis is recommended when program elements (such as classes, methods, etc.) have meaningful names ("attribute" instead of "atr" or "home" instead of "hm"). Besides that, is highly recommended to use this technique in products well documented. 

# **Not Recommended situations**

A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don't recommend the use of Formal Concept Analysis or any other Information Retrieval Technique in those situations.

