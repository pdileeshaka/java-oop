<?php
// Replace 'YOUR_API_KEY' with your actual API key
$api_key = 'YOUR_API_KEY';

// API endpoint for COVID-19 statistics in China
$api_url = 'https://covid-19-statistics.p.rapidapi.com/provinces';

$headers = array(
    'X-RapidAPI-Host: covid-19-statistics.p.rapidapi.com',
    'X-RapidAPI-Key: ' . $api_key
);

// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute cURL session and get the JSON response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if data is valid
if (is_array($data) && isset($data['data'])) {
    $provinces = $data['data'];

    // Output data as JSON
    echo json_encode($provinces);
} else {
    // Handle API request error
    echo json_encode(['error' => 'API request error']);
}
?>
