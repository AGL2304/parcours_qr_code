<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoQRNav - Repérez des sites via carte interactive et QR codes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- Navigation --}}
    <nav class="bg-white shadow-md p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-600">📍GeoQRNav</div>
            <div class="space-x-4">
                <a href="{{ route('public.parcours') }}" class="text-gray-700 hover:text-blue-500">Accueil</a>
                <a href="{{ route('fonctionnalite') }}" class="text-gray-700 hover:text-blue-500">Fonctionnalités</a>
                <a href="{{ route('a-propos') }}" class="text-gray-700 hover:text-blue-500">À propos</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-500">Contact</a>
            </div>
            <div class="space-x-2">
                <a href="{{ route('login') }}"
                    class="px-3 py-1 border border-blue-600 text-blue-600 rounded hover:bg-blue-50">Connexion</a>

                <a href="{{ route('register') }}"
                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Inscription</a>

            </div>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <main class="container mx-auto px-4 mb-16">
        {{-- Hero section --}}
        <div class="card bg-white p-6 rounded-lg shadow-md mb-8">
            <div class="hero-content flex flex-col md:flex-row items-center">
                <div class="hero-text md:w-1/2 mb-6 md:mb-0">
                    <h1 class="text-3xl font-bold mb-4">Découvrez les sites avec notre carte interactive</h1>
                    <p class="mb-4">
                        Explorez des points d'intérêt, scannez des QR codes et accédez à une expérience interactive
                        enrichie pour vos parcours personnalisés.
                    </p>
                    <div class="auth-buttons space-x-2">
                        <a href="{{ route('public.parcours.liste') }}" class="px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded shadow hover:from-blue-600 hover:to-indigo-700">Commencer
                            l'exploration</a>
                        <a href="#" class="px-4 py-2 font-bold text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-50">En savoir plus</a>
                    </div>
                </div>
                <div class="hero-image md:w-1/2">
                    <div class="map-container relative">
                        <!-- image de la carte -->
                        <img src="https://www.leparisien.fr/resizer/efCs6S_-rGdBhi2P0NQeijAEUws=/932x582/arc-anglerfish-eu-central-1-prod-leparisien.s3.amazonaws.com/public/5UAWECLJVFOXQS6RPEGA3XXU3M.jpg" alt="Carte interactive" class="rounded shadow h-64 w-full object-cover">

                        <div class="map-info mt-4 flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-semibold">Carte Interactive</h3>
                                <p>3 sites disponibles</p>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline px-3 py-2 text-sm">Explorer</a>
                            </div>
                        </div>
                    </div>
            </div>

            </div>
        </div>

        {{-- Fonctionnalités --}}
        <section>
            <h2 class="text-2xl font-bold mb-6">Nos fonctionnalités principales</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="feature-card bg-white p-4 rounded shadow">
                    <div class="feature-icon text-3xl mb-2">🗺️</div>
                    <h3 class="text-xl font-semibold mb-2">Carte Interactive</h3>
                    <p>Naviguez facilement entre les différents points d'intérêt sur notre carte interactive
                        personnalisable.</p>
                </div>
                <div class="feature-card bg-white p-4 rounded shadow">
                    <div class="feature-icon text-3xl mb-2">📱</div>
                    <h3 class="text-xl font-semibold mb-2">Scan QR Code</h3>
                    <p>Accédez instantanément aux informations détaillées en scannant les QR codes des sites.</p>
                </div>
                <div class="feature-card bg-white p-4 rounded shadow">
                    <div class="feature-icon text-3xl mb-2">🛣️</div>
                    <h3 class="text-xl font-semibold mb-2">Parcours Personnalisés</h3>
                    <p>Créez et suivez des parcours adaptés à vos besoins spécifiques pour une exploration sur mesure.
                    </p>
                </div>
            </div>
        </section>
    </main>

    {{-- Pied de page --}}
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

</body>

</html>