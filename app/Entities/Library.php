<?php

namespace App\Entities;

use App\Repositories\LibraryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LibraryRepository::class)
 */
class Library implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private null|int $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private string $addressHouseNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $addressStreet;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private string $addressPostalCode;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $addressCity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(null|int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddressHouseNumber(): string
    {
        return $this->addressHouseNumber;
    }

    public function setAddressHouseNumber(string $addressHouseNumber): void
    {
        $this->addressHouseNumber = $addressHouseNumber;
    }

    public function getAddressStreet(): string
    {
        return $this->addressStreet;
    }

    public function setAddressStreet(string $addressStreet): void
    {
        $this->addressStreet = $addressStreet;
    }

    public function getAddressPostalCode(): string
    {
        return $this->addressPostalCode;
    }

    public function setAddressPostalCode(string $addressPostalCode): void
    {
        $this->addressPostalCode = $addressPostalCode;
    }

    public function getAddressCity(): string
    {
        return $this->addressCity;
    }

    public function setAddressCity(string $addressCity): void
    {
        $this->addressCity = $addressCity;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'addressHouseNumber' => $this->addressHouseNumber,
            'addressStreet' => $this->addressStreet,
            'addressPostalCode' => $this->addressPostalCode,
            'addressCity' => $this->addressCity,
        ];
    }
}
