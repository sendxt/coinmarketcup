<?php

declare(strict_types=1);

namespace App\Request\ConvertCurrency;

use Symfony\Component\Validator\Constraints as Assert;

class HistoryRequest
{
    /**
     * @var string
     * @Assert\Choice(choices=App\Constants\Currency::ALL_CHOICES)
     */
    private $from;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $to;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Positive()
     */
    private $amount;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return HistoryRequest
     */
    public function setFrom(string $from): HistoryRequest
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return HistoryRequest
     */
    public function setTo(string $to): HistoryRequest
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     * @return $this
     */
    public function setAmount(string $amount): HistoryRequest
    {
        $this->amount = $amount;

        return $this;
    }
}