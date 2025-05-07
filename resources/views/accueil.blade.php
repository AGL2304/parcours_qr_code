@extends('layouts.app')

@section('title', 'Accueil')

@section('styles')
<link rel="stylesheet" href="{{ asset('ressources/css/style2.css') }}">
@endsection

@section('content')
<div class="main-content">
    <div class="container">
        <!-- Hero Section -->
        <div class="card">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Découvrez les sites avec notre carte interactive</h1>
                    <p>
                        Explorez des points d'intérêt, scannez des QR codes et accédez à une expérience interactive enrichie pour vos parcours personnalisés.
                    </p>
                    <div class="auth-buttons">
                        <a href="{{ route('parcours.index') }}" class="btn btn-gradient">Commencer l'exploration</a>
                        <a href="{{ route('fonctionnalites') }}" class="btn btn-outline">En savoir plus</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="map-container">
                        <div class="map-placeholder">
                            <div class="map-point point-1"></div>
                            <div class="map-point point-2"></div>
                            <div class="map-point point-3"></div>
                        </div>
                        <div class="map-info">
                            <div>
                                <h3>Carte Interactive</h3>
                                <p>3 sites disponibles</p>
                            </div>
                            <div>
                                <a href="{{ route('sites.carte') }}" class="btn btn-outline" style="padding: 6px 12px; font-size: 0.9rem;">Explorer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctionnalités -->
        <h2>Nos fonctionnalités principales</h2>
        <div class="features">
            <div class="features-grid">
                <!-- Carte interactive -->
                <div class="feature-card">
                    <div class="feature-icon">🗺️</div>
                    <h3 class="feature-title">Carte Interactive</h3>
                    <p>Naviguez facilement entre les différents points d'intérêt sur notre carte interactive personnalisable. Visualisez les sites en temps réel.</p>
                </div>
                
                <!-- QR Code -->
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Scan QR Code</h3>
                    <p>Accédez instantanément aux informations détaillées en scannant les QR codes associés aux sites. Obtenez des détails enrichis sur chaque lieu.</p>
                </div>
                
                <!-- Gestion de parcours -->
                <div class="feature-card">
                    <div class="feature-icon">🛣️</div>
                    <h3 class="feature-title">Parcours Personnalisés</h3>
                    <p>Créez et suivez des parcours personnalisés adaptés à vos besoins spécifiques. Configurez votre propre expérience d'exploration.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection