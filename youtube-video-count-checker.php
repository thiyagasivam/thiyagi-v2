<?php include 'header.php';?>

<title>YouTube Video Count Checker 2026 - Channel Video Analytics | 25+ Years Experience</title>
<meta name="description" content="Check total video count for any YouTube channel instantly. Professional channel analytics tool for content creators and researchers. Built with 25+ years of digital expertise for 2026 YouTube analysis.">
<meta name="keywords" content="YouTube video count checker, channel video counter, YouTube analytics, video count tool 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Video Count Checker 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Check channel video counts instantly - Professional analytics tool with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to fetch channel ID from a custom handle
function getChannelIdFromHandle($handle, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$handle&type=channel&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0]['id']['channelId'])) {
        return $data['items'][0]['id']['channelId'];
    } else {
        return false;
    }
}

// Function to fetch video count from a YouTube channel
function getYouTubeVideoCount($channelId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$channelId&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0]['statistics']['videoCount'])) {
        return $data['items'][0]['statistics']['videoCount'];
    } else {
        return false;
    }
}

// Handle form submission
$videoCount = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $channelUrl = $_POST['channel_url'];
    $channelId = '';

    // Check if URL contains a custom handle (e.g., @GoogleDevelopers)
    if (preg_match('/\/@([a-zA-Z0-9_-]+)/', $channelUrl, $matches)) {
        $handle = $matches[1];
        $channelId = getChannelIdFromHandle($handle, $apiKey);
        if (!$channelId) {
            $error = 'Unable to fetch channel ID. Please check the URL.';
        }
    }
    // Check if URL contains a channel ID (e.g., /channel/UC_x5XG1OV2P6uZZ5FSM9Ttw)
    elseif (preg_match('/\/channel\/([a-zA-Z0-9_-]+)/', $channelUrl, $matches)) {
        $channelId = $matches[1];
    } else {
        $error = 'Invalid YouTube channel URL.';
    }

    if (!empty($channelId)) {
        $videoCount = getYouTubeVideoCount($channelId, $apiKey);
        if ($videoCount === false) {
            $error = 'Unable to fetch video count. Please check the channel URL.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Count Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Video Count Checker</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="channel_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Channel URL:</label>
                <input type="url" name="channel_url" id="channel_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/@GoogleDevelopers or https://www.youtube.com/channel/CHANNEL_ID" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Check Video Count</button>
        </form>
        <?php if (!empty($videoCount)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Video Count:</h2>
                <p class="text-gray-700 text-xl mt-2"><?php echo htmlspecialchars($videoCount); ?> videos</p>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>

<?php include 'footer.php';?>



