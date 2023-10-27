<?php

namespace App\Collections;

use App\Models\Crypto;

class CryptoCollection
{
    private array $crypto;

    public function add(Crypto $crypto): void
    {
        $this->crypto[] = $crypto;
    }

    public function get(): array
    {
        return $this->crypto;
    }
}