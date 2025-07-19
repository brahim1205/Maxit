<!-- Contenu principal -->
<div class="flex-1 p-6">
    <!-- En-tête -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
        <p class="text-gray-600">Bienvenue, <?= htmlspecialchars($user->getPrenom() . ' ' . $user->getNom()) ?></p>
    </div>

    <!-- Navigation principale -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <button onclick="showSection('apercu')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center">
                <i class="fas fa-home text-2xl text-orange-500 mb-2"></i>
                <p class="font-medium text-gray-700">Aperçu</p>
            </div>
        </button>

        <button onclick="showSection('transactions')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center">
                <i class="fas fa-exchange-alt text-2xl text-orange-500 mb-2"></i>
                <p class="font-medium text-gray-700">Transactions</p>
            </div>
        </button>

        <button onclick="showSection('depot')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center">
                <i class="fas fa-plus-circle text-2xl text-orange-500 mb-2"></i>
                <p class="font-medium text-gray-700">Dépôt</p>
            </div>
        </button>

        <button onclick="showSection('accounts')" class="nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center">
                <i class="fas fa-university text-2xl text-orange-500 mb-2"></i>
                <p class="font-medium text-gray-700">Mes comptes</p>
            </div>
        </button>
    </div>

    <!-- Section Aperçu -->
    <div id="apercu-section" class="section-content">
        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Solde actuel</p>
                        <p id="solde-display" class="text-2xl font-bold text-gray-900">
                            <?php if ($showSolde): ?>
                                <?= isset($compte['solde']) ? number_format($compte['solde'], 0, ',', ' ') . ' FCFA' : '0 FCFA' ?>
                            <?php else: ?>
                                ****
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-wallet text-orange-600"></i>
                    </div>
                </div>
                <button onclick="toggleSolde()" class="mt-2 text-sm text-orange-600 hover:text-orange-700">
                    <i id="eye-icon" class="fas <?= $showSolde ? 'fa-eye-slash' : 'fa-eye' ?>"></i>
                    <span id="toggle-text"><?= $showSolde ? 'Masquer' : 'Afficher' ?></span>
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Transactions ce mois</p>
                        <p class="text-2xl font-bold text-gray-900"><?= count($transactions) ?></p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exchange-alt text-blue-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Statut</p>
                        <p class="text-2xl font-bold text-green-600">Actif</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mon compte ET Dernières transactions -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Informations du compte -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations du compte</h3>
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Numéro de compte:</span>
                        <span class="font-medium"><?= isset($compte['numeroCompte']) ? htmlspecialchars($compte['numeroCompte']) : 'N/A' ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Type de compte:</span>
                        <span class="font-medium"><?= isset($compte['type']) ? htmlspecialchars($compte['type']) : 'Principal' ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date d'ouverture:</span>
                        <span class="font-medium">
                            <?= isset($compte['dateCreation']) ? date('d/m/Y', strtotime($compte['dateCreation'])) : date('d/m/Y') ?>
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Statut:</span>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Actif</span>
                    </div>
                </div>
            </div>

            <!-- Dernières transactions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Dernières transactions</h3>
                    <button onclick="showSection('transactions')" class="text-orange-600 hover:text-orange-700 text-sm">
                        Voir tout
                    </button>
                </div>
                <div class="space-y-3">
                    <?php if (!empty($transactions)): ?>
                        <?php foreach (array_slice($transactions, 0, 5) as $transaction): ?>
                            <?php
                            $isDeposit = strtoupper($transaction['type']) === 'DEPOT';
                            $colorClass = $isDeposit ? 'green' : 'red';
                            $iconClass = $isDeposit ? 'arrow-down' : 'arrow-up';
                            $sign = $isDeposit ? '+' : '-';
                            ?>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-<?= $colorClass ?>-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-<?= $iconClass ?> text-<?= $colorClass ?>-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900"><?= ucfirst(strtolower($transaction['type'])) ?></p>
                                        <p class="text-xs text-gray-500"><?= date('d/m/Y H:i', strtotime($transaction['dateTransaction'])) ?></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-<?= $colorClass ?>-600">
                                        <?= $sign ?><?= number_format($transaction['montant'], 0, ',', ' ') ?> FCFA
                                    </p>
                                    <p class="text-xs text-gray-500"><?= ucfirst($transaction['statut']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <i class="fas fa-receipt text-3xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">Aucune transaction récente</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Transactions -->
    <div id="transactions-section" class="section-content hidden">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Historique des transactions</h3>
            <div class="space-y-3">
                <?php if (isset($transactions) && !empty($transactions)): ?>
                    <?php foreach ($transactions as $transaction): ?>
                        <?php
                        $isDeposit = strtoupper($transaction['type']) === 'DEPOT';
                        $colorClass = $isDeposit ? 'green' : 'red';
                        $sign = $isDeposit ? '+' : '-';
                        ?>
                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-<?= $colorClass ?>-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exchange-alt text-<?= $colorClass ?>-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900"><?= htmlspecialchars($transaction['type']) ?></p>
                                    <p class="text-sm text-gray-500"><?= date('d/m/Y H:i', strtotime($transaction['dateTransaction'])) ?></p>
                                </div>
                            </div>
                            <span class="font-semibold text-lg text-<?= $colorClass ?>-600">
                                <?= $sign ?><?= number_format($transaction['montant'], 0, ',', ' ') ?> FCFA
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-500 text-center py-8">Aucune transaction trouvée</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Section Dépôt -->
    <div id="depot-section" class="section-content hidden">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Effectuer un dépôt</h3>
            <p class="text-gray-600">Fonctionnalité de dépôt en cours de développement...</p>
        </div>
    </div>

    <!-- Section Mes Comptes -->
    <div id="accounts-section" class="section-content hidden">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900">Mes Comptes</h2>
                <button onclick="showCreateAccountModal()" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                    <i class="fas fa-plus mr-2"></i>Créer un compte secondaire
                </button>
            </div>

            <!-- Liste des comptes -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if (isset($comptes) && !empty($comptes)): ?>
                    <?php foreach ($comptes as $compte_item): ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 <?= $compte_item['id'] == $compteActuel['id'] ? 'ring-2 ring-orange-500' : '' ?>">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        <?= $compte_item['type'] == 'PRINCIPAL' ? 'Compte Principal' : 'Compte Secondaire' ?>
                                    </h3>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($compte_item['numeroCompte']) ?></p>
                                </div>
                                <?php if ($compte_item['id'] == $compteActuel['id']): ?>
                                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full">Actuel</span>
                                <?php endif; ?>
                            </div>

                            <div class="space-y-2 mb-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Solde:</span>
                                    <span class="font-semibold">
                                        <?php if ($showSolde): ?>
                                            <?= number_format($compte_item['solde'], 0, ',', ' ') ?> FCFA
                                        <?php else: ?>
                                            ****
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Créé le:</span>
                                    <span class="text-sm"><?= date('d/m/Y', strtotime($compte_item['dateCreation'])) ?></span>
                                </div>
                            </div>

                            <?php if ($compte_item['id'] != $compteActuel['id']): ?>
                                <button onclick="switchAccount(<?= $compte_item['id'] ?>)"
                                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                    <i class="fas fa-exchange-alt mr-2"></i>Basculer vers ce compte
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-2 text-center py-8">
                        <i class="fas fa-wallet text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">Aucun compte trouvé</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal Créer Compte Secondaire -->
    <div id="create-account-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl w-full max-w-md mx-4 shadow-2xl">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-white">Nouveau compte</h3>
                        <p class="text-orange-100 text-sm">Créez un compte secondaire</p>
                    </div>
                    <button onclick="closeCreateAccountModal()" class="text-white hover:text-orange-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <form id="create-account-form" class="p-6">
                <div class="space-y-6">
                    <!-- Numéro de compte -->
                    <div>
                        <label for="account-number" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-hashtag text-orange-500 mr-2"></i>Numéro de compte
                        </label>
                        <input type="text" 
                               id="account-number" 
                               name="numeroCompte"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                               placeholder="Ex: 1234567890">
                        <p class="text-xs text-gray-500 mt-1">Le numéro doit être unique</p>
                    </div>

                    <!-- Solde initial -->
                    <div>
                        <label for="account-balance" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-coins text-orange-500 mr-2"></i>Solde initial
                        </label>
                        <div class="relative">
                            <input type="number" 
                                   id="account-balance" 
                                   name="solde"
                                   min="0"
                                   step="1000"
                                   class="w-full px-4 py-3 pr-16 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                                   placeholder="0">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm font-medium">FCFA</span>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Vous pouvez mettre n'importe quel montant</p>
                    </div>

                    <!-- Type de compte (caché) -->
                    <input type="hidden" name="type" value="SECONDAIRE">
                </div>

                <!-- Boutons -->
                <div class="flex space-x-3 mt-8">
                    <button type="button" 
                            onclick="closeCreateAccountModal()" 
                            class="flex-1 bg-gray-100 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                        <i class="fas fa-times mr-2"></i>Annuler
                    </button>
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 font-medium shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Créer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showSection(sectionId) {
        // Masquer toutes les sections
        document.querySelectorAll('.section-content').forEach(section => {
            section.classList.add('hidden');
        });

        // Afficher la section sélectionnée
        document.getElementById(sectionId + '-section').classList.remove('hidden');
    }

    function toggleSolde() {
        fetch('/toggle-solde', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const soldeDisplay = document.getElementById('solde-display');
                const eyeIcon = document.getElementById('eye-icon');
                const toggleText = document.getElementById('toggle-text');
                
                if (data.showSolde) {
                    soldeDisplay.textContent = new Intl.NumberFormat('fr-FR').format(data.solde) + ' FCFA';
                    eyeIcon.className = 'fas fa-eye-slash';
                    toggleText.textContent = 'Masquer';
                } else {
                    soldeDisplay.textContent = '****';
                    eyeIcon.className = 'fas fa-eye';
                    toggleText.textContent = 'Afficher';
                }
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }

    function showCreateAccountModal() {
        document.getElementById('create-account-modal').classList.remove('hidden');
        document.getElementById('create-account-modal').classList.add('flex');
    }

    function closeCreateAccountModal() {
        document.getElementById('create-account-modal').classList.add('hidden');
        document.getElementById('create-account-modal').classList.remove('flex');
    }

    function switchAccount(accountId) {
        fetch('/switch-account', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ compteId: accountId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Erreur: ' + (data.message || 'Impossible de basculer'));
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue');
        });
    }

    // Créer un compte secondaire
    document.getElementById('create-account-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('/create-secondary-account', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Compte créé avec succès !');
                location.reload();
            } else {
                alert('Erreur: ' + (data.message || 'Impossible de créer le compte'));
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue');
        });
    });

    // Afficher la section aperçu par défaut
    document.addEventListener('DOMContentLoaded', function() {
        showSection('apercu');
    });
</script>
