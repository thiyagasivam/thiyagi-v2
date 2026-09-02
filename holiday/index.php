<?php include '../header.php'; ?>

<title>Holidays 2026 | Complete Calendar | USA, UK & International Holidays</title>
<meta name="description" content="Complete Holiday Calendar 2026 for USA, UK, and international holidays. Find state holidays, bank holidays, cultural events, and observances worldwide.">
<meta name="keywords" content="holidays 2026, USA holidays, UK holidays, international holidays, holiday calendar, bank holidays, state holidays">
<link rel="canonical" href="https://<?= $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?') ?>">

<style>
:root {
    --primary-blue: #1e40af;
    --primary-red: #dc2626;
}
</style>

<!-- Breadcrumb -->
<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-2 py-3 text-sm">
            <a href="../" class="text-blue-600 hover:text-blue-800 flex items-center">
                <i class="fas fa-home mr-1"></i>
                Home
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-600 font-medium">Holidays 2026</span>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="bg-gradient-to-r from-blue-900 via-purple-900 to-red-900 text-white shadow-lg relative overflow-hidden">
    <div class="container mx-auto px-4 py-16 relative z-10">
        <div class="text-center">
            <div class="flex justify-center items-center space-x-6 mb-6">
                <i class="fas fa-globe text-6xl text-yellow-300 drop-shadow-lg"></i>
                <i class="fas fa-calendar-alt text-6xl text-white drop-shadow-lg"></i>
                <i class="fas fa-flag text-6xl text-blue-300 drop-shadow-lg"></i>
            </div>
            <h1 class="text-6xl font-bold mb-4">Holidays 2026</h1>
            <p class="text-2xl opacity-90 mb-8">Complete Holiday Calendar for USA, UK & International</p>
            <div class="flex justify-center space-x-8 text-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-star-and-crescent text-yellow-300"></i>
                    <span>Religious Holidays</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-landmark text-blue-300"></i>
                    <span>Federal Holidays</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-heart text-red-300"></i>
                    <span>Cultural Events</span>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="absolute -top-8 -right-8 w-40 h-40 bg-white opacity-10 rounded-full"></div>
    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-yellow-300 opacity-20 rounded-full"></div>
</header>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">
    
    <!-- Country/Region Selection -->
    <section class="mb-16">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Select Your Country/Region</h2>
        
        <!-- Main Countries -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            
            <!-- USA Holidays -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-blue-600 via-red-600 to-blue-800 p-8 text-white text-center relative">
                    <div class="w-20 h-12 bg-blue-700 rounded shadow-2xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-sm">USA</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">United States</h3>
                    <p class="text-lg opacity-90">Federal & State Holidays</p>
                    <div class="absolute top-4 right-4">
                        <i class="fas fa-star text-yellow-300 text-2xl animate-pulse"></i>
                    </div>
                </div>
                <div class="p-8">
                    <p class="text-gray-600 mb-6">Comprehensive holiday calendar for all 50 US states including federal holidays, state-specific observances, and cultural celebrations.</p>
                    
                    <!-- Popular States Preview -->
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-8 h-5 bg-red-600 rounded mx-auto mb-1 flex items-center justify-center">
                                <span class="text-white text-xs font-bold">CA</span>
                            </div>
                            <p class="text-xs font-medium">California</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-8 h-5 bg-blue-600 rounded mx-auto mb-1 flex items-center justify-center">
                                <span class="text-white text-xs font-bold">TX</span>
                            </div>
                            <p class="text-xs font-medium">Texas</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-8 h-5 bg-blue-800 rounded mx-auto mb-1 flex items-center justify-center">
                                <span class="text-white text-xs font-bold">NY</span>
                            </div>
                            <p class="text-xs font-medium">New York</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-8 h-5 bg-orange-600 rounded mx-auto mb-1 flex items-center justify-center">
                                <span class="text-white text-xs font-bold">FL</span>
                            </div>
                            <p class="text-xs font-medium">Florida</p>
                        </div>
                    </div>
                    
                    <a href="usa-holiday/" class="block w-full bg-gradient-to-r from-blue-600 to-red-600 text-white text-center py-4 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-red-700 transition-all transform hover:scale-105">
                        <i class="fas fa-flag-usa mr-2"></i>
                        Explore USA Holidays
                    </a>
                </div>
            </div>
            
            <!-- UK Holidays -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-red-700 via-blue-800 to-red-700 p-8 text-white text-center relative">
                    <div class="w-16 h-10 bg-blue-700 rounded shadow-lg flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-800"></div>
            <span class="relative text-white font-bold text-xs">UK</span>
        </div>
                    <h3 class="text-3xl font-bold mb-2">United Kingdom</h3>
                    <p class="text-lg opacity-90">Bank Holidays & Regional Events</p>
                    <div class="absolute top-4 right-4">
                        <i class="fas fa-crown text-yellow-300 text-2xl animate-pulse"></i>
                    </div>
                </div>
                <div class="p-8">
                    <p class="text-gray-600 mb-6">Complete holiday calendar for England, Scotland, Wales, Northern Ireland, and Crown Dependencies with bank holidays and cultural celebrations.</p>
                    
                    <!-- UK Regions Preview -->
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-16 h-10 bg-white rounded shadow-lg flex items-center justify-center relative overflow-hidden border">
            <div class="absolute inset-0 bg-white"></div>
            <div class="absolute h-full w-1 bg-red-600 left-1/2 transform -translate-x-1/2"></div>
            <div class="absolute w-full h-1 bg-red-600 top-1/2 transform -translate-y-1/2"></div>
        </div>
                            <p class="text-xs font-medium">England</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-16 h-10 bg-blue-600 rounded shadow-lg flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 bg-blue-600"></div>
            <div class="absolute w-full h-px bg-white top-1/2 transform -translate-y-1/2 rotate-45"></div>
            <div class="absolute w-full h-px bg-white top-1/2 transform -translate-y-1/2 -rotate-45"></div>
            <span class="relative text-white font-bold text-xs">SC</span>
        </div>
                            <p class="text-xs font-medium">Scotland</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-16 h-10 bg-white rounded shadow-lg flex items-center justify-center relative overflow-hidden border">
            <div class="absolute inset-0 bg-gradient-to-b from-white via-white to-green-600"></div>
            <span class="relative text-red-600 font-bold text-xs">WA</span>
        </div>
                            <p class="text-xs font-medium">Wales</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                            <div class="w-16 h-10 bg-white rounded shadow-lg flex items-center justify-center relative overflow-hidden border">
            <div class="absolute inset-0 bg-white"></div>
            <div class="absolute h-full w-1 bg-red-600 left-1/2 transform -translate-x-1/2"></div>
            <div class="absolute w-full h-1 bg-red-600 top-1/2 transform -translate-y-1/2"></div>
            <span class="relative text-blue-600 font-bold text-xs">NI</span>
        </div>
                            <p class="text-xs font-medium">N. Ireland</p>
                        </div>
                    </div>
                    
                    <a href="uk-holiday/" class="block w-full bg-gradient-to-r from-red-700 to-blue-800 text-white text-center py-4 rounded-lg font-bold text-lg hover:from-red-800 hover:to-blue-900 transition-all transform hover:scale-105">
                        <i class="fas fa-crown mr-2"></i>
                        Explore UK Holidays
                    </a>
                </div>
            </div>
            
        </div>
        
        <!-- International Holidays (Coming Soon) -->
        <div class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl p-8 text-center">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">International Holidays</h3>
            <p class="text-gray-600 mb-4">More countries and regions coming soon!</p>
            <div class="flex justify-center space-x-4 opacity-60">
                <div class="w-10 h-6 bg-blue-600 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">FR</span>
                </div>
                <div class="w-10 h-6 bg-black rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">DE</span>
                </div>
                <div class="w-10 h-6 bg-green-600 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">IT</span>
                </div>
                <div class="w-10 h-6 bg-red-600 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">JP</span>
                </div>
                <div class="w-10 h-6 bg-red-700 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">CN</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Holiday Calendar Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-calendar-check text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Complete Calendars</h3>
                <p class="text-gray-600 text-sm">Full year view with all holidays marked clearly</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-download text-4xl text-green-600 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Download Options</h3>
                <p class="text-gray-600 text-sm">Export calendars to your devices and apps</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-bell text-4xl text-yellow-600 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Holiday Alerts</h3>
                <p class="text-gray-600 text-sm">Never miss important dates and celebrations</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-info-circle text-4xl text-purple-600 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Detailed Info</h3>
                <p class="text-gray-600 text-sm">Learn about holiday history and traditions</p>
            </div>
            
        </div>
    </section>
    
    <!-- Quick Access -->
    <section class="bg-blue-50 rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">Quick Access to Popular Holidays</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <i class="fas fa-champagne-glasses text-2xl text-blue-600 mb-2"></i>
                <h4 class="font-bold text-sm">New Year</h4>
                <p class="text-xs text-gray-600">Jan 1</p>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <i class="fas fa-heart text-2xl text-red-600 mb-2"></i>
                <h4 class="font-bold text-sm">Valentine's</h4>
                <p class="text-xs text-gray-600">Feb 14</p>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <i class="fas fa-egg text-2xl text-purple-600 mb-2"></i>
                <h4 class="font-bold text-sm">Easter</h4>
                <p class="text-xs text-gray-600">Apr 20</p>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <i class="fas fa-flag-usa text-2xl text-blue-600 mb-2"></i>
                <h4 class="font-bold text-sm">Independence</h4>
                <p class="text-xs text-gray-600">Jul 4</p>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <i class="fas fa-ghost text-2xl text-orange-600 mb-2"></i>
                <h4 class="font-bold text-sm">Halloween</h4>
                <p class="text-xs text-gray-600">Oct 31</p>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <i class="fas fa-tree text-2xl text-green-600 mb-2"></i>
                <h4 class="font-bold text-sm">Christmas</h4>
                <p class="text-xs text-gray-600">Dec 25</p>
            </div>
            
        </div>
    </section>
    
</div>

<?php include '../footer.php'; ?>

