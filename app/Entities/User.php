<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private null|int $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $firstName;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $password;

    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    public function getAuthIdentifier(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstname): void
    {
        $this->firstName = $firstname;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
}
