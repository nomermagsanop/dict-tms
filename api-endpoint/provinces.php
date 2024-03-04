<?php

// URL of the website to scrape
$url = 'https://psa.gov.ph/classification/psgc/provinces';

// Fetch the HTML content of the page
$html = file_get_contents($url);

// Check if the request was successful
if ($html === false) {
    die("Error fetching data from $url");
}

// Create a DOMDocument object to parse the HTML
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Suppress warnings for malformed HTML
$dom->loadHTML($html);
libxml_clear_errors(); // Clear any accumulated errors

// Find all table rows
$rows = $dom->getElementsByTagName('tr');

// Initialize an array to store all province data
$provinces = array();

// Iterate over the table rows to extract province data
foreach ($rows as $row) {
    // Skip header row
    if ($row->getElementsByTagName('th')->length > 0) {
        continue;
    }

    // Extract data from table cells
    $cells = $row->getElementsByTagName('td');
    $provinceData = array(
        'id' => $cells->item(0)->nodeValue,
        'psgcCode' => $cells->item(1)->nodeValue,
        'provDesc' => $cells->item(2)->nodeValue,
        'regCode' => $cells->item(3)->nodeValue,
        'provCode' => $cells->item(4)->nodeValue,
    );

    // Add province data to the array
    $provinces[] = $provinceData;
}

// Encode the scraped province data to JSON
$newJsonData = json_encode($provinces, JSON_PRETTY_PRINT);

// Read the existing province.json file
$existingJsonData = @file_get_contents('province.json');

// Compare the new JSON data with the existing data
if ($newJsonData !== false && $newJsonData !== $existingJsonData) {
    // Update the province.json file with the new data
    file_put_contents('province.json', $newJsonData);
}

?>
