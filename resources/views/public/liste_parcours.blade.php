<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploration - GeoQRNav</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
        .difficulty-easy { 
            background: linear-gradient(45deg, #4facfe 0%, #00f2fe 100%); 
        }
        .difficulty-medium { 
            background: linear-gradient(45deg, #43e97b 0%, #38f9d7 100%); 
        }
        .difficulty-hard { 
            background: linear-gradient(45deg, #fa709a 0%, #fee140 100%); 
        }
        .search-glow:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1), 0 0 20px rgba(99, 102, 241, 0.2);
        }
        .filter-btn.active {
            background-color: #5b21b6; /* purple-700 */
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg sticky top-0 z-40">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600">
                    📍GeoQRNav
                </div>
                
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition-colors">Accueil</a>
                    <a href="#" class="text-purple-600 font-semibold border-b-2 border-purple-600">Exploration</a>
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition-colors">À propos</a>
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition-colors">Contact</a>
                </div>
                
                <div class="hidden md:flex items-center space-x-3">
                    <a href="#" class="px-4 py-2 border border-purple-600 text-purple-600 rounded-lg hover:bg-purple-50 transition-colors">Connexion</a>
                    <a href="#" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-lg hover:from-purple-700 hover:to-blue-700 transition-all">Inscription</a>
                </div>
                
                <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="mobile-menu fixed inset-y-0 left-0 w-80 bg-white shadow-2xl z-50 md:hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <div class="text-xl font-bold text-purple-600">📍GeoQRNav</div>
                <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <nav class="space-y-4">
                <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all">Accueil</a>
                <a href="#" class="block py-3 px-4 bg-purple-100 text-purple-600 rounded-lg font-semibold">Exploration</a>
                <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all">À propos</a>
                <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-lg transition-all">Contact</a>
                <div class="border-t pt-4 mt-4 space-y-2">
                    <a href="#" class="block py-2 px-4 text-center border border-purple-600 text-purple-600 rounded-lg hover:bg-purple-50 transition-colors">Connexion</a>
                    <a href="#" class="block py-2 px-4 text-center bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-lg hover:from-purple-700 hover:to-blue-700 transition-all">Inscription</a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Section -->
    <header class="gradient-bg py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center text-white max-w-3xl mx-auto">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">
                    Commencez votre <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-300">exploration</span>
                </h1>
                <p class="text-lg md:text-xl opacity-90 mb-8">
                    Découvrez des parcours uniques et vivez des aventures inoubliables
                </p>
            </div>
        </div>
    </header>

    <!-- Search & Filter Section -->
    <section class="container mx-auto px-4 -mt-8 relative z-20 mb-12">
        <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8">
            <div class="flex flex-col lg:flex-row gap-6 items-center">
                <!-- Search Bar -->
                <div class="flex-1 relative w-full">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input 
                        type="text" 
                        placeholder="Rechercher par nom..." 
                        class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent search-glow transition-all"
                        id="searchInput"
                        oninput="filterParcours()"
                    >
                </div>
                
                <!-- Category Filter -->
                <div class="flex flex-wrap gap-3" id="categoryFilters">
                    <button onclick="filterByCategory(this, 'all')" class="filter-btn active px-4 py-2 rounded-full font-medium transition-all">
                        Tous
                    </button>
                    <button onclick="filterByCategory(this, 'nature')" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium hover:bg-green-100 hover:text-green-700 transition-all">
                        🌿 Nature
                    </button>
                    <button onclick="filterByCategory(this, 'histoire')" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium hover:bg-amber-100 hover:text-amber-700 transition-all">
                        🏛️ Histoire
                    </button>
                    <button onclick="filterByCategory(this, 'aventure')" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium hover:bg-red-100 hover:text-red-700 transition-all">
                        ⚡ Aventure
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Parcours Grid -->
    <main class="container mx-auto px-4 mb-20">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Parcours disponibles</h2>
            <p class="text-gray-600">Choisissez le parcours qui correspond à vos envies d'aventure</p>
        </div>

        <div id="parcoursContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Parcours 1 -->
            <div class="parcours-card bg-white rounded-2xl shadow-lg overflow-hidden hover-scale" data-category="nature" data-difficulty="easy">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=500&h=300&fit=crop" alt="Forêt Enchantée" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="difficulty-easy text-white px-3 py-1 rounded-full text-sm font-medium">Facile</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-sm">
                            🌿 Nature
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold">Forêt Enchantée</h3>
                        <span class="text-yellow-500 text-sm">⭐ 4.8</span>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">Un parcours magique à travers les sentiers secrets de la forêt millénaire. Découvrez la faune et flore exceptionnelles.</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i> 2h30</span>
                            <span><i class="fas fa-route mr-1"></i> 5.2 km</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> 12 sites</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>247 explorateurs</span>
                        </div>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Parcours 2 -->
            <div class="parcours-card bg-white rounded-2xl shadow-lg overflow-hidden hover-scale" data-category="histoire" data-difficulty="medium">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1520637836862-4d197d17c90a?w=500&h=300&fit=crop" alt="Château Mystérieux" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="difficulty-medium text-white px-3 py-1 rounded-full text-sm font-medium">Moyen</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-sm">
                            🏛️ Histoire
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold">Château Mystérieux</h3>
                        <span class="text-yellow-500 text-sm">⭐ 4.6</span>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">Plongez dans l'histoire médiévale et résolvez les énigmes cachées dans les couloirs du château hanté.</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i> 3h15</span>
                            <span><i class="fas fa-route mr-1"></i> 3.8 km</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> 15 sites</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>189 explorateurs</span>
                        </div>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Parcours 3 -->
            <div class="parcours-card bg-white rounded-2xl shadow-lg overflow-hidden hover-scale" data-category="aventure" data-difficulty="hard">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=300&fit=crop" alt="Montagne des Défis" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="difficulty-hard text-white px-3 py-1 rounded-full text-sm font-medium">Difficile</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-all">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-sm">
                            ⚡ Aventure
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold">Montagne des Défis</h3>
                        <span class="text-yellow-500 text-sm">⭐ 4.9</span>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">Un parcours extrême pour les aventuriers chevronnés. Escalade, énigmes complexes et vues époustouflantes.</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i> 5h00</span>
                            <span><i class="fas fa-route mr-1"></i> 8.7 km</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> 20 sites</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>98 explorateurs</span>
                        </div>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Parcours 4 -->
            <div class="parcours-card bg-white rounded-2xl shadow-lg overflow-hidden hover-scale" data-category="nature" data-difficulty="easy">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=500&h=300&fit=crop" alt="Vallée Secrète" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="difficulty-easy text-white px-3 py-1 rounded-full text-sm font-medium">Facile</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-sm">
                            🌿 Nature
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold">Vallée Secrète</h3>
                        <span class="text-yellow-500 text-sm">⭐ 4.7</span>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">Une vallée cachée pleine de merveilles naturelles et de cascades cristallines à découvrir.</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i> 1h45</span>
                            <span><i class="fas fa-route mr-1"></i> 3.2 km</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> 8 sites</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>156 explorateurs</span>
                        </div>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Parcours 5 -->
            <div class="parcours-card bg-white rounded-2xl shadow-lg overflow-hidden hover-scale" data-category="histoire" data-difficulty="medium">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1539650116574-75c0c6d73a6e?w=500&h=300&fit=crop" alt="Ruines Antiques" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="difficulty-medium text-white px-3 py-1 rounded-full text-sm font-medium">Moyen</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-sm">
                            🏛️ Histoire
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold">Ruines Antiques</h3>
                        <span class="text-yellow-500 text-sm">⭐ 4.5</span>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">Explorez les vestiges d'une civilisation perdue et percez ses mystères millénaires.</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i> 2h15</span>
                            <span><i class="fas fa-route mr-1"></i> 4.1 km</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> 11 sites</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>203 explorateurs</span>
                        </div>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Parcours 6 -->
            <div class="parcours-card bg-white rounded-2xl shadow-lg overflow-hidden hover-scale" data-category="aventure" data-difficulty="hard">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=500&h=300&fit=crop" alt="Canyon Extrême" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="difficulty-hard text-white px-3 py-1 rounded-full text-sm font-medium">Difficile</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-sm">
                            ⚡ Aventure
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold">Canyon Extrême</h3>
                        <span class="text-yellow-500 text-sm">⭐ 4.8</span>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">Défi ultime dans les gorges sauvages. Réservé aux explorateurs les plus téméraires.</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-clock mr-1"></i> 4h30</span>
                            <span><i class="fas fa-route mr-1"></i> 7.5 km</span>
                            <span><i class="fas fa-map-marker-alt mr-1"></i> 18 sites</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>67 explorateurs</span>
                        </div>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-medium hover:from-purple-700 hover:to-blue-700 transition-all">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="hidden text-center py-20">
            <div class="text-6xl mb-4">🔍</div>
            <h3 class="text-2xl font-bold text-gray-600 mb-2">Aucun parcours trouvé</h3>
            <p class="text-gray-500">Essayez de modifier vos critères de recherche</p>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="px-8 py-3 bg-white border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-100 transition-all">
                <i class="fas fa-plus mr-2"></i>
                Charger plus de parcours
            </button>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Section GeoQRNav -->
                <div class="text-center lg:text-left">
                    <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">
                        📍GeoQRNav
                    </h3>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Une solution interactive pour explorer des sites à travers une carte et accéder à des informations via QR code.
                    </p>
                    <div class="flex justify-center lg:justify-start space-x-4">
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="text-center lg:text-left">
                    <h3 class="text-lg font-semibold mb-4">Liens utiles</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Fonctionnalités</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div class="text-center lg:text-left">
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tutoriels</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Centre d'aide</a></li>
                    </ul>
                </div>

                <!-- Légal -->
                <div class="text-center lg:text-left">
                    <h3 class="text-lg font-semibold text-white mb-4">Légal</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Mentions légales</a></li>
                    </ul>
                </div>

            </div>

            <div class="mt-12 pt-8 border-t border-gray-700 text-center">
                <p class="text-gray-400">© 2025 GeoQRNav. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // --- Mobile Menu Toggle ---
        const mobileMenu = document.getElementById('mobileMenu');
        function toggleMobileMenu() {
            mobileMenu.classList.toggle('active');
        }

        // --- Filtering Logic ---
        let currentCategory = 'all';
        const searchInput = document.getElementById('searchInput');
        const parcoursContainer = document.getElementById('parcoursContainer');
        const parcoursCards = Array.from(parcoursContainer.getElementsByClassName('parcours-card'));
        const emptyState = document.getElementById('emptyState');
        const categoryFilters = document.getElementById('categoryFilters');

        function filterByCategory(button, category) {
            currentCategory = category;
            
            // Update active button style
            const buttons = categoryFilters.getElementsByClassName('filter-btn');
            for (let btn of buttons) {
                btn.classList.remove('active');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            }
            button.classList.add('active');
            button.classList.remove('bg-gray-200', 'text-gray-700');

            filterParcours();
        }

        function filterParcours() {
            const searchTerm = searchInput.value.toLowerCase();
            let visibleCount = 0;

            parcoursCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const category = card.dataset.category;

                const matchesSearch = title.includes(searchTerm);
                const matchesCategory = (currentCategory === 'all' || category === currentCategory);

                if (matchesSearch && matchesCategory) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show or hide the empty state message
            if (visibleCount === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }
        }
    </script>

</body>
</html>