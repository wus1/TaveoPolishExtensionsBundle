<?php
namespace Taveo\PolishExtensionsBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class REGON extends Constraint
{
    public $message = 'This value is not a valid REGON number';
}
