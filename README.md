# PHPLOCAnalyzer Project

[![TravisCI](https://travis-ci.org/phpexpertsinc/PHPLOCAnalyzer.svg?branch=master)](https://travis-ci.org/phpexpertsinc/PHPLOCAnalyzer)
[![Test Coverage](https://api.codeclimate.com/v1/badges/d04106eacbb4a4ea4a55/test_coverage)](https://codeclimate.com/github/phpexpertsinc/PHPLOCAnalyzer/test_coverage)

PHPLOCAnalyzer is a PHP Experts, Inc., Project meant to automate the reporting from [sebastianbergmann/phploc](https://github.com/sebastianbergmann/phploc).

It turns this

```
Size
  Lines of Code (LOC)                              687
  Comment Lines of Code (CLOC)                     143 (20.82%)
  Non-Comment Lines of Code (NCLOC)                544 (79.18%)
  Logical Lines of Code (LLOC)                     188 (27.37%)
    Classes                                        168 (89.36%)
      Average Class Length                          42
        Minimum Class Length                        10
        Maximum Class Length                        94
      Average Method Length                          3
        Minimum Method Length                        0
        Maximum Method Length                       11
    Functions                                        0 (0.00%)
      Average Function Length                        0
    Not in classes or functions                     20 (10.64%)

Cyclomatic Complexity
  Average Complexity per LLOC                     0.42
  Average Complexity per Class                   20.75
    Minimum Class Complexity                      1.00
    Maximum Class Complexity                     44.00
  Average Complexity per Method                   3.06
    Minimum Method Complexity                     1.00
    Maximum Method Complexity                    15.00

Dependencies
  Global Accesses                                    0
    Global Constants                                 0 (0.00%)
    Global Variables                                 0 (0.00%)
    Super-Global Variables                           0 (0.00%)
  Attribute Accesses                                55
    Non-Static                                      55 (100.00%)
    Static                                           0 (0.00%)
  Method Calls                                      47
    Non-Static                                      41 (87.23%)
    Static                                           6 (12.77%)

Structure
  Namespaces                                         1
  Interfaces                                         1
  Traits                                             1
  Classes                                            2
    Abstract Classes                                 2 (100.00%)
    Concrete Classes                                 0 (0.00%)
  Methods                                           46
    Scope
      Non-Static Methods                            46 (100.00%)
      Static Methods                                 0 (0.00%)
    Visibility
      Public Methods                                30 (65.22%)
      Non-Public Methods                            16 (34.78%)
  Functions                                          2
    Named Functions                                  0 (0.00%)
    Anonymous Functions                              2 (100.00%)
  Constants                                          3
    Global Constants                                 0 (0.00%)
    Class Constants                                  3 (100.00%)

```

into this:

```json
{
    "directories": 2,
    "files": 12,
    "size": {
        "loc": 1870,
        "loc_comments": 383,
        "loc_noncomment": 1487,
        "loc_logical": 454,
        "loc_global_scope": 67,
        "classes": 385,
        "class_length_avg": 32,
        "class_length_min": 1,
        "class_length_max": 94,
        "method_length_avg": 4,
        "method_length_min": 0,
        "method_length_max": 17,
        "functions": 2,
        "function_length_avg": 0
    },
    "cyclomatic": {
        "lloc": 0.22,
        "class_avg": 9.33,
        "class_min": 1,
        "class_max": 44,
        "method_avg": 2.1,
        "method_min": 1,
        "method_max": 15
    },
    "dependencies": {
        "global_constants": 0,
        "global_variables": 0,
        "super_globals": 0,
        "attributes_nonstatic": 85,
        "attributes_static": 0,
        "methodcalls_nonstatic": 128,
        "methodcalls_static": 73
    },
    "structure": {
        "namespaces": 3,
        "interfaces": 1,
        "traits": 1,
        "classes_abstract": 2,
        "classes_concrete": 8,
        "methods_scope_nonstatic": 95,
        "methods_scope_static": 0,
        "visibility_public": 72,
        "visibility_nonpublic": 23,
        "functions_named": 0,
        "functions_anonymous": 3,
        "constants_global": 0,
        "constants_class": 3
    }
}
```

## Installation

Via Composer

```bash
composer require phpexperts/phploc-analyzer
```

## Usage

```php
use \PHPExperts\PHPLOCAnalyzer\PHPLOCAnalyzer;
$phplocDTO = PHPLOCAnalyzer::analyze('/code/path');
echo json_encode($phplocDTO, JSON_PRETTY_PRINT);
```

## Testing

```bash
phpunit --testdox
```

# Contributors

[Theodore R. Smith](https://www.phpexperts.pro/]) <theodore@phpexperts.pro>  
GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690  
CEO: PHP Experts, Inc.

## License

MIT license. Please see the [license file](LICENSE) for more information.

