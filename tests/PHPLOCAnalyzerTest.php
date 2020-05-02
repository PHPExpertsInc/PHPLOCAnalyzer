<?php declare(strict_types=1);

/**
 * This file is part of the PHPLOC Analyzer, a PHP Experts, Inc., Project.
 *
 * Copyright © 2020 PHP Experts, Inc.
 * Author: Theodore R. Smith <theodore@phpexperts.pro>
 *   GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690
 *   https://www.phpexperts.pro/
 *   https://github.com/PHPExpertsInc/PHPLOCAnalyzer
 *
 * This file is licensed under the MIT License.
 */

namespace PHPExperts\PHPLOCAnalyzer\Tests;

use PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOCDTO;
use PHPExperts\PHPLOCAnalyzer\PHPLOCAnalyzer;

class PHPLOCAnalyzerTestCase extends TestCase
{
    /** @testdox Can parse PHPLOC into a DTO */
    public function testCanParsePHPLOCIntoADTO()
    {
        $expected = <<<JSON
{
    "directories": 1,
    "files": 5,
    "size": {
        "loc": 692,
        "loc_comments": 115,
        "loc_noncomment": 577,
        "loc_logical": 174,
        "loc_global_scope": 5,
        "classes": 167,
        "class_length_avg": 33,
        "class_length_min": 1,
        "class_length_max": 94,
        "method_length_avg": 3,
        "method_length_min": 0,
        "method_length_max": 11,
        "functions": 2,
        "function_length_avg": 0
    },
    "cyclomatic": {
        "lloc": 0.47,
        "class_avg": 17.2,
        "class_min": 1,
        "class_max": 44,
        "method_avg": 3.07,
        "method_min": 1,
        "method_max": 15
    },
    "dependencies": {
        "global_constants": 0,
        "global_variables": 0,
        "super_globals": 0,
        "attributes_nonstatic": 55,
        "attributes_static": 0,
        "methodcalls_nonstatic": 41,
        "methodcalls_static": 8
    },
    "structure": {
        "namespaces": 2,
        "interfaces": 0,
        "traits": 1,
        "classes_abstract": 2,
        "classes_concrete": 2,
        "methods_scope_nonstatic": 35,
        "methods_scope_static": 0,
        "visibility_public": 19,
        "visibility_protected": 5,
        "visibility_private": 11,
        "functions_named": 0,
        "functions_anonymous": 4,
        "constants_global": 0,
        "constants_class": 3
    }
}
JSON;

        $phplocDTO = PHPLOCAnalyzer::analyze(__DIR__ . '/../vendor/phpexperts/simple-dto');
        self::assertInstanceOf(PHPLOCDTO::class, $phplocDTO);

        $actual = json_encode($phplocDTO, JSON_PRETTY_PRINT);
        self::assertSame($expected, $actual);
    }
}
