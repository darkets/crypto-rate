<?php
declare(strict_types=1);

namespace App\Api;

use App\Collections\CryptoCollection;
use App\Models\Crypto;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Message;

class BinanceAPI
{
    private const BASE_URL = 'https://api4.binance.com/api/v3/ticker/24hr?';
    private const BASE_CRYPTO = 'BTC';

    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false,
        ]);
    }

    private function buildUrl(string $cryptoCode): string
    {
        return $this::BASE_URL . http_build_query([
                'symbol' => $cryptoCode . $this::BASE_CRYPTO,
            ]);
    }

    public function fetchCryptoData(array $cryptoCodes): ?CryptoCollection
    {
        $cryptoCollection = new CryptoCollection();

        foreach ($cryptoCodes as $cryptoCode) {
            $url = $this->buildUrl($cryptoCode);

            try {
                $response = $this->client->get($url);

                $crypto = json_decode($response->getBody()->getContents());

                if (empty($crypto)) {
                    return null;
                }

                $cryptoCurrency = new Crypto(
                    $crypto->symbol,
                    (float)$crypto->priceChange,
                    (float)$crypto->priceChangePercent,
                    (float)$crypto->weightedAvgPrice,
                    (float)$crypto->prevClosePrice,
                    (float)$crypto->lastQty,
                    (float)$crypto->bidPrice,
                    (float)$crypto->bidQty,
                    (float)$crypto->askPrice,
                    (float)$crypto->askQty,
                    (float)$crypto->openPrice,
                    (float)$crypto->highPrice,
                    (float)$crypto->lowPrice,
                    (float)$crypto->volume,
                    (float)$crypto->quoteVolume,
                    $crypto->openTime,
                    $crypto->closeTime,
                    $crypto->count
                );

                $cryptoCollection->add($cryptoCurrency);
            } catch(GuzzleException $e) {
                echo Message::toString($e->getRequest());
                echo Message::toString($e->getResponse());
                echo PHP_EOL;
                return null;
            }
        }

        return $cryptoCollection;
    }
}
