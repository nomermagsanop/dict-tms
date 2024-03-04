<?php

// Function to scrape barangay data from the provided URL
function scrapeBarangays($municipalityPSGCCode) {
    // Construct the URL
    $url = "https://psa.gov.ph/classification/psgc/barangays/$municipalityPSGCCode";

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

    // Initialize an array to store barangay data
    $data = [];

    // Loop through each table
    foreach ($tables as $table) {
        // Check if the table has any rows
        if ($table->getElementsByTagName('tr')->length > 0) {
            // Get the first row
            $headerRow = $table->getElementsByTagName('tr')->item(0);

            // Check if the first row contains "Barangays" text
            if (strpos(strtolower($headerRow->nodeValue), 'barangays') !== false) {
                // Extract data from each row
                $rows = $table->getElementsByTagName('tr');
                foreach ($rows as $row) {
                    $cells = $row->getElementsByTagName('td');
                    if ($cells->length > 0) {
                        $rowData = [
                            'name' => trim($cells->item(0)->nodeValue),
                            'code' => trim($cells->item(1)->nodeValue),
                            'correspondenceCode' => trim($cells->item(2)->nodeValue),
                            'urbanRural' => trim($cells->item(3)->nodeValue),
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

// Get municipality code from URL parameter
$municipalityPSGCCode = $_SERVER['PATH_INFO'] ?? '';

// Call the function to scrape barangay data
$barangayData = scrapeBarangays($municipalityPSGCCode);

// Encode the scraped data to JSON
$newJsonData = json_encode($barangayData, JSON_PRETTY_PRINT);

// Read the existing barangay.json file
$existingJsonData = @file_get_contents('barangay.json');

// Compare the new JSON data with the existing data
if ($newJsonData !== false && $newJsonData !== $existingJsonData) {
    // Update the barangay.json file with the new data
    file_put_contents('barangay.json', $newJsonData);
}

// Output the scraped data
echo $newJsonData;

?>
