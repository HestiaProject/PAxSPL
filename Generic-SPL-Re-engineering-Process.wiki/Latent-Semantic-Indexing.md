# **Definition:** 

An indexing and retrieval method that uses a mathematical technique to identify patterns in the relationships 
between the terms and concepts contained in an unstructured collection of text. 

# **Variations:**

## Latent semantic analysis (LSA):
Different name for the same technique;

## Semantic hashing:  
Documents are mapped to memory addresses by means of a neural network in such a way that semantically 
similar documents are located at nearby addresses.

# **Inputs:** 
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements)

# **Outputs:** 
* Occurrence matrix
* Rank lowering

# **Examples:**

* [(AL-msie'deen et al. 2013)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#al-msiedeen-a-seriai-d-huchard-m-urtado-c--vauttier-s-mining-features-from-the-object-oriented-source-code-of-software-variants-by-combining-lexical-and-structural-similarity-in---international-conference-on-information-reuse-and-integration-2013-s-586--593)
* [(Xue et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#xue-y-xing-z--jarzabek-s-feature-location-in-a-collection-of-product-variants-in---reverse-engineering-wcre-2012-19th-working-conference-on-2012-s-145--154)
* [(AL-msie'deen et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#al-msiedeen-r-seriai-a-d-huchard-m-urtado-c-vauttier-s--salman-h-e-an-approach-to-recover-feature-models-from-object-oriented-source-code-in-actes-de-la-journe9e-lignes-de-produits-2012-s-15--26)
* [(Eyal-Salman et al. 2013a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-seriai-a-d--dony-c-feature-to-code-traceability-in-legacy-software-variants-in---software-engineering-and-advanced-applications-seaa-2013-39th-euromicro-conference-on-2013-s-57--61)
* [(Eyal-Salman et al. 2013b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-seriai-a-d--dony-c-feature-to-code-traceability-in-a-collection-of-software-variants-combining-formal-concept-analysis-and-information-retrieval-in---information-reuse-and-integration-iri-2013-ieee-14th-international-conference-on-2013-s-209--216)
* [(Eyal-Salman et al. 2013c)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-e-seriai-a-d-dony-c--others-identifying-traceability-links-between-product-variants-and-their-features-in---reve2013-1st-international-workshop-on-reverse-variability-engineering-2013-s-17--22)
* [(Maazoun et al. 2014a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#maazoun-j-bouassida-n--ben-abdallah-h-a-bottom-up-spl-design-method-in---model-driven-engineering-and-software-development-modelsward-2014-2nd-international-conference-on-2014-s-309--316)
* [(Maazoun et al. 2014b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#ma%C3%82zoun-j-bouassida-n--ben-abdallah-h-feature-model-recovery-from-product-variants-based-on-a-cloning-technique-in---seke-2014-s-431--436)
* [(Alves et al. 2008)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#alves-v-schwanninger-c-barbosa-l-rashid-a-sawyer-p-rayson-p-pohl-c--rummler-a-an-exploratory-study-of-information-retrieval-techniques-in-domain-analysis-in---software-product-line-conference-2008-splc08-12th-international-2008-s-67--76)


# **Related Techniques:** 
* [Clustering](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Clustering)
* [Formal Concept Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Formal-Concept-Analysis)

# **Recommended situations**

Latent Semantic Indexing is recommended when program elements (such as classes, methods, etc.) have meaningful names ("attribute" instead of "atr" or "home" instead of "hm"). Besides that, is highly recommended to use this technique in products well documented.

# **Not Recommended situations**
A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don't recommend the use of Latent Semantic Indexing or any other Information Retrieval Technique in those situations.