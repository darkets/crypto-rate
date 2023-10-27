<?php
declare(strict_types=1);

namespace App\Models;

class Crypto
{
    private string $symbol;
    private float $priceChange;
    private float $priceChangePercent;
    private float $weightedAvgPrice;
    private float $prevClosePrice;
    private float $lastQty;
    private float $bidPrice;
    private float $bidQty;
    private float $askPrice;
    private float $askQty;
    private float $openPrice;
    private float $highPrice;
    private float $lowPrice;
    private float $volume;
    private float $quoteVolume;
    private int $openTime;
    private int $closeTime;
    private int $count;

    public function __construct(
        string $symbol,
        float $priceChange,
        float $priceChangePercent,
        float $weightedAvgPrice,
        float $prevClosePrice,
        float $lastQty,
        float $bidPrice,
        float $bidQty,
        float $askPrice,
        float $askQty,
        float $openPrice,
        float $highPrice,
        float $lowPrice,
        float $volume,
        float $quoteVolume,
        int $openTime,
        int $closeTime,
        int $count
    )
    {
        $this->symbol = $symbol;
        $this->priceChange = $priceChange;
        $this->priceChangePercent = $priceChangePercent;
        $this->weightedAvgPrice = $weightedAvgPrice;
        $this->prevClosePrice = $prevClosePrice;
        $this->lastQty = $lastQty;
        $this->bidPrice = $bidPrice;
        $this->bidQty = $bidQty;
        $this->askPrice = $askPrice;
        $this->askQty = $askQty;
        $this->openPrice = $openPrice;
        $this->highPrice = $highPrice;
        $this->lowPrice = $lowPrice;
        $this->volume = $volume;
        $this->quoteVolume = $quoteVolume;
        $this->openTime = $openTime;
        $this->closeTime = $closeTime;
        $this->count = $count;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPriceChange(): float
    {
        return $this->priceChange;
    }

    public function getPriceChangePercent(): float
    {
        return $this->priceChangePercent;
    }

    public function getWeightedAvgPrice(): float
    {
        return $this->weightedAvgPrice;
    }

    public function getPrevClosePrice(): float
    {
        return $this->prevClosePrice;
    }

    public function getLastQty(): float
    {
        return $this->lastQty;
    }

    public function getAskPrice(): float
    {
        return $this->askPrice;
    }

    public function getAskQty(): float
    {
        return $this->askQty;
    }

    public function getBidPrice(): float
    {
        return $this->bidPrice;
    }

    public function getBidQty(): float
    {
        return $this->bidQty;
    }

    public function getCloseTime(): int
    {
        return $this->closeTime;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getHighPrice(): float
    {
        return $this->highPrice;
    }

    public function getLowPrice(): float
    {
        return $this->lowPrice;
    }

    public function getOpenPrice(): float
    {
        return $this->openPrice;
    }

    public function getOpenTime(): int
    {
        return $this->openTime;
    }

    public function getQuoteVolume(): float
    {
        return $this->quoteVolume;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }
}