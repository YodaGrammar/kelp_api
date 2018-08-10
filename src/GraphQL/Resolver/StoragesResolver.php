<?php

namespace App\GraphQL\Resolver;

use App\Repository\StorageRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

final class StoragesResolver implements ResolverInterface, AliasedInterface
{
    /** @var StorageRepository */
    private $repository;

    public function __construct(StorageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function resolve()
    {
        return $this->repository->findAll();
    }
    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Storages',
        ];
    }
}
