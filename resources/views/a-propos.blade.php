@extends('layouts.app')

@section('title', 'À propos')

@section('styles')
<style>
    .btn-gradient {
        background: linear-gradient(to right, #4f46e5, #7c3aed);
        color: white;
        border-radius: 0.375rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-gradient:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
    
    .btn-outline {
        border: 2px solid #4f46e5;
        color: #4f46e5;
        border-radius: 0.375rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-outline:hover {
        background-color: #4f46e5;
        color: white;
    }
    
    .card {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    @media (min-width: 640px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    
    .stat-card {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        text-align: center;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #4f46e5;
        margin-bottom: 0.5rem;
    }
    
    .timeline {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .timeline::after {
        content: '';
        position: absolute;
        width: 6px;
        background-color: #4f46e5;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -3px;
    }
    
    .timeline-item {
        padding: 10px 40px;
        position: relative;
        width: 50%;
        box-sizing: border-box;
    }
    
    .left {
        left: 0;
    }
    
    .right {
        left: 50%;
    }
    
    .timeline-item::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        right: -10px;
        background-color: white;
        border: 4px solid #4f46e5;
        top: 15px;
        border-radius: 50%;
        z-index: 1;
    }
    
    .right::after {
        left: -10px;
    }
    
    .team-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    @media (min-width: 640px) {
        .team-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 768px) {
        .team-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    .team-member {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        text-align: center;
    }
    
    .member-photo {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    
    /* Responsive fixes for timeline on mobile */
    @media screen and (max-width: 767px) {
        .timeline::after {
            left: 31px;
        }
        
        .timeline-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
        }
        
        .timeline-item::after {
            left: 21px;
        }
        
        .left, .right {
            left: 0;
        }
    }
</style>
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="card">
            <h1 class="text-4xl font-bold mb-6">À propos de GeoQRNav</h1>
            <p class="text-lg text-gray-600 mb-8">
                GeoQRNav est né d'une vision simple : rendre l'exploration des sites et points d'intérêt plus
                interactive, informative et accessible à tous. Notre plateforme combine les dernières technologies de
                géolocalisation et de QR codes pour créer une expérience utilisateur unique et enrichissante.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Notre mission</h2>
                    <p class="text-gray-600 mb-4">
                        Nous nous engageons à transformer la façon dont les gens découvrent et interagissent avec
                        les lieux qui les entourent. Notre mission est de fournir des outils simples mais puissants qui permettent à chacun de
                        créer, partager et explorer des parcours personnalisés riches en informations.
                    </p>
                    <p class="text-gray-600">
                        Que vous soyez un touriste curieux, un guide touristique professionnel, un organisme
                        culturel ou une entreprise souhaitant valoriser son patrimoine, GeoQRNav vous offre une solution adaptée à vos besoins.
                    </p>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Notre vision</h2>
                    <p class="text-gray-600 mb-4">
                        Nous imaginons un monde où chaque lieu raconte son histoire, où l'information est accessible
                        instantanément et où l'exploration devient une expérience enrichissante pour tous.
                    </p>
                    <p class="text-gray-600">
                        GeoQRNav aspire à devenir la référence en matière de navigation interactive et de découverte
                        de sites, en proposant constamment des fonctionnalités innovantes et des contenus de qualité à notre
                        communauté grandissante.
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
                        <p class="text-gray-600">Naissance de l'idée GeoQRNav lors d'un hackathon sur les
                            technologies de géolocalisation.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-xl font-semibold mb-2">2023</h3>
                        <p class="text-gray-600">Lancement de la version bêta et premiers partenariats avec des
                            offices de tourisme.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-xl font-semibold mb-2">2024</h3>
                        <p class="text-gray-600">Développement de l'application mobile et expansion internationale.
                        </p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-xl font-semibold mb-2">2025</h3>
                        <p class="text-gray-600">Lancement de la version 2.0 avec des fonctionnalités de réalité
                            augmentée et intelligence artificielle.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notre équipe -->
        <h2 class="text-3xl font-semibold mb-4">Notre équipe</h2>
        <p class="text-lg text-gray-600 mb-6">
            Derrière GeoQRNav se trouve une équipe passionnée de développeurs, designers et experts en géographie
            qui s'efforcent de créer la meilleure expérience possible pour nos utilisateurs.
        </p>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-photo">👩‍💻</div>
                <h3 class="text-xl font-semibold mb-1">Sophie Martin</h3>
                <p class="text-indigo-600 mb-2">Fondatrice & CEO</p>
                <p class="text-gray-600">Passionnée de technologie et de voyages, Sophie a fondé GeoQRNav avec
                    l'ambition de révolutionner l'exploration urbaine.</p>
            </div>
            <div class="team-member">
                <div class="member-photo">👨‍💻</div>
                <h3 class="text-xl font-semibold mb-1">Thomas Dubois</h3>
                <p class="text-indigo-600 mb-2">Directeur Technique</p>
                <p class="text-gray-600">Expert en développement web et mobile, Thomas supervise l'architecture
                    technique de la plateforme.</p>
            </div>
            <div class="team-member">
                <div class="member-photo">👩‍🎨</div>
                <h3 class="text-xl font-semibold mb-1">Emma Leroy</h3>
                <p class="text-indigo-600 mb-2">Directrice UX/UI</p>
                <p class="text-gray-600">Designer expérimentée, Emma veille à ce que l'expérience utilisateur soit
                    intuitive et agréable.</p>
            </div>
        </div>

        <!-- Nos valeurs -->
        <h2 class="text-3xl font-semibold mb-4">Nos valeurs</h2>
        <div class="card">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                    <p class="text-gray-600 mb-4">
                        Nous repoussons constamment les limites de ce qui est possible, en intégrant les dernières
                        technologies pour offrir une expérience toujours plus immersive et informative.
                    </p>
                    <h3 class="text-xl font-semibold mb-2">Accessibilité</h3>
                    <p class="text-gray-600">
                        Nous croyons que l'information et la découverte doivent être accessibles à tous, c'est
                        pourquoi nous concevons nos solutions avec une approche inclusive.
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
                        Nous valorisons la participation et les retours de notre communauté d'utilisateurs, qui
                        jouent un rôle essentiel dans l'évolution de notre plateforme.
                    </p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-10 mb-8">
            <h2 class="text-3xl font-semibold mb-4">Rejoignez l'aventure GeoQRNav</h2>
            <p class="text-lg text-gray-600 mb-6">
                Prêt à transformer votre façon d'explorer le monde ? Inscrivez-vous gratuitement et commencez dès
                aujourd'hui !
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('inscription') }}" class="btn btn-gradient px-6 py-3">S'inscrire gratuitement</a>
                <a href="{{ route('contact') }}" class="btn btn-outline px-6 py-3">Nous contacter</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Animation des statistiques au défilement
        function animateStats() {
            $('.stat-number').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text().replace(/[^0-9]/g, '')
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now) + '+');
                    }
                });
            });
        }
        
        // Déclencher l'animation quand les statistiques entrent dans la vue
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        if ($('.stats-grid').length) {
            observer.observe(document.querySelector('.stats-grid'));
        }
    });
</script>
@endsection