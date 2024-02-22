<?php

namespace App\Constraints;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EmailExistsValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        $userRepository = $this->entityManager->getRepository(User::class);
        $existingUser = $userRepository->findOneBy(['mail' => $value]);

        if ($existingUser !== null) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
