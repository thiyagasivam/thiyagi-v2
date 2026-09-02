<?php include 'header.php';?>


<?php
// Function to calculate discount
function calculateDiscount($originalPrice, $discountPercent) {
    $discountAmount = $originalPrice * ($discountPercent / 100);
    $finalPrice = $originalPrice - $discountAmount;
    return [
        'discountAmount' => $discountAmount,
        'finalPrice' => $finalPrice
    ];
}

// Handle form submission
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $originalPrice = floatval($_POST['original_price']);
    $discountPercent = floatval($_POST['discount_percent']);
    
    if ($originalPrice > 0 && $discountPercent >= 0 && $discountPercent <= 100) {
        $result = calculateDiscount($originalPrice, $discountPercent);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Discount Calculator 2026 - Calculate Savings & Sale Prices Instantly</title>
    <meta name="description" content="Quickly determine sale prices, discounts, and final costs with our free 2026 calculator. Perfect for shoppers, businesses, and financial planning—no math required!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .calculator-box {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .calculator-box:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        .result-box {
            background: linear-gradient(135deg, #f6f7f9 0%, #e9ebee 100%);
        }
        input[type="number"]:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Discount Calculator</h1>
            <p class="text-gray-600">Calculate your final price after discount and see how much you save</p>
        </header>

        <div class="calculator-box bg-white rounded-xl p-6 mb-8">
            <form method="POST" class="space-y-4">
                <div>
                    <label for="original_price" class="block text-sm font-medium text-gray-700 mb-1">Original Price ($)</label>
                    <input type="number" step="0.01" min="0" name="original_price" id="original_price" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="100.00" required>
                </div>
                
                <div>
                    <label for="discount_percent" class="block text-sm font-medium text-gray-700 mb-1">Discount Percentage (%)</label>
                    <div class="relative">
                        <input type="number" step="0.01" min="0" max="100" name="discount_percent" id="discount_percent" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="20" required>
                        <span class="absolute right-3 top-2 text-gray-500">%</span>
                    </div>
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                    Calculate Discount
                </button>
            </form>
        </div>

        <?php if ($result): ?>
        <div class="result-box rounded-xl p-6 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Calculation Results</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">Original Price</p>
                    <p class="text-2xl font-bold text-gray-800">$<?= number_format($originalPrice, 2) ?></p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">Discount Percentage</p>
                    <p class="text-2xl font-bold text-blue-600"><?= number_format($discountPercent, 2) ?>%</p>
                </div>
                
                <div class="bg-green-50 p-4 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">You Save</p>
                    <p class="text-2xl font-bold text-green-600">$<?= number_format($result['discountAmount'], 2) ?></p>
                </div>
                
                <div class="bg-blue-50 p-4 rounded-lg shadow-sm">
                    <p class="text-sm text-gray-500">Final Price</p>
                    <p class="text-2xl font-bold text-blue-600">$<?= number_format($result['finalPrice'], 2) ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="mt-12 bg-white rounded-xl p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">About This Discount Calculator</h2>
            <p class="text-gray-600 mb-4">Our free online discount calculator helps you determine the final price of an item after applying a percentage discount. Simply enter the original price and the discount percentage, and our tool will calculate how much you'll save and the final price you'll pay.</p>
            
            <h3 class="text-lg font-medium text-gray-800 mb-2">How to Calculate Discount</h3>
            <p class="text-gray-600">The formula used in this calculator is:</p>
            <div class="bg-gray-100 p-3 rounded-lg my-3 font-mono">
                Final Price = Original Price - (Original Price × (Discount Percentage / 100))
            </div>
            <p class="text-gray-600">This calculation gives you both the amount saved and the final price after discount.</p>
        </div>
    </div>

<?php include 'footer.php';?>



