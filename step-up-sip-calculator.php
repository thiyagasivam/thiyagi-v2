<?php include 'header.php';?>

<?php
// Calculate Step-Up SIP returns
function calculateStepUpSIP($initialInvestment, $stepUpPercentage, $durationYears, $expectedReturnRate) {
    $monthlyReturnRate = pow(1 + ($expectedReturnRate / 100), 1/12) - 1;
    $totalMonths = $durationYears * 12;
    $totalInvestment = 0;
    $currentInvestment = $initialInvestment;
    $futureValue = 0;
    
    $yearlyBreakdown = [];
    
    for ($year = 1; $year <= $durationYears; $year++) {
        $yearlyInvestment = 0;
        $yearlyFutureValue = 0;
        
        for ($month = 1; $month <= 12; $month++) {
            $futureValue = ($futureValue + $currentInvestment) * (1 + $monthlyReturnRate);
            $totalInvestment += $currentInvestment;
            $yearlyInvestment += $currentInvestment;
            $yearlyFutureValue = $futureValue;
        }
        
        $yearlyBreakdown[$year] = [
            'investment' => $yearlyInvestment,
            'future_value' => $yearlyFutureValue
        ];
        
        // Apply step-up at the beginning of next year
        $currentInvestment = $currentInvestment * (1 + ($stepUpPercentage / 100));
    }
    
    return [
        'total_investment' => $totalInvestment,
        'estimated_returns' => $futureValue - $totalInvestment,
        'maturity_value' => $futureValue,
        'yearly_breakdown' => $yearlyBreakdown
    ];
}

// Handle form submission
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $initialInvestment = floatval($_POST['initial_investment'] ?? 5000);
    $stepUpPercentage = floatval($_POST['step_up_percentage'] ?? 10);
    $durationYears = intval($_POST['duration_years'] ?? 10);
    $expectedReturnRate = floatval($_POST['expected_return_rate'] ?? 12);
    
    $result = calculateStepUpSIP($initialInvestment, $stepUpPercentage, $durationYears, $expectedReturnRate);
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step-Up SIP Calculator | Plan Your Investments</title>
    <meta name="description" content="Calculate returns on your Step-Up SIP investments with our free online calculator. Plan your financial growth with increasing monthly investments.">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .slider-thumb::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #3b82f6;
            cursor: pointer;
            border-radius: 50%;
        }
        .slider-thumb::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #3b82f6;
            cursor: pointer;
            border-radius: 50%;
        }
        .tab-active {
            border-bottom: 3px solid #3b82f6;
            color: #3b82f6;
            font-weight: 600;
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-blue-600 text-white">
                <h1 class="text-2xl font-bold">Step-Up SIP Calculator</h1>
                <p class="mt-2">Calculate how your investments grow with increasing monthly SIP amounts</p>
            </div>
            
            <div class="p-6">
                <form method="POST" class="space-y-6">
                    <div class="space-y-4">
                        <!-- Initial Investment -->
                        <div>
                            <label for="initial_investment" class="block text-sm font-medium text-gray-700 mb-1">Initial Monthly Investment (₹)</label>
                            <input type="range" id="initial_investment" name="initial_investment" min="500" max="100000" step="500" 
                                   value="<?= $_POST['initial_investment'] ?? 5000 ?>" 
                                   class="w-full slider-thumb h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between mt-2">
                                <span class="text-sm text-gray-500">₹500</span>
                                <span class="text-sm text-gray-500">₹1,00,000</span>
                            </div>
                            <div class="mt-2">
                                <input type="number" id="initial_investment_display" 
                                       value="<?= $_POST['initial_investment'] ?? 5000 ?>" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <!-- Step-Up Percentage -->
                        <div>
                            <label for="step_up_percentage" class="block text-sm font-medium text-gray-700 mb-1">Annual Step-Up Percentage (%)</label>
                            <input type="range" id="step_up_percentage" name="step_up_percentage" min="0" max="50" step="1" 
                                   value="<?= $_POST['step_up_percentage'] ?? 10 ?>" 
                                   class="w-full slider-thumb h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between mt-2">
                                <span class="text-sm text-gray-500">0%</span>
                                <span class="text-sm text-gray-500">50%</span>
                            </div>
                            <div class="mt-2">
                                <input type="number" id="step_up_percentage_display" 
                                       value="<?= $_POST['step_up_percentage'] ?? 10 ?>" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <!-- Duration -->
                        <div>
                            <label for="duration_years" class="block text-sm font-medium text-gray-700 mb-1">Investment Duration (Years)</label>
                            <input type="range" id="duration_years" name="duration_years" min="1" max="30" step="1" 
                                   value="<?= $_POST['duration_years'] ?? 10 ?>" 
                                   class="w-full slider-thumb h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between mt-2">
                                <span class="text-sm text-gray-500">1 Year</span>
                                <span class="text-sm text-gray-500">30 Years</span>
                            </div>
                            <div class="mt-2">
                                <input type="number" id="duration_years_display" 
                                       value="<?= $_POST['duration_years'] ?? 10 ?>" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <!-- Expected Return -->
                        <div>
                            <label for="expected_return_rate" class="block text-sm font-medium text-gray-700 mb-1">Expected Annual Return Rate (%)</label>
                            <input type="range" id="expected_return_rate" name="expected_return_rate" min="1" max="30" step="0.5" 
                                   value="<?= $_POST['expected_return_rate'] ?? 12 ?>" 
                                   class="w-full slider-thumb h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between mt-2">
                                <span class="text-sm text-gray-500">1%</span>
                                <span class="text-sm text-gray-500">30%</span>
                            </div>
                            <div class="mt-2">
                                <input type="number" id="expected_return_rate_display" step="0.1"
                                       value="<?= $_POST['expected_return_rate'] ?? 12 ?>" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                        Calculate
                    </button>
                </form>
            </div>
            
            <?php if ($result): ?>
            <div class="p-6 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Calculation Results</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Total Investment</p>
                        <p class="text-2xl font-bold text-blue-600">₹<?= number_format($result['total_investment'], 2) ?></p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Estimated Returns</p>
                        <p class="text-2xl font-bold text-green-600">₹<?= number_format($result['estimated_returns'], 2) ?></p>
                    </div>
                    <div class="bg-purple-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Maturity Value</p>
                        <p class="text-2xl font-bold text-purple-600">₹<?= number_format($result['maturity_value'], 2) ?></p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <canvas id="growthChart" height="300"></canvas>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Investment</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year End Value</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($result['yearly_breakdown'] as $year => $data): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $year ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">₹<?= number_format($data['investment'], 2) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">₹<?= number_format($data['future_value'], 2) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">About Step-Up SIP Calculator</h2>
            <div class="prose max-w-none">
                <p>A Step-Up SIP (Systematic Investment Plan) calculator helps you estimate the returns on your mutual fund investments where you increase your investment amount periodically.</p>
                <p>With a Step-Up SIP, you can start with a smaller amount and gradually increase your investment as your income grows. This calculator shows how your investments grow over time with compounding returns.</p>
                <h3 class="font-bold mt-4">How Step-Up SIP Works:</h3>
                <ul class="list-disc pl-5">
                    <li>Start with an initial monthly investment amount</li>
                    <li>Increase your investment by a fixed percentage annually</li>
                    <li>Benefit from rupee cost averaging and compounding</li>
                    <li>Align investments with your growing income</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Sync range sliders with number inputs
        document.getElementById('initial_investment').addEventListener('input', function() {
            document.getElementById('initial_investment_display').value = this.value;
        });
        document.getElementById('initial_investment_display').addEventListener('input', function() {
            document.getElementById('initial_investment').value = this.value;
        });
        
        document.getElementById('step_up_percentage').addEventListener('input', function() {
            document.getElementById('step_up_percentage_display').value = this.value;
        });
        document.getElementById('step_up_percentage_display').addEventListener('input', function() {
            document.getElementById('step_up_percentage').value = this.value;
        });
        
        document.getElementById('duration_years').addEventListener('input', function() {
            document.getElementById('duration_years_display').value = this.value;
        });
        document.getElementById('duration_years_display').addEventListener('input', function() {
            document.getElementById('duration_years').value = this.value;
        });
        
        document.getElementById('expected_return_rate').addEventListener('input', function() {
            document.getElementById('expected_return_rate_display').value = this.value;
        });
        document.getElementById('expected_return_rate_display').addEventListener('input', function() {
            document.getElementById('expected_return_rate').value = this.value;
        });

        <?php if ($result): ?>
        // Draw chart if results exist
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('growthChart').getContext('2d');
            const years = <?= json_encode(array_keys($result['yearly_breakdown'])) ?>;
            const investments = <?= json_encode(array_column($result['yearly_breakdown'], 'investment')) ?>;
            const futureValues = <?= json_encode(array_column($result['yearly_breakdown'], 'future_value')) ?>;
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: years,
                    datasets: [
                        {
                            label: 'Investment',
                            data: investments,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.1,
                            fill: true
                        },
                        {
                            label: 'Future Value',
                            data: futureValues,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            tension: 0.1,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Investment Growth Over Time'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ₹' + context.raw.toLocaleString('en-IN');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function(value) {
                                    return '₹' + value.toLocaleString('en-IN');
                                }
                            }
                        }
                    }
                }
            });
        });
        <?php endif; ?>
    </script>

<?php include 'footer.php';?>



