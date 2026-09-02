<?php include 'header.php';?>

<?php
// Configuration
$maxUrls = 22500; // Maximum URLs to process
$maxDepth = 3; // Maximum crawl depth
$changeFreq = 'weekly'; // Default change frequency
$priority = '0.5'; // Default priority

// Function to get all links from a URL
function crawl_page($url, $depth, $maxDepth, $maxUrls, &$urls = []) {
    if ($depth > $maxDepth || count($urls) >= $maxUrls) {
        return $urls;
    }

    $options = [
        'http' => [
            'method' => "GET",
            'header' => "User-Agent: Mozilla/5.0 (compatible; XML Sitemap Generator)\r\n"
        ]
    ];
    $context = stream_context_create($options);
    
    $html = @file_get_contents($url, false, $context);
    if ($html === false) {
        return $urls;
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $links = $dom->getElementsByTagName('a');

    $currentHost = parse_url($url, PHP_URL_HOST);
    
    foreach ($links as $link) {
        $href = $link->getAttribute('href');
        
        // Skip if empty, anchor, or javascript
        // if (empty($href) continue;
        // if (strpos($href, '#') === 0) continue;
        // if (strpos($href, 'javascript:') === 0) continue;
        
        // Convert relative URLs to absolute
        $href = rel2abs($href, $url);
        
        // Skip if not same domain
        $hrefHost = parse_url($href, PHP_URL_HOST);
        if ($hrefHost !== $currentHost) continue;
        
        // Skip if already processed
        if (in_array($href, $urls)) continue;
        
        // Add to URLs array
        $urls[] = $href;
        
        // Recursive crawl
        crawl_page($href, $depth + 1, $maxDepth, $maxUrls, $urls);
    }
    
    return $urls;
}

// Function to convert relative URL to absolute
function rel2abs($rel, $base) {
    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
    if ($rel[0] == '#' || $rel[0] == '?') return $base.$rel;
    
    $baseParts = parse_url($base);
    $path = isset($baseParts['path']) ? preg_replace('#/[^/]*$#', '', $baseParts['path']) : '';
    
    if ($rel[0] == '/') $path = '';
    
    $abs = $baseParts['scheme'].'://'.$baseParts['host'].$path.'/'.$rel;
    
    return preg_replace('#(?<!:)/+#', '/', $abs);
}

// Handle form submission
$sitemap = '';
$error = '';
$urlCount = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $websiteUrl = rtrim($_POST['website_url'], '/');
    
    if (!filter_var($websiteUrl, FILTER_VALIDATE_URL)) {
        $error = 'Please enter a valid URL (e.g., https://example.com)';
    } else {
        $urls = crawl_page($websiteUrl, 0, $maxDepth, $maxUrls);
        $urls = array_unique($urls);
        $urlCount = count($urls);
        
        // Generate XML sitemap
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        
        foreach ($urls as $url) {
            $sitemap .= "\t<url>\n";
            $sitemap .= "\t\t<loc>" . htmlspecialchars($url) . "</loc>\n";
            $sitemap .= "\t\t<lastmod>" . date('Y-m-d') . "</lastmod>\n";
            $sitemap .= "\t\t<changefreq>" . $changeFreq . "</changefreq>\n";
            $sitemap .= "\t\t<priority>" . $priority . "</priority>\n";
            $sitemap .= "\t</url>\n";
        }
        
        $sitemap .= "</urlset>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free XML Sitemap Generator (2026) - SEO-Friendly Sitemap Creator</title>
<meta name="description" content="Generate XML sitemaps for your website instantly. Free online tool that creates Google-compliant sitemaps to improve SEO indexing and crawl efficiency.">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .result-box {
            max-height: 500px;
            overflow-y: auto;
        }
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>


<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">XML Sitemap Generator</h1>
                <p class="text-gray-600 mt-2">Generate XML sitemaps for your website to improve SEO</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <form method="POST">
                    <div class="mb-4">
                        <label for="website_url" class="block text-gray-700 font-bold mb-2">Website URL:</label>
                        <input type="url" name="website_url" id="website_url" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://example.com" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                        Generate Sitemap
                    </button>
                </form>
            </div>
            
            <?php if (!empty($error)): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8">
                    <p><?php echo htmlspecialchars($error); ?></p>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($sitemap)): ?>
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Generated Sitemap</h2>
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            <?php echo $urlCount; ?> URLs found
                        </span>
                    </div>
                    
                    <div class="result-box bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <pre class="text-gray-800 text-sm"><?php echo htmlspecialchars($sitemap); ?></pre>
                    </div>
                    
                    <div class="mt-4 flex flex-col sm:flex-row gap-3">
                        <a href="data:application/xml;charset=utf-8,<?php echo urlencode($sitemap); ?>" download="sitemap.xml" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg text-center transition duration-200">
                            Download XML File
                        </a>
                        <button onclick="copyToClipboard()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                            Copy to Clipboard
                        </button>
                    </div>
                </div>
                
                <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4">
                    <p class="font-bold">What's next?</p>
                    <p class="mt-1">Upload the sitemap.xml file to your website root directory and submit it to Google Search Console.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
        function copyToClipboard() {
            const text = document.querySelector('pre').textContent;
            navigator.clipboard.writeText(text).then(() => {
                alert('Sitemap copied to clipboard!');
            });
        }
    </script>

<?php include 'footer.php';?>




