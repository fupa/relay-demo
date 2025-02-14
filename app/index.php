<?php

use Relay\Relay;

require __DIR__ . '/vendor/autoload.php';

const CACHE_DURATION_IN_SECONDS = 25;
const CACHE_KEY = 'test-key';
$relay = new Relay();

$relay->setOption(Relay::OPT_THROW_ON_ERROR, true); // seconds
$relay->setOption(Relay::OPT_MAX_RETRIES, 3);
$relay->setOption(Relay::OPT_BACKOFF_BASE, 10); // ms
$relay->setOption(Relay::OPT_BACKOFF_CAP, 25); // ms
$relay->setOption(Relay::OPT_BACKOFF_ALGORITHM, Relay::BACKOFF_ALGORITHM_DECORRELATED_JITTER);

$relay->connect(host: 'relay-demo-cache', timeout: 0.250, read_timeout: 0.250);
$relay->dispatchEvents();

$cacheEntry = $relay->get(CACHE_KEY);

if ($cacheEntry === false) {
    $cacheEntry = date('H:i:s');
    $relay->setEx(CACHE_KEY, CACHE_DURATION_IN_SECONDS, $cacheEntry);
    echo "was not cached ({$cacheEntry})";
} else {
    echo "was cached ({$cacheEntry})";
}
