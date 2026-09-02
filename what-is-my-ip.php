<?php include 'header.php'; ?>

<title>What Is My IP Address 2026 - Check Your IP Location | 25+ Years Experience</title>
<meta name="description" content="Check your public IP address and location information instantly. Professional IP lookup tool for network diagnostics and security. Built with 25+ years of networking expertise for 2026 digital security.">
<meta name="keywords" content="what is my IP, IP address checker, IP location, public IP, IP lookup tool 2026">

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">What Is My IP Address 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Check your IP address and location instantly - Professional networking tool with 25+ years of experience</p>

<?php
// Function to get the user's IP address
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Default IP
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Get the user's IP address
$userIP = getUserIP();

// Check if the IP is local
$isLocalIP = in_array($userIP, ['127.0.0.1', '::1']);

// Fetch location details using ipinfo.io API
$apiToken = 'd730478b0dec15'; // Replace with your ipinfo.io API token
$locationDetails = [];
$error = '';

if (!$isLocalIP && !empty($apiToken)) {
    $apiUrl = "https://ipinfo.io/{$userIP}?token={$apiToken}";
    $response = @file_get_contents($apiUrl);

    if ($response) {
        $locationDetails = json_decode($response, true);
    } else {
        $error = 'Unable to fetch location details. Please check your API token or try again later.';
    }
} elseif ($isLocalIP) {
    $error = 'Location details are not available for local IP addresses.';
} else {
    $error = 'API token is missing. Please provide a valid ipinfo.io API token.';
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What Is My IP?</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">What Is My IP?</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800">Your IP Address:</h2>
            <p class="text-gray-700 text-xl mt-2"><?php echo htmlspecialchars($userIP); ?></p>

            <?php if (!empty($locationDetails)): ?>
                <div class="mt-6">
                    <h2 class="text-2xl font-bold text-gray-800">Location Details:</h2>
                    <ul class="list-disc list-inside text-gray-700 text-xl mt-2">
                        <?php if (isset($locationDetails['hostname'])): ?>
                            <li><strong>Hostname:</strong> <?php echo htmlspecialchars($locationDetails['hostname']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['city'])): ?>
                            <li><strong>City:</strong> <?php echo htmlspecialchars($locationDetails['city']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['region'])): ?>
                            <li><strong>Region:</strong> <?php echo htmlspecialchars($locationDetails['region']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['country'])): ?>
                            <li><strong>Country:</strong> <?php echo htmlspecialchars($locationDetails['country']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['loc'])): ?>
                            <li><strong>Coordinates:</strong> <?php echo htmlspecialchars($locationDetails['loc']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['org'])): ?>
                            <li><strong>ISP:</strong> <?php echo htmlspecialchars($locationDetails['org']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['postal'])): ?>
                            <li><strong>Postal Code:</strong> <?php echo htmlspecialchars($locationDetails['postal']); ?></li>
                        <?php endif; ?>
                        <?php if (isset($locationDetails['timezone'])): ?>
                            <li><strong>Timezone:</strong> <?php echo htmlspecialchars($locationDetails['timezone']); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php elseif (!empty($error)): ?>
                <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                    <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php include 'footer.php'; ?>



