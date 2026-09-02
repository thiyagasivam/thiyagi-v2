<?php include 'header.php'; ?>

<title>Word Counter Tool 2026 - Count Words, Characters & Paragraphs | 25+ Years Experience</title>
<meta name="description" content="Count words, characters, paragraphs, and sentences instantly with our professional word counter tool. Essential for writers, students, and content creators. Built with 25+ years of text analysis expertise for 2026.">
<meta name="keywords" content="word counter, character counter, text analyzer, word count tool, writing tool 2026">

<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Word Counter Tool 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Count words, characters, and more instantly - Professional writing tool with 25+ years of experience</p>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Counter</title>
    <!-- Add Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            /* background-color: #f8f9fa; - bg-gray-100 */
        }
        /* .card { border: none; border-radius: 10px; } - Tailwind: border-none rounded-lg */
        textarea {
            resize: none; /* resize-none */
        }
        /* Button styles using Tailwind classes directly is preferred, but customizing hover color */
        .btn-primary {
            /* background-color: #007bff; - bg-blue-600 */
            /* border: none; - border-none */
            padding: 10px 20px; /* py-2.5 px-5 */
            border-radius: 5px; /* rounded */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Custom hover color - Tailwind's hover:bg-blue-800 is #1e40af */
        }
    </style>


<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-12 px-4 sm:px-6 lg:px-8"> <!-- container mt-5 -> max-w-4xl mx-auto mt-12 px-4 sm:px-6 lg:px-8 -->
        <h1 class="text-3xl font-bold text-center mb-6">Word Counter</h1> <!-- text-center mb-4 -> text-center text-3xl font-bold mb-6 -->
        <div class="bg-white rounded-lg shadow-lg"> <!-- card shadow -> bg-white rounded-lg shadow-lg -->
            <div class="p-6"> <!-- card-body -> p-6 -->
                <form method="POST">
                    <div> <!-- form-group -> removed, div is sufficient -->
                        <textarea class="w-full h-60 px-4 py-2 border border-gray-300 rounded resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" name="text" rows="10" placeholder="Paste your text here..."><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea> <!-- form-control -> w-full h-60 px-4 py-2 border border-gray-300 rounded resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 -->
                    </div>
                    <button type="submit" class="btn-primary mt-4 bg-blue-600 text-white font-medium">Count Words</button> <!-- btn btn-primary mt-3 -> btn-primary mt-4 bg-blue-600 text-white font-medium -->
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $text = $_POST['text'];
                    $wordCount = str_word_count($text);
                    $charCount = strlen($text);
                    // Echoing HTML with Tailwind classes
                    echo "<div class='mt-6'>"; // mt-4 -> mt-6
                    echo "    <h4 class='text-xl font-semibold mb-2'>Results:</h4>"; // h4 -> text-xl font-semibold mb-2
                    echo "    <p class='mb-1'><strong>Word Count:</strong> $wordCount</p>"; // mb-1
                    echo "    <p><strong>Character Count:</strong> $charCount</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Scripts (Bootstrap JS removed) -->

<?php include 'footer.php'; ?>



