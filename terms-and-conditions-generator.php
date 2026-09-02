<?php include 'header.php'; ?>

<title>Terms and Conditions Generator 2026 - Create Legal Documents | 25+ Years Experience</title>
<meta name="description" content="Generate professional terms and conditions for your website or business instantly. Legal document creator tool for businesses and websites. Built with 25+ years of legal tech expertise for 2026 compliance.">
<meta name="keywords" content="terms and conditions generator, legal document generator, terms of service creator, website legal documents 2026">

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Terms and Conditions Generator 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Create professional legal documents instantly - Expert tool with 25+ years of legal tech experience</p>?php include 'header.php';?>
<?php
// Function to generate terms and conditions
function generateTerms($businessName, $businessType, $websiteUrl, $country, $contactEmail) {
    $date = date('Y-m-d');
    
    $terms = <<<TERMS
# Terms and Conditions for {$businessName}

Last Updated: {$date}

## 1. Introduction

Welcome to {$businessName} ("we," "our," or "us"). These Terms and Conditions govern your use of our website located at {$websiteUrl} and any related services provided by {$businessName}.

By accessing or using our website, you agree to be bound by these Terms and Conditions. If you disagree with any part of these terms, you may not access our website.

## 2. Definitions

- "Service" refers to the services provided by {$businessName} through our website.
- "User," "you," or "your" refers to any individual accessing or using our website.
- "Content" refers to all text, images, videos, and other materials available on our website.

## 3. Use of Our Website

3.1 You must be at least 18 years old to use our website.
3.2 You agree to use our website only for lawful purposes and in accordance with these Terms and Conditions.
3.3 You must not use our website in any way that causes damage to the website or impairs its availability.

## 4. Intellectual Property

4.1 All content on our website is the property of {$businessName} and is protected by copyright laws.
4.2 You may not reproduce, distribute, or create derivative works from our content without our express written permission.

## 5. Limitation of Liability

5.1 {$businessName} will not be liable for any direct, indirect, or consequential loss or damage arising from your use of our website.
5.2 We make no warranties or representations about the accuracy or completeness of the content on our website.

## 6. Governing Law

These Terms and Conditions shall be governed by and construed in accordance with the laws of {$country}.

## 7. Changes to These Terms

We reserve the right to modify these Terms and Conditions at any time. Any changes will be posted on this page with an updated revision date.

## 8. Contact Us

If you have any questions about these Terms and Conditions, please contact us at {$contactEmail}.
TERMS;

    return $terms;
}

// Handle form submission
$generatedTerms = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $businessName = $_POST['business_name'] ?? '';
    $businessType = $_POST['business_type'] ?? '';
    $websiteUrl = $_POST['website_url'] ?? '';
    $country = $_POST['country'] ?? '';
    $contactEmail = $_POST['contact_email'] ?? '';
    
    $generatedTerms = generateTerms($businessName, $businessType, $websiteUrl, $country, $contactEmail);
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
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
        .terms-output {
            white-space: pre-wrap;
            font-family: 'Courier New', monospace;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Terms and Conditions Generator</h1>
            <p class="text-gray-600">Create custom terms and conditions for your website in minutes</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <form method="POST" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="business_name" class="block text-sm font-medium text-gray-700 mb-1">Business Name *</label>
                        <input type="text" id="business_name" name="business_name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="business_type" class="block text-sm font-medium text-gray-700 mb-1">Business Type *</label>
                        <select id="business_type" name="business_type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select business type</option>
                            <option value="LLC">LLC</option>
                            <option value="Corporation">Corporation</option>
                            <option value="Sole Proprietorship">Sole Proprietorship</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Nonprofit">Nonprofit</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="website_url" class="block text-sm font-medium text-gray-700 mb-1">Website URL *</label>
                        <input type="url" id="website_url" name="website_url" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input focus:border-blue-500 focus:ring-blue-500"
                            placeholder="https://example.com">
                    </div>
                    
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Governing Country *</label>
                        <select id="country" name="country" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select country</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Canada">Canada</option>
                            <option value="Australia">Australia</option>
                            <option value="Germany">Germany</option>
                            <option value="France">France</option>
                            <option value="India">India</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1">Contact Email *</label>
                        <input type="email" id="contact_email" name="contact_email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input focus:border-blue-500 focus:ring-blue-500"
                            placeholder="contact@example.com">
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                        Generate Terms and Conditions
                    </button>
                </div>
            </form>
        </div>
        
        <?php if (!empty($generatedTerms)): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Your Generated Terms and Conditions</h2>
                    <button onclick="copyToClipboard()" 
                        class="copy-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md text-sm">
                        Copy to Clipboard
                    </button>
                </div>
                
                <div class="terms-output p-4 bg-gray-50 rounded-md border border-gray-200 overflow-auto max-h-96">
                    <?php echo nl2br(htmlspecialchars($generatedTerms)); ?>
                </div>
                
                <div class="mt-4 text-sm text-gray-600">
                    <p><strong>Note:</strong> This is a general template. You may need to consult with a legal professional to ensure compliance with specific laws in your jurisdiction.</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <script>
        function copyToClipboard() {
            const termsText = document.querySelector('.terms-output').innerText;
            navigator.clipboard.writeText(termsText).then(() => {
                alert('Terms and Conditions copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy text: ', err);
            });
        }
    </script>
<?php include 'footer.php';?>



