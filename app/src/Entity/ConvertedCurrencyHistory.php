<?php

namespace App\Entity;

use App\Repository\ConvertCurrencyHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConvertCurrencyHistoryRepository::class)
 */
class ConvertedCurrencyHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, name="`from`")
     */
    private $from;

    /**
     * @ORM\Column(type="string", length=10, name="`to`")
     */
    private $to;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $convertedAmount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getConvertedAmount(): string
    {
        return $this->convertedAmount;
    }

    public function setConvertedAmount(string $convertedAmount): self
    {
        $this->convertedAmount = $convertedAmount;

        return $this;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom($from): self
    {
        $this->from = $from;

        return $this;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): self
    {
        $this->to = $to;

        return $this;
    }
}
