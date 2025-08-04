<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - GeoQRNav</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        nav {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }
        
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, #4f46e5, #7c3aed);
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
            color: #6366f1;
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .btn-outline {
            border: 1px solid #6366f1;
            color: #6366f1;
        }
        
        .btn-outline:hover {
            background-color: #f3f4f6;
        }
        
        .btn-gradient {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            color: white;
        }
        
        .btn-gradient:hover {
            opacity: 0.9;
        }
        
        .main-content {
            padding: 2rem 0;
        }
        
        h1 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        h2 {
            font-size: 1.875rem;
            font-weight: 600;
            margin: 2rem 0 1.5rem;
            color: #1f2937;
        }
        
        footer {
            background-color: #1f2937;
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer-section a {
            display: block;
            color: #9ca3af;
            text-decoration: none;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }
        
        .footer-section a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            background-color: #374151;
            border-radius: 50%;
            transition: background-color 0.3s;
        }
        
        .social-icon:hover {
            background-color: #4b5563;
        }
        
        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid #374151;
            color: #9ca3af;
        }

        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .member-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .stat-card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            text-align: center;
        }

        .stat-number {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 2rem auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #e5e7eb;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -12px;
            top: 15px;
            border-radius: 50%;
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            z-index: 1;
        }

        .left {
            left: 0;
        }

        .right {
            left: 50%;
        }

        .right::after {
            left: -12px;
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
            <!-- Hero Section -->
            <div class="card">
                <h1 class="text-4xl font-bold mb-6">À propos de GeoQRNav</h1>
                <p class="text-lg text-gray-600 mb-8">
                    GeoQRNav est né d'une vision simple : rendre l'exploration des sites et points d'intérêt plus interactive, 
                    informative et accessible à tous. Notre plateforme combine les dernières technologies de géolocalisation 
                    et de QR codes pour créer une expérience utilisateur unique et enrichissante.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Notre mission</h2>
                        <p class="text-gray-600 mb-4">
                            Nous nous engageons à transformer la façon dont les gens découvrent et interagissent avec les lieux qui les entourent. 
                            Notre mission est de fournir des outils simples mais puissants qui permettent à chacun de créer, partager et explorer 
                            des parcours personnalisés riches en informations.
                        </p>
                        <p class="text-gray-600">
                            Que vous soyez un touriste curieux, un guide touristique professionnel, un organisme culturel ou une entreprise 
                            souhaitant valoriser son patrimoine, GeoQRNav vous offre une solution adaptée à vos besoins.
                        </p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Notre vision</h2>
                        <p class="text-gray-600 mb-4">
                            Nous imaginons un monde où chaque lieu raconte son histoire, où l'information est accessible instantanément 
                            et où l'exploration devient une expérience enrichissante pour tous.
                        </p>
                        <p class="text-gray-600">
                            GeoQRNav aspire à devenir la référence en matière de navigation interactive et de découverte de sites, 
                            en proposant constamment des fonctionnalités innovantes et des contenus de qualité à notre communauté grandissante.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <h2 class="text-3xl font-semibold mb-4">Nos chiffres clés</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">10,000+</div>
                    <p class="text-gray-600">Utilisateurs actifs</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">500+</div>
                    <p class="text-gray-600">Parcours créés</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15,000+</div>
                    <p class="text-gray-600">Points d'intérêt</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">25+</div>
                    <p class="text-gray-600">Pays couverts</p>
                </div>
            </div>

            <!-- Notre histoire -->
            <h2 class="text-3xl font-semibold mb-4">Notre histoire</h2>
            <div class="card">
                <div class="timeline">
                    <div class="timeline-item left">
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-xl font-semibold mb-2">2022</h3>
                            <p class="text-gray-600">Naissance de l'idée GeoQRNav lors d'un hackathon sur les technologies de géolocalisation.</p>
                        </div>
                    </div>
                    <div class="timeline-item right">
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-xl font-semibold mb-2">2023</h3>
                            <p class="text-gray-600">Lancement de la version bêta et premiers partenariats avec des offices de tourisme.</p>
                        </div>
                    </div>
                    <div class="timeline-item left">
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-xl font-semibold mb-2">2024</h3>
                            <p class="text-gray-600">Développement de l'application mobile et expansion internationale.</p>
                        </div>
                    </div>
                    <div class="timeline-item right">
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-xl font-semibold mb-2">2025</h3>
                            <p class="text-gray-600">Lancement de la version 2.0 avec des fonctionnalités de réalité augmentée et intelligence artificielle.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notre équipe -->
            <h2 class="text-3xl font-semibold mb-4">Notre équipe</h2>
            <p class="text-lg text-gray-600 mb-6">
                Derrière GeoQRNav se trouve une équipe passionnée de développeurs, designers et experts en géographie qui s'efforcent de créer la meilleure expérience possible pour nos utilisateurs.
            </p>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">👩‍💻</div>
                    <h3 class="text-xl font-semibold mb-1">Sophie Martin</h3>
                    <p class="text-indigo-600 mb-2">Fondatrice & CEO</p>
                    <p class="text-gray-600">Passionnée de technologie et de voyages, Sophie a fondé GeoQRNav avec l'ambition de révolutionner l'exploration urbaine.</p>
                </div>
                <div class="team-member">
                    <div class="member-photo">👨‍💻</div>
                    <h3 class="text-xl font-semibold mb-1">Thomas Dubois</h3>
                    <p class="text-indigo-600 mb-2">Directeur Technique</p>
                    <p class="text-gray-600">Expert en développement web et mobile, Thomas supervise l'architecture technique de la plateforme.</p>
                </div>
                <div class="team-member">
                    <div class="member-photo">👩‍🎨</div>
                    <h3 class="text-xl font-semibold mb-1">Emma Leroy</h3>
                    <p class="text-indigo-600 mb-2">Directrice UX/UI</p>
                    <p class="text-gray-600">Designer expérimentée, Emma veille à ce que l'expérience utilisateur soit intuitive et agréable.</p>
                </div>
            </div>

            <!-- Nos valeurs -->
            <h2 class="text-3xl font-semibold mb-4">Nos valeurs</h2>
            <div class="card">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                        <p class="text-gray-600 mb-4">
                            Nous repoussons constamment les limites de ce qui est possible, en intégrant les dernières technologies 
                            pour offrir une expérience toujours plus immersive et informative.
                        </p>
                        <h3 class="text-xl font-semibold mb-2">Accessibilité</h3>
                        <p class="text-gray-600">
                            Nous croyons que l'information et la découverte doivent être accessibles à tous, c'est pourquoi 
                            nous concevons nos solutions avec une approche inclusive.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Qualité</h3>
                        <p class="text-gray-600 mb-4">
                            Nous nous engageons à fournir des contenus de haute qualité et des fonctionnalités fiables 
                            qui enrichissent véritablement l'expérience d'exploration.
                        </p>
                        <h3 class="text-xl font-semibold mb-2">Communauté</h3>
                        <p class="text-gray-600">
                            Nous valorisons la participation et les retours de notre communauté d'utilisateurs, qui jouent 
                            un rôle essentiel dans l'évolution de notre plateforme.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-10 mb-8">
                <h2 class="text-3xl font-semibold mb-4">Rejoignez l'aventure GeoQRNav</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Prêt à transformer votre façon d'explorer le monde ? Inscrivez-vous gratuitement et commencez dès aujourd'hui !
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('register') }}" class="btn btn-gradient px-6 py-3">S'inscrire gratuitement</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline px-6 py-3">Nous contacter</a>
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