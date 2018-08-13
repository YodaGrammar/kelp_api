<?php

namespace App\GraphQL\Resolver;

use App\Repository\ProductTypeRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductTypesResolver implements ResolverInterface, AliasedInterface
{
    /** @var ProductTypeRepository */
    private $repository;

    public function __construct(ProductTypeRepository $repository)
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
    public static function getAliases()
    {
        return [
            'resolve' => 'ProductTypes',
        ];
    }
}
