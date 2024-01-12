<?php

// Set the API server, version, key, and client ID
$apiServer = 'https://api.demo.sitehost.co.nz';
$apiVersion = '1.0';
$apiKey = 'd17261d51ff7046b760bd95b4ce781ac';
$clientID = '293785';

// Construct the API URL
$apiURL = "{$apiServer}/{$apiVersion}/srs/list_domains.json?client_id={$clientID}&apikey={$apiKey}";

// Make the API request
$response = file_get_contents($apiURL);

// Check if the request was successful
if ($response !== false) {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Check if the response contains domain information
    if (isset($data['domains'])) {
        // Output the list of domains
        echo "<h2>Domains for Customer #293785:</h2>";
        echo "<ul>";
        foreach ($data['domains'] as $domain) {
            echo "<li>{$domain}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No domains found for Customer #293785</p>";
    }
} else {
    echo "<p>Error accessing the API</p>";
}
?>
