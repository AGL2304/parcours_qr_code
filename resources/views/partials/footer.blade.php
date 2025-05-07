<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoQRNav</title>
<style>
    footer {
        background-color: #1f2937;
        color: white;
        padding: 60px 0 30px;
    }

    .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 40px;
        margin-bottom: 40px;
    }

    .footer-section {
        flex: 1;
        min-width: 200px;
    }

    .footer-section h3 {
        font-size: 1.3rem;
        margin-bottom: 20px;
        color: white;
    }

    .footer-section a {
        color: #d1d5db;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .footer-section a:hover {
        color: white;
    }

    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .social-icon:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .copyright {
        text-align: center;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: #9ca3af;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .hero-content {
            flex-direction: column;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .nav-links {
            display: none;
        }
    }
</style>
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>GeoQRNav</h3>
                <p style="color: #9ca3af; line-height: 1.6;">
                    Une solution interactive pour repérer des sites à travers une carte et accéder à des informations
                    via QR code.
                </p>
                <div class="social-links">
                    <a href="#" class="social-icon"><span>📘</span></a>
                    <a href="#" class="social-icon"><span>🐦</span></a>
                    <a href="#" class="social-icon"><span>📸</span></a>
                    <a href="#" class="social-icon"><span>💼</span></a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Liens utiles</h3>
                <a href="{{ route('accueil') }}">Accueil</a>
                <a href="{{ route('fonctionnalites') }}">Fonctionnalités</a>
                <a href="{{ route('a-propos') }}">À propos</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>

            <div class="footer-section">
                <h3>Support</h3>
                <a href="#">FAQ</a>
                <a href="#">Documentation</a>
                <a href="#">Tutoriels</a>
                <a href="#">Centre d'aide</a>
            </div>

            <div class="footer-section">
                <h3>Légal</h3>
                <a href="#">Conditions d'utilisation</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">Mentions légales</a>
                <a href="#">Cookies</a>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; {{ date('Y') }} GeoQRNav. Tous droits réservés.</p>
        </div>
    </div>
</footer>