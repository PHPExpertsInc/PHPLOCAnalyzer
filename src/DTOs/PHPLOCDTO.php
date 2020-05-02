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

namespace PHPExperts\PHPLOCAnalyzer\DTOs;

use PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOC\CyclomaticDTO;
use PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOC\DependenciesDTO;
use PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOC\SizeDTO;
use PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOC\StructureDTO;
use PHPExperts\SimpleDTO\NestedDTO;

/**
 * @property int             $directories
 * @property int             $files
 * @property SizeDTO         $size
 * @property CyclomaticDTO   $cyclomatic
 * @property DependenciesDTO $dependencies
 * @property StructureDTO    $structure
 */
class PHPLOCDTO extends NestedDTO
{
    /**
     * @param array<mixed> $input
     */
    public function __construct(array $input)
    {
        $DTOs = [
            'size'         => SizeDTO::class,
            'cyclomatic'   => CyclomaticDTO::class,
            'dependencies' => DependenciesDTO::class,
            'structure'    => StructureDTO::class,
        ];

        parent::__construct($input, $DTOs, []);
    }
}
