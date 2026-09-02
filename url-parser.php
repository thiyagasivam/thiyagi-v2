<?php include 'header.php'; ?>

<title>URL Parser Tool 2026 - Parse & Analyze URLs Online | 25+ Years Experience</title>
<meta name="description" content="Parse and analyze URLs with our professional URL parser tool. Extract domain, path, parameters, and all URL components instantly. Built with 25+ years of web development expertise for 2026 SEO analysis.">
<meta name="keywords" content="URL parser, URL analyzer, parse URL components, URL breakdown, domain extractor, URL tool 2026">

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">URL Parser Tool 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Parse and analyze URL components professionally - Advanced tool with 25+ years of development experience</p>

<?php
// Function to parse URL components
function parseUrlComponents($url) {
    $components = parse_url($url);
    
    // Set default values for all possible components
    $defaults = [
        'scheme' => '',
        'host' => '',
        'port' => '',
        'user' => '',
        'pass' => '',
        'path' => '',
        'query' => '',
        'fragment' => ''
    ];
    
    $components = array_merge($defaults, (array)$components);
    
    // Parse query string if it exists
    $queryParams = [];
    if (!empty($components['query'])) {
        parse_str($components['query'], $queryParams);
    }
    
    return [
        'components' => $components,
        'queryParams' => $queryParams
    ];
}

// Handle form submission
$url = '';
$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = trim($_POST['url']);
    
    if (!empty($url)) {
        // Add scheme if missing
        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = 'http://' . $url;
        }
        
        // Validate URL
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $result = parseUrlComponents($url);
        } else {
            $error = 'Please enter a valid URL';
        }
    } else {
        $error = 'Please enter a URL';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Parser Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .url-component {
            transition: all 0.2s ease;
        }
        .url-component:hover {
            background-color: #f0f9ff;
        }
        .query-param {
            border-left: 3px solid #3b82f6;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">URL Parser Tool</h1>
            <p class="text-gray-600">Analyze and break down any URL into its components</p>
        </div>
        
        <form method="POST" class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="mb-4">
                <label for="url" class="block text-gray-700 font-medium mb-2">Enter URL to Parse:</label>
                <input type="url" name="url" id="url" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="https://example.com/path?query=string#fragment" 
                       value="<?php echo htmlspecialchars($url); ?>" required>
                <p class="text-sm text-gray-500 mt-1">Enter any valid HTTP/HTTPS URL to analyze its structure</p>
            </div>
            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                Parse URL
            </button>
        </form>
        
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded">
                <p><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
        
        <?php if ($result): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="bg-gray-800 text-white px-6 py-4">
                    <h2 class="text-xl font-bold">URL Analysis Results</h2>
                </div>
                
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Original URL</h3>
                    <div class="bg-gray-100 p-4 rounded-lg mb-6 overflow-x-auto">
                        <code class="text-blue-600 break-all"><?php echo htmlspecialchars($url); ?></code>
                    </div>
                    
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">URL Components</h3>
                    <div class="space-y-2 mb-6">
                        <?php foreach ($result['components'] as $component => $value): ?>
                            <?php if (!empty($value)): ?>
                                <div class="url-component bg-gray-50 p-4 rounded-lg">
                                    <div class="flex items-baseline">
                                        <span class="font-mono font-bold text-blue-600 mr-3"><?php echo ucfirst($component); ?>:</span>
                                        <span class="font-mono break-all"><?php echo htmlspecialchars($value); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if (!empty($result['queryParams'])): ?>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Query Parameters</h3>
                        <div class="space-y-2">
                            <?php foreach ($result['queryParams'] as $param => $value): ?>
                                <div class="query-param bg-gray-50 p-4 rounded-lg">
                                    <div class="flex flex-wrap items-baseline">
                                        <span class="font-mono font-bold text-blue-600 mr-3"><?php echo htmlspecialchars($param); ?>:</span>
                                        <span class="font-mono break-all"><?php echo htmlspecialchars($value); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">About URL Parser</h2>
            <div class="prose max-w-none">
                <p>This tool breaks down URLs into their individual components, helping you understand the structure of any web address.</p>
                <p><strong>Components analyzed:</strong></p>
                <ul class="list-disc pl-5">
                    <li><strong>Scheme:</strong> The protocol (http, https, ftp, etc.)</li>
                    <li><strong>Host:</strong> The domain name or IP address</li>
                    <li><strong>Path:</strong> The specific resource on the server</li>
                    <li><strong>Query:</strong> The parameters after the ? symbol</li>
                    <li><strong>Fragment:</strong> The section after the # symbol</li>
                </ul>
            </div>
        </div>
    </div>
   <?php include 'footer.php'; ?>



