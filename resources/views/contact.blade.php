<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - GeoQRNav</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    
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

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
            margin: 1rem 0;
        }

        .hours-day {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem;
            background-color: #f9fafb;
            border-radius: 0.375rem;
        }

        .hours-day.today {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            color: white;
        }

        .faq-item {
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 0;
        }

        .faq-question {
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: color 0.3s;
        }

        .faq-question:hover {
            color: #6366f1;
        }

        .faq-answer {
            margin-top: 0;
            color: #6b7280;
            line-height: 1.6;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding-top 0.3s ease-out;
            padding-top: 0;
        }

        .faq-answer.open {
            padding-top: 1rem;
        }

        .faq-toggle {
            font-size: 1.5rem;
            transition: transform 0.3s;
        }

        .faq-toggle.active {
            transform: rotate(45deg);
        }

        /* Style pour le conteneur de la carte */
        #map {
            height: 400px;
            border-radius: 0.5rem;
            z-index: 0; /* Assure que la carte est bien positionnée */
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Hero Section -->
            <div class="card">
                <h1 class="text-4xl font-bold mb-6">Contactez-nous</h1>
                <p class="text-lg text-gray-600 mb-8">
                    Vous avez une question, une suggestion ou besoin d'aide ? Notre équipe est là pour vous accompagner. 
                    N'hésitez pas à nous contacter par le moyen qui vous convient le mieux.
                </p>
            </div>

            <!-- Contact Information -->
            <h2 class="text-3xl font-semibold mb-4">Nos coordonnées</h2>
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="contact-icon">📧</div>
                    <h3 class="text-xl font-semibold mb-2">Email</h3>
                    <p class="text-gray-600 mb-2">Contactez-nous par email</p>
                    <a href="mailto:contact@geoqrnav.com" class="text-indigo-600 font-semibold hover:underline">contact@geoqrnav.com</a>
                    <p class="text-sm text-gray-500 mt-2">Réponse sous 24h</p>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">📞</div>
                    <h3 class="text-xl font-semibold mb-2">Téléphone</h3>
                    <p class="text-gray-600 mb-2">Appelez-nous directement</p>
                    <a href="tel:+33123456789" class="text-indigo-600 font-semibold hover:underline">+33 1 23 45 67 89</a>
                    <p class="text-sm text-gray-500 mt-2">Lun-Ven 9h-18h</p>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <h3 class="text-xl font-semibold mb-2">Adresse</h3>
                    <p class="text-gray-600 mb-2">Venez nous rendre visite</p>
                    <address class="text-indigo-600 font-semibold not-italic">
                        123 Rue de l'Innovation<br>
                        75001 Paris, France
                    </address>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">💬</div>
                    <h3 class="text-xl font-semibold mb-2">Chat en direct</h3>
                    <p class="text-gray-600 mb-2">Support instantané</p>
                    <button class="text-indigo-600 font-semibold hover:underline">Démarrer le chat</button>
                    <p class="text-sm text-gray-500 mt-2">Disponible 24h/7j</p>
                </div>
            </div>

            <!-- Contact Form -->
            <h2 class="text-3xl font-semibold mb-4">Envoyez-nous un message</h2>
            <div class="card">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom *</label>
                        <input type="text" id="nom" name="nom" required class="form-input" placeholder="Votre nom">
                    </div>
                    
                    <div class="form-group">
                        <label for="prenom" class="form-label">Prénom *</label>
                        <input type="text" id="prenom" name="prenom" required class="form-input" placeholder="Votre prénom">
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" id="email" name="email" required class="form-input" placeholder="votre@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" class="form-input" placeholder="+33 1 23 45 67 89">
                    </div>
                    
                    <div class="form-group md:col-span-2">
                        <label for="sujet" class="form-label">Sujet *</label>
                        <select id="sujet" name="sujet" required class="form-input">
                            <option value="">Choisissez un sujet</option>
                            <option value="support">Support technique</option>
                            <option value="commercial">Question commerciale</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="suggestion">Suggestion</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group md:col-span-2">
                        <label for="message" class="form-label">Message *</label>
                        <textarea id="message" name="message" required class="form-input form-textarea" placeholder="Décrivez votre demande en détail..."></textarea>
                    </div>
                    
                    <div class="md:col-span-2">
                        <button type="submit" class="btn btn-gradient px-8 py-3">Envoyer le message</button>
                    </div>
                </form>
            </div>

            <!-- Hours -->
            <h2 class="text-3xl font-semibold mb-4">Horaires d'ouverture</h2>
            <div class="card">
                <div class="hours-grid">
                    <div class="hours-day">
                        <span class="font-semibold">Lundi</span>
                        <span>9h00 - 18h00</span>
                    </div>
                    <div class="hours-day">
                        <span class="font-semibold">Mardi</span>
                        <span>9h00 - 18h00</span>
                    </div>
                    <div class="hours-day today">
                        <span class="font-semibold">Mercredi</span>
                        <span>9h00 - 18h00</span>
                    </div>
                    <div class="hours-day">
                        <span class="font-semibold">Jeudi</span>
                        <span>9h00 - 18h00</span>
                    </div>
                    <div class="hours-day">
                        <span class="font-semibold">Vendredi</span>
                        <span>9h00 - 18h00</span>
                    </div>
                    <div class="hours-day">
                        <span class="font-semibold">Samedi</span>
                        <span>10h00 - 16h00</span>
                    </div>
                    <div class="hours-day">
                        <span class="font-semibold">Dimanche</span>
                        <span>Fermé</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mt-4">
                    <strong>Note :</strong> En cas d'urgence technique, notre support est disponible 24h/7j via le chat en direct.
                </p>
            </div>

            <!-- FAQ -->
            <h2 class="text-3xl font-semibold mb-4">Questions fréquentes</h2>
            <div class="card" id="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Comment créer mon premier parcours ?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Après inscription, rendez-vous dans votre tableau de bord et cliquez sur "Nouveau parcours". 
                        Vous pourrez ensuite ajouter des points d'intérêt, télécharger des contenus multimédias et générer vos QR codes.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>GeoQRNav est-il gratuit ?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Nous proposons une version gratuite avec des fonctionnalités de base, ainsi que des plans premium 
                        pour les utilisateurs avancés et les entreprises. Consultez notre page tarifs pour plus de détails.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Puis-je utiliser GeoQRNav hors ligne ?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        L'application mobile permet de télécharger les parcours pour une utilisation hors ligne. 
                        Cependant, certaines fonctionnalités nécessitent une connexion internet.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Comment obtenir un support technique ?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Vous pouvez nous contacter via le chat en direct, par email à support@geoqrnav.com, 
                        ou consulter notre centre d'aide en ligne avec guides et tutoriels.
                    </div>
                </div>
            </div>

            <!-- Map -->
            <h2 class="text-3xl font-semibold mb-4">Où nous trouver</h2>
            <div class="card">
                <!-- Conteneur pour la carte Leaflet -->
                <div id="map"></div>
                <div class="mt-4 flex flex-wrap gap-4">
                    <!-- Lien mis à jour pour pointer vers les coordonnées sur Google Maps -->
                    <a href="https://www.google.com/maps/search/?api=1&query=48.85895,2.34695" target="_blank" rel="noopener noreferrer" class="text-indigo-600 hover:underline">📍 Ouvrir dans Google Maps</a>
                    <a href="#" class="text-indigo-600 hover:underline">🚇 Stations de métro à proximité</a>
                    <a href="#" class="text-indigo-600 hover:underline">🚗 Informations parking</a>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-10 mb-8">
                <h2 class="text-3xl font-semibold mb-4">Une question spécifique ?</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Notre équipe d'experts est là pour vous aider à tirer le meilleur parti de GeoQRNav.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="#" class="btn btn-gradient px-6 py-3">Prendre rendez-vous</a>
                    <a href="#" class="btn btn-outline px-6 py-3">Centre d'aide</a>
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

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- FONCTIONNALITÉ FAQ ---
            const faqContainer = document.getElementById('faq-container');
            if (faqContainer) {
                faqContainer.addEventListener('click', function(e) {
                    const questionHeader = e.target.closest('.faq-question');
                    if (!questionHeader) return;

                    const faqItem = questionHeader.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const toggle = faqItem.querySelector('.faq-toggle');
                    const isOpen = answer.classList.contains('open');

                    // Fermer toutes les autres réponses
                    faqContainer.querySelectorAll('.faq-answer.open').forEach(openAnswer => {
                        if (openAnswer !== answer) {
                            openAnswer.classList.remove('open');
                            openAnswer.style.maxHeight = '0';
                            const otherToggle = openAnswer.parentElement.querySelector('.faq-toggle');
                            if(otherToggle) {
                               otherToggle.textContent = '+';
                               otherToggle.classList.remove('active');
                            }
                        }
                    });
                    
                    // Ouvrir ou fermer la réponse cliquée
                    if (isOpen) {
                        answer.classList.remove('open');
                        answer.style.maxHeight = '0';
                        toggle.textContent = '+';
                        toggle.classList.remove('active');
                    } else {
                        answer.classList.add('open');
                        answer.style.maxHeight = answer.scrollHeight + '100px';
                        toggle.textContent = '−';
                        toggle.classList.add('active');
                    }
                });
            }

            // --- INITIALISATION DE LA CARTE LEAFLET ---
            // Coordonnées pour "123 Rue de l'Innovation, 75001 Paris" (adresse fictive, centrée près de Châtelet)
            const mapCoords = [48.85895, 2.34695]; 
            const map = L.map('map').setView(mapCoords, 15);

            // Ajout du fond de carte OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Ajout d'un marqueur sur la carte
            const marker = L.marker(mapCoords).addTo(map);

            // Ajout d'une infobulle (popup) au marqueur
            marker.bindPopup("<b>GeoQRNav</b><br>123 Rue de l'Innovation<br>75001 Paris, France").openPopup();


            // --- AUTRES SCRIPTS DE LA PAGE ---

            // Déterminer le jour actuel pour les horaires
            const today = new Date().getDay(); // 0 = Dimanche, 1 = Lundi, ...
            const dayElements = document.querySelectorAll('.hours-day');
            
            dayElements.forEach(element => {
                element.classList.remove('today');
            });
            
            const dayIndex = today === 0 ? 6 : today - 1; 
            if (dayElements[dayIndex]) {
                dayElements[dayIndex].classList.add('today');
            }
            
            // Fonctionnalité du chat en direct
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('Démarrer le chat')) {
                    button.addEventListener('click', function() {
                        alert('Chat en direct non implémenté dans cette démo. Contactez-nous par email ou téléphone.');
                    });
                }
            });
            
            // Validation du formulaire de contact
            const contactForm = document.querySelector('form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const nom = document.getElementById('nom')?.value.trim();
                    const prenom = document.getElementById('prenom')?.value.trim();
                    const email = document.getElementById('email')?.value.trim();
                    const sujet = document.getElementById('sujet')?.value;
                    const message = document.getElementById('message')?.value.trim();
                    
                    if (!nom || !prenom || !email || !sujet || !message) {
                        alert('Veuillez remplir tous les champs obligatoires.');
                        return;
                    }
                    
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert('Veuillez entrer une adresse email valide.');
                        return;
                    }
                    
                    const submitButton = contactForm.querySelector('button[type="submit"]');
                    const originalText = submitButton.textContent;
                    
                    submitButton.textContent = 'Envoi en cours...';
                    submitButton.disabled = true;
                    
                    setTimeout(() => {
                        alert('Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.');
                        contactForm.reset();
                        submitButton.textContent = originalText;
                        submitButton.disabled = false;
                    }, 2000);
                });
            }
        });
    </script>

</body>
</html>