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

namespace PHPExperts\PHPLOCAnalyzer;

use PHPExperts\DataTypeValidator\InvalidDataTypeException;
use PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOCDTO;
use RuntimeException;

final class PHPLOCAnalyzer
{
    /**
     * @throws \RuntimeException
     */
    private static function assertHasPHPLOC(): void
    {
        $return = shell_exec('which phploc');
        if (empty($return)) {
            throw new \RuntimeException("'phploc' is not executable.");
        }
    }

    /**
     * @throws InvalidDataTypeException
     * @throws \RuntimeException
     */
    public static function analyze(string $sourcedir): PHPLOCDTO
    {
        self::assertHasPHPLOC();

        $phploc = shell_exec("phploc $sourcedir");
        if (!$phploc) {
            throw new RuntimeException("phploc did not analyze '$sourcedir' successfully.");
        }

        // 2. Split it into distinct lines.
        $lines = explode("\n", $phploc);

        // 3. Parse into key/value pairs
        $keyPairs = [];
        foreach ($lines as $line) {
            $matches = [];
            preg_match('/(.+)    *([^ (]+)/', $line, $matches);

            if (count($matches) === 3) {
                $key = trim($matches[1]);
                if (array_key_exists($key, $keyPairs)) {
                    $key .= ' 2';
                    if (array_key_exists($key, $keyPairs)) {
                        throw new RuntimeException("$key was encountered more than twice.");
                    }
                }

                $keyPairs[$key] = $matches[2];
            }
        }
//        dd($lines);

        // 4. Build the DTO.
        try {
            $phplocDTO = new PHPLOCDTO([
                'directories' => (int) ($keyPairs['Directories'] ?? -1),
                'files'       => (int) ($keyPairs['Files'] ?? -1),
                'size'        => [
                    'loc'                 => (int) $keyPairs['Lines of Code (LOC)'],
                    'loc_comments'        => (int) $keyPairs['Comment Lines of Code (CLOC)'],
                    'loc_noncomment'      => (int) $keyPairs['Non-Comment Lines of Code (NCLOC)'],
                    'loc_logical'         => (int) $keyPairs['Logical Lines of Code (LLOC)'],
                    'loc_global_scope'    => (int) $keyPairs['Not in classes or functions'],
                    'classes'             => (int) $keyPairs['Classes'],
                    'class_length_avg'    => (int) $keyPairs['Average Class Length'],
                    'class_length_min'    => (int) $keyPairs['Minimum Class Length'],
                    'class_length_max'    => (int) $keyPairs['Maximum Class Length'],
                    'method_length_avg'   => (int) $keyPairs['Average Method Length'],
                    'method_length_min'   => (int) $keyPairs['Minimum Method Length'],
                    'method_length_max'   => (int) $keyPairs['Maximum Method Length'],
                    'functions'           => (int) $keyPairs['Functions'],
                    'function_length_avg' => (int) $keyPairs['Average Function Length'],
                ],
                'cyclomatic' => [
                    'lloc'       => (float) $keyPairs['Average Complexity per LLOC'],
                    'class_avg'  => (float) $keyPairs['Average Complexity per Class'],
                    'class_min'  => (float) $keyPairs['Minimum Class Complexity'],
                    'class_max'  => (float) $keyPairs['Maximum Class Complexity'],
                    'method_avg' => (float) $keyPairs['Average Complexity per Method'],
                    'method_min' => (float) $keyPairs['Minimum Method Complexity'],
                    'method_max' => (float) $keyPairs['Maximum Method Complexity'],
                ],
                'dependencies' => [
                    'global_constants'      => (int) $keyPairs['Global Constants'],
                    'global_variables'      => (int) $keyPairs['Global Variables'],
                    'super_globals'         => (int) $keyPairs['Super-Global Variables'],
                    'attributes_nonstatic'  => (int) $keyPairs['Non-Static'],
                    'attributes_static'     => (int) $keyPairs['Static'],
                    'methodcalls_nonstatic' => (int) $keyPairs['Non-Static 2'],
                    'methodcalls_static'    => (int) $keyPairs['Static 2'],
                ],
                'structure'    => [
                    'namespaces'              => (int) $keyPairs['Namespaces'],
                    'interfaces'              => (int) $keyPairs['Interfaces'],
                    'traits'                  => (int) $keyPairs['Traits'],
                    'classes_abstract'        => (int) $keyPairs['Abstract Classes'],
                    'classes_concrete'        => (int) $keyPairs['Concrete Classes'],
                    'methods_scope_nonstatic' => (int) $keyPairs['Non-Static Methods'],
                    'methods_scope_static'    => (int) $keyPairs['Static Methods'],
                    'visibility_public'       => (int) $keyPairs['Public Methods'],
                    'visibility_nonpublic'    => (int) $keyPairs['Non-Public Methods'],
                    'functions_named'         => (int) $keyPairs['Named Functions'],
                    'functions_anonymous'     => (int) $keyPairs['Anonymous Functions'],
                    'constants_global'        => (int) $keyPairs['Global Constants 2'],
                    'constants_class'         => (int) $keyPairs['Class Constants'],
                ],
            ]);
        } catch (InvalidDataTypeException $e) {
            dump($e->getReasons());

            throw $e;
        }

        return $phplocDTO;
    }
}
