<?php


class User
{
    private $firstName;
    private $lastName;
    private $email;

    public function setFirstName(string $value): self
    {
        $this->firstName = $value;
        return $this;
    }

    public function setLastName(string $value): self
    {
        $this->lastName = $value;
        return $this;
    }

    public function setEmail(string $value): self
    {
        $this->email = $value;
        return $this;
    }

    public function __toString(): string
    {
        return ucfirst($this->firstName) . " " . ucfirst($this->lastName) . " <{$this->email}>";
    }
}

$user = new User();

$user->setFirstName('John')
    ->setLastName('Doe')
    ->setEmail('john.doe@example.com');

echo $user;