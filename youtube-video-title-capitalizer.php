<?php include 'header.php';?>

<title>YouTube Video Title Capitalizer 2026 - Format Titles Professionally | 25+ Years Experience</title>
<meta name="description" content="Capitalize and format YouTube video titles professionally for better presentation. Title formatting tool for content creators and marketers. Built with 25+ years of digital expertise for 2026 content optimization.">
<meta name="keywords" content="YouTube title capitalizer, title formatter, video title formatting, title case converter, YouTube optimization 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">YouTube Video Title Capitalizer 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Format video titles professionally - Expert tool with 25+ years of content experience</p>

<?php
// Function to capitalize YouTube video titles
function capitalizeTitle($title) {
    // List of words to keep lowercase (articles, conjunctions, and prepositions)
    $lowercaseWords = ['a', 'an', 'the', 'and', 'or', 'but', 'for', 'nor', 'as', 'at', 'by', 'in', 'of', 'on', 'to', 'with'];

    // Split the title into words
    $words = explode(' ', $title);

    // Capitalize each word (except for lowercase words)
    foreach ($words as &$word) {
        if (!in_array(strtolower($word), $lowercaseWords)) {
            $word = ucfirst(strtolower($word));
        }
    }

    // Capitalize the first and last word regardless
    $words[0] = ucfirst(strtolower($words[0]));
    $words[count($words) - 1] = ucfirst(strtolower($words[count($words) - 1]));

    return implode(' ', $words);
}

// Handle form submission
$capitalizedTitle = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputTitle = $_POST['title'];
    if (!empty($inputTitle)) {
        $capitalizedTitle = capitalizeTitle($inputTitle);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Title Capitalizer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">YouTube Video Title Capitalizer</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Enter YouTube Video Title:</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., this is a sample youtube video title" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Capitalize Title</button>
        </form>
        <?php if (!empty($capitalizedTitle)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Capitalized Title:</h2>
                <p class="text-gray-700 text-xl mt-2"><?php echo htmlspecialchars($capitalizedTitle); ?></p>
            </div>
        <?php endif; ?>
    </div>

<?php include 'footer.php';?>



