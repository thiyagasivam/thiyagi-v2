<?php include 'header.php'; ?>

<title>YouTube Channel Search 2026 - Find Channels by Keywords | 25+ Years Experience</title>
<meta name="description" content="Search and discover YouTube channels by keywords and topics. Professional channel discovery tool for marketers and content creators. Built with 25+ years of digital expertise for 2026 channel research.">
<meta name="keywords" content="YouTube channel search, channel finder, YouTube discovery, channel research tool, YouTube search 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Channel Search 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Discover YouTube channels by keywords - Professional research tool with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to search for YouTube channels
function searchYouTubeChannels($query, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&type=channel&q=" . urlencode($query) . "&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'])) {
        return $data['items'];
    } else {
        return [];
    }
}

// Handle form submission
$channels = [];
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['query'];
    if (!empty($searchQuery)) {
        $channels = searchYouTubeChannels($searchQuery, $apiKey);
        if (empty($channels)) {
            $error = 'No channels found for this query.';
        }
    } else {
        $error = 'Please enter a search query.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Channel Search</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Channel Search</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="query" class="block text-gray-700 font-bold mb-2">Search for YouTube Channels:</label>
                <input type="text" name="query" id="query" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Tech Reviews" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Search</button>
        </form>
        <?php if (!empty($channels)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Search Results:</h2>
                <div class="mt-4 space-y-4">
                    <?php foreach ($channels as $channel): ?>
                        <div class="flex items-center space-x-4">
                            <img src="<?php echo $channel['snippet']['thumbnails']['default']['url']; ?>" alt="<?php echo htmlspecialchars($channel['snippet']['title']); ?>" class="w-16 h-16 rounded-full">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($channel['snippet']['title']); ?></h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($channel['snippet']['description']); ?></p>
                                <a href="https://www.youtube.com/channel/<?php echo $channel['snippet']['channelId']; ?>" target="_blank" class="text-blue-500 hover:underline">Visit Channel</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php include 'footer.php'; ?>



