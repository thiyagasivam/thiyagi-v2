<?php include 'header.php';?>

<title>YouTube Video Statistics Analyzer 2026 - Complete Video Analytics | 25+ Years Experience</title>
<meta name="description" content="Get detailed YouTube video statistics including views, likes, comments, and engagement metrics. Professional video analytics tool for content creators. Built with 25+ years of digital expertise for 2026 analysis.">
<meta name="keywords" content="YouTube video statistics, video analytics, YouTube metrics, video performance analyzer, YouTube stats 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Video Statistics Analyzer 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Get comprehensive video analytics and performance metrics - Professional tool with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to fetch YouTube video statistics
function fetchVideoStatistics($videoId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/videos?part=statistics,snippet&id=$videoId&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0])) {
        return [
            'title' => $data['items'][0]['snippet']['title'],
            'views' => $data['items'][0]['statistics']['viewCount'],
            'likes' => $data['items'][0]['statistics']['likeCount'],
            'dislikes' => $data['items'][0]['statistics']['dislikeCount'],
            'comments' => $data['items'][0]['statistics']['commentCount'],
        ];
    } else {
        return null;
    }
}

// Handle form submission
$videoStats = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videoUrl = $_POST['video_url'];
    // Extract video ID from URL
    parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
    $videoId = $params['v'] ?? '';

    if (!empty($videoId)) {
        $videoStats = fetchVideoStatistics($videoId, $apiKey);
        if (!$videoStats) {
            $error = 'No statistics found for this video.';
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
    <title>YouTube Video Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Video Statistics</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Video URL:</label>
                <input type="url" name="video_url" id="video_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/watch?v=VIDEO_ID" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Get Statistics</button>
        </form>
        <?php if ($videoStats): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Video Statistics:</h2>
                <div class="mt-4 space-y-2">
                    <p class="text-gray-700"><span class="font-bold">Title:</span> <?php echo htmlspecialchars($videoStats['title']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Views:</span> <?php echo number_format($videoStats['views']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Likes:</span> <?php echo number_format($videoStats['likes']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Dislikes:</span> <?php echo number_format($videoStats['dislikes']); ?></p>
                    <p class="text-gray-700"><span class="font-bold">Comments:</span> <?php echo number_format($videoStats['comments']); ?></p>
                </div>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>

<?php include 'footer.php';?>



