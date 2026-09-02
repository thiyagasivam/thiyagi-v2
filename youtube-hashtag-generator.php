<?php include 'header.php';?>

<title>YouTube Hashtag Generator 2026 - Create Trending Hashtags | 25+ Years Experience</title>
<meta name="description" content="Generate trending YouTube hashtags for better video discoverability and reach. Professional hashtag creator for content creators. Built with 25+ years of digital marketing expertise for 2026 optimization.">
<meta name="keywords" content="YouTube hashtag generator, hashtag creator, trending hashtags, YouTube SEO hashtags, video hashtags 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Hashtag Generator 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Generate trending hashtags for viral content - Professional tool with 25+ years of experience</p>

<?php
// Function to generate hashtags based on input text
function generateHashtags($text) {
    // Split text into words
    $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

    // Remove duplicates and common stop words
    $words = array_unique($words);
    $stopWords = ['the', 'and', 'or', 'a', 'an', 'in', 'on', 'at', 'for', 'to', 'of', 'with'];
    $words = array_diff($words, $stopWords);

    // Convert to lowercase and trim
    $words = array_map('strtolower', $words);
    $words = array_map('trim', $words);

    // Add hashtag symbol (#) to each word
    $hashtags = array_map(function($word) {
        return '#' . $word;
    }, $words);

    return $hashtags;
}

// Handle form submission
$hashtags = [];
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'];
    if (!empty($inputText)) {
        $hashtags = generateHashtags($inputText);
    } else {
        $error = 'Please enter some text to generate hashtags.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Hashtag Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Hashtag Generator</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="text" class="block text-gray-700 font-bold mb-2">Enter Text:</label>
                <textarea name="text" id="text" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., This is a sample text for generating YouTube hashtags" required><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Generate Hashtags</button>
        </form>
        <?php if (!empty($hashtags)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Generated Hashtags:</h2>
                <ul class="list-disc list-inside text-gray-700 text-xl mt-2">
                    <?php foreach ($hashtags as $hashtag): ?>
                        <li><?php echo htmlspecialchars($hashtag); ?></li>
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



