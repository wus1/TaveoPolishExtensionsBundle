<?php
namespace Taveo\PolishExtensionsBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class REGONValidator extends ConstraintValidator
{
    private $regon_weights9 = array(8, 9, 2, 3, 4, 5, 6, 7);
    private $regon_weights14 = array(2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8);

    public function validate($value, Constraint $constraint)
    {
        $valid = true;

        if (!empty($value)) {

            if (ctype_digit($value)) {
                if (strlen($value) == 9) {
                    $sum = 0;

                    for ($i = 0; $i < 8; $i++)
                        $sum += $value[$i] * $this->regon_weights9[$i];

                    $result = $sum % 11;
                    if ($result == 10)
                        $result = 0;

                    $valid = $result == $value[8];

                } else if (strlen($value) == 14) {
                    $sum = 0;

                    for ($i = 0; $i < 13; $i++)
                        $sum += $value[$i] * $this->regon_weights14[$i];

                    $result = $sum % 11;
                    if ($result == 10)
                        $result = 0;

                    $valid = $result == $value[13];

                } else
                    $valid = false;
            } else
                $valid = false;
        }

        if (!$valid)
            $this->context->addViolation($constraint->message);
    }

}
