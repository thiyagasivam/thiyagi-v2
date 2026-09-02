<?php include 'header.php';?>

<title>YouTube Channel ID Finder 2026 - Extract Channel IDs | 25+ Years Experience</title>
<meta name="description" content="Find and extract YouTube channel IDs from channel URLs or names. Professional channel ID extraction tool for developers and marketers. Built with 25+ years of digital expertise for 2026 API integration.">
<meta name="keywords" content="YouTube channel ID finder, channel ID extractor, YouTube channel identifier, channel ID tool 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Channel ID Finder 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Extract YouTube channel IDs instantly - Professional development tool with 25+ years of experience</p>?php include 'header.php'; ?>

<?php
// Function to extract YouTube Channel ID or handle from URL
function extractYouTubeIdentifier($url) {
    // Check if the URL is valid
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    // Extract channel identifier from different URL formats
    if (preg_match('/youtube\.com\/channel\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return [
            'type' => 'channel_id',
            'value' => $matches[1],
            'message' => 'This is the actual YouTube Channel ID.'
        ];
    } elseif (preg_match('/youtube\.com\/c\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return [
            'type' => 'custom_url',
            'value' => $matches[1],
            'message' => 'This is a custom URL. To get the Channel ID, you need to use the YouTube API.'
        ];
    } elseif (preg_match('/youtube\.com\/user\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return [
            'type' => 'legacy_username',
            'value' => $matches[1],
            'message' => 'This is a legacy username. To get the Channel ID, you need to use the YouTube API.'
        ];
    } elseif (preg_match('/youtube\.com\/@([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return [
            'type' => 'handle',
            'value' => $matches[1],
            'message' => 'This is a channel handle (@username). To get the Channel ID, you need to use the YouTube API.'
        ];
    } else {
        return false;
    }
}

// Handle form submission
$identifier = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $channelUrl = trim($_POST['channel_url']);
    if (empty($channelUrl)) {
        $error = 'Please enter a YouTube channel URL.';
    } else {
        $identifier = extractYouTubeIdentifier($channelUrl);
        if ($identifier === false) {
            $error = 'Invalid YouTube channel URL. Please enter a valid URL in one of these formats:<br>
                     • https://www.youtube.com/channel/UCxxxxxxxxxxxxxx<br>
                     • https://www.youtube.com/c/Username<br>
                     • https://www.youtube.com/user/Username<br>
                     • https://www.youtube.com/@Username';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Channel ID Extractor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .url-examples {
            background-color: #f8fafc;
            border-left: 4px solid #3b82f6;
            padding: 1rem;
            margin: 1rem 0;
        }
    </style>


<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-2xl">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">YouTube Channel ID Extractor</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <form method="POST">
                <div class="mb-4">
                    <label for="channel_url" class="block text-gray-700 font-bold mb-2">YouTube Channel URL:</label>
                    <input type="url" name="channel_url" id="channel_url" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="e.g., https://www.youtube.com/channel/UC..." 
                           value="<?php echo isset($_POST['channel_url']) ? htmlspecialchars($_POST['channel_url']) : ''; ?>" 
                           required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                    Extract Identifier
                </button>
            </form>
        </div>

        <?php if (!empty($error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <p class="font-bold">Error</p>
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($identifier)): ?>
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Extracted Identifier:</h2>
                <div class="p-4 bg-gray-50 rounded">
                    <code class="text-lg font-mono break-all"><?php echo htmlspecialchars($identifier['value']); ?></code>
                </div>
                <p class="mt-3 text-gray-700"><?php echo $identifier['message']; ?></p>
                
                <?php if ($identifier['type'] !== 'channel_id'): ?>
                    <div class="mt-4 p-4 bg-blue-50 rounded">
                        <p class="text-blue-800">Note: To get the actual Channel ID for this @handle or custom URL, you would need to:</p>
                        <ol class="list-decimal list-inside mt-2 text-blue-800">
                            <li>Use the YouTube Data API</li>
                            <li>Or inspect the channel page source code</li>
                        </ol>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Supported URL Formats:</h2>
            <div class="url-examples">
                <ul class="list-disc list-inside space-y-1">
                    <li><code>https://www.youtube.com/channel/UCxxxxxxxxxxxxxx</code></li>
                    <li><code>https://www.youtube.com/c/CustomName</code></li>
                    <li><code>https://www.youtube.com/user/Username</code></li>
                    <li><code>https://www.youtube.com/@Username</code></li>
                </ul>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>




