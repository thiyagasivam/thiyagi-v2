<?php include 'header.php'; ?>

<title>YouTube Comment Picker 2026 - Random Comment Selector | 25+ Years Experience</title>
<meta name="description" content="Pick random comments from YouTube videos for giveaways and contests. Professional comment picker tool for content creators and marketers. Built with 25+ years of digital expertise for 2026 engagement.">
<meta name="keywords" content="YouTube comment picker, random comment selector, YouTube giveaway tool, comment randomizer 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Comment Picker 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Pick random comments for giveaways and contests - Professional tool with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to fetch comments from a YouTube video
function fetchYouTubeComments($videoId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId=$videoId&key=$apiKey&maxResults=100";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    $comments = [];
    if (isset($data['items'])) {
        foreach ($data['items'] as $item) {
            $comments[] = $item['snippet']['topLevelComment']['snippet']['textDisplay'];
        }
    }
    return $comments;
}

// Function to pick a random comment
function pickRandomComment($comments) {
    if (!empty($comments)) {
        return $comments[array_rand($comments)];
    }
    return null;
}

// Handle form submission
$comment = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videoUrl = $_POST['video_url'];
    // Extract video ID from URL
    parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
    $videoId = $params['v'] ?? '';

    if (!empty($videoId)) {
        $comments = fetchYouTubeComments($videoId, $apiKey);
        if (!empty($comments)) {
            $comment = pickRandomComment($comments);
        } else {
            $error = 'No comments found for this video.';
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
    <title>YouTube Comment Picker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Comment Picker</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Video URL:</label>
                <input type="url" name="video_url" id="video_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/watch?v=VIDEO_ID" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Pick a Random Comment</button>
        </form>
        <?php if (!empty($comment)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Random Comment:</h2>
                <p class="text-gray-700 text-xl mt-2"><?php echo htmlspecialchars($comment); ?></p>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php include 'footer.php'; ?>



