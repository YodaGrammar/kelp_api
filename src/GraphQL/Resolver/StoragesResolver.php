<?php

namespace App\GraphQL\Resolver;

use App\Repository\StorageRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class StoragesResolver implements ResolverInterface, AliasedInterface
{
    /** @var StorageRepository */
    private $repository;

    public function __construct(StorageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function resolve($userId)
    {
        return $this->repository->findByOwner($userId);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases()
    {
        return [
            'resolve' => 'Storages',
        ];
    }
}
