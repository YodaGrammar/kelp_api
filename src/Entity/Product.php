<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Ramsey\Uuid\UuidInterface;
use \DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $quantity = 0;

    /**
     * @var ?DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $expireAt;

    /**
     * @var Packaging
     *
     * @ORM\ManyToOne(targetEntity="Packaging")
     * @ORM\JoinColumn(name="packaging_id", referencedColumnName="id", nullable=false)
     */
    private $packaging;

    /**
     * @var Storage
     *
     * @ORM\ManyToOne(targetEntity="Storage", inversedBy="products")
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="id", nullable=false)
     **/
    private $storage;

    /**
     * @var ProductType
     *
     * @ORM\ManyToOne(targetEntity="ProductType")
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id", nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getExpireAt(): ?DateTime
    {
        return $this->expireAt;
    }

    public function isExpired(): bool
    {
        if (null === $this->expireAt) {
            return false;
        }

        return $this->expireAt < (new \DateTime());
    }

    public function getType(): ProductType
    {
        return $this->type;
    }

    public function getPackaging(): Packaging
    {
        return $this->packaging;
    }

    public function getStorage(): Storage
    {
        return $this->storage;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }
}
