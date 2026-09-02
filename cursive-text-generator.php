<?php include 'header.php';?>

<?php
// Cursive text conversion mappings
$cursiveMap = [
    'a' => '𝒶', 'b' => '𝒷', 'c' => '𝒸', 'd' => '𝒹', 'e' => '𝑒', 
    'f' => '𝒻', 'g' => '𝑔', 'h' => '𝒽', 'i' => '𝒾', 'j' => '𝒿', 
    'k' => '𝓀', 'l' => '𝓁', 'm' => '𝓂', 'n' => '𝓃', 'o' => '𝑜', 
    'p' => '𝓅', 'q' => '𝓆', 'r' => '𝓇', 's' => '𝓈', 't' => '𝓉', 
    'u' => '𝓊', 'v' => '𝓋', 'w' => '𝓌', 'x' => '𝓍', 'y' => '𝓎', 
    'z' => '𝓏',
    'A' => '𝒜', 'B' => 'ℬ', 'C' => '𝒞', 'D' => '𝒟', 'E' => 'ℰ', 
    'F' => 'ℱ', 'G' => '𝒢', 'H' => 'ℋ', 'I' => 'ℐ', 'J' => '𝒥', 
    'K' => '𝒦', 'L' => 'ℒ', 'M' => 'ℳ', 'N' => '𝒩', 'O' => '𝒪', 
    'P' => '𝒫', 'Q' => '𝒬', 'R' => 'ℛ', 'S' => '𝒮', 'T' => '𝒯', 
    'U' => '𝒰', 'V' => '𝒱', 'W' => '𝒲', 'X' => '𝒳', 'Y' => '𝒴', 
    'Z' => '𝒵'
];

// Function to convert text to cursive
function convertToCursive($text, $map) {
    $result = '';
    $length = mb_strlen($text);
    
    for ($i = 0; $i < $length; $i++) {
        $char = mb_substr($text, $i, 1);
        $result .= $map[$char] ?? $char;
    }
    
    return $result;
}

// Handle form submission
$inputText = '';
$cursiveText = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'] ?? '';
    $cursiveText = convertToCursive($inputText, $cursiveMap);
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Cursive Text Generator 2026 – 𝓕�𝓪�𝓷𝓬𝔂 𝓕𝓸𝓷𝓽𝓼 & 𝓢𝓽𝔂𝓵𝓲𝓼𝓱 𝓣𝓮𝔁𝓽</title>
    <meta name="description" content="Create beautiful cursive text for social media, bios, and designs with our free 2026 generator! Copy 𝓲𝓷𝓼𝓽𝓪𝓷𝓽 𝓯𝓪𝓷𝓬𝔂 fonts—no download needed!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .cursive-output {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.5rem;
            min-height: 80px;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 1rem;
            background-color: #f8fafc;
            word-wrap: break-word;
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
        .input-textarea {
            min-height: 120px;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Cursive Text Generator</h1>
            <p class="text-lg text-gray-600">Convert normal text to fancy cursive letters that you can copy and paste</p>
        </header>

        <main class="bg-white rounded-lg shadow-md overflow-hidden">
            <form method="POST" class="p-6">
                <div class="mb-6">
                    <label for="text" class="block text-sm font-medium text-gray-700 mb-2">Enter your text below:</label>
                    <textarea 
                        id="text" 
                        name="text" 
                        rows="5" 
                        class="input-textarea w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Type or paste your text here..." 
                        required><?= htmlspecialchars($inputText) ?></textarea>
                </div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-200">
                    Convert to Cursive
                </button>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="border-t border-gray-200 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Your Cursive Text:</h2>
                    <button 
                        onclick="copyToClipboard()" 
                        class="copy-btn bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        Copy
                    </button>
                </div>
                <div id="cursive-output" class="cursive-output">
                    <?= $cursiveText ?>
                </div>
            </div>
            <?php endif; ?>
        </main>

        <section class="mt-10 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">How to Use This Cursive Text Generator</h2>
            <ol class="list-decimal pl-5 space-y-2 text-gray-700">
                <li>Type or paste your text in the input box above</li>
                <li>Click the "Convert to Cursive" button</li>
                <li>Your cursive text will appear in the output box</li>
                <li>Click the "Copy" button to copy the cursive text to your clipboard</li>
                <li>Paste the cursive text anywhere you want (Facebook, Instagram, Twitter, etc.)</li>
            </ol>
        </section>
    </div>

    <script>
        function copyToClipboard() {
            const output = document.getElementById('cursive-output');
            const range = document.createRange();
            range.selectNode(output);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            
            // Show feedback
            const btn = document.querySelector('.copy-btn');
            btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Copied!
            `;
            
            setTimeout(() => {
                btn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    Copy
                `;
            }, 2000);
        }
    </script>

<?php include 'footer.php';?>



