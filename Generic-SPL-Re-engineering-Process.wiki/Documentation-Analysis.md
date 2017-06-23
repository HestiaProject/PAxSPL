![Documentation Analysis Sub-process](https://raw.githubusercontent.com/HestiaProject/abstract-spl-reengineering/master/process/Process/3%20-%20Documentation%20Analysis.png)


During this sub-process the re-engineering documentation is collected and compiled. All the activities of this subprocess are optional and they can be performed at the same time of any activity from Detection.

# Collect Domain Information

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity, domain information is collected and registered. This information can be used as an input for some extraction techniques. According to [(Assunção et al., 2017)](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Bibliography#assunc%C3%83o-wesley-kg-lopez-herrejon-roberto-e-linsbauer-lukas-vergilio-silvia-r-egyed-alex-y-er-reengineering-legacy-applications-into-software-product-lines-a-systematic-mapping-empirical-software-engineering-2017-p-145), domain artifacts may contain information such as products description, user comments, documentation of systems in specific domain, and domain analysis. 

## Actor

[Domain Engineering](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Alternative Inputs

* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Domain Artifacts](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#domain-artifacts)

# Create Vocabulary

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity a domain glossary is created. This domain glossary will contain names, terms, synonyms and any kind of terminology specific for the system domain.  

## Actor

[Domain Engineering](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Alternative Inputs

* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Domain Glossary](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#domain-glossary)

# Register Domain Constraints

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity a list of constraints related to the system domain. This constraints can be collected in the system business rules or even non-functional requirements.

## Actor

[Domain Engineering](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Alternative Inputs

* [Reference Architecture](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-architecture)
* [Reference Requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#reference-requirements)

## Outputs

* [Domain Constraints List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#domain-constraints-list)
* [Requirements Specification](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-specification)

# Collect Requirements Information

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity the requirement information is collected and registered. Requirements artifacts may be Requirements List, Use Cases, User Stories or any kind of requirements specification.

## Actor

[Analyst](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Alternative Inputs

* [Requirements List](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-list)
* [Use Cases](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#use-cases)
* [Business Rules](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#business-rules)

## Outputs

* [Requirements Specification](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements-specification)

# Register Architectural Information

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity architectural information is collected and registered. This information may include: design patterns, architectural patterns. The artifacts used to register these can be class diagrams, state machine diagrams or even activity diagrams.

## Actor

[Architect](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)


## Alternative Inputs

* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Feature Models](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#feature-models)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)

## Outputs

* [Development Information](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#development-information)  

# Collect Artifact Information

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity the information about artifacts types (extensions, formats, structures, etc) is collected and registered. This information can be used to decide which extraction techniques can be used.

## Actor

[Architect](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

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

* [Artifacts Type Specification](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#artifacts-type-specification)

# Register Development Information

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity the information about the developed products will be collected and registered. This information may include programming patterns, programming and development paradigms

## Actor

[Developer](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)

## Mandatory Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)

## Optional Inputs

* [Class Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#class-diagram)
* [State Machine Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#state-machines-diagrams)
* [Activity Diagrams](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#activity-diagrams)

## Outputs

* [Artifacts Type Specification](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#artifacts-type-specification)
* [Development Information](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#development-information)  

# Register Technological Information

This is an optional activity and will or will not be performed based on the need of its outputs artifacts. During this activity information about technologies used in each product are collected and registered. This information can be used to decide which is the best extraction technique or exclude the use of some techniques as well.

## Actor

[Developer](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Process-Overview/#actorsroles)


## Optional Inputs

* [Source Code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code)
 
## Outputs

* [Development Information](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#development-information)  

# Sub-Processes

* [Planning](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Planning)
* [Detection](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Detection)
  * [Feature Search](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Feature-Search)
* ### [Documentation Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Documentation-Analysis)