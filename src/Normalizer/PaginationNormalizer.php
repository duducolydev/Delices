<?php

namespace App\Normalizer;

use App\Entity\Recipe;
use ArrayObject;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

class PaginationNormalizer implements NormalizerInterface
{
    public function __construct(
            #[Autowire(service: 'serializer.normalizer.object')]
            private readonly NormalizerInterface $normalizer)
    {
        
    }

    public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|ArrayObject|null
    {
        if (!($object instanceof PaginationInterface)) {
            throw new \RuntimeException();
        }

        return [
            'items' => array_map(fn (Recipe $recipe) => $this->normalize($recipe, $format, $context), $object->getItems()),
            'total' => $object->getTotalItemCount(),
            'page' => $object->getCurrentPageNumber(),
            'lastPage' => ceil($object->getTotalItemCount() / $object->getItemNumberPerPage())
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof PaginatorInterface;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            PaginationInterface::class => true
        ];
    }
}