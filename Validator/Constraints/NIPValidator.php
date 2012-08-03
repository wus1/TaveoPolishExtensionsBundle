<?php
namespace Taveo\PolishExtensionsBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NIPValidator extends ConstraintValidator
{
    private $nip_weights = array(6, 5, 7, 2, 3, 4, 5, 6, 7);

    public function validate($value, Constraint $constraint)
    {
        $valid = true;

        if (!empty($value)) {
            $nip = preg_replace('/[\s-]/', '', $value);

            if (strlen($nip) == 10 && is_numeric($nip)) {
                $sum = 0;

                for ($i = 0; $i < 9; $i++)
                    $sum += $nip[$i] * $this->nip_weights[$i];

                $valid = ($sum % 11) == $nip[9];
            }
            else
                $valid = false;
        }

        if (!$valid)
            $this->context->addViolation($constraint->message);
    }

}
