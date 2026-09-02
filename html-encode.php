<?php
// Function to encode HTML
function htmlEncode($input) {
    return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// Function to decode HTML
function htmlDecode($input) {
    return htmlspecialchars_decode($input, ENT_QUOTES | ENT_HTML5);
}

// Handle form submission
$result = '';
$error = '';
$action = $_POST['action'] ?? '';
$input = $_POST['input'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (empty($input)) {
            throw new Exception('Please enter some text to encode/decode');
        }
        
        if ($action === 'encode') {
            $result = htmlEncode($input);
        } elseif ($action === 'decode') {
            $result = htmlDecode($input);
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free HTML Encode/Decoder 2026 - Secure Text Conversion Tool</title>
<meta name="description" content="Encode special characters to HTML entities (&amp;) or decode back to normal text instantly (2026). Perfect for web developers and security testing - No data stored!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .code-container {
            font-family: 'Courier New', monospace;
            min-height: 150px;
        }
        .tab-button {
            transition: all 0.3s ease;
        }
        .tab-button.active {
            background-color: #3B82F6;
            color: white;
        }
    </style>

</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-4xl">
        <header class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">HTML Encode/Decoder</h1>
            <p class="text-gray-600">Convert special characters to HTML entities and vice versa</p>
        </header>

        <main class="bg-white rounded-lg shadow-md overflow-hidden">
            <form method="POST" class="p-6">
                <div class="mb-6">
                    <label for="input" class="block text-gray-700 font-bold mb-2">Input HTML/Text:</label>
                    <textarea name="input" id="input" rows="8" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 code-container" placeholder="Paste your HTML or text here..."><?= htmlspecialchars($input) ?></textarea>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-6">
                    <div class="flex rounded-md shadow-sm" role="group">
                        <button type="submit" name="action" value="encode" class="tab-button py-2 px-4 text-sm font-medium rounded-l-lg border <?= ($action === 'encode' || empty($action)) ? 'active' : 'bg-white text-gray-700 hover:bg-gray-50' ?>">
                            Encode HTML
                        </button>
                        <button type="submit" name="action" value="decode" class="tab-button py-2 px-4 text-sm font-medium rounded-r-lg border <?= $action === 'decode' ? 'active' : 'bg-white text-gray-700 hover:bg-gray-50' ?>">
                            Decode HTML
                        </button>
                    </div>
                </div>
            </form>

            <?php if (!empty($result) || !empty($error)): ?>
            <div class="border-t border-gray-200 p-6 bg-gray-50">
                <?php if (!empty($error)): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p><?= htmlspecialchars($error) ?></p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($result)): ?>
                    <label class="block text-gray-700 font-bold mb-2">Result:</label>
                    <div class="relative">
                        <textarea id="result" rows="8" class="w-full px-3 py-2 border rounded-lg bg-gray-100 code-container" readonly><?= htmlspecialchars($result) ?></textarea>
                        <button onclick="copyToClipboard()" class="absolute top-2 right-2 bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">
                            Copy
                        </button>
                    </div>
                    <p class="text-gray-500 text-sm mt-2"><?= strlen($result) ?> characters</p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </main>

        <section class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">About HTML Encoding</h2>
            <div class="prose max-w-none">
                <p>HTML encoding converts special characters to their corresponding HTML entities. This is useful when you need to:</p>
                <ul class="list-disc pl-5 mt-2">
                    <li>Display HTML code on a webpage without it being rendered</li>
                    <li>Prevent XSS (Cross-Site Scripting) attacks</li>
                    <li>Ensure special characters display correctly in all browsers</li>
                </ul>
                <p class="mt-4">Common encoded characters include:</p>
                <ul class="list-disc pl-5 mt-2">
                    <li><code>&lt;</code> becomes <code>&amp;lt;</code></li>
                    <li><code>&gt;</code> becomes <code>&amp;gt;</code></li>
                    <li><code>&amp;</code> becomes <code>&amp;amp;</code></li>
                    <li><code>"</code> becomes <code>&amp;quot;</code></li>
                </ul>
            </div>
        </section>
    </div>

    <script>
        function copyToClipboard() {
            const resultTextarea = document.getElementById('result');
            resultTextarea.select();
            document.execCommand('copy');
            
            // Show feedback
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Copied!';
            setTimeout(() => {
                button.textContent = originalText;
            }, 2000);
        }
    </script>
