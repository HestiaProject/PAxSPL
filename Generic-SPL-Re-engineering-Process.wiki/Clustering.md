# **Definition:**
Group features based on their dependencies.

# **Variations**: 

## Agglomerative Hierarchical Clustering (AHC):
A "bottom up" approach where each observation starts in its own cluster, and pairs of clusters are merged as one moves up the hierarchy.

## Divisive Hierarchical Clustering (DHC): 
A "top down" approach where all observations start in one cluster, and splits are performed recursively as one moves down the hierarchy.

# **Inputs**: 
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)

# **Outputs**: 
* Feature tree 
* Feature clusters
* Dendrogram tree.

# **Examples**:

* [(Weston et al. 2009)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#weston-n-chitchyan-r--rashid-a-a-framework-for-constructing-semantically-composable-feature-models-from-natural-language-requirements-in---proceedings-of-the-13th-international-software-product-line-conference-2009-s-211--220)
* [(Kelly et al. 2011)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#kelly-m-b-alexander-j-s-adams-b--hassan-a-e-recovering-a-balanced-overview-of-topics-in-a-software-domain-in---source-code-analysis-and-manipulation-scam-2011-11th-ieee-international-working-conference-on-2011-s-135--144)
* [(Chen et al. 2005)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#chen-k-zhang-w-zhao-h--mei-h-an-approach-to-constructing-feature-models-based-on-requirements-clustering-in---requirements-engineering-2005-proceedings-13th-ieee-international-conference-on-2005-s-31--40)
* [(Bécan 2013)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#b%C3%89can-g-acher-m-baudry-b--nasr-s-b-breathing-ontological-knowledge-into-feature-model-management-in--2013)
* [(Nöbauer et al. 2014b)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#n%C3%96bauer-m-seyff-n--groher-i-similarity-analysis-within-product-line-scoping-an-evaluation-of-a-semi-automatic-approach-in---international-conference-on-advanced-information-systems-engineering-2014-s-165--179)
* [(Rubin et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#rubin-j-kirshin-a-botterweck-g--chechik-m-managing-forked-product-variants-in---proceedings-of-the-16th-international-software-product-line-conference-volume-1-2012-s-156--160)
* [(Damasevicius et al. 2012)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#damasevicius-r-paskevicius-p-karciauskas-e--marcinkevicius-r-automatic-extraction-of-features-and-generation-of-feature-models-from-java-programs-in-information-technology-and-control-41-2012-nr-4-s-376--384)
* [(Eyal-Salman et al. 2014)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#eyal-salman-h-seriai-a-d--dony-c-feature-location-in-a-collection-of-product-variants-combining-information-retrieval-and-hierarchical-clustering-in---seke-software-engineering-and-knowledge-engineering-2014-s-426--430)
* [(Alves et al. 2008)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#alves-v-schwanninger-c-barbosa-l-rashid-a-sawyer-p-rayson-p-pohl-c--rummler-a-an-exploratory-study-of-information-retrieval-techniques-in-domain-analysis-in---software-product-line-conference-2008-splc08-12th-international-2008-s-67--76)



# **Related Techniques**:
* [Formal Concept Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Formal-Concept-Analysis)

# **Recommended situations:**
Clustering is highly recommended in products that possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.

# **Not Recommended situations:**
As an static analysis technique, clustering may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.