# Definition:
Leverages static dependencies between program elements. Can be used to validate and describe the interdependence between elements.

# Variations:
## Structural Dependency:
A metric that represents how much of the structural context of a feature can be mapped from a set of program elements.

# Inputs:
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)

# Outputs:
* Dependence graph

# Examples:

* [(Ali et al. 2011)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#ali-n-wu-w-antoniol-g-di-penta-m-gu%C3%89h%C3%89neuc-y-g--hayes-j-h-moms-multi-objective-miniaturization-of-software-in---software-maintenance-icsm-2011-27th-ieee-international-conference-on-2011-s-153--162)
* [(Nöbauer et al. 2014a)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#n%C3%96bauer-m-seyff-n--groher-i-inferring-variability-from-customized-standard-software-products-in---proceedings-of-the-18th-international-software-product-line-conference-volume-1-2014-s-284--293)
* [(Klatt et al. 2014)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#klatt-b-krogmann-k--seidl-c-program-dependency-analysis-for-consolidating-customized-product-copies-in---software-maintenance-and-evolution-icsme-2014-ieee-international-conference-on-2014-s-496--500)
* [(Linsbauer et al. 2014)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#linsbauer-l-angerer-f-gr%C3%9Cnbacher-p-lettner-d-pr%C3%84hofer-h-lopez-herrejon-r-e--egyed-a-recovering-feature-to-code-mappings-in-mixed-variability-software-systems-in---software-maintenance-and-evolution-icsme-2014-ieee-international-conference-on-2014-s-426--430)

# Related Techniques 
* [Formal Concept Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Formal-Concept-Analysis)

# Recommended Situations: 

To perform Dependency Analysis is almost mandatory that the products have high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.

# Not Recommended Situations: 
As an static analysis technique, dependency analysis may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.