<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class BannedWord extends Constraint
{
    public function __construct(
        public string $message = 'Ce titre contient un mot banni : "{{ bannedWord }}" !',
        public array $bannedWords = ['spam', 'viagra'],
        ?array $groups = null,
        mixed $payload = null)
    {
        parent::__construct(null, $groups, $payload);
    }

}
