<?php include 'header.php';?>

<title>YouTube Hashtag Extractor 2026 - Extract Tags from Video URL | 25+ Years Experience</title>
<meta name="description" content="Extract hashtags from YouTube videos instantly with our professional hashtag extractor tool. Get tags from any YouTube video URL. Built with 25+ years of digital marketing expertise for 2026 content creators.">
<meta name="keywords" content="YouTube hashtag extractor, YouTube tag extractor, video hashtags, YouTube SEO, hashtag generator, video tags 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Hashtag Extractor 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Extract hashtags from any YouTube video with our professional tool - Built with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to extract hashtags from a YouTube video description
function extractYouTubeHashtags($videoId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$videoId&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0]['snippet']['description'])) {
        $description = $data['items'][0]['snippet']['description'];
        // Extract hashtags using regex
        preg_match_all('/#(\w+)/', $description, $matches);
        return $matches[1]; // Return only the hashtag names (without #)
    } else {
        return [];
    }
}

// Handle form submission
$hashtags = [];
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videoUrl = $_POST['video_url'];
    // Extract video ID from URL
    parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
    $videoId = $params['v'] ?? '';

    if (!empty($videoId)) {
        $hashtags = extractYouTubeHashtags($videoId, $apiKey);
        if (empty($hashtags)) {
            $error = 'No hashtags found in the video description.';
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
    <title>YouTube Hashtag Extractor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Hashtag Extractor</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Video URL:</label>
                <input type="url" name="video_url" id="video_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/watch?v=VIDEO_ID" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Extract Hashtags</button>
        </form>
        <?php if (!empty($hashtags)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Extracted Hashtags:</h2>
                <ul class="list-disc list-inside text-gray-700 text-xl mt-2">
                    <?php foreach ($hashtags as $hashtag): ?>
                        <li>#<?php echo htmlspecialchars($hashtag); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>

<?php include 'footer.php';?>



