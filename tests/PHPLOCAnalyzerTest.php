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
    "directories": -1,
    "files": -1,
    "size": {
        "loc": 592,
        "loc_comments": 74,
        "loc_noncomment": 518,
        "loc_logical": 160,
        "loc_global_scope": 0,
        "classes": 160,
        "class_length_avg": 53,
        "class_length_min": 6,
        "class_length_max": 94,
        "method_length_avg": 3,
        "method_length_min": 0,
        "method_length_max": 11,
        "functions": 0,
        "function_length_avg": 0
    },
    "cyclomatic": {
        "lloc": 0.51,
        "class_avg": 28,
        "class_min": 3,
        "class_max": 44,
        "method_avg": 3.14,
        "method_min": 1,
        "method_max": 15
    },
    "dependencies": {
        "global_constants": 0,
        "global_variables": 0,
        "super_globals": 0,
        "attributes_nonstatic": 55,
        "attributes_static": 0,
        "methodcalls_nonstatic": 39,
        "methodcalls_static": 4
    },
    "structure": {
        "namespaces": 1,
        "interfaces": 0,
        "traits": 1,
        "classes_abstract": 2,
        "classes_concrete": 0,
        "methods_scope_nonstatic": 33,
        "methods_scope_static": 0,
        "visibility_public": 17,
        "visibility_protected": 5,
        "visibility_private": 11,
        "functions_named": 0,
        "functions_anonymous": 3,
        "constants_global": 0,
        "constants_class": 3
    }
}
JSON;

        $phplocDTO = PHPLOCAnalyzer::analyze(realpath(__DIR__ . '/../vendor/phpexperts/simple-dto/src/'));
        self::assertInstanceOf(PHPLOCDTO::class, $phplocDTO);

        $actual = json_encode($phplocDTO, JSON_PRETTY_PRINT);
        self::assertSame($expected, $actual);
    }
}
