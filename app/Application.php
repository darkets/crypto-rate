<?php
declare(strict_types=1);

namespace App;

class Application
{
    private Api $api;
    public function __construct()
    {
        $this->api = new Api();
    }

    public function run()
    {
        while (true) {
            echo 'Input two currency codes <currency1 currency2>: ';
            [$firstCrypto, $secondCrypto] = explode(' ', readline());

            if (empty($firstCrypto) || empty($secondCrypto)) {
                echo 'Input must not be empty!' . PHP_EOL;
                continue;
            }

            $cryptoCollection = $this->api->fetchCryptoData([$firstCrypto, $secondCrypto]);

            if (!isset($cryptoCollection)) {
                echo 'Fetching Crypto Data Failed Miserably.' . PHP_EOL;
                continue;
            }

            $this->displayCryptoData($cryptoCollection);
        }
    }

    private function displayCryptoData(CryptoCollection $cryptoCollection) {
        foreach($cryptoCollection->get() as $crypto) {
            /** @var Crypto $crypto */
            echo "Symbol: " . $crypto->getSymbol() . PHP_EOL;
            echo "Price Change: " . $crypto->getPriceChange() . PHP_EOL;
            echo "Price Change %: " . $crypto->getPriceChangePercent() . '%' . PHP_EOL;
            echo "Weighted Avg Price: " . $crypto->getWeightedAvgPrice() . PHP_EOL;
            echo "Previous Close Price: " . $crypto->getPrevClosePrice() . PHP_EOL;
            echo "Last Qty: " . $crypto->getLastQty() . PHP_EOL;
            echo "Bid Price: " . $crypto->getBidPrice() . PHP_EOL;
            echo "Bid Qty: " . $crypto->getBidQty() . PHP_EOL;
            echo "Ask Price: " . $crypto->getAskPrice() . PHP_EOL;
            echo "Ask Qty: " . $crypto->getAskQty() . PHP_EOL;
            echo "Open Price: " . $crypto->getOpenPrice() . PHP_EOL;
            echo "High Price: " . $crypto->getHighPrice() . PHP_EOL;
            echo "Low Price: " . $crypto->getLowPrice() . PHP_EOL;
            echo "Volume: " . $crypto->getVolume() . PHP_EOL;
            echo "Quote Volume: " . $crypto->getQuoteVolume() . PHP_EOL;
            echo "Open Time: " . $crypto->getOpenTime() . PHP_EOL;
            echo "Close Time: " . $crypto->getCloseTime() . PHP_EOL;
            echo "Count: " . $crypto->getCount() . PHP_EOL;
            echo "-------------------------------------------------------------" . PHP_EOL;
        }
    }
}