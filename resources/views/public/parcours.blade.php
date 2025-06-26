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
            <div class="text-2xl font-bold text-blue-600">GeoQRNav</div>
            <div class="space-x-4">
                <a href="{{ route('public.parcours') }}" class="text-gray-700 hover:text-blue-500">Accueil</a>
                <a href="#" class="text-gray-700 hover:text-blue-500">Fonctionnalités</a>
                <a href="#" class="text-gray-700 hover:text-blue-500">À propos</a>
                <a href="#" class="text-gray-700 hover:text-blue-500">Contact</a>
            </div>
            <div class="space-x-2">
                <a href="{{ route('login') }}" class="px-3 py-1 border border-blue-600 text-blue-600 rounded hover:bg-blue-50">Connexion</a>

                <a href="{{ route('register') }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Inscription</a>

            </div>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <main class="container mx-auto px-4">
        {{-- Hero section --}}
        <div class="card bg-white p-6 rounded-lg shadow-md mb-8">
            <div class="hero-content flex flex-col md:flex-row items-center">
                <div class="hero-text md:w-1/2 mb-6 md:mb-0">
                    <h1 class="text-3xl font-bold mb-4">Découvrez les sites avec notre carte interactive</h1>
                    <p class="mb-4">
                        Explorez des points d'intérêt, scannez des QR codes et accédez à une expérience interactive enrichie pour vos parcours personnalisés.
                    </p>
                    <div class="auth-buttons space-x-2">
                        <a href="{{ route('public.parcours.liste') }}" class="btn btn-gradient">Commencer l'exploration</a>
                        <a href="#" class="btn btn-outline">En savoir plus</a>
                    </div>
                </div>
                <div class="hero-image md:w-1/2">
                    <div class="map-container relative">
                        <div class="map-placeholder bg-gray-200 h-64 rounded">
                            <div class="map-point point-1"></div>
                            <div class="map-point point-2"></div>
                            <div class="map-point point-3"></div>
                        </div>
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
                    <p>Naviguez facilement entre les différents points d'intérêt sur notre carte interactive personnalisable.</p>
                </div>
                <div class="feature-card bg-white p-4 rounded shadow">
                    <div class="feature-icon text-3xl mb-2">📱</div>
                    <h3 class="text-xl font-semibold mb-2">Scan QR Code</h3>
                    <p>Accédez instantanément aux informations détaillées en scannant les QR codes des sites.</p>
                </div>
                <div class="feature-card bg-white p-4 rounded shadow">
                    <div class="feature-icon text-3xl mb-2">🛣️</div>
                    <h3 class="text-xl font-semibold mb-2">Parcours Personnalisés</h3>
                    <p>Créez et suivez des parcours adaptés à vos besoins spécifiques pour une exploration sur mesure.</p>
                </div>
            </div>
        </section>
    </main>

    {{-- Pied de page --}}
    <footer class="bg-gray-800 text-white mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="footer-content grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-semibold mb-2">GeoQRNav</h3>
                    <p class="text-gray-400">Une solution interactive pour repérer des sites à travers une carte et accéder à des infos via QR code.</p>
                    <div class="flex space-x-2 mt-4">
                        <a href="#" class="text-xl">📘</a>
                        <a href="#" class="text-xl">🐦</a>
                        <a href="#" class="text-xl">📸</a>
                        <a href="#" class="text-xl">💼</a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Liens utiles</h3>
                    <ul class="space-y-1 text-gray-400">
                        <li><a href="{{ route('public.parcours') }}">Accueil</a></li>
                        <li><a href="#">Fonctionnalités</a></li>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Support</h3>
                    <ul class="space-y-1 text-gray-400">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Tutoriels</a></li>
                        <li><a href="#">Centre d'aide</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Légal</h3>
                    <ul class="space-y-1 text-gray-400">
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-gray-500 text-sm">
                &copy; 2025 GeoQRNav. Tous droits réservés.
            </div>
        </div>
    </footer>





</body>
</html>
