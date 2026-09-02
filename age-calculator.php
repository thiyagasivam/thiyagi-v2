<?php include 'header.php';?>

<?php
// Function to calculate age
function calculateAge($birthDate) {
    $today = new DateTime();
    $birthDate = new DateTime($birthDate);
    $age = $today->diff($birthDate);
    return $age;
}

// Handle form submission
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $birthDate = $_POST['birth_date'];
    if (!empty($birthDate)) {
        $result = calculateAge($birthDate);
    }
}

// Generate canonical URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$uri = strtok($_SERVER['REQUEST_URI'], '?');
$canonicalUrl = $protocol . "://" . $host . $uri;
?>

<!DOCTYPE html>
<html lang="en">

    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>" />
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "Age Calculator",
      "url": "https://www.thiyagai.com/age-calculator",
      "description": "Instant age calculation tool with birth year and date difference features",
      "applicationCategory": "UtilityApplication"
    }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Age Calculator 2026 - Find Your Exact Age in Seconds | Thiyagai.com</title>
    <meta name="description" content="Calculate your exact age, birth year, or time between dates with our free Age Calculator 2026. Quick, easy & accurate! Try now at Thiyagai.com.">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #f9fafb;
            --text-color: #1f2937;
            --light-gray: #e5e7eb;
            --border-radius: 0.5rem;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        /*body {*/
        /*    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;*/
        /*    line-height: 1.6;*/
        /*    color: var(--text-color);*/
        /*    background-color: var(--secondary-color);*/
        /*    padding: 0;*/
        /*    margin: 0;*/
        /*}*/
        
        /*.container {*/
        /*    max-width: 800px;*/
        /*    margin: 0 auto;*/
        /*    padding: 2rem;*/
        /*}*/
        
        header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .description {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 2rem;
        }
        
        .calculator-card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        input[type="date"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 1rem;
        }
        
        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #4338ca;
        }
        
        .result-card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            display: <?php echo $result ? 'block' : 'none'; ?>;
        }
        
        .result-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .age-result {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .age-box {
            text-align: center;
            padding: 1rem;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
        }
        
        .age-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .age-label {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        @media (max-width: 640px) {
            .container {
                padding: 1rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .age-result {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>


<body>
    <div class="container">
        
            <h1>Age Calculator</h1>
            <p class="description">Calculate your exact age in years, months, days, and more</p>
        </header>
        
        <div class="calculator-card">
            <form method="POST">
                <div class="form-group">
                    <label for="birth_date">Date of Birth</label>
                    <input type="date" name="birth_date" id="birth_date" required>
                </div>
                <button type="submit">Calculate Age</button>
            </form>
        </div>
        
        <?php if ($result): ?>
        <div class="result-card">
            <h2 class="result-title">Your Age</h2>
            <div class="age-result">
                <div class="age-box">
                    <div class="age-value"><?php echo $result->y; ?></div>
                    <div class="age-label">Years</div>
                </div>
                <div class="age-box">
                    <div class="age-value"><?php echo $result->m; ?></div>
                    <div class="age-label">Months</div>
                </div>
                <div class="age-box">
                    <div class="age-value"><?php echo $result->d; ?></div>
                    <div class="age-label">Days</div>
                </div>
                <div class="age-box">
                    <div class="age-value"><?php echo $result->days; ?></div>
                    <div class="age-label">Total Days</div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php';?>


