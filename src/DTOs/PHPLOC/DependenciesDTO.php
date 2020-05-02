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

namespace PHPExperts\PHPLOCAnalyzer\DTOs\PHPLOC;

use PHPExperts\SimpleDTO\SimpleDTO;

/**
 * @internal
 *
 * @property int $global_constants
 * @property int $global_variables
 * @property int $super_globals
 * @property int $attributes_nonstatic
 * @property int $attributes_static
 * @property int $methodcalls_nonstatic
 * @property int $methodcalls_static
 */
class DependenciesDTO extends SimpleDTO
{
}
