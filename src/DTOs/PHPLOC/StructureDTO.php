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
 * @property int $namespaces
 * @property int $interfaces
 * @property int $traits
 * @property int $classes_abstract
 * @property int $classes_concrete
 * @property int $methods_scope_nonstatic
 * @property int $methods_scope_static
 * @property int $visibility_public
 * @property int $visibility_protected
 * @property int $visibility_private
 * @property int $functions_named
 * @property int $functions_anonymous
 * @property int $constants_global
 * @property int $constants_class
 */
class StructureDTO extends SimpleDTO
{
}
