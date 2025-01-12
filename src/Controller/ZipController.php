<?php

namespace App\Controller;

class ZipController
{
    public function show(string $zipcode)
    {
        echo "Showing zip with zipcode: $zipcode";
    }

    public function showZipByLocation(string $uf, string $city, string $street)
    {
        echo "Updating zip by uf: $uf\r\n";
        echo "Updating zip by city: " .urldecode($city) . "\r\n";
        echo "Updating zip by street:" . urldecode($street) . "\r\n";
    }
}