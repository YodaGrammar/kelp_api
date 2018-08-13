<?php

namespace App\GraphQL\Resolver;

use App\Repository\ProductRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductsResolver implements ResolverInterface, AliasedInterface
{
    /** @var ProductRepository */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function resolve($storageId)
    {
        return $this->repository->findByStorage($storageId);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases()
    {
        return [
            'resolve' => 'Products',
        ];
    }
}
