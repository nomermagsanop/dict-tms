<?php

// Function to scrape municipality or city data from the provided URL
function scrapeMunicipalityOrCity($psgcCode) {
    // Construct the URL
    $url = "https://psa.gov.ph/classification/psgc/citimuni/$psgcCode";

    // Fetch the HTML content of the page
    $html = file_get_contents($url);

    // Check if the request was successful
    if ($html === false) {
        return "Error fetching data from $url";
    }

    // Create a DOMDocument object to parse the HTML
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suppress warnings for malformed HTML
    $dom->loadHTML($html);
    libxml_clear_errors(); // Clear any accumulated errors

    // Find all tables on the page
    $tables = $dom->getElementsByTagName('table');

    // Initialize an array to store municipality or city data
    $data = [];

    // Loop through each table
    foreach ($tables as $table) {
        // Check if the table has any rows
        if ($table->getElementsByTagName('tr')->length > 0) {
            // Get the first row
            $headerRow = $table->getElementsByTagName('tr')->item(0);

            // Check if the first row contains "City" or "Municipality" text
            if (strpos(strtolower($headerRow->nodeValue), 'city') !== false || strpos(strtolower($headerRow->nodeValue), 'municipality') !== false) {
                // Extract data from each row
                $rows = $table->getElementsByTagName('tr');
                foreach ($rows as $row) {
                    $cells = $row->getElementsByTagName('td');
                    if ($cells->length > 0) {
                        $rowData = [
                            'name' => trim($cells->item(0)->nodeValue),
                            'code' => trim($cells->item(1)->nodeValue),
                            'correspondenceCode' => trim($cells->item(2)->nodeValue),
                            'incomeClass' => trim($cells->item(3)->nodeValue),
                            'population' => trim($cells->item(4)->nodeValue)
                        ];
                        $data[] = $rowData;
                    }
                }
            }
        }
    }

    return $data;
}

// Extract PSGC code from the URL
$psgcCode = basename($_SERVER['REQUEST_URI']);

// Call the function to scrape municipality or city data
$municipalityOrCityData = scrapeMunicipalityOrCity($psgcCode);

// Encode the scraped data to JSON
$newJsonData = json_encode($municipalityOrCityData, JSON_PRETTY_PRINT);

// Read the existing citimuni.json file
$existingJsonData = @file_get_contents('citimuni.json');

// Compare the new JSON data with the existing data
if ($newJsonData !== false && $newJsonData !== $existingJsonData) {
    // Update the citimuni.json file with the new data
    file_put_contents('citimuni.json', $newJsonData);
}

// Output the scraped data as JSON
header('Content-Type: application/json');
echo $newJsonData;

?>
