<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code URL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full mx-4 border-t-4 border-indigo-500">
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <i class="fas fa-qrcode text-4xl text-indigo-600"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-3">Votre QR Code</h1>
            <p class="text-gray-600 mb-6">Accédez rapidement à votre contenu en scannant ce code</p>
            
            <div class="flex justify-center mb-6">
                <div class="p-4 bg-white rounded-lg shadow-inner border-2 border-indigo-200 relative">
                    <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                        <i class="fas fa-check text-white text-xs"></i>
                    </div>
                    {!! $qrCode !!}
                </div>
            </div>
            
            <div class="bg-indigo-50 p-4 rounded-lg mb-6 text-left">
                <h3 class="font-bold text-indigo-800 mb-2 flex items-center">
                    <i class="fas fa-info-circle text-indigo-600 mr-2"></i>
                    Comment utiliser ce QR code
                </h3>
                <ul class="text-gray-700 space-y-2 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-mobile-alt text-indigo-500 mt-1 mr-2"></i>
                        <span>Ouvrez l'application appareil photo de votre smartphone</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-camera text-indigo-500 mt-1 mr-2"></i>
                        <span>Pointez votre caméra vers le QR code</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-external-link-alt text-indigo-500 mt-1 mr-2"></i>
                        <span>Appuyez sur la notification pour accéder au contenu</span>
                    </li>
                </ul>
            </div>
            
            <div class="flex justify-center space-x-4 mb-6">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Télécharger
                </button>
                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                    <i class="fas fa-share-alt mr-2"></i>
                    Partager
                </button>
                <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                    <i class="fas fa-print mr-2"></i>
                    Imprimer
                </button>
            </div>
            
            <div class="flex justify-center space-x-3 mb-4">
                <a href="#" class="text-blue-600 hover:text-blue-800">
                    <i class="fab fa-facebook text-2xl"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-600">
                    <i class="fab fa-twitter text-2xl"></i>
                </a>
                <a href="#" class="text-pink-600 hover:text-pink-800">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="#" class="text-green-600 hover:text-green-800">
                    <i class="fab fa-whatsapp text-2xl"></i>
                </a>
            </div>
        </div>
        
        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="far fa-clock mr-1"></i>
                    Généré le <?php echo date('d/m/Y à H:i'); ?>
                </div>
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="fas fa-shield-alt mr-1 text-green-500"></i>
                    Code sécurisé
                </div>
            </div>
        </div>
    </div>
</body>
</html>