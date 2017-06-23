# Definition:
Gather information about possible values calculated at different points of an software system. This information is used to determine in which parts of that program a particular value might propagate.

# Variations:
## Forward Analysis:
Calculates for each program point the set of definitions that may potentially reach this program point.

## Backward Analysis: 
Calculates for each program point the variables that may be potentially read afterwards before their next write update. 

# Inputs:
* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)

# Outputs:
* Code fragments related to a feature;

# Examples:

* [(Bayer et al. 2014)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#bayer-j-forster-t-ganesan-d-girard-j-f-john-i-knodel-j-kolb-r--muthig-d-definition-of-reference-architectures-based-on-existing-systems-in-iese-report-2004)


# Related Techniques 

# Recommended Situations: 
To apply this technique in a satisfactory way, source code must be well written. Better results can be reached when source code possesses high level of dependencies between feature implementations.  Besides that, a good documentation is not required when applying this technique.

# Not Recommended Situations: 
Not recommended if the products source code does not have low coupling and high cohesion. Also, if the source code possesses a high variable flow data flow analysis may have uncertain results.