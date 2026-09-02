<?php include 'header.php';?>

<title>YouTube Region Restriction Checker 2026 - Check Video Availability | 25+ Years Experience</title>
<meta name="description" content="Check YouTube video region restrictions and availability worldwide. Professional tool to verify if videos are blocked in specific countries. Built with 25+ years of digital expertise for 2026 content strategy.">
<meta name="keywords" content="YouTube region restriction checker, video availability checker, YouTube blocked countries, region blocking tool 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Region Restriction Checker 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Check video availability and region restrictions worldwide - Professional tool with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to check region restrictions for a YouTube video
function checkRegionRestrictions($videoId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$videoId&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0]['contentDetails']['regionRestriction'])) {
        return $data['items'][0]['contentDetails']['regionRestriction'];
    } else {
        return null;
    }
}

// Handle form submission
$restrictions = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videoUrl = $_POST['video_url'];
    // Extract video ID from URL
    parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
    $videoId = $params['v'] ?? '';

    if (!empty($videoId)) {
        $restrictions = checkRegionRestrictions($videoId, $apiKey);
        if ($restrictions === null) {
            $error = 'No region restrictions found for this video.';
        }
    } else {
        $error = 'Invalid YouTube video URL.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Region Restriction Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Region Restriction Checker</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Video URL:</label>
                <input type="url" name="video_url" id="video_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/watch?v=VIDEO_ID" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Check Restrictions</button>
        </form>
        <?php if ($restrictions !== null): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Region Restrictions:</h2>
                <?php if (isset($restrictions['allowed'])): ?>
                    <p class="text-gray-700 text-xl mt-2">Allowed in: <?php echo htmlspecialchars(implode(', ', $restrictions['allowed'])); ?></p>
                <?php endif; ?>
                <?php if (isset($restrictions['blocked'])): ?>
                    <p class="text-gray-700 text-xl mt-2">Blocked in: <?php echo htmlspecialchars(implode(', ', $restrictions['blocked'])); ?></p>
                <?php endif; ?>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>

<?php include 'footer.php';?>



