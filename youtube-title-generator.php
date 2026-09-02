<?php include 'header.php'; ?>

<title>YouTube Title Generator 2026 - Create Engaging Video Titles | 25+ Years Experience</title>
<meta name="description" content="Generate compelling YouTube video titles that drive views and engagement. Professional title creator tool for content creators and marketers. Built with 25+ years of digital marketing expertise for 2026 optimization.">
<meta name="keywords" content="YouTube title generator, video title creator, engaging titles, YouTube SEO titles, title ideas 2026">

<div class="min-h-screen bg-gradient-to-br from-red-50 to-pink-100 py-8 px-2 sm:px-4 lg:px-8 flex flex-col justify-between">
  <div class="max-w-4xl mx-auto w-full">
    <h1 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 mb-6 sm:mb-8">YouTube Title Generator 2026</h1>
    <p class="text-lg sm:text-xl text-gray-600 text-center mb-8 sm:mb-12">Create engaging video titles that drive views - Professional tool with 25+ years of experience</p>

<?php
// Function to generate YouTube titles based on input text
function generateTitles($text) {
    // Split text into words
    $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

    // Remove duplicates and common stop words
    $words = array_unique($words);
    $stopWords = ['the', 'and', 'or', 'a', 'an', 'in', 'on', 'at', 'for', 'to', 'of', 'with'];
    $words = array_diff($words, $stopWords);

    // Convert to lowercase and trim
    $words = array_map('strtolower', $words);
    $words = array_map('trim', $words);

    // Generate title suggestions
    $titles = [];
    if (count($words) > 0) {
        $titles[] = implode(' ', $words) . ' | Best Tips and Tricks';
        $titles[] = 'How to ' . implode(' ', $words) . ' - Complete Guide';
        $titles[] = 'Top 10 ' . implode(' ', $words) . ' Ideas You Must Try';
        $titles[] = implode(' ', $words) . ' Explained in 5 Minutes';
        $titles[] = 'Ultimate Guide to ' . implode(' ', $words);
    }

    return $titles;
}

// Handle form submission
$titles = [];
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'];
    if (!empty($inputText)) {
        $titles = generateTitles($inputText);
    } else {
        $error = 'Please enter some text to generate titles.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Title Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="bg-gray-100">
    <div class="container mx-auto p-2 sm:p-4 lg:p-8">
        <form method="POST" class="bg-white p-4 sm:p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="text" class="block text-gray-700 font-bold mb-2">Enter Keywords:</label>
                <textarea name="text" id="text" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., digital marketing, SEO tips, video editing" required><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Generate Titles</button>
        </form>
        <?php if (!empty($titles)): ?>
            <div class="mt-6 bg-white p-4 sm:p-6 rounded-lg shadow-md">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Generated Titles:</h2>
                <ul class="list-disc list-inside text-gray-700 text-base sm:text-xl mt-2">
                    <?php foreach ($titles as $title): ?>
                        <li><?php echo htmlspecialchars($title); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="mt-6 bg-red-100 p-4 sm:p-6 rounded-lg shadow-md">
                <p class="text-red-700 text-base sm:text-xl"><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
    </div>
    <!-- Footer inside main wrapper for consistent background -->
    <?php include 'footer.php'; ?>
  </div>
</div>
