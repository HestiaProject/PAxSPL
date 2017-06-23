# **Definition:** 
An algebraic model for representing text documents in a way where the objects retrieved are modeled as elements of a vector space.

# **Variations:**
N/A
 

# **Inputs:** 
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements) 
* [Design Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#design-models)

# **Outputs:**
* Vectors representing the objects retrieved;

# **Examples:**

* [(Kumaki et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#kumaki-k-tsuchiya-r-washizaki-h--fukazawa-y-supporting-commonality-and-variability-analysis-of-requirements-and-structural-models-in---proceedings-of-the-16th-international-software-product-line-conference-volume-2-2012-s-115--118)
* [(Alves et al. 2008)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#alves-v-schwanninger-c-barbosa-l-rashid-a-sawyer-p-rayson-p-pohl-c--rummler-a-an-exploratory-study-of-information-retrieval-techniques-in-domain-analysis-in---software-product-line-conference-2008-splc08-12th-international-2008-s-67--76)
* [(Eyal-Salman et al. 2013a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-seriai-a-d--dony-c-feature-to-code-traceability-in-a-collection-of-software-variants-combining-formal-concept-analysis-and-information-retrieval-in---information-reuse-and-integration-iri-2013-ieee-14th-international-conference-on-2013-s-209--216)

# **Related Techniques:** 
* [Clustering](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Clustering)
* [Formal Concept Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Formal-Concept-Analysis)

# **Recommended situations**
Vector Space Model is recommended when program elements (such as classes, methods, etc.) have meaningful names ("attribute" instead of "atr" or "home" instead of "hm"). Besides that, is highly recommended to use this technique in products well documented.

# **Not Recommended situations**

A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don't recommend the use of Vector Space Model (VSM) or any other Information Retrieval Technique in those situations. Furthermore, the use of VSM has some limitations which may be considering when selecting this technique:

* Long documents are poorly represented because they have poor similarity values;
* Search keywords must precisely match document terms; word sub-strings might result in a "false positive match";
* Semantic sensitivity; documents with similar context but different term vocabulary won't be associated, resulting in a "false negative match";
* The order in which the terms appear in the document is lost in the vector space representation;


