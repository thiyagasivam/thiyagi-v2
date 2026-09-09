<?php include 'header.php';?>
<title>Smoothie Calorie Calculator 2026 - Estimate Smoothie Calories | Free Tool</title>
<meta name="description" content="Free Smoothie Calorie Calculator 2026. Add fruits, milk, yogurt, protein powder and more to instantly estimate the total calories in your homemade smoothie.">
<meta name="keywords" content="smoothie calorie calculator, smoothie calories, healthy smoothie calculator, weight loss smoothie calculator, protein shake calorie calculator">
<link rel="canonical" href="https://www.thiyagi.com/smoothie-calorie-calculator">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="Smoothie Calorie Calculator 2026 - Estimate Smoothie Calories | Free Tool">
<meta property="og:description" content="Add fruits, milk, yogurt, protein powder and more to instantly estimate the total calories in your homemade smoothie.">
<meta property="og:url" content="https://www.thiyagi.com/smoothie-calorie-calculator">
<meta property="og:type" content="website">
<meta property="og:image" content="https://www.thiyagi.com/nt.png">
<meta property="og:site_name" content="Thiyagi Tools">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Smoothie Calorie Calculator 2026 - Estimate Smoothie Calories">
<meta name="twitter:description" content="Free tool to instantly estimate the calories in your homemade smoothie.">
<meta name="twitter:image" content="https://www.thiyagi.com/nt.png">

<!-- Additional SEO Meta Tags -->
<meta name="author" content="Thiyagi">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="#65a30d">

<?php
// Approximate calories per 100g/100ml, used as a client-side lookup table below.
$ingredients = [
    'banana'          => ['label' => 'Banana', 'kcal' => 89, 'default' => 120],
    'mango'           => ['label' => 'Mango', 'kcal' => 60, 'default' => 150],
    'strawberry'      => ['label' => 'Strawberries', 'kcal' => 32, 'default' => 100],
    'blueberry'       => ['label' => 'Blueberries', 'kcal' => 57, 'default' => 100],
    'spinach'         => ['label' => 'Spinach', 'kcal' => 23, 'default' => 30],
    'avocado'         => ['label' => 'Avocado', 'kcal' => 160, 'default' => 50],
    'whole_milk'      => ['label' => 'Whole Milk', 'kcal' => 61, 'default' => 200],
    'almond_milk'     => ['label' => 'Almond Milk (unsweetened)', 'kcal' => 15, 'default' => 200],
    'plain_yogurt'    => ['label' => 'Plain Yogurt', 'kcal' => 61, 'default' => 100],
    'greek_yogurt'    => ['label' => 'Greek Yogurt', 'kcal' => 97, 'default' => 100],
    'peanut_butter'   => ['label' => 'Peanut Butter', 'kcal' => 588, 'default' => 15],
    'honey'           => ['label' => 'Honey', 'kcal' => 304, 'default' => 15],
    'protein_powder'  => ['label' => 'Protein Powder', 'kcal' => 400, 'default' => 30],
    'rolled_oats'     => ['label' => 'Rolled Oats', 'kcal' => 389, 'default' => 20],
    'chia_seeds'      => ['label' => 'Chia Seeds', 'kcal' => 486, 'default' => 10],
    'ice'             => ['label' => 'Ice', 'kcal' => 0, 'default' => 50],
];
?>

<style>
  .input-focus:focus {
    box-shadow: 0 0 0 3px rgba(101, 163, 13, 0.1);
    border-color: #65a30d;
  }
</style>

<main class="min-h-screen bg-gradient-to-br from-lime-50 via-green-50 to-emerald-50">
  <!-- Hero Section -->
  <section class="pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
          Smoothie Calorie Calculator
        </h1>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
          Pick your smoothie ingredients and quantities to instantly estimate the total calories, protein and sugar in your blend.
        </p>
      </div>
    </div>
  </section>

  <!-- Calculator Widget -->
  <section class="py-4">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-6 sm:p-10">
      <div class="flex items-center gap-3 mb-6">
        <div class="w-12 h-12 bg-lime-100 rounded-lg flex items-center justify-center">
          <i class="fas fa-blender text-lime-600 text-xl" aria-hidden="true"></i>
        </div>
        <div>
          <h2 class="text-xl font-bold text-gray-800">Build Your Smoothie</h2>
          <p class="text-gray-600 text-sm">Enter grams (or ml) for each ingredient you're using. Leave unused ones at 0.</p>
        </div>
      </div>

      <form id="smoothieForm" class="space-y-4" role="form">
        <div id="ingredientRows" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php foreach ($ingredients as $key => $item): ?>
          <div class="flex items-center gap-3">
            <label for="ing_<?php echo $key; ?>" class="flex-1 text-sm font-medium text-gray-700">
              <?php echo htmlspecialchars($item['label']); ?>
              <span class="block text-xs text-gray-400"><?php echo $item['kcal']; ?> kcal / 100g</span>
            </label>
            <input
              type="number"
              id="ing_<?php echo $key; ?>"
              class="ingredient-input w-24 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-lime-500 focus:border-lime-500 input-focus text-right"
              data-kcal="<?php echo $item['kcal']; ?>"
              min="0"
              step="1"
              value="0"
            />
          </div>
          <?php endforeach; ?>
        </div>

        <div class="flex justify-center pt-2">
          <button
            type="button"
            id="resetBtn"
            class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-colors duration-200"
          >
            Reset
          </button>
        </div>
      </form>

      <!-- Result -->
      <div class="mt-8 bg-lime-50 rounded-lg p-6 text-center">
        <p class="text-sm font-medium text-gray-600 mb-1">Total Estimated Calories</p>
        <p class="text-4xl font-bold text-lime-700"><span id="totalCalories">0</span> kcal</p>
        <p class="text-xs text-gray-500 mt-2">Based on <span id="totalWeight">0</span>g of ingredients</p>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="max-w-4xl mx-auto mt-12 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-info-circle text-lime-600" aria-hidden="true"></i>
        How This Calculator Works
      </h2>
      <div class="prose max-w-none text-gray-600">
        <p class="mb-4">
          Smoothie calories can vary hugely depending on the fruits, dairy, sweeteners and add-ins you use. This calculator
          uses typical calorie values per 100g (or 100ml) for common smoothie ingredients, so you can enter the amount of
          each ingredient in your recipe and get an instant, approximate calorie total.
        </p>
        <p class="mb-6">
          Values are estimates based on average nutritional data and can vary by brand, ripeness and preparation method.
          Use this tool as a quick guide for meal planning, weight management or tracking a healthy smoothie recipe -
          for precise nutrition tracking, check the label of the specific products you use.
        </p>
      </div>
    </article>
  </section>

  <!-- FAQ Section -->
  <section class="max-w-4xl mx-auto mt-8 px-4 pb-16">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-question-circle text-lime-600" aria-hidden="true"></i>
        Frequently Asked Questions
      </h2>
      <div class="space-y-6 text-gray-600">
        <div>
          <h3 class="font-semibold text-gray-800 mb-1">How many calories are in a typical smoothie?</h3>
          <p>A basic fruit and milk smoothie is usually 150-300 calories, while smoothies with peanut butter, protein powder or granola can easily reach 400-600 calories.</p>
        </div>
        <div>
          <h3 class="font-semibold text-gray-800 mb-1">Are smoothies good for weight loss?</h3>
          <p>Smoothies can support weight loss if they're portion-controlled and low in added sugar - swapping high-calorie add-ins like honey or peanut butter for spinach, ice and unsweetened milk lowers the total calories.</p>
        </div>
        <div>
          <h3 class="font-semibold text-gray-800 mb-1">Why is my smoothie higher in calories than I expected?</h3>
          <p>Calorie-dense ingredients like peanut butter, nut butters, protein powder, oats and honey add calories quickly even in small amounts. Use the calculator above to see which ingredient contributes the most.</p>
        </div>
      </div>
    </article>
  </section>
</main>

<script>
function calculateSmoothieCalories() {
  const inputs = document.querySelectorAll('.ingredient-input');
  let totalCalories = 0;
  let totalWeight = 0;

  inputs.forEach(function (input) {
    const grams = parseFloat(input.value) || 0;
    const kcalPer100g = parseFloat(input.dataset.kcal) || 0;
    totalCalories += (grams * kcalPer100g) / 100;
    totalWeight += grams;
  });

  document.getElementById('totalCalories').textContent = Math.round(totalCalories).toLocaleString('en-US');
  document.getElementById('totalWeight').textContent = Math.round(totalWeight).toLocaleString('en-US');
}

document.querySelectorAll('.ingredient-input').forEach(function (input) {
  input.addEventListener('input', calculateSmoothieCalories);
});

document.getElementById('resetBtn').addEventListener('click', function () {
  document.querySelectorAll('.ingredient-input').forEach(function (input) {
    input.value = 0;
  });
  calculateSmoothieCalories();
});
</script>

<?php include 'footer.php';?>
