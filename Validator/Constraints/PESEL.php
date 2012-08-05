<?php
namespace Taveo\PolishExtensionsBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PESEL extends Constraint
{
    public $message = 'This value is not a valid PESEL number';
}
