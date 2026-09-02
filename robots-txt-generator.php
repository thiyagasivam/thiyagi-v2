<?php include 'header.php';?>

<?php
// Function to generate robots.txt content
function generateRobotsTxt($userAgent, $disallowPaths, $allowPaths, $sitemapUrl) {
    $robotsTxt = "";

    // User-agent rules
    if (!empty($userAgent)) {
        $robotsTxt .= "User-agent: $userAgent\n";
    } else {
        $robotsTxt .= "User-agent: *\n";
    }

    // Disallow paths
    if (!empty($disallowPaths)) {
        $disallowPaths = explode("\n", $disallowPaths);
        foreach ($disallowPaths as $path) {
            $path = trim($path);
            if (!empty($path)) {
                $robotsTxt .= "Disallow: $path\n";
            }
        }
    } else {
        $robotsTxt .= "Disallow:\n";
    }

    // Allow paths
    if (!empty($allowPaths)) {
        $allowPaths = explode("\n", $allowPaths);
        foreach ($allowPaths as $path) {
            $path = trim($path);
            if (!empty($path)) {
                $robotsTxt .= "Allow: $path\n";
            }
        }
    }

    // Sitemap URL
    if (!empty($sitemapUrl)) {
        $robotsTxt .= "\nSitemap: $sitemapUrl\n";
    }

    return $robotsTxt;
}

// Handle form submission
$robotsTxtContent = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userAgent = $_POST['user_agent'] ?? '';
    $disallowPaths = $_POST['disallow_paths'] ?? '';
    $allowPaths = $_POST['allow_paths'] ?? '';
    $sitemapUrl = $_POST['sitemap_url'] ?? '';

    $robotsTxtContent = generateRobotsTxt($userAgent, $disallowPaths, $allowPaths, $sitemapUrl);
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Robots.txt Generator (2026) - Create & Validate robot.txt Files</title>
<meta name="description" content="Generate and validate robots.txt files instantly for SEO. Free tool to control search engine crawlers, block pages & test directives with live preview.">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Robots.txt Generator</h1>
        <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="user_agent" class="block text-gray-700 font-bold mb-2">User-agent:</label>
                <input type="text" name="user_agent" id="user_agent" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., * (for all bots)">
            </div>
            <div class="mb-4">
                <label for="disallow_paths" class="block text-gray-700 font-bold mb-2">Disallow Paths (one per line):</label>
                <textarea name="disallow_paths" id="disallow_paths" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., /admin/"></textarea>
            </div>
            <div class="mb-4">
                <label for="allow_paths" class="block text-gray-700 font-bold mb-2">Allow Paths (one per line):</label>
                <textarea name="allow_paths" id="allow_paths" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., /public/"></textarea>
            </div>
            <div class="mb-4">
                <label for="sitemap_url" class="block text-gray-700 font-bold mb-2">Sitemap URL:</label>
                <input type="url" name="sitemap_url" id="sitemap_url" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., https://example.com/sitemap.xml">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Generate Robots.txt</button>
        </form>
        <?php if (!empty($robotsTxtContent)): ?>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Generated Robots.txt:</h2>
                <pre class="bg-gray-100 p-4 rounded-lg mt-2 text-gray-700"><code><?php echo htmlspecialchars($robotsTxtContent); ?></code></pre>
            </div>
        <?php endif; ?>
    </div>
<?php include 'footer.php';?>



