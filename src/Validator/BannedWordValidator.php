<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BannedWordValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        /** @var BannedWord $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        $value = strtolower($value);
        foreach ($constraint->bannedWords as $bannedWord) {
            if (str_contains($value, $bannedWord)) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ bannedWord }}', $bannedWord)
                    ->addViolation();
            }
        }
    }
}
