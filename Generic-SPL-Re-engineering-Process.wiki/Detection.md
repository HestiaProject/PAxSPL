
![Detection Sub-process](https://raw.githubusercontent.com/HestiaProject/abstract-spl-reengineering/master/process/Process/3%20-%20Detection.png)

During this sub-process the features are extracted, categorized and grouped. The extraction is made based on the techniques which are also chosen during this sub-process. 

# Feature Search

During this sub-process, techniques and strategies are applied to extract features. This sub-process will be more explained [here](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Feature-Search).

## Actor

[Feature Retriever](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Alternative Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)
* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)
* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts)
* [Reports](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reports)
* [Modified Product Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#modified-product-artifacts)


# Categorize Features

Once the features were retrieve, they must be categorize. The categories can be:mandatory or optional. Optional can also be divided in: alternative (XOR) and alternative (OR). However the use of alternative (OR) is optional.

## Actor

* [Feature Retriever](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Mandatory Inputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts)
* [Modified Product Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#modified-product-artifacts)

## Optional Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)
* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)
* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts) Updated

# Group Features

Feature are grouped based on their dependencies in product artifacts. Feature model is not created yet, but similar artifacts will be. The artifacts type will depend on techniques selected during Feature Search.

## Actor

* [Feature Retriever](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Mandatory Inputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts)
* [Modified Product Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#modified-product-artifacts)

## Optional Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)
* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)
* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts) Updated

# Check Feature Artifacts

Feature artifacts are checked to find missing features or problems with some features. This problems may include: feature names, wrong categories, wrong grouping choices. After the end of this step two results are possible: no problems found or problems are found. If problems are found, they can have two different types:features missing or problem with features. If no problems are found, this sub-process is finished.

## Actor

* [Feature Checker](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Mandatory Inputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts)

## Alternative Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)
* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)
* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts) Updated

# Edit Features

This activity is performed if problems are found and they are related with features names, categories or grouping choices. Here, features are edited to fix those problems. After the end of this phase [Check Feature Artifacts](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Detection#check-feature-artifacts) is performed again.

## Actor

* [Feature Retriever](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Mandatory Inputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts)

## Optional Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)
* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)
* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts) Updated

# Create Features

This activity is performed  if problems are found and they are related with missing features. New features will be created manually. This new features will be categorized and grouped. After the end of this phase [Check Feature Artifacts](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Detection#check-feature-artifacts) is performed again.

## Actor

* [Feature Retriever](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Mandatory Inputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts)

## Optional Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)
* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)
* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Feature Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-artifacts) Updated

# Sub-Processes

* [Planning](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Planning)
* ### [Detection](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Detection)
  * [Feature Search](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Feature-Search)
* [Documentation Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Documentation-Analysis)
