<?php include 'header.php'; ?>

<title>YouTube Channel Statistics Analyzer 2026 - Complete Channel Metrics | 25+ Years Experience</title>
<meta name="description" content="Get detailed YouTube channel statistics including subscribers, views, videos count and engagement metrics. Professional analytics tool built with 25+ years of digital marketing experience for 2026 content strategy.">
<meta name="keywords" content="YouTube channel statistics, YouTube analytics, channel metrics, subscriber count, YouTube stats 2026, channel analyzer">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Channel Statistics Analyzer 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Get comprehensive YouTube channel analytics and statistics - Professional tool with 25+ years of expertise</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to fetch channel ID from custom handle
function getChannelIdFromHandle($handle, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$handle&type=channel&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0]['id']['channelId'])) {
        return $data['items'][0]['id']['channelId'];
    } else {
        return null;
    }
}

// Function to fetch YouTube channel statistics
function getChannelStatistics($channelId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/channels?part=statistics,snippet&id=$channelId&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0])) {
        return [
            'title' => $data['items'][0]['snippet']['title'],
            'description' => $data['items'][0]['snippet']['description'],
            'subscribers' => $data['items'][0]['statistics']['subscriberCount'],
            'views' => $data['items'][0]['statistics']['viewCount'],
            'videos' => $data['items'][0]['statistics']['videoCount'],
        ];
    } else {
        return null;
    }
}

// Handle form submission
$channelStats = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $channelUrl = $_POST['channel_url'];
    // Extract custom handle from URL
    if (preg_match('/\/@([a-zA-Z0-9_-]+)/', $channelUrl, $matches)) {
        $handle = $matches[1];
        $channelId = getChannelIdFromHandle($handle, $apiKey);
        if ($channelId) {
            $channelStats = getChannelStatistics($channelId, $apiKey);
            if (!$channelStats) {
                $error = 'No data found for this channel.';
            }
        } else {
            $error = 'Invalid custom handle or channel not found.';
        }
    } else {
        $error = 'Invalid YouTube channel URL. Please use a URL with a custom handle (e.g., https://www.youtube.com/@handle).';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Channel Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Channel Statistics</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="channel_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Channel URL:</label>
                <input type="url" name="channel_url" id="channel_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/@handle" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Get Statistics</button>
        </form>
        <?php if ($channelStats): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Channel Statistics:</h2>
                <div class="mt-4 space-y-4">
                    <p class="text-gray-700"><span class="font-bold">Channel Title:</span> <?php echo htmlspecialchars($channelStats['title']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Description:</span> <?php echo htmlspecialchars($channelStats['description']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Subscribers:</span> <?php echo number_format($channelStats['subscribers']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Total Views:</span> <?php echo number_format($channelStats['views']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Total Videos:</span> <?php echo number_format($channelStats['videos']); ?></p>
                </div>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php include 'footer.php'; ?>



