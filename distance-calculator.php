<?php include 'header.php';?>
<title>Distance Calculator 2026 - Calculate Distance Between Points | Free Tool</title>
<meta name="description" content="Calculate distance between two coordinates or points with our free 2026 Distance Calculator. Supports multiple units including miles, kilometers, meters, and nautical miles. Try now!">
<meta name="keywords" content="distance calculator, calculate distance between points, distance between coordinates, haversine formula, travel distance calculator, latitude longitude distance">
<link rel="canonical" href="https://www.thiyagi.com/distance-calculator">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="Distance Calculator 2026 - Calculate Distance Between Points | Free Tool">
<meta property="og:description" content="Calculate distance between two coordinates or points with our free 2026 Distance Calculator. Supports multiple units including miles, kilometers, meters, and nautical miles.">
<meta property="og:url" content="https://www.thiyagi.com/distance-calculator">
<meta property="og:type" content="website">
<meta property="og:image" content="https://www.thiyagi.com/nt.png">
<meta property="og:site_name" content="Thiyagi Tools">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Distance Calculator 2026 - Calculate Distance Between Points">
<meta name="twitter:description" content="Calculate distance between two coordinates or points with our free 2026 Distance Calculator.">
<meta name="twitter:image" content="https://www.thiyagi.com/nt.png">

<!-- Additional SEO Meta Tags -->
<meta name="author" content="Thiyagi">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="#3b82f6">

<style>
  .input-focus:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    border-color: #3b82f6;
  }
</style>

<main class="min-h-screen bg-gradient-to-br from-blue-50 via-cyan-50 to-teal-50">
  <!-- Hero Section -->
  <section class="pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
          Distance Calculator
        </h1>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
          Calculate the distance between two coordinates using latitude and longitude. 
          Supports multiple units including kilometers, miles, meters, and nautical miles.
        </p>
      </div>
    </div>
  </section>

<!-- Calculator Section -->
<section class="bg-gradient-to-br from-blue-50 via-cyan-50 to-teal-50 py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
            <i class="fas fa-map-marker-alt text-blue-600 text-2xl" aria-hidden="true"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Quick Distance Calculation
        </h2>
        <p class="text-gray-600 mb-8">
            Enter coordinates to calculate the distance between two points
        </p>
    </div>
</section>

<!-- Calculator Widget -->
<section class="py-12">
  <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-6 sm:p-10">
    <div class="flex items-center gap-3 mb-4">
      <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
        <i class="fas fa-globe text-blue-600 text-xl" aria-hidden="true"></i>
      </div>
      <div>
        <h2 class="text-xl font-bold text-gray-800">Distance Between Coordinates</h2>
        <p class="text-gray-600 text-sm">Enter latitude and longitude values</p>
      </div>
    </div>
    
    <form class="space-y-6" role="form">
      <!-- Unit Selection -->
      <div>
        <label for="unit" class="block text-sm font-medium text-gray-700 mb-2">
          Distance Unit
        </label>
        <select id="unit" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus">
          <option value="km">Kilometers (km)</option>
          <option value="miles">Miles (mi)</option>
          <option value="meters">Meters (m)</option>
          <option value="nautical">Nautical Miles (nm)</option>
        </select>
      </div>

      <!-- Point 1 -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="lat1" class="block text-sm font-medium text-gray-700 mb-2">
            Point 1 - Latitude
          </label>
          <input
            type="number"
            id="lat1"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus"
            placeholder="e.g., 40.7128"
            step="any"
            min="-90"
            max="90"
          />
        </div>
        <div>
          <label for="lon1" class="block text-sm font-medium text-gray-700 mb-2">
            Point 1 - Longitude
          </label>
          <input
            type="number"
            id="lon1"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus"
            placeholder="e.g., -74.0060"
            step="any"
            min="-180"
            max="180"
          />
        </div>
      </div>

      <!-- Point 2 -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="lat2" class="block text-sm font-medium text-gray-700 mb-2">
            Point 2 - Latitude
          </label>
          <input
            type="number"
            id="lat2"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus"
            placeholder="e.g., 51.5074"
            step="any"
            min="-90"
            max="90"
          />
        </div>
        <div>
          <label for="lon2" class="block text-sm font-medium text-gray-700 mb-2">
            Point 2 - Longitude
          </label>
          <input
            type="number"
            id="lon2"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus"
            placeholder="e.g., -0.1278"
            step="any"
            min="-180"
            max="180"
          />
        </div>
      </div>

      <!-- Result -->
      <div>
        <label for="result" class="block text-sm font-medium text-gray-700 mb-2">
          Distance
        </label>
        <div class="relative">
          <input
            type="text"
            id="result"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-lg font-medium text-blue-700"
            placeholder="Result will appear here"
            readonly
          />
        </div>
      </div>

      <!-- Copy Button -->
      <div class="flex justify-center">
        <button
          type="button"
          id="copyBtn"
          class="hidden px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 flex items-center gap-2"
        >
          <i class="fas fa-copy" aria-hidden="true"></i>
          Copy Result
        </button>
      </div>

      <!-- Copy Success Message -->
      <div id="copySuccess" class="hidden text-center">
        <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-lg">
          <i class="fas fa-check-circle mr-2" aria-hidden="true"></i>
          <span>Copied to clipboard!</span>
        </div>
      </div>
    </form>
  </div>
</section>

  <!-- About Section -->
  <section class="max-w-4xl mx-auto mt-12 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-info-circle text-blue-600" aria-hidden="true"></i>
        About Distance Calculator
      </h2>
      <div class="prose max-w-none text-gray-600">
        <p class="mb-4">
          Our distance calculator uses the Haversine formula to calculate the great-circle distance between two points 
          on Earth given their latitude and longitude coordinates. This is the most accurate method for calculating 
          distances on a spherical Earth.
        </p>
        <p class="mb-6">
          Perfect for travel planning, navigation, mapping applications, and geographic analysis. The calculator 
          supports multiple distance units and provides accurate results for any two coordinates on Earth.
        </p>
      </div>
    </article>
  </section>

  <!-- How to Use Section -->
  <section class="max-w-4xl mx-auto mt-8 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-graduation-cap text-blue-600" aria-hidden="true"></i>
        How to Use the Distance Calculator
      </h2>
      
      <div class="space-y-4">
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-blue-600 font-bold text-sm">1</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Select Distance Unit</h4>
            <p class="text-gray-600 text-sm">Choose from kilometers, miles, meters, or nautical miles</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-blue-600 font-bold text-sm">2</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Enter Point 1 Coordinates</h4>
            <p class="text-gray-600 text-sm">Input latitude (-90 to 90) and longitude (-180 to 180)</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-blue-600 font-bold text-sm">3</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Enter Point 2 Coordinates</h4>
            <p class="text-gray-600 text-sm">Input latitude and longitude for the second point</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-blue-600 font-bold text-sm">4</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Get Instant Result</h4>
            <p class="text-gray-600 text-sm">Distance is calculated automatically in your selected unit</p>
          </div>
        </div>
      </div>

      <!-- Formula Box -->
      <div class="mt-8 bg-blue-50 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">Haversine Formula</h3>
        <div class="text-center">
          <div class="text-sm text-gray-600 mb-2">
            Used to calculate the great-circle distance between two points on a sphere
          </div>
          <div class="text-xs text-gray-500">
            a = sin²(Δφ/2) + cos φ1 ⋅ cos φ2 ⋅ sin²(Δλ/2)<br>
            c = 2 ⋅ atan2( √a, √(1−a) )<br>
            d = R ⋅ c
          </div>
        </div>
      </div>
    </article>
  </section>

  <!-- Example Distances Section -->
  <section class="max-w-4xl mx-auto mt-8 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-map text-blue-600" aria-hidden="true"></i>
        Example Distances
      </h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border border-gray-200 rounded-lg p-4">
          <h3 class="font-semibold text-gray-800 mb-2">New York to London</h3>
          <p class="text-gray-600 text-sm mb-3">
            Point 1: 40.7128°N, 74.0060°W<br>
            Point 2: 51.5074°N, 0.1278°W
          </p>
          <p class="text-blue-600 font-medium">Distance: 5,570 km (3,459 miles)</p>
        </div>
        <div class="border border-gray-200 rounded-lg p-4">
          <h3 class="font-semibold text-gray-800 mb-2">Tokyo to Sydney</h3>
          <p class="text-gray-600 text-sm mb-3">
            Point 1: 35.6762°N, 139.6503°E<br>
            Point 2: 33.8688°S, 151.2093°E
          </p>
          <p class="text-blue-600 font-medium">Distance: 7,823 km (4,862 miles)</p>
        </div>
      </div>
    </article>
  </section>
</main>

<script>
// Haversine formula to calculate distance between two coordinates
function haversine(lat1, lon1, lat2, lon2, unit) {
  const R = {
    km: 6371,
    miles: 3959,
    meters: 6371000,
    nautical: 3440.065
  };

  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;
  
  const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);
  
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  const distance = R[unit] * c;
  
  return distance;
}

function updateConversion() {
  const lat1 = parseFloat(document.getElementById('lat1').value);
  const lon1 = parseFloat(document.getElementById('lon1').value);
  const lat2 = parseFloat(document.getElementById('lat2').value);
  const lon2 = parseFloat(document.getElementById('lon2').value);
  const unit = document.getElementById('unit').value;
  const resultField = document.getElementById('result');
  const copyBtn = document.getElementById('copyBtn');
  
  // Validate inputs
  if (isNaN(lat1) || isNaN(lon1) || isNaN(lat2) || isNaN(lon2) ||
      lat1 < -90 || lat1 > 90 || lat2 < -90 || lat2 > 90 ||
      lon1 < -180 || lon1 > 180 || lon2 < -180 || lon2 > 180) {
    resultField.value = '';
    copyBtn.classList.add('hidden');
    return;
  }
  
  const distance = haversine(lat1, lon1, lat2, lon2, unit);
  
  // Format result
  let formattedDistance;
  if (distance >= 1000) {
    formattedDistance = distance.toLocaleString('en-US', { 
      minimumFractionDigits: 2, 
      maximumFractionDigits: 2 
    });
  } else if (distance >= 1) {
    formattedDistance = distance.toFixed(2);
  } else {
    formattedDistance = distance.toFixed(4);
  }
  
  const unitLabel = {
    km: 'km',
    miles: 'mi',
    meters: 'm',
    nautical: 'nm'
  };
  
  resultField.value = formattedDistance + ' ' + unitLabel[unit];
  copyBtn.classList.remove('hidden');
}

function copyResult() {
  const result = document.getElementById('result').value;
  
  navigator.clipboard.writeText(result).then(() => {
    const copySuccess = document.getElementById('copySuccess');
    copySuccess.classList.remove('hidden');
    setTimeout(() => {
      copySuccess.classList.add('hidden');
    }, 3000);
  });
}

// Add event listeners
document.getElementById('lat1').addEventListener('input', updateConversion);
document.getElementById('lon1').addEventListener('input', updateConversion);
document.getElementById('lat2').addEventListener('input', updateConversion);
document.getElementById('lon2').addEventListener('input', updateConversion);
document.getElementById('unit').addEventListener('change', updateConversion);
document.getElementById('copyBtn').addEventListener('click', copyResult);
</script>

<?php include 'footer.php';?>
