<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MaxitSN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-orange-50 to-orange-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="mx-auto w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-2">Rejoignez MaxitSN</h2>
                <p class="text-lg text-gray-600">Créez votre compte en quelques étapes simples</p>
            </div>

            <!-- Formulaire -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-8 py-6">
                    <h3 class="text-2xl font-semibold text-white">Informations personnelles</h3>
                    <p class="text-orange-100 mt-1">Remplissez les champs souhaités</p>
                </div>

                <?php if (isset($errors['general'])): ?>
                    <div class="mx-8 mt-6 bg-red-50 border-l-4 border-red-400 p-4 rounded">
                        <div class="flex">
                            <i class="fas fa-exclamation-circle text-red-400 mr-3 mt-1"></i>
                            <p class="text-red-700"><?= htmlspecialchars($errors['general']) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <form class="p-8 space-y-8" action="/inscription" method="POST" enctype="multipart/form-data">
                    <!-- Section 1: Informations de base -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <h4 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">
                                <i class="fas fa-user text-orange-500 mr-2"></i>Identité
                            </h4>
                            
                            <!-- Nom et Prénom -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user-tag text-gray-400 mr-1"></i>Nom
                                    </label>
                                    <input id="nom" name="nom" type="text"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                           placeholder="Votre nom"
                                           value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
                                </div>

                                <div>
                                    <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user-tag text-gray-400 mr-1"></i>Prénom
                                    </label>
                                    <input id="prenom" name="prenom" type="text"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                           placeholder="Votre prénom"
                                           value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
                                </div>
                            </div>

                            <!-- Téléphone -->
                            <div>
                                <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-phone text-gray-400 mr-1"></i>Numéro de téléphone
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm">+221</span>
                                    </div>
                                    <input id="telephone" name="telephone" type="tel"
                                           class="w-full pl-16 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                           placeholder="77 123 45 67"
                                           value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
                                </div>
                            </div>

                            <!-- CNI -->
                            <div>
                                <label for="numero_piece_identite" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-id-card text-gray-400 mr-1"></i>Numéro CNI
                                </label>
                                <input id="numero_piece_identite" name="numero_piece_identite" type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                       placeholder="1234567890123"
                                       value="<?= htmlspecialchars($_POST['numero_piece_identite'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="space-y-6">
                            <h4 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">
                                <i class="fas fa-lock text-orange-500 mr-2"></i>Sécurité
                            </h4>
                            
                            <!-- Mots de passe -->
                            <div class="space-y-4">
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-key text-gray-400 mr-1"></i>Mot de passe
                                    </label>
                                    <input id="password" name="password" type="password"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                           placeholder="Minimum 8 caractères">
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-key text-gray-400 mr-1"></i>Confirmer le mot de passe
                                    </label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                           placeholder="Répétez votre mot de passe">
                                </div>
                            </div>

                            <!-- Adresse -->
                            <div>
                                <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>Adresse
                                </label>
                                <textarea id="adresse" name="adresse" rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200 resize-none"
                                          placeholder="Votre adresse complète"><?= htmlspecialchars($_POST['adresse'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Documents -->
                    <div class="border-t border-gray-200 pt-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-camera text-orange-500 mr-2"></i>Documents (optionnels)
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Photo de profil -->
                            <div class="bg-gray-50 rounded-xl p-6 text-center border-2 border-dashed border-gray-300 hover:border-orange-400 transition-colors">
                                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-user text-orange-600 text-xl"></i>
                                </div>
                                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                                <input id="photo" name="photo" type="file" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer">
                            </div>

                            <!-- CNI Recto -->
                            <div class="bg-gray-50 rounded-xl p-6 text-center border-2 border-dashed border-gray-300 hover:border-orange-400 transition-colors">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-id-card text-blue-600 text-xl"></i>
                                </div>
                                <label for="photo_recto" class="block text-sm font-medium text-gray-700 mb-2">CNI Recto</label>
                                <input id="photo_recto" name="photo_recto" type="file" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            </div>

                            <!-- CNI Verso -->
                            <div class="bg-gray-50 rounded-xl p-6 text-center border-2 border-dashed border-gray-300 hover:border-orange-400 transition-colors">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-id-card text-green-600 text-xl"></i>
                                </div>
                                <label for="photo_verso" class="block text-sm font-medium text-gray-700 mb-2">CNI Verso</label>
                                <input id="photo_verso" name="photo_verso" type="file" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="border-t border-gray-200 pt-8 flex flex-col sm:flex-row gap-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white py-4 px-8 rounded-xl font-semibold text-lg hover:from-orange-600 hover:to-orange-700 focus:outline-none focus:ring-4 focus:ring-orange-200 transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i>Créer mon compte
                        </button>
                        
                        <div class="flex-1 text-center py-4">
                            <p class="text-gray-600 mb-2">Vous avez déjà un compte ?</p>
                            <a href="/" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-medium text-lg hover:underline transition-colors">
                                <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
