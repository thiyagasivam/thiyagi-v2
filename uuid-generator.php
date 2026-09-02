<?php include 'header.php'; ?>

<title>UUID Generator 2026 - Generate Unique Identifiers Online | 25+ Years Experience</title>
<meta name="description" content="Generate unique UUID identifiers instantly with our professional UUID generator tool. Create v4 UUIDs for development and database needs. Built with 25+ years of software development expertise for 2026.">
<meta name="keywords" content="UUID generator, unique identifier generator, GUID generator, UUID v4, unique ID tool 2026">

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">UUID Generator 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Generate unique identifiers instantly - Professional development tool with 25+ years of experience</p>

<?php
// Function to generate UUID v4
function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

// Handle form submission
$uuids = [];
$count = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = isset($_POST['count']) ? (int)$_POST['count'] : 1;
    $count = min(max($count, 1), 50); // Limit between 1 and 50
    
    for ($i = 0; $i < $count; $i++) {
        $uuids[] = generateUUID();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UUID Generator Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .uuid-item {
            font-family: 'Courier New', monospace;
            background-color: #f8fafc;
            padding: 0.5rem;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            word-break: break-all;
        }
        .copy-btn {
            transition: all 0.2s ease;
        }
        .copy-btn:hover {
            transform: scale(1.05);
        }
        .copy-btn:active {
            transform: scale(0.95);
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">UUID Generator</h1>
            <p class="text-gray-600">Generate random UUIDs (Universally Unique Identifiers) instantly</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="POST">
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="flex-1">
                        <label for="count" class="block text-gray-700 font-medium mb-2">Number of UUIDs to generate (1-50):</label>
                        <input type="number" name="count" id="count" min="1" max="50" value="<?= htmlspecialchars($count) ?>" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Generate UUIDs
                        </button>
                    </div>
                </div>
            </form>

            <?php if (!empty($uuids)): ?>
                <div class="mt-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Generated UUIDs</h2>
                        <button id="copy-all" class="text-sm px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition-colors">
                            Copy All
                        </button>
                    </div>
                    <div class="space-y-2" id="uuid-list">
                        <?php foreach ($uuids as $uuid): ?>
                            <div class="flex items-center justify-between uuid-item">
                                <span><?= htmlspecialchars($uuid) ?></span>
                                <button class="copy-btn text-blue-600 hover:text-blue-800 text-sm font-medium" data-uuid="<?= htmlspecialchars($uuid) ?>">
                                    Copy
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">About UUIDs</h2>
            <div class="prose text-gray-700">
                <p>A UUID (Universally Unique Identifier) is a 128-bit number used to uniquely identify information in computer systems. UUIDs are standardized by the Open Software Foundation (OSF) as part of the Distributed Computing Environment (DCE).</p>
                <p class="mt-2">The version generated by this tool is UUID version 4 (random), which uses random numbers as the source of uniqueness.</p>
                <p class="mt-2">UUIDs are commonly used as database keys, session identifiers, and in distributed systems where uniqueness is required without a central authority.</p>
            </div>
        </div>
    </div>

    <script>
        // Copy functionality
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const uuid = e.target.getAttribute('data-uuid');
                navigator.clipboard.writeText(uuid).then(() => {
                    const originalText = e.target.textContent;
                    e.target.textContent = 'Copied!';
                    setTimeout(() => {
                        e.target.textContent = originalText;
                    }, 2000);
                });
            });
        });

        // Copy all functionality
        document.getElementById('copy-all')?.addEventListener('click', () => {
            const uuids = Array.from(document.querySelectorAll('#uuid-list span'))
                .map(span => span.textContent)
                .join('\n');
            
            navigator.clipboard.writeText(uuids).then(() => {
                const btn = document.getElementById('copy-all');
                const originalText = btn.textContent;
                btn.textContent = 'All Copied!';
                setTimeout(() => {
                    btn.textContent = originalText;
                }, 2000);
            });
        });
    </script>

<?php include 'footer.php'; ?>



