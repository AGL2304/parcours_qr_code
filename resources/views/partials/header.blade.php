<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoQRNav</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background: linear-gradient(135deg, #4a7bff 0%, #ff8366 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        nav {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            font-weight: bold;
            font-size: 24px;
            background: linear-gradient(90deg, #4a7bff 0%, #ff8366 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
        }

        .logo::before {
            content: '📍';
            margin-right: 8px;
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: #555;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #4a7bff;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-outline {
            border: 2px solid #4a7bff;
            color: #4a7bff;
            background: transparent;
        }

        .btn-outline:hover {
            background: rgba(74, 123, 255, 0.1);
        }

        .btn-gradient {
            background: linear-gradient(90deg, #4a7bff 0%, #ff8366 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(74, 123, 255, 0.3);
        }

        .btn-gradient:hover {
            box-shadow: 0 7px 20px rgba(74, 123, 255, 0.4);
            transform: translateY(-2px);
        }

        .main-content {
            padding: 120px 0 60px;
        }

        /* Pour visualiser le contenu en dessous du header fixe */
        .placeholder-content {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            text-align: center;
        }

        /* Style pour le bouton de déconnexion qui est en fait un élément <button> */
        button.btn {
            cursor: pointer;
            font-family: inherit;
            font-size: inherit;
        }

        /* Media query pour la version mobile */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .auth-buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header avec navigation -->
    <nav>
        <div class="container nav-content">
            <div class="logo">GeoQRNav</div>
            <div class="nav-links">
                <a href="{{ route('accueil') }}">Accueil</a>
                <a href="{{ route('fonctionnalites') }}">Fonctionnalités</a>
                <a href="{{ route('a-propos') }}">À propos</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="auth-buttons">
                @guest
                    <a href="{{ route('connexion') }}" class="btn btn-outline">Connexion</a>
                    <a href="{{ route('inscription') }}" class="btn btn-gradient">Inscription</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-outline">Tableau de bord</a>
                    <a href="{{ route('profil') }}" class="btn btn-outline">Profil</a>
                    <form action="{{ route('deconnexion') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-gradient">Déconnexion</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

</body>
</html>