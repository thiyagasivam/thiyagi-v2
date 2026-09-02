<?php include 'header.php';?>

<?php
// Function to calculate confidence interval
function calculateCI($mean, $stdDev, $sampleSize, $confidenceLevel) {
    // Z-scores for common confidence levels
    $zScores = [
        80 => 1.282,
        85 => 1.440,
        90 => 1.645,
        95 => 1.960,
        99 => 2.576,
        99.5 => 2.807,
        99.9 => 3.291
    ];

    if (!isset($zScores[$confidenceLevel])) {
        return ['error' => 'Invalid confidence level selected'];
    }

    $z = $zScores[$confidenceLevel];
    $marginOfError = $z * ($stdDev / sqrt($sampleSize));
    $lowerBound = $mean - $marginOfError;
    $upperBound = $mean + $marginOfError;

    return [
        'margin_of_error' => $marginOfError,
        'lower_bound' => $lowerBound,
        'upper_bound' => $upperBound,
        'z_score' => $z
    ];
}

// Handle form submission
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mean = filter_input(INPUT_POST, 'mean', FILTER_VALIDATE_FLOAT);
    $stdDev = filter_input(INPUT_POST, 'std_dev', FILTER_VALIDATE_FLOAT);
    $sampleSize = filter_input(INPUT_POST, 'sample_size', FILTER_VALIDATE_INT);
    $confidenceLevel = filter_input(INPUT_POST, 'confidence_level', FILTER_VALIDATE_FLOAT);

    if ($mean !== false && $stdDev !== false && $sampleSize !== false && $confidenceLevel !== false) {
        $result = calculateCI($mean, $stdDev, $sampleSize, $confidenceLevel);
    } else {
        $result = ['error' => 'Invalid input values'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Confidence Interval Calculator 2026 | Thiyagai.com</title>
    <meta name="description" content="Thiyagai.com's 2026 Confidence Interval Calculator: Compute accurate statistical ranges (95% or 99% CI) instantly. Free tool for researchers & students. No sign-up!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom enhancements */
        .input-group {
            transition: all 0.3s ease;
        }
        .input-group:focus-within {
            transform: translateY(-2px);
        }
        .result-box {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        @media (max-width: 640px) {
            .form-container {
                padding: 1rem;
            }
        }
    </style>


<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Confidence Interval Calculator</h1>
            <p class="text-gray-600">Calculate the confidence interval for your sample data with statistical precision</p>
        </header>

        <div class="bg-white rounded-xl shadow-md overflow-hidden form-container">
            <form method="POST" class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="input-group">
                        <label for="mean" class="block text-sm font-medium text-gray-700 mb-1">Sample Mean (x̄)</label>
                        <input type="number" step="any" id="mean" name="mean" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter sample mean">
                    </div>

                    <div class="input-group">
                        <label for="std_dev" class="block text-sm font-medium text-gray-700 mb-1">Standard Deviation (σ)</label>
                        <input type="number" step="any" id="std_dev" name="std_dev" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter standard deviation">
                    </div>

                    <div class="input-group">
                        <label for="sample_size" class="block text-sm font-medium text-gray-700 mb-1">Sample Size (n)</label>
                        <input type="number" min="2" id="sample_size" name="sample_size" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter sample size">
                    </div>

                    <div class="input-group">
                        <label for="confidence_level" class="block text-sm font-medium text-gray-700 mb-1">Confidence Level</label>
                        <select id="confidence_level" name="confidence_level" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="80">80%</option>
                            <option value="85">85%</option>
                            <option value="90" selected>90%</option>
                            <option value="95">95%</option>
                            <option value="99">99%</option>
                            <option value="99.5">99.5%</option>
                            <option value="99.9">99.9%</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105">
                        Calculate Confidence Interval
                    </button>
                </div>
            </form>
        </div>

        <?php if ($result): ?>
            <div class="mt-8 bg-white rounded-xl result-box p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Results</h2>
                
                <?php if (isset($result['error'])): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <p><?php echo htmlspecialchars($result['error']); ?></p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-blue-800">Margin of Error</h3>
                            <p class="text-2xl font-bold text-blue-600">± <?php echo number_format($result['margin_of_error'], 4); ?></p>
                        </div>
                        
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-green-800">Lower Bound</h3>
                            <p class="text-2xl font-bold text-green-600"><?php echo number_format($result['lower_bound'], 4); ?></p>
                        </div>
                        
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-purple-800">Upper Bound</h3>
                            <p class="text-2xl font-bold text-purple-600"><?php echo number_format($result['upper_bound'], 4); ?></p>
                        </div>
                    </div>
                    
                    <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-800 mb-2">Interpretation</h3>
                        <p class="text-gray-700">
                            We can be <?php echo htmlspecialchars($_POST['confidence_level'] ?? '90'); ?>% confident that the true population mean lies between 
                            <?php echo number_format($result['lower_bound'], 4); ?> and <?php echo number_format($result['upper_bound'], 4); ?>.
                        </p>
                        <p class="text-gray-700 mt-2">
                            Z-score used: <?php echo $result['z_score']; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="mt-12 bg-blue-50 p-6 rounded-lg">
            <h2 class="text-xl font-bold text-gray-800 mb-3">About Confidence Intervals</h2>
            <p class="text-gray-700 mb-3">
                A confidence interval gives an estimated range of values which is likely to include an unknown population parameter. 
                The width of the confidence interval gives us some idea about how uncertain we are about the unknown parameter.
            </p>
            <p class="text-gray-700">
                This calculator uses the normal distribution (Z-distribution) to calculate the confidence interval for a population mean 
                when the population standard deviation is known.
            </p>
        </div>
    </div>

<?php include 'footer.php';?>


