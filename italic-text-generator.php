<?php include 'header.php';?>

<?php
// Function to convert text to italic using Unicode characters
function convertToItalic($text) {
    $italicMap = [
        'a' => '𝑎', 'b' => '𝑏', 'c' => '𝑐', 'd' => '𝑑', 'e' => '𝑒',
        'f' => '𝑓', 'g' => '𝑔', 'h' => 'ℎ', 'i' => '𝑖', 'j' => '𝑗',
        'k' => '𝑘', 'l' => '𝑙', 'm' => '𝑚', 'n' => '𝑛', 'o' => '𝑜',
        'p' => '𝑝', 'q' => '𝑞', 'r' => '𝑟', 's' => '𝑠', 't' => '𝑡',
        'u' => '𝑢', 'v' => '𝑣', 'w' => '𝑤', 'x' => '𝑥', 'y' => '𝑦',
        'z' => '𝑧', 'A' => '𝐴', 'B' => '𝐵', 'C' => '𝐶', 'D' => '𝐷',
        'E' => '𝐸', 'F' => '𝐹', 'G' => '𝐺', 'H' => '𝐻', 'I' => '𝐼',
        'J' => '𝐽', 'K' => '𝐾', 'L' => '𝐿', 'M' => '𝑀', 'N' => '𝑁',
        'O' => '𝑂', 'P' => '𝑃', 'Q' => '𝑄', 'R' => '𝑅', 'S' => '𝑆',
        'T' => '𝑇', 'U' => '𝑈', 'V' => '𝑉', 'W' => '𝑊', 'X' => '𝑋',
        'Y' => '𝑌', 'Z' => '𝑍'
    ];
    
    $result = '';
    $length = mb_strlen($text);
    
    for ($i = 0; $i < $length; $i++) {
        $char = mb_substr($text, $i, 1);
        $result .= $italicMap[$char] ?? $char;
    }
    
    return $result;
}

// Handle form submission
$inputText = '';
$italicText = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'] ?? '';
    $italicText = convertToItalic($inputText);
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Italic Text Generator 2026 - 𝒞𝑜𝓃𝓋𝑒𝓇𝓉 𝒯𝑜 𝐹𝒶𝓃𝒸𝓎 𝐹𝑜𝓃𝓉𝓈</title>
<meta name="description" content="Create italicized text for social media bios, posts, and designs (2026). Generate 𝒾𝓉𝒶𝓁𝒾𝒸, 𝓈𝒸𝓇𝒾𝓅𝓉, and 𝘦𝘭𝘦𝘨𝘢𝘯𝘵 styles instantly - No download needed!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .text-container {
            min-height: 150px;
            max-height: 300px;
            overflow-y: auto;
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
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .has-tooltip:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Italic Text Generator</h1>
            <p class="text-gray-600">Convert normal text to italic Unicode characters that you can use anywhere</p>
        </header>

        <main class="bg-white rounded-lg shadow-md overflow-hidden">
            <form method="POST" class="p-6">
                <div class="mb-4">
                    <label for="text" class="block text-gray-700 font-medium mb-2">Enter your text:</label>
                    <textarea name="text" id="text" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Type or paste your text here..."><?= htmlspecialchars($inputText) ?></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-200">
                    Generate Italic Text
                </button>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="border-t border-gray-200 p-6">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-xl font-semibold text-gray-800">Your Italic Text:</h2>
                    <button onclick="copyToClipboard()" class="copy-btn bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md flex items-center has-tooltip relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        Copy
                        <span class="tooltip absolute bottom-full mb-2 px-2 py-1 text-xs text-white bg-gray-800 rounded whitespace-nowrap">Copy to clipboard</span>
                    </button>
                </div>
                <div class="text-container bg-gray-50 p-4 rounded-md border border-gray-200 font-serif text-lg">
                    <?= htmlspecialchars($italicText) ?>
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    <p>Simply copy and paste the italic text wherever you need it!</p>
                </div>
            </div>
            <?php endif; ?>
        </main>

        <section class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">About Italic Text Generator</h2>
            <div class="prose text-gray-700">
                <p>This tool converts your regular text into italic Unicode characters that can be used on social media platforms, in emails, and anywhere else that supports Unicode text.</p>
                <p class="mt-2"><strong>How it works:</strong> The generator replaces each letter with its corresponding italic Unicode character, creating text that appears italicized even without font styling.</p>
                <p class="mt-2"><strong>Note:</strong> Not all fonts support these characters. The text may appear as boxes on some devices if the font doesn't include these Unicode glyphs.</p>
            </div>
        </section>
    </div>



    <script>
        function copyToClipboard() {
            const textToCopy = document.querySelector('.text-container').textContent;
            navigator.clipboard.writeText(textToCopy).then(() => {
                const copyBtn = document.querySelector('.copy-btn');
                const originalHtml = copyBtn.innerHTML;
                copyBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Copied!
                `;
                setTimeout(() => {
                    copyBtn.innerHTML = originalHtml;
                }, 2000);
            });
        }
    </script>

<?php include 'footer.php';?>



