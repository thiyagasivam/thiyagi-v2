<?php include 'header.php'; ?>

<title>WordPress Theme Detector 2026 - Identify Website Themes | 25+ Years Experience</title>
<meta name="description" content="Detect and identify WordPress themes used on any website instantly. Professional theme detection tool for developers and designers. Built with 25+ years of web development expertise for 2026 analysis.">
<meta name="keywords" content="WordPress theme detector, theme identifier, website theme checker, WordPress detector, theme finder 2026">

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">WordPress Theme Detector 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Identify WordPress themes instantly - Professional development tool with 25+ years of experience</p>

<?php
// Function to detect WordPress theme
function detectWordPressTheme($url) {
    // Fetch the HTML content of the website
    $html = @file_get_contents($url);
    if ($html === false) {
        return "Unable to fetch the website content. Please check the URL.";
    }

    // Search for the WordPress theme name
    $themePattern = '/wp-content\/themes\/([^\/]+)/';
    preg_match($themePattern, $html, $matches);

    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return "No WordPress theme detected.";
    }
}

// Handle form submission
$theme = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $websiteUrl = $_POST['website_url'];
    if (filter_var($websiteUrl, FILTER_VALIDATE_URL)) {
        $theme = detectWordPressTheme($websiteUrl);
    } else {
        $error = 'Invalid URL. Please enter a valid website URL.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Theme Detector</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">WordPress Theme Detector</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="website_url" class="block text-gray-700 font-bold mb-2">Enter Website URL:</label>
                <input type="url" name="website_url" id="website_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://example.com" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Detect Theme</button>
        </form>
        <?php if (!empty($theme)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Detected Theme:</h2>
                <p class="text-gray-700 text-xl mt-2"><?php echo htmlspecialchars($theme); ?></p>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php include 'footer.php'; ?>



