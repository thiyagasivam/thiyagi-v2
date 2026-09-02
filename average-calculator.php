<?php include 'header.php';?>

<?php
// Function to calculate average
function calculateAverage($numbers) {
    $numbers = preg_replace('/[^0-9,.]/', '', $numbers);
    $numbersArray = array_map('floatval', explode(',', $numbers));
    $numbersArray = array_filter($numbersArray, 'is_numeric');
    
    if (empty($numbersArray)) {
        return null;
    }
    
    $sum = array_sum($numbersArray);
    $count = count($numbersArray);
    return $sum / $count;
}

// Handle form submission
$result = null;
$input = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['numbers'] ?? '';
    $result = calculateAverage($input);
}
?>

<!DOCTYPE html>
<html lang="en">


    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Average Calculator 2026 - Mean, Median, Mode Tool</title>
    <meta name="description" content="Instantly calculate mean, median, mode & range in 2026. 100% free online tool with instant results - no registration required. Perfect for students & professionals!">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --text: #1f2937;
            --light-bg: #f9fafb;
            --white: #ffffff;
            --border: #e5e7eb;
            --error: #dc2626;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-bg);
            color: var(--text);
            line-height: 1.6;
        }
        
        /*.container {*/
        /*    max-width: 800px;*/
        /*    margin: 0 auto;*/
        /*    padding: 2rem 1rem;*/
        /*}*/
        
        header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }
        
        .description {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .calculator {
            background-color: var(--white);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        input[type="text"], textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        
        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        button {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            width: 100%;
        }
        
        button:hover {
            background-color: var(--primary-hover);
        }
        
        .result {
            background-color: var(--white);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 1.5rem;
            display: <?php echo $result !== null ? 'block' : 'none'; ?>;
        }
        
        .result h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .result-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .error {
            color: var(--error);
            margin-top: 0.5rem;
            font-size: 0.875rem;
        }
        
        .example {
            background-color: var(--white);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .example h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        @media (max-width: 640px) {
            h1 {
                font-size: 2rem;
            }
            
            .container {
                padding: 1rem;
            }
            
            .calculator, .result, .example {
                padding: 1.5rem;
            }
        }
    </style>


<body>
    <div class="container">
        
            <h1>Average Calculator</h1>
            <p class="description">Calculate the mean value of any set of numbers quickly and easily</p>
        </header>
        
        <div class="calculator">
            <form method="POST">
                <div class="form-group">
                    <label for="numbers">Enter numbers (comma separated):</label>
                    <input type="text" name="numbers" id="numbers" value="<?php echo htmlspecialchars($input); ?>" placeholder="e.g., 10, 20, 30, 40, 50" required>
                    <p class="example-text">Separate numbers with commas (e.g., 5, 10, 15)</p>
                </div>
                <button type="submit">Calculate Average</button>
            </form>
        </div>
        
        <?php if ($result !== null): ?>
            <div class="result">
                <h2>Result</h2>
                <div class="result-value"><?php echo number_format($result, 2); ?></div>
                <p>The average of <?php echo count(explode(',', $input)); ?> numbers is <?php echo number_format($result, 2); ?></p>
            </div>
        <?php endif; ?>
        
        <div class="example">
            <h3>How to use this average calculator:</h3>
            <ol>
                <li>Enter numbers separated by commas in the input field</li>
                <li>Click "Calculate Average"</li>
                <li>View your result showing the mean value</li>
            </ol>
            <h3 style="margin-top: 1rem;">Example:</h3>
            <p>For numbers: 10, 20, 30, 40, 50</p>
            <p>The average would be: (10 + 20 + 30 + 40 + 50) / 5 = 30</p>
        </div>
    </div>

<?php include 'footer.php';?>





