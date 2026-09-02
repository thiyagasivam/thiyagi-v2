<?php
// Generate canonical URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$uri = strtok($_SERVER['REQUEST_URI'], '?');
$canonicalUrl = $protocol . "://" . $host . $uri;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://www.thiyagi.com/nt.png" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1381776395680802"
     crossorigin="anonymous"></script>
     <meta name="google-adsense-account" content="ca-pub-1381776395680802">
     <!-- Clarity tracking code for https://www.thiyagi.com/ -->
<script>
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "su9bgvyyjw");
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5PGTVJ1CV1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5PGTVJ1CV1');
</script>
</head>
<body>
<nav class="bg-white shadow-sm px-3 py-2 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <!-- Logo -->
    <a class="flex items-center" href="https://www.thiyagi.com/">
      <img src="https://www.thiyagi.com/nt.png" alt="Thiyagi Logo" class="h-10 w-10 mr-2">
    </a>
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button"
            class="md:hidden p-2 rounded text-gray-700 hover:bg-gray-100 focus:outline-none"
            aria-expanded="false" aria-controls="mobile-menu-expanded">
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <!-- Main Navigation (desktop) -->
    <div class="hidden md:flex md:items-center w-auto" id="desktop-menu">
      <ul class="flex space-x-2 lg:space-x-4 items-center">
        <!-- Financial Tools Dropdown -->
        <li class="relative group">
          <button class="nav-dropdown px-3 py-2 text-gray-700 hover:text-yellow-600 rounded-md focus:outline-none flex items-center">
            Financial Tools <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="dropdown absolute left-0 mt-0 w-56 rounded bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
            <div class="py-1">
              <a href="https://www.thiyagi.com/emi-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">EMI Calculator</a>
              <a href="https://www.thiyagi.com/loan-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Loan Calculator</a>
              <a href="https://www.thiyagi.com/rd-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">RD Calculator</a>
              <a href="https://www.thiyagi.com/fd-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">FD Calculator</a>
              <a href="https://www.thiyagi.com/ppf-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">PPF Calculator</a>
              <a href="https://www.thiyagi.com/sip-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">SIP Calculator</a>
              <a href="https://www.thiyagi.com/step-up-sip-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Step Up SIP</a>
              <a href="https://www.thiyagi.com/lumpsum-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lumpsum Calculator</a>
              <a href="https://www.thiyagi.com/swp-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">SWP Calculator</a>
              <a href="https://www.thiyagi.com/sukanya-samriddhi-yojana-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sukanya Samriddhi Yojana</a>
            </div>
          </div>
        </li>
        <!-- Developer Tools Dropdown -->
        <li class="relative group">
          <button class="nav-dropdown px-3 py-2 text-gray-700 hover:text-yellow-600 rounded-md focus:outline-none flex items-center">
            Developer Tools <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="dropdown absolute left-0 mt-0 w-56 rounded bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
            <div class="py-1">
              <a href="https://www.thiyagi.com/json-viewer" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JSON Viewer</a>
              <a href="https://www.thiyagi.com/json-validator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JSON Validator</a>
              <a href="https://www.thiyagi.com/html-beautifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">HTML Beautifier</a>
              <a href="https://www.thiyagi.com/html-minifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">HTML Minifier</a>
              <a href="https://www.thiyagi.com/css-beautifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">CSS Beautifier</a>
              <a href="https://www.thiyagi.com/css-minifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">CSS Minifier</a>
              <a href="https://www.thiyagi.com/javascript-minifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JavaScript Minifier</a>
              <a href="https://www.thiyagi.com/javascript-beautifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JS Beautifier</a>
            </div>
          </div>
        </li>
        <!-- YouTube Tools Dropdown -->
        <li class="relative group">
          <button class="nav-dropdown px-3 py-2 text-gray-700 hover:text-yellow-600 rounded-md focus:outline-none flex items-center">
            YouTube Tools <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="dropdown absolute left-0 mt-0 w-56 rounded bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
            <div class="py-1">
              <a href="https://www.thiyagi.com/youtube-channel-search" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Channel Search</a>
              <a href="https://www.thiyagi.com/youtube-video-statistics" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Video Stats</a>
              <a href="https://www.thiyagi.com/youtube-hashtag-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hashtag Generator</a>
              <a href="https://www.thiyagi.com/youtube-title-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Title Generator</a>
              <a href="https://www.thiyagi.com/youtube-subscribe-link-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Subscribe Link Generator</a>
              <a href="https://www.thiyagi.com/youtube-thumbnail-downloader" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thumbnail Downloader</a>
              <a href="https://www.thiyagi.com/youtube-money-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Money Calculator</a>
            </div>
          </div>
        </li>
        <!-- Converter Tools Dropdown -->
        <li class="relative group">
          <button class="nav-dropdown px-3 py-2 text-gray-700 hover:text-yellow-600 rounded-md focus:outline-none flex items-center">
            Converters <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="dropdown absolute left-0 mt-0 w-56 rounded bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
            <div class="py-1">
              <a href="https://www.thiyagi.com/hex-to-decimal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hex to Decimal</a>
              <a href="https://www.thiyagi.com/binary-translator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Binary Translator</a>
              <a href="https://www.thiyagi.com/decimal-to-ascii-converter" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Decimal to ASCII</a>
              <a href="https://www.thiyagi.com/currency-converter" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Currency Converter</a>
            </div>
          </div>
        </li>
        <!-- Text Tools Dropdown -->
        <li class="relative group">
          <button class="nav-dropdown px-3 py-2 text-gray-700 hover:text-yellow-600 rounded-md focus:outline-none flex items-center">
            Text Tools <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="dropdown absolute left-0 mt-0 w-56 rounded bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
            <div class="py-1">
              <a href="https://www.thiyagi.com/bold-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bold Text Generator</a>
              <a href="https://www.thiyagi.com/italic-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Italic Text Generator</a>
              <a href="https://www.thiyagi.com/cursive-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cursive Text Generator</a>
              <a href="https://www.thiyagi.com/gothic-font-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gothic Font Generator</a>
              <a href="https://www.thiyagi.com/tiny-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tiny Text Generator</a>
            </div>
          </div>
        </li>

             <!-- Resources Dropdown -->
        <li class="relative group">
          <button class="nav-dropdown px-3 py-2 text-gray-700 hover:text-yellow-600 rounded-md focus:outline-none flex items-center">
            Resources <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="dropdown absolute left-0 mt-0 w-56 rounded bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
            <div class="py-1">
              <a href="https://www.thiyagi.com/holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">All Holidays</a>
              <a href="https://www.thiyagi.com/holiday/uk-holiday/england-cities/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">England Cities</a>
              <a href="https://www.thiyagi.com/holiday/uk-holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">UK Holidays</a>
              <a href="https://www.thiyagi.com/holiday/usa-holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">USA Holidays</a>
              <a href="https://www.thiyagi.com/holiday/indian-holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">India Holidays</a>
              <a href="https://www.thiyagi.com/holiday/canada-holidays/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">Canada Holidays</a>
              <a href="https://www.thiyagi.com/holiday/australia-holidays/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">Australia Holidays</a>
              <a href="https://www.thiyagi.com/electricity-board" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Electricity Board</a>
              <a href="https://www.thiyagi.com/rto-details" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">RTO Details</a>
              <a href="https://www.thiyagi.com/service-center" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Service Center</a>
              <a href="https://www.thiyagi.com/contact" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact Us</a>
             
            </div>
          </div>
        </li>

        <!-- Contact Us (on same navbar line) -->
      
      </ul>
      <div class="ml-4">
        <a href="#" class="inline-flex items-center px-4 py-2 border border-yellow-400 text-sm rounded-md text-yellow-700 bg-white hover:bg-yellow-50">
          <svg class="-ml-1 mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
          Sign in
        </a>
      </div>
    </div>
  </div>
  <!-- Mobile Menu -->
  <div class="md:hidden hidden" id="mobile-menu-expanded">
    <ul class="space-y-1 py-4 px-1 bg-white shadow">
      <!-- Financial Tools (Mobile Dropdown) -->
      <li>
        <button class="w-full flex justify-between items-center px-4 py-2 text-gray-700 focus:outline-none nav-mobile-dropdown">Financial Tools 
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="dropdown hidden pl-4">
          <a href="https://www.thiyagi.com/emi-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">EMI Calculator</a>
          <a href="https://www.thiyagi.com/loan-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Loan Calculator</a>
          <a href="https://www.thiyagi.com/rd-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">RD Calculator</a>
          <a href="https://www.thiyagi.com/fd-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">FD Calculator</a>
          <a href="https://www.thiyagi.com/ppf-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">PPF Calculator</a>
          <a href="https://www.thiyagi.com/sip-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">SIP Calculator</a>
          <a href="https://www.thiyagi.com/step-up-sip-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Step Up SIP</a>
          <a href="https://www.thiyagi.com/lumpsum-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lumpsum Calculator</a>
          <a href="https://www.thiyagi.com/swp-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">SWP Calculator</a>
          <a href="https://www.thiyagi.com/sukanya-samriddhi-yojana-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sukanya Samriddhi Yojana</a>
        </div>
      </li>
      <!-- Developer Tools (Mobile Dropdown) -->
      <li>
        <button class="w-full flex justify-between items-center px-4 py-2 text-gray-700 focus:outline-none nav-mobile-dropdown">Developer Tools
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="dropdown hidden pl-4">
          <a href="https://www.thiyagi.com/json-viewer" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JSON Viewer</a>
          <a href="https://www.thiyagi.com/json-validator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JSON Validator</a>
          <a href="https://www.thiyagi.com/html-beautifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">HTML Beautifier</a>
          <a href="https://www.thiyagi.com/html-minifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">HTML Minifier</a>
          <a href="https://www.thiyagi.com/css-beautifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">CSS Beautifier</a>
          <a href="https://www.thiyagi.com/css-minifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">CSS Minifier</a>
          <a href="https://www.thiyagi.com/javascript-minifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JavaScript Minifier</a>
          <a href="https://www.thiyagi.com/javascript-beautifier" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">JS Beautifier</a>
        </div>
      </li>
      <!-- YouTube Tools (Mobile Dropdown) -->
      <li>
        <button class="w-full flex justify-between items-center px-4 py-2 text-gray-700 focus:outline-none nav-mobile-dropdown">YouTube Tools
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="dropdown hidden pl-4">
          <a href="https://www.thiyagi.com/youtube-channel-search" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Channel Search</a>
          <a href="https://www.thiyagi.com/youtube-video-statistics" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Video Stats</a>
          <a href="https://www.thiyagi.com/youtube-hashtag-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hashtag Generator</a>
          <a href="https://www.thiyagi.com/youtube-title-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Title Generator</a>
          <a href="https://www.thiyagi.com/youtube-subscribe-link-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Subscribe Link Generator</a>
          <a href="https://www.thiyagi.com/youtube-thumbnail-downloader" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thumbnail Downloader</a>
          <a href="https://www.thiyagi.com/youtube-money-calculator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Money Calculator</a>
        </div>
      </li>
      <!-- Converter Tools (Mobile Dropdown) -->
      <li>
        <button class="w-full flex justify-between items-center px-4 py-2 text-gray-700 focus:outline-none nav-mobile-dropdown">Converters
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="dropdown hidden pl-4">
          <a href="https://www.thiyagi.com/hex-to-decimal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hex to Decimal</a>
          <a href="https://www.thiyagi.com/binary-translator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Binary Translator</a>
          <a href="https://www.thiyagi.com/decimal-to-ascii-converter" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Decimal to ASCII</a>
          <a href="https://www.thiyagi.com/currency-converter" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Currency Converter</a>
        </div>
      </li>
      <!-- Text Tools (Mobile Dropdown) -->
      <li>
        <button class="w-full flex justify-between items-center px-4 py-2 text-gray-700 focus:outline-none nav-mobile-dropdown">Text Tools
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="dropdown hidden pl-4">
          <a href="https://www.thiyagi.com/bold-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bold Text Generator</a>
          <a href="https://www.thiyagi.com/italic-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Italic Text Generator</a>
          <a href="https://www.thiyagi.com/cursive-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cursive Text Generator</a>
          <a href="https://www.thiyagi.com/gothic-font-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gothic Font Generator</a>
          <a href="https://www.thiyagi.com/tiny-text-generator" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tiny Text Generator</a>
        </div>
      </li>

      <!-- Resources (Mobile Dropdown) -->
      <li>
        <button class="w-full flex justify-between items-center px-4 py-2 text-gray-700 focus:outline-none nav-mobile-dropdown">  Resources
          <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="dropdown hidden pl-4">
          <a href="https://www.thiyagi.com/holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">All Holidays</a>
          <a href="https://www.thiyagi.com/holiday/uk-holiday/england-cities/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">England Cities</a>
          <a href="https://www.thiyagi.com/holiday/uk-holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">UK Holidays</a>
          <a href="https://www.thiyagi.com/holiday/usa-holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">USA Holidays</a>
          <a href="https://www.thiyagi.com/holiday/indian-holiday/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">India Holidays</a>
          <a href="https://www.thiyagi.com/holiday/canada-holidays/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">Canada Holidays</a>
          <a href="https://www.thiyagi.com/holiday/australia-holidays/" class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100">Australia Holidays</a>
          <a href="https://www.thiyagi.com/electricity-board/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Electricity Board</a>
          <a href="https://www.thiyagi.com/rto-details" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">RTO Details</a>
          <a href="https://www.thiyagi.com/service-center" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Service Center</a>
           <a href="https://www.thiyagi.com/contact" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact Us</a>
        </div>
      </li>

      <!-- Contact Us (mobile, no dropdown) -->
     
      <li>
        <a href="#" class="flex items-center px-4 py-2 border mt-2 border-yellow-400 text-sm rounded-md text-yellow-700 bg-white hover:bg-yellow-50">
          <svg class="mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
          Sign in
        </a>
      </li>
    </ul>
  </div>
</nav>
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Toggle mobile menu
  const mobileBtn = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu-expanded');
  mobileBtn.onclick = function(e) {
    e.stopPropagation();
    const expanded = mobileMenu.classList.toggle('hidden');
    mobileBtn.setAttribute('aria-expanded', expanded ? "false" : "true");
  };

  // Desktop dropdowns: Show on hover and close others
  document.querySelectorAll('#desktop-menu .group').forEach(group => {
    const btn = group.querySelector('.nav-dropdown');
    const dropdown = group.querySelector('.dropdown');
    btn && btn.addEventListener('mouseenter', () => {
      document.querySelectorAll('#desktop-menu .dropdown').forEach(d => d.classList.add('hidden'));
      dropdown.classList.remove('hidden');
    });
    group.addEventListener('mouseleave', () => {
      dropdown.classList.add('hidden');
    });
    // Support click to open (optional)
    btn && btn.addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelectorAll('#desktop-menu .dropdown').forEach(d => d !== dropdown && d.classList.add('hidden'));
      dropdown.classList.toggle('hidden');
    });
  });

  // Mobile dropdowns: Accordion style
  document.querySelectorAll('#mobile-menu-expanded .nav-mobile-dropdown').forEach((btn, idx, arr) => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      arr.forEach((otherBtn, j) => {
        if (j !== idx) otherBtn.nextElementSibling.classList.add('hidden');
      });
      const drop = btn.nextElementSibling;
      drop && drop.classList.toggle('hidden');
    });
  });

  // Click outside to close
  document.addEventListener('click', function(e){
    if (!e.target.closest('nav')) {
      mobileMenu.classList.add('hidden');
      mobileBtn.setAttribute('aria-expanded', 'false');
      document.querySelectorAll('#desktop-menu .dropdown').forEach(d => d.classList.add('hidden'));
      document.querySelectorAll('#mobile-menu-expanded .dropdown').forEach(d => d.classList.add('hidden'));
    }
  });
});
</script>

