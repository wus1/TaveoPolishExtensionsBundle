<?php
namespace Taveo\PolishExtensionBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NIP extends Constraint
{
    public $message = 'This value is not a valid NIP number';
}
