<?php

namespace App\GraphQL\Type;

use GraphQL\Language\AST\StringValueNode;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use GraphQL\Type\Definition\ScalarType;

class DateTimeType extends ScalarType implements AliasedInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getAliases()
    {
        return ['DateTime', 'Date'];
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($value)
    {
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d H:i:s');
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function parseValue($value)
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $value);
    }

    /**
     * {@inheritdoc}
     */
    public function parseLiteral($valueNode, array $variables = null)
    {
        if ($valueNode instanceof StringValueNode) {
            return $this->parseValue($valueNode->value);
        }

        throw new \Exception();
    }
}
