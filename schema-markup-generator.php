<?php include 'header.php';?>

<?php
// Handle form submission
$schemaMarkup = '';
$schemaType = 'Article';
$error = '';

// All supported schema types
$allSchemaTypes = [
    'Article' => 'Article',
    // 'BlogPosting' => 'Blog Post',
    // 'NewsArticle' => 'News Article',
    'Product' => 'Product',
    'Book' => 'Book',
    'Course' => 'Course',
    'Event' => 'Event',
    'JobPosting' => 'Job Posting',
    'LocalBusiness' => 'Local Business',
    'Organization' => 'Organization',
    'Person' => 'Person',
    'Recipe' => 'Recipe',
    'Review' => 'Review',
    'VideoObject' => 'Video',
    'WebPage' => 'Web Page',
    'WebSite' => 'Web Site'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $schemaType = $_POST['schema_type'] ?? 'Article';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $url = $_POST['url'] ?? '';
    
    try {
        switch ($schemaType) {
            case 'Article':
                $schemaMarkup = generateArticleSchema($title, $description, $url, $_POST);
                break;
            case 'BlogPosting':
                $schemaMarkup = generateBlogPostingSchema($title, $description, $url, $_POST);
                break;
            case 'NewsArticle':
                $schemaMarkup = generateNewsArticleSchema($title, $description, $url, $_POST);
                break;
            case 'Product':
                $schemaMarkup = generateProductSchema($title, $description, $url, $_POST);
                break;
            case 'Book':
                $schemaMarkup = generateBookSchema($title, $description, $url, $_POST);
                break;
            case 'Course':
                $schemaMarkup = generateCourseSchema($title, $description, $url, $_POST);
                break;
            case 'Event':
                $schemaMarkup = generateEventSchema($title, $description, $url, $_POST);
                break;
            case 'JobPosting':
                $schemaMarkup = generateJobPostingSchema($title, $description, $url, $_POST);
                break;
            case 'LocalBusiness':
                $schemaMarkup = generateLocalBusinessSchema($title, $description, $url, $_POST);
                break;
            case 'Organization':
                $schemaMarkup = generateOrganizationSchema($title, $description, $url, $_POST);
                break;
            case 'Person':
                $schemaMarkup = generatePersonSchema($title, $description, $url, $_POST);
                break;
            case 'Recipe':
                $schemaMarkup = generateRecipeSchema($title, $description, $url, $_POST);
                break;
            case 'Review':
                $schemaMarkup = generateReviewSchema($title, $description, $url, $_POST);
                break;
            case 'VideoObject':
                $schemaMarkup = generateVideoObjectSchema($title, $description, $url, $_POST);
                break;
            case 'WebPage':
                $schemaMarkup = generateWebPageSchema($title, $description, $url, $_POST);
                break;
            case 'WebSite':
                $schemaMarkup = generateWebSiteSchema($title, $description, $url, $_POST);
                break;
            default:
                $schemaMarkup = generateArticleSchema($title, $description, $url, $_POST);
        }
    } catch (Exception $e) {
        $error = "Error generating schema: " . $e->getMessage();
    }
}

// Helper function to format date for schema
function formatDateForSchema($date) {
    if (empty($date)) return '';
    return date('c', strtotime($date));
}

// Schema generation functions
function generateArticleSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Article",
        "headline" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['date_published'])) {
        $schema["datePublished"] = formatDateForSchema($data['date_published']);
    }
    
    if (!empty($data['date_modified'])) {
        $schema["dateModified"] = formatDateForSchema($data['date_modified']);
    }
    
    if (!empty($data['author_name'])) {
        $schema["author"] = [
            "@type" => "Person",
            "name" => $data['author_name']
        ];
    }
    
    if (!empty($data['publisher_name'])) {
        $schema["publisher"] = [
            "@type" => "Organization",
            "name" => $data['publisher_name']
        ];
        
        if (!empty($data['publisher_logo'])) {
            $schema["publisher"]["logo"] = [
                "@type" => "ImageObject",
                "url" => $data['publisher_logo']
            ];
        }
    }
    
    if (!empty($data['image_url'])) {
        $schema["image"] = $data['image_url'];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateBlogPostingSchema($title, $description, $url, $data) {
    $schema = generateArticleSchema($title, $description, $url, $data);
    $schema = json_decode($schema, true);
    $schema["@type"] = "BlogPosting";
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateNewsArticleSchema($title, $description, $url, $data) {
    $schema = generateArticleSchema($title, $description, $url, $data);
    $schema = json_decode($schema, true);
    $schema["@type"] = "NewsArticle";
    
    if (!empty($data['dateline'])) {
        $schema["dateline"] = $data['dateline'];
    }
    
    if (!empty($data['print_column'])) {
        $schema["printColumn"] = $data['print_column'];
    }
    
    if (!empty($data['print_page'])) {
        $schema["printPage"] = $data['print_page'];
    }
    
    if (!empty($data['print_section'])) {
        $schema["printSection"] = $data['print_section'];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateProductSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Product",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['image_url'])) {
        $schema["image"] = $data['image_url'];
    }
    
    if (!empty($data['brand'])) {
        $schema["brand"] = [
            "@type" => "Brand",
            "name" => $data['brand']
        ];
    }
    
    if (!empty($data['sku'])) {
        $schema["sku"] = $data['sku'];
    }
    
    if (!empty($data['gtin'])) {
        $schema["gtin"] = $data['gtin'];
    }
    
    if (!empty($data['price']) || !empty($data['price_currency'])) {
        $schema["offers"] = [
            "@type" => "Offer",
            "price" => $data['price'] ?? '',
            "priceCurrency" => $data['price_currency'] ?? 'USD'
        ];
        
        if (!empty($data['price_valid_until'])) {
            $schema["offers"]["priceValidUntil"] = formatDateForSchema($data['price_valid_until']);
        }
        
        if (!empty($data['availability'])) {
            $schema["offers"]["availability"] = $data['availability'];
        }
    }
    
    if (!empty($data['rating_value']) || !empty($data['review_count'])) {
        $schema["aggregateRating"] = [
            "@type" => "AggregateRating",
            "ratingValue" => $data['rating_value'] ?? '',
            "reviewCount" => $data['review_count'] ?? ''
        ];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateBookSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Book",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['image_url'])) {
        $schema["image"] = $data['image_url'];
    }
    
    if (!empty($data['author_name'])) {
        $schema["author"] = [
            "@type" => "Person",
            "name" => $data['author_name']
        ];
    }
    
    if (!empty($data['isbn'])) {
        $schema["isbn"] = $data['isbn'];
    }
    
    if (!empty($data['publisher'])) {
        $schema["publisher"] = $data['publisher'];
    }
    
    if (!empty($data['date_published'])) {
        $schema["datePublished"] = formatDateForSchema($data['date_published']);
    }
    
    if (!empty($data['book_edition'])) {
        $schema["bookEdition"] = $data['book_edition'];
    }
    
    if (!empty($data['number_of_pages'])) {
        $schema["numberOfPages"] = $data['number_of_pages'];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateCourseSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Course",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['course_code'])) {
        $schema["courseCode"] = $data['course_code'];
    }
    
    if (!empty($data['provider'])) {
        $schema["provider"] = [
            "@type" => "Organization",
            "name" => $data['provider']
        ];
    }
    
    if (!empty($data['course_prerequisites'])) {
        $schema["coursePrerequisites"] = $data['course_prerequisites'];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateEventSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Event",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['start_date'])) {
        $schema["startDate"] = formatDateForSchema($data['start_date']);
    }
    
    if (!empty($data['end_date'])) {
        $schema["endDate"] = formatDateForSchema($data['end_date']);
    }
    
    if (!empty($data['location_name'])) {
        $schema["location"] = [
            "@type" => "Place",
            "name" => $data['location_name'],
            "address" => $data['location_address'] ?? ''
        ];
    }
    
    if (!empty($data['event_status'])) {
        $schema["eventStatus"] = $data['event_status'];
    }
    
    if (!empty($data['organizer'])) {
        $schema["organizer"] = [
            "@type" => "Organization",
            "name" => $data['organizer']
        ];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateJobPostingSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "JobPosting",
        "title" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['hiring_organization'])) {
        $schema["hiringOrganization"] = [
            "@type" => "Organization",
            "name" => $data['hiring_organization']
        ];
    }
    
    if (!empty($data['job_location'])) {
        $schema["jobLocation"] = [
            "@type" => "Place",
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => $data['job_location']
            ]
        ];
    }
    
    if (!empty($data['date_posted'])) {
        $schema["datePosted"] = formatDateForSchema($data['date_posted']);
    }
    
    if (!empty($data['valid_through'])) {
        $schema["validThrough"] = formatDateForSchema($data['valid_through']);
    }
    
    if (!empty($data['employment_type'])) {
        $schema["employmentType"] = $data['employment_type'];
    }
    
    if (!empty($data['base_salary'])) {
        $schema["baseSalary"] = [
            "@type" => "MonetaryAmount",
            "currency" => $data['salary_currency'] ?? 'USD',
            "value" => [
                "@type" => "QuantitativeValue",
                "value" => $data['base_salary'],
                "unitText" => $data['salary_unit'] ?? 'YEAR'
            ]
        ];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateLocalBusinessSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "LocalBusiness",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['address'])) {
        $schema["address"] = [
            "@type" => "PostalAddress",
            "streetAddress" => $data['address']
        ];
    }
    
    if (!empty($data['phone'])) {
        $schema["telephone"] = $data['phone'];
    }
    
    if (!empty($data['opening_hours'])) {
        $schema["openingHoursSpecification"] = [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens" => "09:00",
            "closes" => "17:00"
        ];
    }
    
    if (!empty($data['price_range'])) {
        $schema["priceRange"] = $data['price_range'];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateOrganizationSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['logo'])) {
        $schema["logo"] = $data['logo'];
    }
    
    if (!empty($data['same_as'])) {
        $sameAs = array_map('trim', explode(',', $data['same_as']));
        $schema["sameAs"] = $sameAs;
    }
    
    if (!empty($data['contact_point'])) {
        $schema["contactPoint"] = [
            "@type" => "ContactPoint",
            "telephone" => $data['contact_phone'] ?? '',
            "contactType" => $data['contact_type'] ?? 'customer service'
        ];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generatePersonSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Person",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['image'])) {
        $schema["image"] = $data['image'];
    }
    
    if (!empty($data['job_title'])) {
        $schema["jobTitle"] = $data['job_title'];
    }
    
    if (!empty($data['same_as'])) {
        $sameAs = array_map('trim', explode(',', $data['same_as']));
        $schema["sameAs"] = $sameAs;
    }
    
    if (!empty($data['works_for'])) {
        $schema["worksFor"] = [
            "@type" => "Organization",
            "name" => $data['works_for']
        ];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateRecipeSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Recipe",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['image'])) {
        $schema["image"] = $data['image'];
    }
    
    if (!empty($data['author'])) {
        $schema["author"] = [
            "@type" => "Person",
            "name" => $data['author']
        ];
    }
    
    if (!empty($data['prep_time'])) {
        $schema["prepTime"] = $data['prep_time'];
    }
    
    if (!empty($data['cook_time'])) {
        $schema["cookTime"] = $data['cook_time'];
    }
    
    if (!empty($data['total_time'])) {
        $schema["totalTime"] = $data['total_time'];
    }
    
    if (!empty($data['recipe_yield'])) {
        $schema["recipeYield"] = $data['recipe_yield'];
    }
    
    if (!empty($data['recipe_ingredients'])) {
        $ingredients = array_map('trim', explode("\n", $data['recipe_ingredients']));
        $schema["recipeIngredient"] = $ingredients;
    }
    
    if (!empty($data['recipe_instructions'])) {
        $instructions = array_map('trim', explode("\n", $data['recipe_instructions']));
        $schema["recipeInstructions"] = array_map(function($instruction) {
            return ["@type" => "HowToStep", "text" => $instruction];
        }, $instructions);
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateReviewSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Review",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['item_reviewed'])) {
        $schema["itemReviewed"] = [
            "@type" => "Thing",
            "name" => $data['item_reviewed']
        ];
    }
    
    if (!empty($data['review_rating'])) {
        $schema["reviewRating"] = [
            "@type" => "Rating",
            "ratingValue" => $data['review_rating'],
            "bestRating" => $data['best_rating'] ?? 5
        ];
    }
    
    if (!empty($data['author'])) {
        $schema["author"] = [
            "@type" => "Person",
            "name" => $data['author']
        ];
    }
    
    if (!empty($data['date_published'])) {
        $schema["datePublished"] = formatDateForSchema($data['date_published']);
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateVideoObjectSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "VideoObject",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['thumbnail_url'])) {
        $schema["thumbnailUrl"] = $data['thumbnail_url'];
    }
    
    if (!empty($data['upload_date'])) {
        $schema["uploadDate"] = formatDateForSchema($data['upload_date']);
    }
    
    if (!empty($data['duration'])) {
        $schema["duration"] = $data['duration'];
    }
    
    if (!empty($data['embed_url'])) {
        $schema["embedUrl"] = $data['embed_url'];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateWebPageSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['primary_image'])) {
        $schema["primaryImageOfPage"] = [
            "@type" => "ImageObject",
            "url" => $data['primary_image']
        ];
    }
    
    if (!empty($data['date_published'])) {
        $schema["datePublished"] = formatDateForSchema($data['date_published']);
    }
    
    if (!empty($data['date_modified'])) {
        $schema["dateModified"] = formatDateForSchema($data['date_modified']);
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function generateWebSiteSchema($title, $description, $url, $data) {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => $title,
        "description" => $description,
        "url" => $url
    ];
    
    if (!empty($data['potential_action'])) {
        $schema["potentialAction"] = [
            "@type" => "SearchAction",
            "target" => $data['search_url'] ?? $url . "?q={search_term_string}",
            "query-input" => "required name=search_term_string"
        ];
    }
    
    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schema Markup Generator (2026) - Free JSON-LD & Microdata Creator</title>
<meta name="description" content="Generate valid schema.org structured data in seconds. Create JSON-LD, Microdata & RDFa markup for SEO-rich rich snippets, FAQs, breadcrumbs & more - no coding needed!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleSchemaFields() {
            const schemaType = document.getElementById('schema_type').value;
            
            // Hide all field groups
            document.querySelectorAll('.field-group').forEach(group => {
                group.classList.add('hidden');
            });
            
            // Show fields for selected schema type
            document.getElementById(schemaType.toLowerCase() + '-fields').classList.remove('hidden');
            
            // Show common fields
            document.getElementById('common-fields').classList.remove('hidden');
        }
        
        function copyToClipboard() {
            const markup = document.getElementById('schema-markup');
            markup.select();
            document.execCommand('copy');
            
            // Show copied notification
            const copyBtn = document.getElementById('copy-btn');
            copyBtn.textContent = 'Copied!';
            setTimeout(() => {
                copyBtn.textContent = 'Copy to Clipboard';
            }, 2000);
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            toggleSchemaFields();
        });
    </script>


<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-6xl">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Complete Schema Markup Generator</h1>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="schema_type" class="block text-gray-700 font-bold mb-2">Schema Type:</label>
                        <select id="schema_type" name="schema_type" class="w-full p-2 border rounded" onchange="toggleSchemaFields()">
                            <?php foreach ($allSchemaTypes as $value => $label): ?>
                                <option value="<?= $value ?>" <?= $schemaType === $value ? 'selected' : '' ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <!-- Common Fields -->
                <div id="common-fields" class="field-group">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title/Name:</label>
                        <input type="text" id="title" name="title" class="w-full p-2 border rounded" value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '' ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                        <textarea id="description" name="description" rows="3" class="w-full p-2 border rounded" required><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label for="url" class="block text-gray-700 font-bold mb-2">URL:</label>
                        <input type="url" id="url" name="url" class="w-full p-2 border rounded" value="<?= isset($_POST['url']) ? htmlspecialchars($_POST['url']) : '' ?>" required>
                    </div>
                </div>
                
                <!-- Article Fields -->
                <div id="article-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="date_published" class="block text-gray-700 font-bold mb-2">Date Published:</label>
                        <input type="date" id="date_published" name="date_published" class="w-full p-2 border rounded" value="<?= isset($_POST['date_published']) ? htmlspecialchars($_POST['date_published']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_modified" class="block text-gray-700 font-bold mb-2">Date Modified:</label>
                        <input type="date" id="date_modified" name="date_modified" class="w-full p-2 border rounded" value="<?= isset($_POST['date_modified']) ? htmlspecialchars($_POST['date_modified']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="author_name" class="block text-gray-700 font-bold mb-2">Author Name:</label>
                        <input type="text" id="author_name" name="author_name" class="w-full p-2 border rounded" value="<?= isset($_POST['author_name']) ? htmlspecialchars($_POST['author_name']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="publisher_name" class="block text-gray-700 font-bold mb-2">Publisher Name:</label>
                        <input type="text" id="publisher_name" name="publisher_name" class="w-full p-2 border rounded" value="<?= isset($_POST['publisher_name']) ? htmlspecialchars($_POST['publisher_name']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="publisher_logo" class="block text-gray-700 font-bold mb-2">Publisher Logo URL:</label>
                        <input type="url" id="publisher_logo" name="publisher_logo" class="w-full p-2 border rounded" value="<?= isset($_POST['publisher_logo']) ? htmlspecialchars($_POST['publisher_logo']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="image_url" class="block text-gray-700 font-bold mb-2">Image URL:</label>
                        <input type="url" id="image_url" name="image_url" class="w-full p-2 border rounded" value="<?= isset($_POST['image_url']) ? htmlspecialchars($_POST['image_url']) : '' ?>">
                    </div>
                </div>
                
                <!-- Product Fields -->
                <div id="product-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="image_url" class="block text-gray-700 font-bold mb-2">Image URL:</label>
                        <input type="url" id="image_url" name="image_url" class="w-full p-2 border rounded" value="<?= isset($_POST['image_url']) ? htmlspecialchars($_POST['image_url']) : '' ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="brand" class="block text-gray-700 font-bold mb-2">Brand:</label>
                        <input type="text" id="brand" name="brand" class="w-full p-2 border rounded" value="<?= isset($_POST['brand']) ? htmlspecialchars($_POST['brand']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="sku" class="block text-gray-700 font-bold mb-2">SKU:</label>
                        <input type="text" id="sku" name="sku" class="w-full p-2 border rounded" value="<?= isset($_POST['sku']) ? htmlspecialchars($_POST['sku']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="gtin" class="block text-gray-700 font-bold mb-2">GTIN:</label>
                        <input type="text" id="gtin" name="gtin" class="w-full p-2 border rounded" value="<?= isset($_POST['gtin']) ? htmlspecialchars($_POST['gtin']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
                        <input type="number" step="0.01" id="price" name="price" class="w-full p-2 border rounded" value="<?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="price_currency" class="block text-gray-700 font-bold mb-2">Price Currency:</label>
                        <input type="text" id="price_currency" name="price_currency" class="w-full p-2 border rounded" value="<?= isset($_POST['price_currency']) ? htmlspecialchars($_POST['price_currency']) : 'USD' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="price_valid_until" class="block text-gray-700 font-bold mb-2">Price Valid Until:</label>
                        <input type="date" id="price_valid_until" name="price_valid_until" class="w-full p-2 border rounded" value="<?= isset($_POST['price_valid_until']) ? htmlspecialchars($_POST['price_valid_until']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="availability" class="block text-gray-700 font-bold mb-2">Availability:</label>
                        <select id="availability" name="availability" class="w-full p-2 border rounded">
                            <option value="https://schema.org/InStock" <?= (isset($_POST['availability']) && $_POST['availability'] === 'https://schema.org/InStock') ? 'selected' : '' ?>>In Stock</option>
                            <option value="https://schema.org/OutOfStock" <?= (isset($_POST['availability']) && $_POST['availability'] === 'https://schema.org/OutOfStock') ? 'selected' : '' ?>>Out of Stock</option>
                            <option value="https://schema.org/PreOrder" <?= (isset($_POST['availability']) && $_POST['availability'] === 'https://schema.org/PreOrder') ? 'selected' : '' ?>>Pre-Order</option>
                            <option value="https://schema.org/Discontinued" <?= (isset($_POST['availability']) && $_POST['availability'] === 'https://schema.org/Discontinued') ? 'selected' : '' ?>>Discontinued</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="rating_value" class="block text-gray-700 font-bold mb-2">Rating Value (1-5):</label>
                        <input type="number" step="0.1" min="1" max="5" id="rating_value" name="rating_value" class="w-full p-2 border rounded" value="<?= isset($_POST['rating_value']) ? htmlspecialchars($_POST['rating_value']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="review_count" class="block text-gray-700 font-bold mb-2">Review Count:</label>
                        <input type="number" id="review_count" name="review_count" class="w-full p-2 border rounded" value="<?= isset($_POST['review_count']) ? htmlspecialchars($_POST['review_count']) : '' ?>">
                    </div>
                </div>
                
                <!-- Book Fields -->
                <div id="book-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="image_url" class="block text-gray-700 font-bold mb-2">Image URL:</label>
                        <input type="url" id="image_url" name="image_url" class="w-full p-2 border rounded" value="<?= isset($_POST['image_url']) ? htmlspecialchars($_POST['image_url']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="author_name" class="block text-gray-700 font-bold mb-2">Author Name:</label>
                        <input type="text" id="author_name" name="author_name" class="w-full p-2 border rounded" value="<?= isset($_POST['author_name']) ? htmlspecialchars($_POST['author_name']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="isbn" class="block text-gray-700 font-bold mb-2">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" class="w-full p-2 border rounded" value="<?= isset($_POST['isbn']) ? htmlspecialchars($_POST['isbn']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="publisher" class="block text-gray-700 font-bold mb-2">Publisher:</label>
                        <input type="text" id="publisher" name="publisher" class="w-full p-2 border rounded" value="<?= isset($_POST['publisher']) ? htmlspecialchars($_POST['publisher']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_published" class="block text-gray-700 font-bold mb-2">Date Published:</label>
                        <input type="date" id="date_published" name="date_published" class="w-full p-2 border rounded" value="<?= isset($_POST['date_published']) ? htmlspecialchars($_POST['date_published']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="book_edition" class="block text-gray-700 font-bold mb-2">Edition:</label>
                        <input type="text" id="book_edition" name="book_edition" class="w-full p-2 border rounded" value="<?= isset($_POST['book_edition']) ? htmlspecialchars($_POST['book_edition']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="number_of_pages" class="block text-gray-700 font-bold mb-2">Number of Pages:</label>
                        <input type="number" id="number_of_pages" name="number_of_pages" class="w-full p-2 border rounded" value="<?= isset($_POST['number_of_pages']) ? htmlspecialchars($_POST['number_of_pages']) : '' ?>">
                    </div>
                </div>
                
                <!-- Course Fields -->
                <div id="course-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="course_code" class="block text-gray-700 font-bold mb-2">Course Code:</label>
                        <input type="text" id="course_code" name="course_code" class="w-full p-2 border rounded" value="<?= isset($_POST['course_code']) ? htmlspecialchars($_POST['course_code']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="provider" class="block text-gray-700 font-bold mb-2">Provider:</label>
                        <input type="text" id="provider" name="provider" class="w-full p-2 border rounded" value="<?= isset($_POST['provider']) ? htmlspecialchars($_POST['provider']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="course_prerequisites" class="block text-gray-700 font-bold mb-2">Prerequisites:</label>
                        <textarea id="course_prerequisites" name="course_prerequisites" rows="3" class="w-full p-2 border rounded"><?= isset($_POST['course_prerequisites']) ? htmlspecialchars($_POST['course_prerequisites']) : '' ?></textarea>
                    </div>
                </div>
                
                <!-- Event Fields -->
                <div id="event-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date:</label>
                        <input type="datetime-local" id="start_date" name="start_date" class="w-full p-2 border rounded" value="<?= isset($_POST['start_date']) ? htmlspecialchars($_POST['start_date']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date:</label>
                        <input type="datetime-local" id="end_date" name="end_date" class="w-full p-2 border rounded" value="<?= isset($_POST['end_date']) ? htmlspecialchars($_POST['end_date']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="location_name" class="block text-gray-700 font-bold mb-2">Location Name:</label>
                        <input type="text" id="location_name" name="location_name" class="w-full p-2 border rounded" value="<?= isset($_POST['location_name']) ? htmlspecialchars($_POST['location_name']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="location_address" class="block text-gray-700 font-bold mb-2">Location Address:</label>
                        <input type="text" id="location_address" name="location_address" class="w-full p-2 border rounded" value="<?= isset($_POST['location_address']) ? htmlspecialchars($_POST['location_address']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="event_status" class="block text-gray-700 font-bold mb-2">Event Status:</label>
                        <select id="event_status" name="event_status" class="w-full p-2 border rounded">
                            <option value="EventScheduled" <?= (isset($_POST['event_status']) && $_POST['event_status'] === 'EventScheduled') ? 'selected' : '' ?>>Scheduled</option>
                            <option value="EventCancelled" <?= (isset($_POST['event_status']) && $_POST['event_status'] === 'EventCancelled') ? 'selected' : '' ?>>Cancelled</option>
                            <option value="EventPostponed" <?= (isset($_POST['event_status']) && $_POST['event_status'] === 'EventPostponed') ? 'selected' : '' ?>>Postponed</option>
                            <option value="EventRescheduled" <?= (isset($_POST['event_status']) && $_POST['event_status'] === 'EventRescheduled') ? 'selected' : '' ?>>Rescheduled</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="organizer" class="block text-gray-700 font-bold mb-2">Organizer:</label>
                        <input type="text" id="organizer" name="organizer" class="w-full p-2 border rounded" value="<?= isset($_POST['organizer']) ? htmlspecialchars($_POST['organizer']) : '' ?>">
                    </div>
                </div>
                
                <!-- Job Posting Fields -->
                <div id="jobposting-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="hiring_organization" class="block text-gray-700 font-bold mb-2">Hiring Organization:</label>
                        <input type="text" id="hiring_organization" name="hiring_organization" class="w-full p-2 border rounded" value="<?= isset($_POST['hiring_organization']) ? htmlspecialchars($_POST['hiring_organization']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="job_location" class="block text-gray-700 font-bold mb-2">Job Location:</label>
                        <input type="text" id="job_location" name="job_location" class="w-full p-2 border rounded" value="<?= isset($_POST['job_location']) ? htmlspecialchars($_POST['job_location']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_posted" class="block text-gray-700 font-bold mb-2">Date Posted:</label>
                        <input type="date" id="date_posted" name="date_posted" class="w-full p-2 border rounded" value="<?= isset($_POST['date_posted']) ? htmlspecialchars($_POST['date_posted']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="valid_through" class="block text-gray-700 font-bold mb-2">Valid Through:</label>
                        <input type="date" id="valid_through" name="valid_through" class="w-full p-2 border rounded" value="<?= isset($_POST['valid_through']) ? htmlspecialchars($_POST['valid_through']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="employment_type" class="block text-gray-700 font-bold mb-2">Employment Type:</label>
                        <select id="employment_type" name="employment_type" class="w-full p-2 border rounded">
                            <option value="FULL_TIME" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'FULL_TIME') ? 'selected' : '' ?>>Full-time</option>
                            <option value="PART_TIME" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'PART_TIME') ? 'selected' : '' ?>>Part-time</option>
                            <option value="CONTRACTOR" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'CONTRACTOR') ? 'selected' : '' ?>>Contractor</option>
                            <option value="TEMPORARY" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'TEMPORARY') ? 'selected' : '' ?>>Temporary</option>
                            <option value="INTERN" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'INTERN') ? 'selected' : '' ?>>Intern</option>
                            <option value="VOLUNTEER" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'VOLUNTEER') ? 'selected' : '' ?>>Volunteer</option>
                            <option value="PER_DIEM" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'PER_DIEM') ? 'selected' : '' ?>>Per Diem</option>
                            <option value="OTHER" <?= (isset($_POST['employment_type']) && $_POST['employment_type'] === 'OTHER') ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="base_salary" class="block text-gray-700 font-bold mb-2">Base Salary:</label>
                        <input type="number" step="0.01" id="base_salary" name="base_salary" class="w-full p-2 border rounded" value="<?= isset($_POST['base_salary']) ? htmlspecialchars($_POST['base_salary']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="salary_currency" class="block text-gray-700 font-bold mb-2">Salary Currency:</label>
                        <input type="text" id="salary_currency" name="salary_currency" class="w-full p-2 border rounded" value="<?= isset($_POST['salary_currency']) ? htmlspecialchars($_POST['salary_currency']) : 'USD' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="salary_unit" class="block text-gray-700 font-bold mb-2">Salary Unit:</label>
                        <select id="salary_unit" name="salary_unit" class="w-full p-2 border rounded">
                            <option value="HOUR" <?= (isset($_POST['salary_unit']) && $_POST['salary_unit'] === 'HOUR') ? 'selected' : '' ?>>Per Hour</option>
                            <option value="DAY" <?= (isset($_POST['salary_unit']) && $_POST['salary_unit'] === 'DAY') ? 'selected' : '' ?>>Per Day</option>
                            <option value="WEEK" <?= (isset($_POST['salary_unit']) && $_POST['salary_unit'] === 'WEEK') ? 'selected' : '' ?>>Per Week</option>
                            <option value="MONTH" <?= (isset($_POST['salary_unit']) && $_POST['salary_unit'] === 'MONTH') ? 'selected' : '' ?>>Per Month</option>
                            <option value="YEAR" <?= (isset($_POST['salary_unit']) && $_POST['salary_unit'] === 'YEAR') ? 'selected' : '' ?>>Per Year</option>
                        </select>
                    </div>
                </div>
                
                <!-- Local Business Fields -->
                <div id="localbusiness-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
                        <input type="text" id="address" name="address" class="w-full p-2 border rounded" value="<?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="opening_hours" class="block text-gray-700 font-bold mb-2">Opening Hours:</label>
                        <input type="text" id="opening_hours" name="opening_hours" placeholder="e.g., Mo-Fr 09:00-17:00" class="w-full p-2 border rounded" value="<?= isset($_POST['opening_hours']) ? htmlspecialchars($_POST['opening_hours']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="price_range" class="block text-gray-700 font-bold mb-2">Price Range:</label>
                        <input type="text" id="price_range" name="price_range" placeholder="e.g., $$$" class="w-full p-2 border rounded" value="<?= isset($_POST['price_range']) ? htmlspecialchars($_POST['price_range']) : '' ?>">
                    </div>
                </div>
                
                <!-- Organization Fields -->
                <div id="organization-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="logo" class="block text-gray-700 font-bold mb-2">Logo URL:</label>
                        <input type="url" id="logo" name="logo" class="w-full p-2 border rounded" value="<?= isset($_POST['logo']) ? htmlspecialchars($_POST['logo']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="same_as" class="block text-gray-700 font-bold mb-2">Social Profiles (comma separated):</label>
                        <input type="text" id="same_as" name="same_as" placeholder="e.g., https://facebook.com/example, https://twitter.com/example" class="w-full p-2 border rounded" value="<?= isset($_POST['same_as']) ? htmlspecialchars($_POST['same_as']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="contact_phone" class="block text-gray-700 font-bold mb-2">Contact Phone:</label>
                        <input type="tel" id="contact_phone" name="contact_phone" class="w-full p-2 border rounded" value="<?= isset($_POST['contact_phone']) ? htmlspecialchars($_POST['contact_phone']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="contact_type" class="block text-gray-700 font-bold mb-2">Contact Type:</label>
                        <input type="text" id="contact_type" name="contact_type" placeholder="e.g., customer service" class="w-full p-2 border rounded" value="<?= isset($_POST['contact_type']) ? htmlspecialchars($_POST['contact_type']) : '' ?>">
                    </div>
                </div>
                
                <!-- Person Fields -->
                <div id="person-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image URL:</label>
                        <input type="url" id="image" name="image" class="w-full p-2 border rounded" value="<?= isset($_POST['image']) ? htmlspecialchars($_POST['image']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="job_title" class="block text-gray-700 font-bold mb-2">Job Title:</label>
                        <input type="text" id="job_title" name="job_title" class="w-full p-2 border rounded" value="<?= isset($_POST['job_title']) ? htmlspecialchars($_POST['job_title']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="same_as" class="block text-gray-700 font-bold mb-2">Social Profiles (comma separated):</label>
                        <input type="text" id="same_as" name="same_as" placeholder="e.g., https://facebook.com/example, https://twitter.com/example" class="w-full p-2 border rounded" value="<?= isset($_POST['same_as']) ? htmlspecialchars($_POST['same_as']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="works_for" class="block text-gray-700 font-bold mb-2">Works For:</label>
                        <input type="text" id="works_for" name="works_for" class="w-full p-2 border rounded" value="<?= isset($_POST['works_for']) ? htmlspecialchars($_POST['works_for']) : '' ?>">
                    </div>
                </div>
                
                <!-- Recipe Fields -->
                <div id="recipe-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image URL:</label>
                        <input type="url" id="image" name="image" class="w-full p-2 border rounded" value="<?= isset($_POST['image']) ? htmlspecialchars($_POST['image']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700 font-bold mb-2">Author:</label>
                        <input type="text" id="author" name="author" class="w-full p-2 border rounded" value="<?= isset($_POST['author']) ? htmlspecialchars($_POST['author']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="prep_time" class="block text-gray-700 font-bold mb-2">Prep Time (e.g., PT30M):</label>
                        <input type="text" id="prep_time" name="prep_time" placeholder="ISO 8601 duration format" class="w-full p-2 border rounded" value="<?= isset($_POST['prep_time']) ? htmlspecialchars($_POST['prep_time']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="cook_time" class="block text-gray-700 font-bold mb-2">Cook Time (e.g., PT1H):</label>
                        <input type="text" id="cook_time" name="cook_time" placeholder="ISO 8601 duration format" class="w-full p-2 border rounded" value="<?= isset($_POST['cook_time']) ? htmlspecialchars($_POST['cook_time']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="total_time" class="block text-gray-700 font-bold mb-2">Total Time (e.g., PT1H30M):</label>
                        <input type="text" id="total_time" name="total_time" placeholder="ISO 8601 duration format" class="w-full p-2 border rounded" value="<?= isset($_POST['total_time']) ? htmlspecialchars($_POST['total_time']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="recipe_yield" class="block text-gray-700 font-bold mb-2">Yield (e.g., 4 servings):</label>
                        <input type="text" id="recipe_yield" name="recipe_yield" class="w-full p-2 border rounded" value="<?= isset($_POST['recipe_yield']) ? htmlspecialchars($_POST['recipe_yield']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="recipe_ingredients" class="block text-gray-700 font-bold mb-2">Ingredients (one per line):</label>
                        <textarea id="recipe_ingredients" name="recipe_ingredients" rows="5" class="w-full p-2 border rounded"><?= isset($_POST['recipe_ingredients']) ? htmlspecialchars($_POST['recipe_ingredients']) : '' ?></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label for="recipe_instructions" class="block text-gray-700 font-bold mb-2">Instructions (one per line):</label>
                        <textarea id="recipe_instructions" name="recipe_instructions" rows="5" class="w-full p-2 border rounded"><?= isset($_POST['recipe_instructions']) ? htmlspecialchars($_POST['recipe_instructions']) : '' ?></textarea>
                    </div>
                </div>
                
                <!-- Review Fields -->
                <div id="review-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="item_reviewed" class="block text-gray-700 font-bold mb-2">Item Reviewed:</label>
                        <input type="text" id="item_reviewed" name="item_reviewed" class="w-full p-2 border rounded" value="<?= isset($_POST['item_reviewed']) ? htmlspecialchars($_POST['item_reviewed']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="review_rating" class="block text-gray-700 font-bold mb-2">Rating Value (1-5):</label>
                        <input type="number" step="0.1" min="1" max="5" id="review_rating" name="review_rating" class="w-full p-2 border rounded" value="<?= isset($_POST['review_rating']) ? htmlspecialchars($_POST['review_rating']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="best_rating" class="block text-gray-700 font-bold mb-2">Best Rating:</label>
                        <input type="number" id="best_rating" name="best_rating" class="w-full p-2 border rounded" value="<?= isset($_POST['best_rating']) ? htmlspecialchars($_POST['best_rating']) : '5' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700 font-bold mb-2">Author:</label>
                        <input type="text" id="author" name="author" class="w-full p-2 border rounded" value="<?= isset($_POST['author']) ? htmlspecialchars($_POST['author']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_published" class="block text-gray-700 font-bold mb-2">Date Published:</label>
                        <input type="date" id="date_published" name="date_published" class="w-full p-2 border rounded" value="<?= isset($_POST['date_published']) ? htmlspecialchars($_POST['date_published']) : '' ?>">
                    </div>
                </div>
                
                <!-- Video Fields -->
                <div id="videoobject-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="thumbnail_url" class="block text-gray-700 font-bold mb-2">Thumbnail URL:</label>
                        <input type="url" id="thumbnail_url" name="thumbnail_url" class="w-full p-2 border rounded" value="<?= isset($_POST['thumbnail_url']) ? htmlspecialchars($_POST['thumbnail_url']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="upload_date" class="block text-gray-700 font-bold mb-2">Upload Date:</label>
                        <input type="date" id="upload_date" name="upload_date" class="w-full p-2 border rounded" value="<?= isset($_POST['upload_date']) ? htmlspecialchars($_POST['upload_date']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-700 font-bold mb-2">Duration (e.g., PT1H33M):</label>
                        <input type="text" id="duration" name="duration" placeholder="ISO 8601 duration format" class="w-full p-2 border rounded" value="<?= isset($_POST['duration']) ? htmlspecialchars($_POST['duration']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="embed_url" class="block text-gray-700 font-bold mb-2">Embed URL:</label>
                        <input type="url" id="embed_url" name="embed_url" class="w-full p-2 border rounded" value="<?= isset($_POST['embed_url']) ? htmlspecialchars($_POST['embed_url']) : '' ?>">
                    </div>
                </div>
                
                <!-- Web Page Fields -->
                <div id="webpage-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="primary_image" class="block text-gray-700 font-bold mb-2">Primary Image URL:</label>
                        <input type="url" id="primary_image" name="primary_image" class="w-full p-2 border rounded" value="<?= isset($_POST['primary_image']) ? htmlspecialchars($_POST['primary_image']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_published" class="block text-gray-700 font-bold mb-2">Date Published:</label>
                        <input type="date" id="date_published" name="date_published" class="w-full p-2 border rounded" value="<?= isset($_POST['date_published']) ? htmlspecialchars($_POST['date_published']) : '' ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="date_modified" class="block text-gray-700 font-bold mb-2">Date Modified:</label>
                        <input type="date" id="date_modified" name="date_modified" class="w-full p-2 border rounded" value="<?= isset($_POST['date_modified']) ? htmlspecialchars($_POST['date_modified']) : '' ?>">
                    </div>
                </div>
                
                <!-- Web Site Fields -->
                <div id="website-fields" class="field-group hidden">
                    <div class="mb-4">
                        <label for="search_url" class="block text-gray-700 font-bold mb-2">Search URL (optional):</label>
                        <input type="url" id="search_url" name="search_url" placeholder="e.g., https://example.com/search?q={search_term_string}" class="w-full p-2 border rounded" value="<?= isset($_POST['search_url']) ? htmlspecialchars($_POST['search_url']) : '' ?>">
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-200 mt-6">
                    Generate Schema Markup
                </button>
            </form>
        </div>
        
        <?php if (!empty($schemaMarkup)): ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">Generated Schema Markup</h2>
                    <button id="copy-btn" onclick="copyToClipboard()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded transition duration-200">
                        Copy to Clipboard
                    </button>
                </div>
                <pre id="schema-markup" class="bg-gray-100 p-4 rounded overflow-x-auto text-sm"><?= htmlspecialchars($schemaMarkup) ?></pre>
                <p class="mt-4 text-gray-600">Paste this JSON-LD code in the &lt;head&gt; section of your HTML page.</p>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>
        
        <div class="mt-8 text-center text-gray-600">
            <p>This tool helps you generate structured data markup for your website.</p>
            <p class="mt-2">Learn more about <a href="https://schema.org/" target="_blank" class="text-blue-600 hover:underline">Schema.org</a> markup.</p>
        </div>
    </div>

<?php include 'footer.php';?>



