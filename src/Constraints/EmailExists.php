<?php

namespace App\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class EmailExists extends Constraint
{
    public $message = 'This email address is already in use.';
}
