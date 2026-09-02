<?php include 'header.php';?>

<?php
function checkRedirects($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $redirects = [];
    
    if (curl_errno($ch)) {
        return ['error' => 'CURL Error: ' . curl_error($ch)];
    }
    
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    
    if ($httpCode >= 300 && $httpCode < 400) {
        $headers = explode("\n", $response);
        $location = '';
        foreach ($headers as $header) {
            if (strpos(strtolower($header), 'location:') === 0) {
                $location = trim(substr($header, 9));
                break;
            }
        }
        
        if (!empty($location)) {
            $redirects[] = [
                'from' => $url,
                'to' => $location,
                'code' => $httpCode
            ];
            
            // Follow the redirect chain
            $nextRedirects = checkRedirects($location);
            if (isset($nextRedirects['redirects'])) {
                $redirects = array_merge($redirects, $nextRedirects['redirects']);
            } elseif (isset($nextRedirects['error'])) {
                return ['error' => $nextRedirects['error']];
            }
        }
    }
    
    curl_close($ch);
    
    if (empty($redirects)) {
        return ['message' => 'No redirects detected'];
    }
    
    return ['redirects' => $redirects];
}

$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'] ?? '';
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $result = checkRedirects($url);
    } else {
        $result = ['error' => 'Invalid URL provided'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect Checker Tool (2026) - Free URL Redirection Tester</title>
<meta name="description" content="Check HTTP redirects, status codes, and URL chains in real-time. Free online tool to analyze 301, 302 redirects with full path visualization - no installation needed.">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .status-301 { color: #3b82f6; }
        .status-302 { color: #10b981; }
        .status-307 { color: #f59e0b; }
        .status-308 { color: #8b5cf6; }
        .status-other { color: #ef4444; }
        .redirect-chain {
            counter-reset: step;
        }
        .redirect-step::before {
            counter-increment: step;
            content: counter(step);
            display: inline-block;
            width: 24px;
            height: 24px;
            background: #3b82f6;
            color: white;
            text-align: center;
            border-radius: 50%;
            margin-right: 10px;
            line-height: 24px;
        }
    </style>


<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Redirect Checker Tool</h1>
                <p class="text-gray-600">Check HTTP redirect chains for any URL</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <form method="POST">
                    <div class="mb-4">
                        <label for="url" class="block text-gray-700 font-medium mb-2">Enter URL to check:</label>
                        <input type="url" name="url" id="url" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="https://example.com" required>
                    </div>
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                        Check Redirects
                    </button>
                </form>
            </div>
            
            <?php if ($result !== null): ?>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Results</h2>
                    
                    <?php if (isset($result['error'])): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700"><?= htmlspecialchars($result['error']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php elseif (isset($result['message'])): ?>
                        <div class="bg-green-50 border-l-4 border-green-500 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700"><?= htmlspecialchars($result['message']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php elseif (isset($result['redirects'])): ?>
                        <div class="space-y-4 redirect-chain">
                            <?php foreach ($result['redirects'] as $redirect): ?>
                                <div class="redirect-step p-4 border border-gray-200 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <span class="font-medium">HTTP <?= $redirect['code'] ?></span>
                                        <span class="mx-2">→</span>
                                        <span class="status-<?= $redirect['code'] ?> font-semibold">
                                            <?php 
                                                $statusNames = [
                                                    301 => 'Moved Permanently',
                                                    302 => 'Found',
                                                    303 => 'See Other',
                                                    307 => 'Temporary Redirect',
                                                    308 => 'Permanent Redirect'
                                                ];
                                                echo $statusNames[$redirect['code']] ?? 'Redirect';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-sm text-gray-500 mb-1">From:</p>
                                            <p class="text-blue-600 break-all"><?= htmlspecialchars($redirect['from']) ?></p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500 mb-1">To:</p>
                                            <p class="text-green-600 break-all"><?= htmlspecialchars($redirect['to']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="mt-8 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">About Redirect Checker</h2>
                <div class="prose max-w-none text-gray-600">
                    <p>This tool helps you analyze HTTP redirect chains for any URL. It will show you:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>All redirects in the chain</li>
                        <li>HTTP status codes (301, 302, etc.)</li>
                        <li>Final destination URL</li>
                    </ul>
                    <p class="mt-4">Redirect chains can impact SEO and page load performance. Use this tool to identify and fix unnecessary redirects.</p>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>




