<?php
namespace Taveo\PolishExtensionBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NIP extends Constraint
{
    public $message = 'To nie jest prawidłowy numer NIP';
}
