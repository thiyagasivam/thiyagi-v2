<?php include 'header.php'; ?>
<?php
// Railway bike parcel charges calculation function
function calculateParcelCharges($distance, $bikeWeight, $packingCharges = 0, $insurance = 0) {
    // Base rates (these should be updated with actual railway parcel rates)
    $baseRate = 100; // Base charge
    $perKmRate = 5;   // Per km rate
    $perKgRate = 3;   // Per kg rate
    
    // Calculate charges
    $distanceCharge = $distance * $perKmRate;
    $weightCharge = $bikeWeight * $perKgRate;
    $subTotal = $baseRate + $distanceCharge + $weightCharge;
    $totalCharge = $subTotal + $packingCharges + $insurance;
    
    return [
        'base_rate' => $baseRate,
        'distance_charge' => $distanceCharge,
        'weight_charge' => $weightCharge,
        'packing_charges' => $packingCharges,
        'insurance' => $insurance,
        'sub_total' => $subTotal,
        'total_charge' => $totalCharge
    ];
}

// Handle form submission
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $distance = floatval($_POST['distance']);
    $bikeWeight = floatval($_POST['weight']);
    $packingCharges = floatval($_POST['packing_charges'] ?? 0);
    $insurance = floatval($_POST['insurance'] ?? 0);
    
    if ($distance > 0 && $bikeWeight > 0) {
        $result = calculateParcelCharges($distance, $bikeWeight, $packingCharges, $insurance);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Bike Parcel Charges Calculator 2026 - Indian Railways Two-Wheeler Transport Cost</title>
<meta name="description" content="Calculate Indian Railways bike parcel charges instantly. Check 2026 freight rates for two-wheelers (bikes, scooters) between stations with delivery time estimates and booking tips.">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .calculator-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .subtotal-item {
            border-top: 2px solid #e2e8f0;
            margin-top: 8px;
            padding-top: 8px;
        }
        .total-result {
            font-weight: bold;
            color: #2b6cb0;
            border-top: 2px solid #2b6cb0;
            margin-top: 8px;
            padding-top: 8px;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <div class="calculator-container bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Railway Bike Parcel Charges Calculator</h1>
            </div>
            
            <div class="p-6">
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="distance" class="block text-sm font-medium text-gray-700 mb-1">Distance (in km)</label>
                        <input type="number" name="distance" id="distance" step="0.01" min="1" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Enter distance in kilometers" required>
                    </div>
                    
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Bike Weight (in kg)</label>
                        <input type="number" name="weight" id="weight" step="0.1" min="1" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Enter bike weight in kilograms" required>
                    </div>
                    
                    <div>
                        <label for="packing_charges" class="block text-sm font-medium text-gray-700 mb-1">Packing Charges (₹)</label>
                        <input type="number" name="packing_charges" id="packing_charges" step="1" min="0" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Enter packing charges" value="0">
                    </div>
                    
                    <div>
                        <label for="insurance" class="block text-sm font-medium text-gray-700 mb-1">Insurance (₹)</label>
                        <input type="number" name="insurance" id="insurance" step="1" min="0" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Enter insurance amount" value="0">
                    </div>
                    
                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Calculate Charges
                        </button>
                    </div>
                </form>
                
                <?php if ($result): ?>
                <div class="mt-6 border-t border-gray-200 pt-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Calculation Results</h2>
                    
                    <div class="space-y-2">
                        <div class="result-item">
                            <span>Base Rate:</span>
                            <span>₹<?php echo number_format($result['base_rate'], 2); ?></span>
                        </div>
                        <div class="result-item">
                            <span>Distance Charge (<?php echo htmlspecialchars($_POST['distance']); ?> km × ₹5/km):</span>
                            <span>₹<?php echo number_format($result['distance_charge'], 2); ?></span>
                        </div>
                        <div class="result-item">
                            <span>Weight Charge (<?php echo htmlspecialchars($_POST['weight']); ?> kg × ₹3/kg):</span>
                            <span>₹<?php echo number_format($result['weight_charge'], 2); ?></span>
                        </div>
                        <div class="result-item">
                            <span>Packing Charges:</span>
                            <span>₹<?php echo number_format($result['packing_charges'], 2); ?></span>
                        </div>
                        <div class="result-item">
                            <span>Insurance:</span>
                            <span>₹<?php echo number_format($result['insurance'], 2); ?></span>
                        </div>
                        <div class="result-item subtotal-item">
                            <span>Subtotal:</span>
                            <span>₹<?php echo number_format($result['sub_total'], 2); ?></span>
                        </div>
                        <div class="result-item total-result">
                            <span>Total Estimated Charges:</span>
                            <span>₹<?php echo number_format($result['total_charge'], 2); ?></span>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-sm text-gray-500">
                        <p>Note: These are estimated charges. Actual charges may vary based on railway policies and other factors.</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>


