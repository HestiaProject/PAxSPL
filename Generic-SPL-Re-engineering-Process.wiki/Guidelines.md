# Introduction

The main goal of this section is to describe each technique which we recommended to apply during the [Feature Search](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Feature-Search) sub-process. Furthermore, we intend to help whoever is applying this process to choose the best combination of techniques for their needs.

# How to choose a strategy?

According to (Assunção et al., 2017), the possible strategies when performing a re-engineering process for SPL are: [Expert Driven](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Guidelines#expert-driven), [Static Analysis](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Guidelines#expert-driven), [Information Retrieval](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Guidelines#information-retrieval), Dynamic Analysis and Search-based. However, we decided to not include search-based and dynamic analysis because not many works make use of these techniques, also they are generally used as a supporting technique. 

We briefly describe each strategy and highlight recommended scenarios for them:

## Expert Driven 
This strategy is based on knowledge and experiences of specialists, such as domain engineers, software engineers, stakeholders, etc.

### Recommended Situations 
To apply the expert driven strategy is highly recommended to have a team with skills and knowledge involving the re-engineering process of SPL. We also recommend to use Expert Driven as a support strategy along Static Analysis and Information Retrieval. 


## Static Analysis
Static analysis is done by analyzing a program without its execution. Information analyze may include structural, static artifacts and so on.

### Recommended Situations 
Static analysis techniques are recommended when analyzing [source code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code). Furthermore, is recommended that the used code possesses low coupling and high cohesion. We also recommend to use static analysis techniques along at least one [information retrieval](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Guidelines#information-retrieval-techniques) technique such as [formal concept analysis](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Formal-Concept-Analysis).

## Information Retrieval
This strategy collect and analyze information in artifacts considering text structure, similarity,etc. Information retrieval techniques commonly use documents written in natural language.

### Recommended Situations 
Information retrieval techniques are generally used in [requirements](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#requirements) artifacts. However, they can also be used in [source code](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Artifacts-Description#source-code), but to do that the both the code and the requirements must have meaningful names. We also recommend to use information retrieval techniques along at least one [static analysis](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Guidelines#static-analysis-techniques) technique such as [clustering](https://github.com/HestiaProject/Generic-SPL-Re-engineering-Process/wiki/Clustering).

# Feature Retrieval Techniques 
## Static Analysis Techniques

* [Clustering](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Clustering)
* [Heuristics](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Heuristics)
* [Overlaps](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Overlaps)
* [Dependency Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Dependency-Analysis)
* [Rule-Based](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Rule-Based)
* [Data Flow Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Data-Flow-Analysis)

## Information Retrieval Techniques

* [Formal Concept Analysis](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Formal-Concept-Analysis)
* [Latent Semantic Indexing](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Latent-Semantic-Indexing)
* [Vector Space Model](https://github.com/HestiaProject/abstract-spl-reengineering/wiki/Vector-Space-Model)

