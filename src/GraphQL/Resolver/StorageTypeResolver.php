<?php

namespace App\GraphQL\Resolver;

use App\Repository\StorageTypeRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class StorageTypeResolver implements ResolverInterface, AliasedInterface
{
    /** @var StorageTypeRepository */
    private $repository;

    public function __construct(StorageTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function resolve(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases()
    {
        return [
            'resolve' => 'StorageType',
        ];
    }
}
