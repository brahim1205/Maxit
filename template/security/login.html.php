<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-orange-50 flex items-center justify-center p-4">
        <div class="bg-white p-12 rounded-xl shadow-2xl w-full max-w-lg">
            <!-- En-tête -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-orange-600 mb-3">Connexion</h1>
                <p class="text-gray-600 text-lg">Entrez votre numéro de téléphone</p>
            </div>
            
            <!-- Formulaire -->
            <form class="space-y-8" action="acceuil" method="POST">
                <!-- Numéro de téléphone -->
                <div>
                    <label for="telephone" class="block text-lg font-medium text-gray-700 mb-3">
                        Numéro de téléphone
                    </label>
                    <input 
                        id="telephone" 
                        name="telephone" 
                        type="tel" 
                        class="w-full px-4 py-4 text-lg border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition duration-200"
                        placeholder="+221 77 123 45 67"
                    >
                </div>
                
                <!-- Bouton de connexion -->
                <button 
                    type="submit" 
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 px-6 rounded-lg text-lg transition duration-200 shadow-lg hover:shadow-xl"
                >
                    Se connecter
                </button>
            </form>
            
            <!-- Lien pour créer un compte -->
            <div class="text-center mt-8">
                <p class="text-gray-600 text-lg">
                    Vous n'avez pas de compte ?
                    <a href="register" class="text-orange-500 hover:text-orange-600 font-medium underline transition duration-200">
                        Créer un compte
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
