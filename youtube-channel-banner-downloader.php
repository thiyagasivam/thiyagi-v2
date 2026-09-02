<?php include 'header.php'; ?>

<title>YouTube Channel Banner Downloader 2026 - Download HD Banners | 25+ Years Experience</title>
<meta name="description" content="Download YouTube channel banners in HD quality instantly. Professional banner downloader tool for content creators and marketers. Built with 25+ years of digital expertise for 2026 YouTube optimization.">
<meta name="keywords" content="YouTube banner downloader, channel banner download, YouTube channel art, banner extractor, YouTube graphics 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Channel Banner Downloader 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Download high-quality YouTube channel banners instantly - Professional tool with 25+ years of experience</p>

<?php
// YouTube Data API Key (Replace with your own API key)
$apiKey = 'AIzaSyBHLsQwaN3hOuuP8YQluOFNi4iu5K_XqEo';

// Function to fetch YouTube channel banner URL
function fetchChannelBanner($channelId, $apiKey) {
    $apiUrl = "https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id=$channelId&key=$apiKey";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['items'][0]['brandingSettings']['image']['bannerExternalUrl'])) {
        return $data['items'][0]['brandingSettings']['image']['bannerExternalUrl'];
    } else {
        return null;
    }
}

// Handle form submission
$bannerUrl = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $channelUrl = $_POST['channel_url'];
    // Extract channel ID from URL
    if (preg_match('/\/channel\/([a-zA-Z0-9_-]+)/', $channelUrl, $matches)) {
        $channelId = $matches[1];
        $bannerUrl = fetchChannelBanner($channelId, $apiKey);
        if (empty($bannerUrl)) {
            $error = 'No banner found for this channel.';
        }
    } else {
        $error = 'Invalid YouTube channel URL.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Channel Banner Downloader</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Channel Banner Downloader</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="channel_url" class="block text-gray-700 font-bold mb-2">Enter YouTube Channel URL:</label>
                <input type="url" name="channel_url" id="channel_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://www.youtube.com/channel/CHANNEL_ID" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Fetch Banner</button>
        </form>
        <?php if (!empty($bannerUrl)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Channel Banner:</h2>
                <img src="<?php echo htmlspecialchars($bannerUrl); ?>" alt="YouTube Channel Banner" class="mt-4 rounded-lg shadow-md">
                <div class="mt-4">
                    <a href="<?php echo htmlspecialchars($bannerUrl); ?>" download="youtube_banner.jpg" class="inline-block bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">Download Banner</a>
                </div>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>

<?php include 'footer.php'; ?>



