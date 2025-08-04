<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoQRNav - Fonctionnalités</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #10b981;
            --gradient-start: #3b82f6;
            --gradient-end: #10b981;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        /* Navigation */
        nav {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .btn-outline {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-gradient {
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            color: white;
        }
        
        .btn-gradient:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        
        /* Main Content */
        .main-content {
            padding: 2rem 0;
        }
        
        h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #111827;
        }
        
        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 2rem 0 1.5rem;
            color: #1f2937;
        }
        
        /* Feature Styles */
        .feature-banner {
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            padding: 3rem 0;
            color: white;
            margin-bottom: 3rem;
            border-radius: 0.5rem;
            text-align: center;
        }
        
        .feature-banner h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .feature-banner p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .feature-section {
            margin-bottom: 4rem;
        }
        
        .feature-main {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .feature-image {
            flex: 1;
            background-color: #e5e7eb;
            height: 400px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .feature-info {
            flex: 1;
        }
        
        .feature-info h2 {
            margin-top: 0;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .feature-info p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
            color: #4b5563;
        }
        
        .feature-list {
            margin-top: 1.5rem;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .feature-icon {
            font-size: 1.5rem;
            margin-right: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            border-radius: 50%;
            color: white;
        }
        
        .feature-advantages {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .advantage-card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .advantage-card:hover {
            transform: translateY(-5px);
        }
        
        .advantage-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .advantage-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .cta-section {
            background-color: white;
            padding: 3rem;
            border-radius: 0.5rem;
            text-align: center;
            margin: 3rem 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .cta-section h2 {
            margin-top: 0;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        /* Footer */
        footer {
            background-color: #1f2937;
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: white;
        }
        
        .footer-section a {
            display: block;
            color: #9ca3af;
            text-decoration: none;
            margin-bottom: 0.75rem;
            transition: color 0.3s;
        }
        
        .footer-section a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: #374151;
            border-radius: 50%;
            text-decoration: none;
            color: white;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            transform: translateY(-3px);
            background-color: var(--primary-color);
        }
        
        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid #374151;
            color: #9ca3af;
        }
        
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .feature-main {
                flex-direction: column;
            }
            
            .feature-advantages {
                grid-template-columns: 1fr;
            }
        }


        .mobile-menu {
            display: none;
        }
        .mobile-menu.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="text-xl md:text-2xl font-bold text-blue-600">📍GeoQRNav</div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('public.parcours') }}" class="text-gray-700 hover:text-blue-500 transition-colors">Accueil</a>
                    <a href="{{ route('fonctionnalite') }}" class="text-gray-700 hover:text-blue-500 transition-colors">Fonctionnalités</a>
                    <a href="{{ route('a-propos') }}" class="text-gray-700 hover:text-blue-500 transition-colors">À propos</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-500 transition-colors">Contact</a>
                </div>
                
                <!-- Desktop Auth Buttons -->
                <div class="hidden md:flex space-x-2">
                    <a href="{{ route('login') }}" class="px-3 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Inscription</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700 hover:text-blue-500 focus:outline-none" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="mobile-menu md:hidden bg-white border-t border-gray-200">
                <div class="px-4 py-2 space-y-2">
                    <a href="{{ route('public.parcours') }}" class="block py-2 text-gray-700 hover:text-blue-500 transition-colors">Accueil</a>
                    <a href="{{ route('fonctionnalite') }}" class="block py-2 text-gray-700 hover:text-blue-500 transition-colors">Fonctionnalités</a>
                    <a href="{{ route('a-propos') }}" class="block py-2 text-gray-700 hover:text-blue-500 transition-colors">À propos</a>
                    <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-blue-500 transition-colors">Contact</a>
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <a href="{{ route('login') }}" class="block py-2 px-4 text-center border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition-colors mb-2">Connexion</a>
                        <a href="{{ route('register') }}" class="block py-2 px-4 text-center bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Inscription</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Banner Section -->
            <div class="feature-banner">
                <h1>Découvrez nos fonctionnalités</h1>
                <p>
                    GeoQRNav vous offre une gamme complète d'outils pour localiser, explorer et personnaliser votre expérience de navigation. Profitez d'une technologie de pointe pour des parcours interactifs enrichis.
                </p>
            </div>

            <!-- Carte Interactive -->
            <div class="feature-section">
                <div class="feature-main">
                    <div class="feature-image">
                        <img src="{{ asset('img/maps.png') }}" alt="Carte interactive" />
                    </div>
                    <div class="feature-info">
                        <h2>Carte Interactive</h2>
                        <p>
                            Notre carte interactive vous offre une expérience de navigation fluide et intuitive. Visualisez en temps réel tous les points d'intérêt disponibles et accédez rapidement aux informations essentielles.
                        </p>
                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-icon">📍</div>
                                <div>
                                    <strong>Géolocalisation précise</strong>
                                    <p>Repérez facilement votre position actuelle et les points d'intérêt à proximité.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔍</div>
                                <div>
                                    <strong>Filtres avancés</strong>
                                    <p>Filtrez les points d'intérêt par catégorie, distance ou popularité.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔄</div>
                                <div>
                                    <strong>Mise à jour en temps réel</strong>
                                    <p>Visualisez les mises à jour et nouveaux sites instantanément sur votre carte.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QR Code -->
            <div class="feature-section">
                <div class="feature-main">
                    <div class="feature-info">
                        <h2>Technologie QR Code</h2>
                        <p>
                            Accédez instantanément à des informations détaillées sur chaque site en scannant simplement un QR code. Obtenez des contenus enrichis et interactifs pour une expérience immersive.
                        </p>
                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-icon">📱</div>
                                <div>
                                    <strong>Scan instantané</strong>
                                    <p>Scanner un QR code vous donne accès immédiat à toutes les informations du site.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔊</div>
                                <div>
                                    <strong>Contenu multimédia</strong>
                                    <p>Découvrez des photos, vidéos et contenus audio liés à chaque point d'intérêt.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">📝</div>
                                <div>
                                    <strong>Informations complètes</strong>
                                    <p>Accédez à un descriptif détaillé, historique et caractéristiques du site.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="feature-image">
                        <img src="{{ asset('img/qrcode.png') }}" alt="Scan QR Code" />
                    </div>
                </div>
            </div>

            <!-- Parcours Personnalisés -->
            <div class="feature-section">
                <div class="feature-main">
                    <div class="feature-image">
                        <img src="{{ asset('img/parcours.png') }}" alt="Parcours personnalisés" />
                    </div>
                    <div class="feature-info">
                        <h2>Parcours Personnalisés</h2>
                        <p>
                            Créez et suivez des itinéraires sur mesure adaptés à vos centres d'intérêt, votre temps disponible et vos préférences. Organisez votre exploration de manière optimale.
                        </p>
                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-icon">🛣️</div>
                                <div>
                                    <strong>Création d'itinéraires</strong>
                                    <p>Concevez facilement votre propre parcours en sélectionnant les sites à visiter.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">⏱️</div>
                                <div>
                                    <strong>Estimation de durée</strong>
                                    <p>Visualisez le temps estimé pour chaque parcours et optimisez votre planning.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔖</div>
                                <div>
                                    <strong>Sauvegarde de parcours</strong>
                                    <p>Enregistrez vos parcours favoris pour une utilisation ultérieure.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Avantages Supplémentaires -->
            <h2>Avantages supplémentaires</h2>
            <div class="feature-advantages">
                <div class="advantage-card">
                    <div class="advantage-icon">📊</div>
                    <div class="advantage-title">Statistiques de visite</div>
                    <p>Suivez votre historique de visites et analysez vos préférences de navigation.</p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🌐</div>
                    <div class="advantage-title">Mode hors ligne</div>
                    <p>Accédez à vos parcours et informations essentielles même sans connexion internet.</p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🔔</div>
                    <div class="advantage-title">Notifications personnalisées</div>
                    <p>Recevez des alertes sur les nouveaux sites ou événements correspondant à vos intérêts.</p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">👥</div>
                    <div class="advantage-title">Partage social</div>
                    <p>Partagez facilement vos parcours et découvertes avec votre réseau.</p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🔒</div>
                    <div class="advantage-title">Sécurité des données</div>
                    <p>Vos données personnelles sont protégées par un système de cryptage avancé.</p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🔄</div>
                    <div class="advantage-title">Synchronisation multi-appareils</div>
                    <p>Accédez à votre compte depuis n'importe quel appareil avec une synchronisation instantanée.</p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <h2>Prêt à commencer votre exploration ?</h2>
                <p>Créez votre compte gratuitement et découvrez toutes nos fonctionnalités avancées.</p>
                <div class="cta-buttons">
                    <a href="{{ route('register') }}" class="btn btn-gradient">S'inscrire maintenant</a>
                    <a href="#" class="btn btn-outline">Voir une démo</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Section GeoQRNav -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">GeoQRNav</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Une solution interactive pour repérer des sites à travers une carte et accéder à des
                        informations via QR code.
                    </p>
                    <div class="flex space-x-4">
                        <!-- Remplacement des emojis par des icônes SVG pour un meilleur contrôle et accessibilité -->
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Section Liens utiles -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Liens utiles</h3>
                    <!-- Utilisation de <ul> pour une liste sémantique -->
                    <ul class="space-y-2">
                        <li><a href="{{ route('public.parcours') }}" class="text-gray-400 hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="{{ route('fonctionnalite') }}" class="text-gray-400 hover:text-white transition-colors">Fonctionnalités</a>
                        </li>
                        <li><a href="{{ route('a-propos') }}" class="text-gray-400 hover:text-white transition-colors">À propos</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Section Support -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tutoriels</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Centre d'aide</a></li>
                    </ul>
                </div>

                <!-- Section Légal -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Légal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Conditions
                                d'utilisation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Politique de
                                confidentialité</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Mentions légales</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Ligne de séparation et copyright -->
            <div class="mt-8 pt-8 border-t border-gray-700">
                <p class="text-center text-sm text-gray-400">
                    © 2025 GeoQRNav. Tous droits réservés. 
                </p>
            </div>
        </div>
    </footer>


    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
        }

        // Fermer le menu mobile quand on clique sur un lien
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobileMenu').classList.remove('active');
            });
        });

        // Fermer le menu mobile si on redimensionne vers desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                document.getElementById('mobileMenu').classList.remove('active');
            }
        });
    </script>
</body>
</html>