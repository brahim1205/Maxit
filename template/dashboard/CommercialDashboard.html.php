<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Commercial - MaxitSN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-orange-500">
                            Max<span class="text-black">it</span><span class="text-sm">SN</span>
                        </h1>
                        <span class="ml-4 px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                            Service Commercial
                        </span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Bonjour, </span>
                        <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                            <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-exclamation-triangle text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900"></h3>
                            <p class="text-sm text-gray-500">Demandes d'annulation</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900"></h3>
                            <p class="text-sm text-gray-500">Demandes validées</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-times text-red-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900"></h3>
                            <p class="text-sm text-gray-500">Demandes rejetées</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-users text-purple-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900">/h3>
                            <p class="text-sm text-gray-500">Total clients</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Barre de recherche -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Rechercher un client</h2>
                <form id="search-form" class="flex space-x-4">
                    <div class="flex-1">
                        <input type="text" id="search-phone" name="telephone" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                               placeholder="Numéro de téléphone (ex: 771234567)">
                    </div>
                    <button type="submit" 
                            class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                        <i class="fas fa-search mr-2"></i>Rechercher
                    </button>
                </form>
            </div>

            <!-- Résultats de recherche -->
            <div id="search-results" class="hidden">
                <!-- Les résultats seront affichés ici -->
            </div>

            <!-- Demandes d'annulation -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Demandes d'annulation en attente</h2>
                </div>
                <div class="divide-y divide-gray-100">
                            <div class="p-6 hover:bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-yellow-100 p-3 rounded-full">
                                            <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                Transaction: 12.000.000 FCFA
                                            </p>
                                            <p class="text-xs text-gray-400">
                                                Demande du , 12/05/2022 ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button onclick="validateCancellation(<?= $demande['id'] ?>)" 
                                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                                            <i class="fas fa-check mr-2"></i>Valider
                                        </button>
                                        <button onclick="rejectCancellation(<?= $demande['id'] ?>)" 
                                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                            <i class="fas fa-times mr-2"></i>Rejeter
                                        </button>
                                        <button onclick="viewTransactionDetails(<?= $demande['transaction_id'] ?>)" 
                                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                            <i class="fas fa-eye mr-2"></i>Détails
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <div class="p-12 text-center">
                            <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-check-circle text-gray-400 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune demande en attente</h3>
                            <p class="text-gray-500">Toutes les demandes d'annulation ont été traitées.</p>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Détails Client -->
    <div id="client-details-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl w-full max-w-4xl mx-4 max-h-screen overflow-y-auto">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Détails du client</h3>
                    <button onclick="closeClientDetails()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div id="client-details-content" class="p-6">
                <!-- Le contenu sera chargé ici -->
            </div>
        </div>
    </div>

    <!-- Modal Détails Transaction -->
    <div id="transaction-details-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl w-full max-w-2xl mx-4">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Détails de la transaction</h3>
                    <button onclick="closeTransactionDetails()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div id="transaction-details-content" class="p-6">
                <!-- Le contenu sera chargé ici -->
            </div>
        </div>
    </div>

    <!-- <script>
        // Recherche de client
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const phone = document.getElementById('search-phone').value;
            if (!phone) return;
            
            fetch('/commercial/search-client', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ telephone: phone })
            })
            .then(response => response.json())
            .then(data => {
                const resultsDiv = document.getElementById('search-results');
                
                if (data.success && data.client) {
                    resultsDiv.innerHTML = generateClientCard(data.client);
                    resultsDiv.classList.remove('hidden');
                } else {
                    resultsDiv.innerHTML = `
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="text-center">
                                <i class="fas fa-user-slash text-gray-400 text-3xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Client non trouvé</h3>
                                <p class="text-gray-500">Aucun client avec ce numéro de téléphone.</p>
                            </div>
                        </div>
                    `;
                    resultsDiv.classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        });

        function generateClientCard(client) {
            return `
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
                    <div class="flex items-start space-x-6">
                        <div class="flex-1">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900">${client.nom} ${client.prenom}</h3>
                                    <p class="text-gray-500">${client.telephone}</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Adresse</p>
                                    <p class="text-gray-900">${client.adresse}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-700">CNI</p>
                                    <p class="text-gray-900">${client.cni}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Nombre de comptes</p>
                                    <p class="text-gray-900">${client.comptes.length}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Solde total</p>
                                    <p class="text-gray-900">${client.solde_total} FCFA</p>
                                </div>
                            </div>
                            
                            <div class="flex space-x-3">
                                <button onclick="viewClientTransactions('${client.id}')" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                    <i class="fas fa-list mr-2"></i>Voir les transactions
                                </button>
                                <button onclick="blockClient('${client.id}')" 
                                        class="bg-red-500 text-white px-4 py-2 rounde
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                    <i class="fas fa-ban mr-2"></i>Bloquer le client
                                </button>
                                <button onclick="sendNotification('${client.id}')" 
                                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                                    <i class="fas fa-bell mr-2"></i>Envoyer notification
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // Valider une demande d'annulation
        function validateCancellation(demandeId) {
            if (confirm('Êtes-vous sûr de vouloir valider cette demande d\'annulation ?')) {
                fetch('/commercial/validate-cancellation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ demande_id: demandeId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Erreur lors de la validation');
                    }
                });
            }
        }

        // Rejeter une demande d'annulation
        function rejectCancellation(demandeId) {
            if (confirm('Êtes-vous sûr de vouloir rejeter cette demande d\'annulation ?')) {
                fetch('/commercial/reject-cancellation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ demande_id: demandeId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Erreur lors du rejet');
                    }
                });
            }
        }

        // Voir les détails d'une transaction
        function viewTransactionDetails(transactionId) {
            fetch(`/commercial/transaction-details/${transactionId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('transaction-details-content').innerHTML = data.html;
                        document.getElementById('transaction-details-modal').classList.remove('hidden');
                        document.getElementById('transaction-details-modal').classList.add('flex');
                    }
                });
        }

        // Voir les transactions d'un client
        function viewClientTransactions(clientId) {
            fetch(`/commercial/client-transactions/${clientId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('client-details-content').innerHTML = data.html;
                        document.getElementById('client-details-modal').classList.remove('hidden');
                        document.getElementById('client-details-modal').classList.add('flex');
                    }
                });
        }

        // Fermer les modals
        function closeClientDetails() {
            document.getElementById('client-details-modal').classList.add('hidden');
            document.getElementById('client-details-modal').classList.remove('flex');
        }

        function closeTransactionDetails() {
            document.getElementById('transaction-details-modal').classList.add('hidden');
            document.getElementById('transaction-details-modal').classList.remove('flex');
        }

        // Bloquer un client
        function blockClient(clientId) {
            if (confirm('Êtes-vous sûr de vouloir bloquer ce client ?')) {
                fetch('/commercial/block-client', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ client_id: clientId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Client bloqué avec succès');
                        location.reload();
                    } else {
                        alert(data.message || 'Erreur lors du blocage');
                    }
                });
            }
        }

        // Envoyer une notification
        function sendNotification(clientId) {
            const message = prompt('Message à envoyer au client:');
            if (message) {
                fetch('/commercial/send-notification', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ 
                        client_id: clientId,
                        message: message 
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Notification envoyée avec succès');
                    } else {
                        alert(data.message || 'Erreur lors de l\'envoi');
                    }
                });
            }
        }
    </script> -->
</body>
</html>
