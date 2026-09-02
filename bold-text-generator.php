<?php include 'header.php';?>

<?php
// Function to convert text to bold Unicode characters
function convertToBold($text) {
    $boldMap = [
        'a' => '𝗮', 'b' => '𝗯', 'c' => '𝗰', 'd' => '𝗱', 'e' => '𝗲',
        'f' => '𝗳', 'g' => '𝗴', 'h' => '𝗵', 'i' => '𝗶', 'j' => '𝗷',
        'k' => '𝗸', 'l' => '𝗹', 'm' => '𝗺', 'n' => '𝗻', 'o' => '𝗼',
        'p' => '𝗽', 'q' => '𝗾', 'r' => '𝗿', 's' => '𝘀', 't' => '𝘁',
        'u' => '𝘂', 'v' => '𝘃', 'w' => '𝘄', 'x' => '𝘅', 'y' => '𝘆',
        'z' => '𝘇', 'A' => '𝗔', 'B' => '𝗕', 'C' => '𝗖', 'D' => '𝗗',
        'E' => '𝗘', 'F' => '𝗙', 'G' => '𝗚', 'H' => '𝗛', 'I' => '𝗜',
        'J' => '𝗝', 'K' => '𝗞', 'L' => '𝗟', 'M' => '𝗠', 'N' => '𝗡',
        'O' => '𝗢', 'P' => '𝗣', 'Q' => '𝗤', 'R' => '𝗥', 'S' => '𝗦',
        'T' => '𝗧', 'U' => '𝗨', 'V' => '𝗩', 'W' => '𝗪', 'X' => '𝗫',
        'Y' => '𝗬', 'Z' => '𝗭', '0' => '𝟬', '1' => '𝟭', '2' => '𝟮',
        '3' => '𝟯', '4' => '𝟰', '5' => '𝟱', '6' => '𝟲', '7' => '𝟳',
        '8' => '𝟴', '9' => '𝟵'
    ];

    $result = '';
    for ($i = 0; $i < mb_strlen($text); $i++) {
        $char = mb_substr($text, $i, 1);
        $result .= $boldMap[$char] ?? $char;
    }
    return $result;
}

// Handle form submission
$inputText = '';
$boldText = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'] ?? '';
    $boldText = convertToBold($inputText);
}
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Bold Text Generator 2026 - 𝕮𝖗𝖊𝖆𝖙𝖊 𝕭𝖔𝖑𝖉 𝕱𝖔𝖓𝖙𝖘</title>
    <meta name="description" content="Instantly generate bold text for social media (2026)! Free online tool creates 𝖇𝖔𝖑𝖉 𝖋𝖔𝖓𝖙𝖘 for Instagram, Facebook & more. No download required! ">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .text-preview {
            min-height: 100px;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.75rem;
            background-color: #f8fafc;
            overflow-wrap: break-word;
        }
        .copy-btn {
            transition: all 0.2s ease;
        }
        .copy-btn:hover {
            transform: translateY(-2px);
        }
        .copy-btn:active {
            transform: translateY(0);
        }
        .tooltip {
            position: relative;
            display: inline-block;
        }
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Bold Text Generator</h1>
            <p class="text-gray-600">Convert normal text to bold unicode characters that you can use on social media, in emails, and everywhere else</p>
        </header>

        <main class="bg-white rounded-lg shadow-md p-6">
            <form method="POST">
                <div class="mb-6">
                    <label for="text" class="block text-gray-700 font-medium mb-2">Enter Your Text:</label>
                    <textarea id="text" name="text" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Type or paste your text here"><?= htmlspecialchars($inputText) ?></textarea>
                </div>
                
                <div class="flex justify-center mb-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md transition duration-200">
                        Generate Bold Text
                    </button>
                </div>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Bold Text Result:</label>
                    <div class="text-preview mb-4" id="boldTextResult"><?= $boldText ?></div>
                    <button onclick="copyToClipboard()" class="copy-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-200 tooltip">
                        Copy to Clipboard
                        <span class="tooltiptext">Copied!</span>
                    </button>
                </div>
            <?php endif; ?>
        </main>

        <section class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">How to Use This Bold Text Generator</h2>
            <ol class="list-decimal pl-5 space-y-2 text-gray-700">
                <li>Type or paste your text into the input box above</li>
                <li>Click the "Generate Bold Text" button</li>
                <li>Your bold text will appear in the results box</li>
                <li>Click "Copy to Clipboard" to copy your bold text</li>
                <li>Paste it anywhere you want (social media, documents, etc.)</li>
            </ol>
        </section>

        <section class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">About This Tool</h2>
            <p class="text-gray-700 mb-4">This bold text generator creates Unicode bold characters that work across most platforms including Facebook, Twitter, Instagram, TikTok, YouTube, and more.</p>
            <p class="text-gray-700">Unlike HTML bold tags or CSS styling, these are actual bold characters that will display anywhere Unicode is supported.</p>
        </section>
    </div>

    <script>
        function copyToClipboard() {
            const textToCopy = document.getElementById('boldTextResult').textContent;
            navigator.clipboard.writeText(textToCopy).then(() => {
                // Show tooltip
                const tooltip = document.querySelector('.tooltip .tooltiptext');
                tooltip.style.visibility = 'visible';
                tooltip.style.opacity = '1';
                
                // Hide tooltip after 2 seconds
                setTimeout(() => {
                    tooltip.style.visibility = 'hidden';
                    tooltip.style.opacity = '0';
                }, 2000);
            });
        }
    </script>

<?php include 'footer.php';?>



