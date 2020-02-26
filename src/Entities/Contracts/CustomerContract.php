<?php

namespace App\Entities\Contracts;

interface CustomerContract
{
    public function getId(): ?int;

    public function getFirstName(): ?string;

    public function getSurname(): ?string;

    public function getFullName(): ?string;

    public function getAddress(): ?string;

    public function getTwitterAlias(): ?string;
}
