<?php

namespace App\GraphQL\Resolver;

use App\Repository\PackagingRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class PackagingsResolver implements ResolverInterface, AliasedInterface
{
    /** @var PackagingRepository */
    private $repository;

    public function __construct(PackagingRepository $repository)
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
            'resolve' => 'Packagings',
        ];
    }
}
