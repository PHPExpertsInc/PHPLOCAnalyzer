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
 * @property int $loc
 * @property int $loc_comments
 * @property int $loc_noncomment
 * @property int $loc_logical
 * @property int $loc_global_scope
 * @property int $classes
 * @property int $class_length_avg
 * @property int $class_length_min
 * @property int $class_length_max
 * @property int $method_length_avg
 * @property int $method_length_min
 * @property int $method_length_max
 * @property int $functions
 * @property int $function_length_avg
 */
class SizeDTO extends SimpleDTO
{
}
