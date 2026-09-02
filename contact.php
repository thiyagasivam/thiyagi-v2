<?php

include 'header.php';

?>
<title>Contact Thiyagi Tools 2026 - Get Professional Support | 25+ Years Experience</title>
<meta name="description" content="Contact Thiyagi Tools for professional support, feedback, and inquiries. Get help with our calculators, converters, and online tools. Professional support with 25+ years of digital expertise since 1999.">
<meta name="keywords" content="contact Thiyagi Tools, customer support, help desk, tool support, professional assistance 2026">

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Contact Thiyagi Tools 2026</h1>
    <p class="text-xl text-gray-600 text-center mb-12">Get professional support and assistance - Expert help with 25+ years of experience</p>
  </div>
</div>

<?php

// Initialize message variables
$success_message = '';
$error_message = '';
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    $name    = trim($_POST["name"]);
    $email   = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);
    $consent = isset($_POST["consent"]);

    // Simple validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }
    if (empty($subject)) {
        $errors[] = "Please select a subject.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }
    if (!$consent) {
        $errors[] = "You must agree to the privacy policy.";
    }

    // If no errors, send mail
    if (empty($errors)) {
        $email_body = "Name: $name\nSubject: $subject\nEmail: $email\nMessage:\n$message";
        $to      = "support@thiyagi.com"; // Your email
        $cc      = "kannasivamps@gmail.com";  // Optional CC
        $email_subject = "Thiyagi Contact Form";
        $headers = "From: $name <$email>\r\n";
        $headers .= "Cc: $cc";

        if (@mail($to, $email_subject, $email_body, $headers)) {
            $success_message = "Thank you! Your message has been sent successfully.";
            // Delay refresh to show success message and then redirect to home page
            echo "<script>
                setTimeout(function() {
                    alert('$success_message'); // Show success message
                    window.location.href = 'index.php'; // Redirect to home page
                }, 2000); // 2 seconds delay before redirect
            </script>";
        } else {
            $error_message = "Oops! Something went wrong while sending your message.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - Thiyagi Tools</title>
  <!-- Add Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  <style>
    :root {
      --primary: #6e8efb;
      --secondary: #a777e3;
    }
    body {
      /* background-color: #f8f9fa; - handled by bg-gray-100 */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .contact-hero {
      /* Converted using Tailwind bg-gradient-to-br, from-[var(--primary)], to-[var(--secondary)] */
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      padding: 80px 0; /* py-20 */
      margin-bottom: 50px; /* mb-12 */
    }
    .contact-card {
      /* border: none; - Tailwind default */
      border-radius: 10px; /* rounded-lg */
      box-shadow: 0 5px 15px rgba(0,0,0,0.05); /* shadow-md */
      transition: transform 0.3s; /* transition duration handled by Tailwind */
      padding: 30px; /* p-8 */
      height: 100%; /* h-full */
    }
    .contact-card:hover {
      transform: translateY(-5px); /* hover:-translate-y-1.5 */
    }
    .contact-icon {
      font-size: 2rem; /* text-3xl */
      margin-bottom: 20px; /* mb-5 */
      color: var(--primary); /* text-[var(--primary)] */
    }
    /* Custom focus state - Tailwind can do this, but this is simpler */
    .form-control:focus {
      border-color: var(--primary); /* border-[var(--primary)] */
      box-shadow: 0 0 0 0.25rem rgba(110, 142, 251, 0.25); /* ring-4 ring-blue-200 */
    }
    /* Gradient Button - Tailwind doesn't easily do arbitrary solid colors like Bootstrap btn-primary */
    .btn-primary {
      background-color: var(--primary); /* bg-[var(--primary)] */
      border-color: var(--primary); /* border-[var(--primary)] */
      color: white; /* text-white */
      padding: 0.5rem 1rem; /* py-2 px-4 */
      border-radius: 0.375rem; /* rounded */
      font-weight: 500; /* font-medium */
    }
    .btn-primary:hover {
        opacity: 0.9; /* hover:opacity-90 */
    }
    /* Custom Alert Colors */
    .alert-success {
      /* background-color: #d1e7dd; - bg-green-100 */
      /* border-color: #badbcc; - border-green-200 */
      /* color: #0f5132; - text-green-800 */
      /* Using Tailwind classes directly in HTML is preferred */
    }
    .alert-danger {
      /* background-color: #f8d7da; - bg-red-100 */
      /* border-color: #f5c2c7; - border-red-200 */
      /* color: #842029; - text-red-800 */
       /* Using Tailwind classes directly in HTML is preferred */
    }
  </style>


<body class="bg-gray-100">
  <!-- Hero Section -->
  <section class="contact-hero text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Our Team</h1>
      <p class="text-xl md:text-2xl">Have questions, suggestions, or partnership inquiries? We'd love to hear from you.</p>
    </div>
  </section>

  <!-- Contact Options -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
    <?php if (!empty($success_message)): ?>
      <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded mb-6 text-center"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <?php if (!empty($error_message)): ?>
      <div class="bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded mb-6 text-center"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <div class="bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded mb-6">
        <h4 class="font-semibold text-lg mb-2">Please fix these errors:</h4>
        <ul class="list-disc pl-5">
          <?php foreach ($errors as $err): ?>
            <li><?php echo $err; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12"> <!-- row g-4 -> gap-6 -->
      <div>
        <div class="contact-card text-center bg-white"> <!-- contact-card text-center -> contact-card text-center bg-white -->
          <i class="fas fa-envelope contact-icon"></i> <!-- contact-icon -> contact-icon -->
          <h3 class="text-xl font-semibold mb-2">Email Us</h3> <!-- h3 -> text-xl font-semibold mb-2 -->
          <p class="mb-4">For general inquiries and support:</p> <!-- mb-4 -->
          <a href="mailto:support@thiyagi.com" class="inline-block px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition duration-300">support@thiyagi.com</a> <!-- btn btn-outline-primary -> inline-block px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 -->
        </div>
      </div>
      <div>
        <div class="contact-card text-center bg-white">
          <i class="fas fa-lightbulb contact-icon"></i>
          <h3 class="text-xl font-semibold mb-2">Suggest a Tool</h3>
          <p class="mb-4">Have an idea for a new tool?</p>
          <a href="mailto:support@thiyagi.com" class="inline-block px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition duration-300">support@thiyagi.com</a>
        </div>
      </div>
      <div>
        <div class="contact-card text-center bg-white">
          <i class="fas fa-handshake contact-icon"></i>
          <h3 class="text-xl font-semibold mb-2">Partnerships</h3>
          <p class="mb-4">For business collaborations:</p>
          <a href="mailto:support@thiyagi.com" class="inline-block px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition duration-300">support@thiyagi.com</a>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="flex justify-center"> <!-- row justify-content-center -> flex justify-center -->
      <div class="w-full max-w-4xl"> <!-- col-lg-8 -> w-full max-w-4xl -->
        <div class="contact-card bg-white"> <!-- contact-card -> contact-card bg-white -->
          <h2 class="text-center text-2xl font-bold mb-6">Send Us a Message</h2> <!-- text-center mb-4 -> text-center text-2xl font-bold mb-6 -->
          <form action="" method="post">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> <!-- row g-3 -> grid grid-cols-1 md:grid-cols-2 gap-4 -->
              <div>
                <label for="name" class="block mb-2 font-medium">Your Name</label> <!-- form-label -> block mb-2 font-medium -->
                <input type="text" class="form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none" id="name" name="name" required value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"> <!-- form-control -> form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none -->
              </div>
              <div>
                <label for="email" class="block mb-2 font-medium">Email Address</label>
                <input type="email" class="form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none" id="email" name="email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
              </div>
              <div class="md:col-span-2"> <!-- col-12 -> md:col-span-2 -->
                <label for="subject" class="block mb-2 font-medium">Subject</label>
                <select class="form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none" id="subject" name="subject" required> <!-- form-select -> form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none -->
                  <option value="" disabled <?php echo empty($subject) ? 'selected' : ''; ?>>Select a topic</option>
                  <option value="support" <?php if (isset($subject) && $subject == 'support') echo 'selected'; ?>>Technical Support</option>
                  <option value="suggestion" <?php if (isset($subject) && $subject == 'suggestion') echo 'selected'; ?>>Tool Suggestion</option>
                  <option value="business" <?php if (isset($subject) && $subject == 'business') echo 'selected'; ?>>Business Inquiry</option>
                  <option value="other" <?php if (isset($subject) && $subject == 'other') echo 'selected'; ?>>Other</option>
                </select>
              </div>
              <div class="md:col-span-2">
                <label for="message" class="block mb-2 font-medium">Your Message</label>
                <textarea class="form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none" id="message" name="message" rows="5" required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea> <!-- form-control -> form-control w-full px-4 py-2 border border-gray-300 rounded focus:outline-none -->
              </div>
              <div class="md:col-span-2">
                <div class="flex items-start"> <!-- form-check -> flex items-start -->
                  <input class="mt-1 mr-2" type="checkbox" id="consent" name="consent" required> <!-- form-check-input -> mt-1 mr-2 -->
                  <label class="form-check-label" for="consent"> <!-- form-check-label -> form-check-label -->
                    I agree to the <a href="privacy" class="text-blue-600 hover:underline">Privacy Policy</a> <!-- text-blue-600 hover:underline -->
                  </label>
                </div>
              </div>
              <div class="md:col-span-2 text-center"> <!-- col-12 text-center -> md:col-span-2 text-center -->
                <button type="submit" class="btn-primary">Send Message</button> <!-- btn btn-primary px-4 py-2 -> btn-primary -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts (Bootstrap JS removed) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
<?php include 'footer.php'; ?>


