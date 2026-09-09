<?php include 'header.php';?>
<title>Win Percentage Calculator 2026 - Calculate Win Rate | Free Sports Tool</title>
<meta name="description" content="Calculate win percentage instantly with our free 2026 Win Percentage Calculator. Perfect for sports teams, gamers, and competitive players. Get accurate win rates now!">
<meta name="keywords" content="win percentage calculator, win rate calculator, sports calculator, winning percentage, win loss calculator, sports statistics">
<link rel="canonical" href="https://www.thiyagi.com/win-percentage-calculator">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="Win Percentage Calculator 2026 - Calculate Win Rate | Free Sports Tool">
<meta property="og:description" content="Calculate win percentage instantly with our free 2026 Win Percentage Calculator. Perfect for sports teams, gamers, and competitive players.">
<meta property="og:url" content="https://www.thiyagi.com/win-percentage-calculator">
<meta property="og:type" content="website">
<meta property="og:image" content="https://www.thiyagi.com/nt.png">
<meta property="og:site_name" content="Thiyagi Tools">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Win Percentage Calculator 2026 - Calculate Win Rate">
<meta name="twitter:description" content="Calculate win percentage instantly with our free 2026 Win Percentage Calculator.">
<meta name="twitter:image" content="https://www.thiyagi.com/nt.png">

<!-- Additional SEO Meta Tags -->
<meta name="author" content="Thiyagi">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="#10b981">

<style>
  .input-focus:focus {
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    border-color: #10b981;
  }
</style>

<main class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50">
  <!-- Hero Section -->
  <section class="pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
          Win Percentage Calculator
        </h1>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
          Calculate your win percentage with our free 2026 calculator. Perfect for sports teams, 
          esports players, and competitive games. Get instant results!
        </p>
      </div>
    </div>
  </section>

<!-- Calculator Section -->
<section class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
            <i class="fas fa-trophy text-green-600 text-2xl" aria-hidden="true"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Quick Win Percentage Calculation
        </h2>
        <p class="text-gray-600 mb-8">
            Enter wins and losses to calculate your win percentage
        </p>
    </div>
</section>

<!-- Calculator Widget -->
<section class="py-12">
  <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-6 sm:p-10">
    <div class="flex items-center gap-3 mb-4">
      <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
        <i class="fas fa-chart-pie text-green-600 text-xl" aria-hidden="true"></i>
      </div>
      <div>
        <h2 class="text-xl font-bold text-gray-800">Win Percentage Calculator</h2>
        <p class="text-gray-600 text-sm">Calculate your winning percentage</p>
      </div>
    </div>
    
    <form class="space-y-6" role="form">
      <div>
        <label for="wins" class="block text-sm font-medium text-gray-700 mb-2">
          Total Wins
        </label>
        <input
          type="number"
          id="wins"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 input-focus text-lg"
          placeholder="Enter number of wins"
          step="1"
          min="0"
        />
      </div>

      <div>
        <label for="losses" class="block text-sm font-medium text-gray-700 mb-2">
          Total Losses
        </label>
        <input
          type="number"
          id="losses"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 input-focus text-lg"
          placeholder="Enter number of losses"
          step="1"
          min="0"
        />
      </div>

      <div>
        <label for="ties" class="block text-sm font-medium text-gray-700 mb-2">
          Total Ties/Draws (Optional)
        </label>
        <input
          type="number"
          id="ties"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 input-focus text-lg"
          placeholder="Enter number of ties (default: 0)"
          step="1"
          min="0"
          value="0"
        />
      </div>

      <!-- Results Section -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-green-50 rounded-lg p-4">
          <label class="block text-xs font-medium text-gray-600 mb-1">Win Percentage</label>
          <div class="text-2xl font-bold text-green-600" id="winPercentage">0%</div>
        </div>
        <div class="bg-gray-100 rounded-lg p-4">
          <label class="block text-xs font-medium text-gray-600 mb-1">Total Games</label>
          <div class="text-2xl font-bold text-gray-700" id="totalGames">0</div>
        </div>
      </div>

      <!-- Detailed Stats -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="border border-gray-200 rounded-lg p-3">
          <div class="text-xs text-gray-600 mb-1">Wins</div>
          <div class="text-xl font-bold text-green-600" id="winsDisplay">0</div>
        </div>
        <div class="border border-gray-200 rounded-lg p-3">
          <div class="text-xs text-gray-600 mb-1">Losses</div>
          <div class="text-xl font-bold text-red-600" id="lossesDisplay">0</div>
        </div>
        <div class="border border-gray-200 rounded-lg p-3">
          <div class="text-xs text-gray-600 mb-1">Ties</div>
          <div class="text-xl font-bold text-gray-600" id="tiesDisplay">0</div>
        </div>
      </div>

      <!-- Copy Button -->
      <div class="flex justify-center">
        <button
          type="button"
          id="copyBtn"
          class="hidden px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200 flex items-center gap-2"
        >
          <i class="fas fa-copy" aria-hidden="true"></i>
          Copy Result
        </button>
      </div>

      <!-- Copy Success Message -->
      <div id="copySuccess" class="hidden text-center">
        <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-lg">
          <i class="fas fa-check-circle mr-2" aria-hidden="true"></i>
          <span>Copied to clipboard!</span>
        </div>
      </div>
    </form>
  </div>
</section>

  <!-- About Section -->
  <section class="max-w-4xl mx-auto mt-12 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-info-circle text-green-600" aria-hidden="true"></i>
        About Win Percentage
      </h2>
      <div class="prose max-w-none text-gray-600">
        <p class="mb-4">
          Win percentage is a statistical measure used in sports and competitive games to show the proportion 
          of games won out of the total games played. It's expressed as a percentage and is commonly used to 
          track team performance and rankings.
        </p>
        <p class="mb-6">
          Whether you're tracking your sports team's performance, esports game stats, or any competitive activity, 
          our win percentage calculator provides instant accurate results. Perfect for coaches, players, and sports 
          enthusiasts.
        </p>
      </div>
    </article>
  </section>

  <!-- How to Calculate Section -->
  <section class="max-w-4xl mx-auto mt-8 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-graduation-cap text-blue-600" aria-hidden="true"></i>
        How to Calculate Win Percentage
      </h2>
      
      <div class="space-y-4">
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-green-600 font-bold text-sm">1</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Basic Formula (Without Ties)</h4>
            <p class="text-gray-600 text-sm">Win % = (Wins ÷ Total Games) × 100</p>
            <p class="text-gray-600 text-sm">Total Games = Wins + Losses</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-green-600 font-bold text-sm">2</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Formula With Ties</h4>
            <p class="text-gray-600 text-sm">Win % = (Wins ÷ Total Games) × 100</p>
            <p class="text-gray-600 text-sm">Total Games = Wins + Losses + Ties</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-green-600 font-bold text-sm">3</span>
          </div>
          <div>
            <h4 class="font-medium text-gray-800">Example Calculation</h4>
            <p class="text-gray-600 text-sm">If a team won 15 games out of 20:</p>
            <p class="text-gray-600 text-sm">Win % = (15 ÷ 20) × 100 = 75%</p>
          </div>
        </div>
      </div>

      <!-- Formula Box -->
      <div class="mt-8 bg-green-50 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">Win Percentage Formula</h3>
        <div class="text-center">
          <div class="text-2xl font-bold text-green-700 mb-2">
            Win % = (Wins ÷ Total Games) × 100
          </div>
          <div class="text-gray-600 text-sm">
            Where Total Games = Wins + Losses (+ Ties if applicable)
          </div>
        </div>
      </div>
    </article>
  </section>

  <!-- Common Win Percentages Section -->
  <section class="max-w-4xl mx-auto mt-8 px-4">
    <article class="bg-white rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
        <i class="fas fa-chart-bar text-green-600" aria-hidden="true"></i>
        Common Win Percentage Examples
      </h2>
      
      <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
          <thead>
            <tr class="bg-gray-50">
              <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-800">Wins</th>
              <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-800">Losses</th>
              <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-800">Win %</th>
              <th class="border border-gray-300 px-4 py-3 text-left font-semibold text-gray-800">Performance</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-3">10</td>
              <td class="border border-gray-300 px-4 py-3">0</td>
              <td class="border border-gray-300 px-4 py-3 font-medium text-green-700">100%</td>
              <td class="border border-gray-300 px-4 py-3 text-gray-600">Perfect</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-3">8</td>
              <td class="border border-gray-300 px-4 py-3">2</td>
              <td class="border border-gray-300 px-4 py-3 font-medium text-green-700">80%</td>
              <td class="border border-gray-300 px-4 py-3 text-gray-600">Excellent</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-3">6</td>
              <td class="border border-gray-300 px-4 py-3">4</td>
              <td class="border border-gray-300 px-4 py-3 font-medium text-green-700">60%</td>
              <td class="border border-gray-300 px-4 py-3 text-gray-600">Good</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-3">5</td>
              <td class="border border-gray-300 px-4 py-3">5</td>
              <td class="border border-gray-300 px-4 py-3 font-medium text-gray-700">50%</td>
              <td class="border border-gray-300 px-4 py-3 text-gray-600">Even</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-3">4</td>
              <td class="border border-gray-300 px-4 py-3">6</td>
              <td class="border border-gray-300 px-4 py-3 font-medium text-orange-700">40%</td>
              <td class="border border-gray-300 px-4 py-3 text-gray-600">Below Average</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-3">2</td>
              <td class="border border-gray-300 px-4 py-3">8</td>
              <td class="border border-gray-300 px-4 py-3 font-medium text-red-700">20%</td>
              <td class="border border-gray-300 px-4 py-3 text-gray-600">Poor</td>
            </tr>
          </tbody>
        </table>
      </div>
    </article>
  </section>
</main>

<script>
function updateCalculation() {
  const wins = parseInt(document.getElementById('wins').value) || 0;
  const losses = parseInt(document.getElementById('losses').value) || 0;
  const ties = parseInt(document.getElementById('ties').value) || 0;
  
  const totalGames = wins + losses + ties;
  
  // Update displays
  document.getElementById('winsDisplay').textContent = wins;
  document.getElementById('lossesDisplay').textContent = losses;
  document.getElementById('tiesDisplay').textContent = ties;
  document.getElementById('totalGames').textContent = totalGames;
  
  const copyBtn = document.getElementById('copyBtn');
  
  if (totalGames === 0) {
    document.getElementById('winPercentage').textContent = '0%';
    copyBtn.classList.add('hidden');
    return;
  }
  
  const winPercentage = (wins / totalGames) * 100;
  document.getElementById('winPercentage').textContent = winPercentage.toFixed(2) + '%';
  copyBtn.classList.remove('hidden');
}

function copyResult() {
  const winPercentage = document.getElementById('winPercentage').textContent;
  const wins = document.getElementById('winsDisplay').textContent;
  const losses = document.getElementById('lossesDisplay').textContent;
  const ties = document.getElementById('tiesDisplay').textContent;
  const totalGames = document.getElementById('totalGames').textContent;
  
  const copyText = `Win Percentage: ${winPercentage} (${wins}W - ${losses}L${ties !== '0' ? ` - ${ties}T` : ''}, ${totalGames} total games)`;
  
  navigator.clipboard.writeText(copyText).then(() => {
    const copySuccess = document.getElementById('copySuccess');
    copySuccess.classList.remove('hidden');
    setTimeout(() => {
      copySuccess.classList.add('hidden');
    }, 3000);
  });
}

// Add event listeners
document.getElementById('wins').addEventListener('input', updateCalculation);
document.getElementById('losses').addEventListener('input', updateCalculation);
document.getElementById('ties').addEventListener('input', updateCalculation);
document.getElementById('copyBtn').addEventListener('click', copyResult);
</script>

<?php include 'footer.php';?>
