<?php include '../header.php';?>
<?php include 'breadcrumb-schema.php';?>
<?php
// Define A&N 2026 tariff rates (Domestic consumers - assumed rates)
$tariff_slabs = [
    ['from' => 0, 'to' => 50, 'rate' => 3.50, 'name' => '0-50 units'],
    ['from' => 51, 'to' => 150, 'rate' => 4.80, 'name' => '51-150 units'],
    ['from' => 151, 'to' => 300, 'rate' => 6.00, 'name' => '151-300 units'],
    ['from' => 301, 'to' => 500, 'rate' => 6.50, 'name' => '301-500 units'],
    ['from' => 501, 'to' => PHP_INT_MAX, 'rate' => 7.00, 'name' => '501+ units']
];

$fixed_charge = 70; // Monthly fixed charge
$subsidy_rate = 0.30; // 30% subsidy on first 100 units if applicable
$tax_rate = 0.05; // 5% tax

// Initialize variables
$units = isset($_POST['units']) ? (float)$_POST['units'] : 0;
$include_subsidy = isset($_POST['include_subsidy']) ? true : false;
$slab_details = [];
$energy_charge = 0;
$subsidy_amount = 0;
$tax_amount = 0;
$total_amount = 0;

// Calculate bill if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $units > 0) {
    $remaining_units = $units;
    
    // Calculate slab-wise charges
    foreach ($tariff_slabs as $slab) {
        if ($remaining_units <= 0) break;
        
        $slab_units = min($remaining_units, $slab['to'] - $slab['from'] + 1);
        if ($slab_units > 0) {
            $slab_cost = $slab_units * $slab['rate'];
            $energy_charge += $slab_cost;
            $slab_details[] = [
                'name' => $slab['name'],
                'units' => $slab_units,
                'rate' => $slab['rate'],
                'cost' => $slab_cost
            ];
            $remaining_units -= $slab_units;
        }
    }
    
    // Calculate subsidy
    if ($include_subsidy) {
        $subsidy_amount = min($units, 100) * $subsidy_rate;
    }
    
    // Calculate tax and total
    $taxable_amount = $energy_charge + $fixed_charge - $subsidy_amount;
    $tax_amount = max(0, $taxable_amount) * $tax_rate;
    $total_amount = $taxable_amount + $tax_amount;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andaman & Nicobar Electricity Bill Calculator 2026 | Power Department</title>
    <meta name="description" content="Calculate your A&N Islands electricity bill for 2026. Official estimate tool with current tariff rates and subsidy options.">
    <meta property="og:title" content="A&N Islands Electricity Bill Calculator 2026">
    <meta property="og:description" content="Calculate your Andaman & Nicobar power bill with official 2026 tariff rates">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none; }
            body { font-size: 14px; background: white; }
            .print-only { display: block; }
        }
        .print-only { display: none; }
    </style>
    <script type="application/ld+json">
<?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-200">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <header class="mb-8 text-center space-y-2">
            <div class="flex items-center justify-center mb-3 animate-fade-in-down">
                <i class="fas fa-bolt text-blue-500 dark:text-blue-400 text-4xl mr-3 transition-colors"></i>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                    A&N Electricity Bill Calculator
                </h1>
            </div>
            <p class="text-gray-600 dark:text-gray-300 font-medium">Electricity Department, Andaman & Nicobar Islands</p>
            <div class="flex items-center justify-center space-x-2">
                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 rounded-full text-sm">2026 Rates</span>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-full text-sm">Subsidy Ready</span>
            </div>
        </header>

        <!-- Calculator Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4">
                <h2 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-calculator mr-2"></i>
                    Bill Estimation Tool
                </h2>
            </div>

            <div class="p-6">
                <form method="POST" id="billForm">
                    <!-- Units Input -->
                    <div class="mb-6">
                        <label for="units" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-bolt text-yellow-500 mr-1"></i>
                            Units Consumed (kWh)
                        </label>
                        <input type="number" id="units" name="units" min="0" step="1"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter units" 
                               value="<?= htmlspecialchars($units) ?>"
                               required>
                    </div>

                    <!-- Subsidy Toggle -->
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" id="include_subsidy" name="include_subsidy"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                               <?= $include_subsidy ? 'checked' : '' ?>>
                        <label for="include_subsidy" class="ml-2 block text-sm text-gray-700">
                            Include Subsidy (30% off first 100 units)
                            <span class="text-blue-500 ml-1" title="Government subsidy for domestic consumers">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </label>
                    </div>

                    <!-- Calculate Button -->
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white py-3 px-6 rounded-lg mb-6 no-print
                            transform transition-all hover:scale-[1.02] active:scale-95">
                        <i class="fas fa-calculator mr-2"></i>
                        Calculate Bill
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </form>

                <!-- Results -->
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $units > 0): ?>
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-invoice-dollar mr-2 text-blue-500"></i>
                        Bill Breakdown
                    </h3>

                    <!-- Slab Details -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Consumption Details:</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Slab</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Units</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Rate</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($slab_details as $slab): ?>
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700"><?= $slab['name'] ?></td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700"><?= $slab['units'] ?></td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">₹<?= number_format($slab['rate'], 2) ?></td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">₹<?= number_format($slab['cost'], 2) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Charges Summary -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 p-6 rounded-xl mb-6 backdrop-blur-sm">
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Energy Charge:</span>
                                <span class="font-medium">₹<?= number_format($energy_charge, 2) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Fixed Charge:</span>
                                <span class="font-medium">₹<?= number_format($fixed_charge, 2) ?></span>
                            </div>
                            <?php if ($include_subsidy): ?>
                            <div class="flex justify-between text-green-600">
                                <span class="text-gray-600">Subsidy Deduction:</span>
                                <span class="font-medium">-₹<?= number_format($subsidy_amount, 2) ?></span>
                            </div>
                            <?php endif; ?>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax (5%):</span>
                                <span class="font-medium">₹<?= number_format($tax_amount, 2) ?></span>
                            </div>
                            <div class="border-t border-gray-200 my-2"></div>
                            <div class="flex justify-between">
                                <span class="text-gray-800 font-semibold">Total Amount:</span>
                                <span class="text-blue-600 dark:text-blue-400 font-bold text-2xl animate-pulse">
                                    ₹<?= number_format($total_amount, 2) ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3 no-print">
                        <button onclick="window.print()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded flex items-center justify-center">
                            <i class="fas fa-print mr-2"></i> Print
                        </button>
                        <button onclick="shareBill()" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded flex items-center justify-center">
                            <i class="fas fa-share-alt mr-2"></i> Share
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tariff Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-8 group">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4">
                <h2 class="text-xl font-semibold flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    2026 Tariff Information
                </h2>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Slab</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Rate (₹/kWh)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($tariff_slabs as $slab): ?>
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700"><?= $slab['name'] ?></td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">₹<?= number_format($slab['rate'], 2) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
         <!-- Dark Mode Toggle -->
         <div class="fixed bottom-4 right-4 no-print">
             <button onclick="toggleDarkMode()" class="p-2 rounded-full bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl
                         text-gray-800 dark:text-gray-200 transition-all duration-300">
                 <i class="fas fa-moon hidden dark:inline-block"></i>
                 <i class="fas fa-sun dark:hidden"></i>
             </button>
         </div>
     </div>
       
    </div>

    <script>
        // Share function
        function shareBill() {
            const units = document.getElementById('units').value || 0;
            const total = document.querySelector('#totalAmount') ? document.querySelector('#totalAmount').textContent : '₹0.00';
            const message = `My A&N Islands electricity bill estimate for ${units} units is ${total}. Calculate yours: ${window.location.href}`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'A&N Electricity Bill Estimate',
                    text: message,
                    url: window.location.href
                }).catch(err => {
                    console.log('Error sharing:', err);
                    fallbackShare();
                });
            } else {
                fallbackShare();
            }
            
            function fallbackShare() {
                const shareUrl = `https://wa.me/?text=${encodeURIComponent(message)}`;
                window.open(shareUrl, '_blank');
            }
        }
    </script>
    
    <script>
        // Dark mode toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        }

        // Initialize dark mode
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">
        Other State Electricity Calculators
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 px-4 mb-8">
        <div class="state-card group">
            <h3>Bihar</h3>
            <a href="https://www.thiyagi.com/electricity-board/bihar-electricity-bill-calculator" target="_blank">Bihar Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Goa</h3>
            <a href="https://www.thiyagi.com/electricity-board/goa-electricity-bill-calculator" target="_blank">Goa Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Delhi</h3>
            <a href="https://www.thiyagi.com/electricity-board/delhi-electricity-bill-calculator" target="_blank">Delhi Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Himachal Pradesh</h3>
            <a href="https://www.thiyagi.com/electricity-board/hpsebl-electricity-bill-calculator" target="_blank">HPSEBL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Kerala</h3>
            <a href="https://www.thiyagi.com/electricity-board/kseb-bill-calculator" target="_blank">KSEB Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Uttar Pradesh</h3>
            <a href="https://www.thiyagi.com/electricity-board/uppcl-bill-calculator" target="_blank">UPPCL Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Karnataka</h3>
            <a href="https://www.thiyagi.com/electricity-board/karnataka-electricity-bill-calculator" target="_blank">Karnataka Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Haryana</h3>
            <a href="https://www.thiyagi.com/electricity-board/haryana-electricity-bill-calculator" target="_blank">Haryana Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Nagaland</h3>
            <a href="https://www.thiyagi.com/electricity-board/nagaland-electricity-bill-calculator" target="_blank">Nagaland Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Jharkhand</h3>
            <a href="https://www.thiyagi.com/electricity-board/jbvnl-electricity-bill-calculator" target="_blank">JBVNL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Uttarakhand</h3>
            <a href="https://www.thiyagi.com/electricity-board/upcl-electricity-bill-calculator-uttarakhand" target="_blank">UPCL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Assam</h3>
            <a href="https://www.thiyagi.com/electricity-board/apdcl-electricity-bill-calculator" target="_blank">APDCL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Andaman</h3>
            <a href="https://www.thiyagi.com/electricity-board/andaman-electricity-bill-calculator" target="_blank">Andaman Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Ladakh</h3>
            <a href="https://www.thiyagi.com/electricity-board/ladakh-electricity-bill-calculator" target="_blank">Ladakh Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>West Bengal</h3>
            <a href="https://www.thiyagi.com/electricity-board/wbsedcl-bill-calculator" target="_blank">WBSEDCL Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Tripura</h3>
            <a href="https://www.thiyagi.com/electricity-board/tsecl-electricity-bill-calculator" target="_blank">TSECL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Telangana</h3>
            <a href="https://www.thiyagi.com/electricity-board/tsspdcl-electricity-bill-calculator" target="_blank">TSSPDCL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Tamil Nadu</h3>
            <a href="https://www.thiyagi.com/electricity-board/tneb-electricity-bill-calculator" target="_blank">TNEB Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Manipur</h3>
            <a href="https://www.thiyagi.com/electricity-board/manipur-electricity-bill-calculator" target="_blank">Manipur Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Chhattisgarh</h3>
            <a href="https://www.thiyagi.com/electricity-board/cspdcl-electricity-bill-calculator" target="_blank">CSPDCL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Madhya Pradesh</h3>
            <a href="https://www.thiyagi.com/electricity-board/mp-electricity-bill-calculator" target="_blank">MP Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Punjab</h3>
            <a href="https://www.thiyagi.com/electricity-board/pspcl-bill-calculator" target="_blank">PSPCL Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Sikkim</h3>
            <a href="https://www.thiyagi.com/electricity-board/sikkim-electricity-bill-calculator" target="_blank">Sikkim Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Odisha</h3>
            <a href="https://www.thiyagi.com/electricity-board/odisha-electricity-bill-calculator" target="_blank">Odisha Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Rajasthan</h3>
            <a href="https://www.thiyagi.com/electricity-board/rajasthan-electricity-bill-calculator" target="_blank">Rajasthan Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Gujarat</h3>
            <a href="https://www.thiyagi.com/electricity-board/gujarat-electricity-bill-calculator" target="_blank">Gujarat Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Meghalaya</h3>
            <a href="https://www.thiyagi.com/electricity-board/meghalaya-electricity-bill-calculator" target="_blank">Meghalaya Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Andhra Pradesh</h3>
            <a href="https://www.thiyagi.com/electricity-board/apspdcl-electricity-bill-calculator" target="_blank">APSPDCL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Jammu & Kashmir</h3>
            <a href="https://www.thiyagi.com/electricity-board/jpdcl-electricity-bill-calculator-kashmir" target="_blank">JPDCL Electricity Bill Calculator</a>
        </div>
        
        <div class="state-card">
            <h3>Mizoram</h3>
            <a href="https://www.thiyagi.com/electricity-board/mizoram-electricity-bill-calculator" target="_blank">Mizoram Electricity Bill Calculator</a>
        </div>
    </div>
   <style>
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out;
        }

        .state-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e5e7eb;
            background: linear-gradient(to bottom right, #ffffff 0%, #f8fafc 100%);
        }

        .dark .state-card {
            background: linear-gradient(to bottom right, #1f2937 0%, #111827 100%);
            border-color: #374151;
        }

        .state-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .state-card h3 {
            @apply text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3 pb-2 border-b border-gray-200 dark:border-gray-700;
        }

        .state-card a {
            @apply inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800
                   text-white rounded-lg transition-all duration-300 transform hover:scale-[1.02] active:scale-95
                   text-sm font-medium w-full;
        }

        .dark .state-card a {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
<?php include '../footer.php';?>


