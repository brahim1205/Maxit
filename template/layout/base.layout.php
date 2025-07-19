<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MaxitSN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">

<?php require_once '../template/layout/partiel/headersidebar.html.php' ?>

     <?php echo $contentForLayout; ?> 
</div> 

</div>

    <script>
        // Version simplifiée pour tester
        function toggleSolde() {
            console.log('Début toggleSolde');
            
            fetch('/toggle-solde', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                credentials: 'same-origin' // Important pour les sessions
            })
            .then(response => {
                console.log('Status:', response.status);
                console.log('Headers:', response.headers);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                return response.text(); // D'abord en text pour voir ce qui arrive
            })
            .then(text => {
                console.log('Response text:', text);
                
                try {
                    const data = JSON.parse(text);
                    console.log('Parsed data:', data);
                    
                    if (data.success) {
                        // Mettre à jour l'affichage
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
                    } else {
                        alert('Erreur: ' + data.message);
                    }
                } catch (e) {
                    console.error('Erreur parsing JSON:', e);
                    console.error('Text reçu:', text);
                }
            })
            .catch(error => {
                console.error('Erreur complète:', error);
                alert('Erreur de connexion: ' + error.message);
            });
        }

        // Fonction pour afficher une section spécifique
        function showSection(sectionName) {
            const sections = document.querySelectorAll('.section-content');
            sections.forEach(section => {
                section.classList.add('hidden');
            });
            
            const navButtons = document.querySelectorAll('.nav-btn');
            navButtons.forEach(btn => {
                btn.classList.remove('bg-orange-100', 'ring-2', 'ring-orange-500');
                btn.classList.add('bg-white');
            });
            
            const targetSection = document.getElementById(sectionName + '-section');
            if (targetSection) {
                targetSection.classList.remove('hidden');
            }
            
            const activeButton = document.querySelector(`button[onclick="showSection('${sectionName}')"]`);
            if (activeButton) {
                activeButton.classList.remove('bg-white');
                activeButton.classList.add('bg-orange-100', 'ring-2', 'ring-orange-500');
            }
        }

        // Afficher la section aperçu par défaut au chargement
        document.addEventListener('DOMContentLoaded', function() {
            showSection('apercu');
            console.log('Page loaded, showSolde:', showSolde); // Debug
        });

        // Fonctions pour les modals
        function showCreateAccountModal() {
            document.getElementById('create-account-modal').classList.remove('hidden');
            document.getElementById('create-account-modal').classList.add('flex');
        }

        function closeCreateAccountModal() {
            document.getElementById('create-account-modal').classList.add('hidden');
            document.getElementById('create-account-modal').classList.remove('flex');
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

        // Basculer vers un autre compte
        function switchAccount(compteId) {
            if (confirm('Voulez-vous basculer vers ce compte ?')) {
                fetch('/switch-account', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ compteId: compteId })
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
        }

        // Ajouter le bouton "Mes comptes" dans la navigation
        function updateNavigation() {
            // Vérifier si le bouton existe déjà
            if (document.querySelector('button[onclick="showSection(\'accounts\')"]')) {
                return; // Le bouton existe déjà
            }
            
            const accountsBtn = document.createElement('button');
            accountsBtn.onclick = () => showSection('accounts');
            accountsBtn.className = 'nav-btn bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100';
            accountsBtn.innerHTML = `
                <div class="text-center">
                    <i class="fas fa-university text-2xl text-orange-500 mb-2"></i>
                    <p class="font-medium text-gray-700">Mes comptes</p>
                </div>
            `;
            
            // Ajouter après le bouton dépôt
            const depotBtn = document.querySelector('button[onclick="showSection(\'depot\')"]');
            if (depotBtn && depotBtn.parentNode) {
                depotBtn.parentNode.insertBefore(accountsBtn, depotBtn.nextSibling);
            }
        }

        // Appeler la fonction au chargement de la page
        document.addEventListener('DOMContentLoaded', updateNavigation);
    </script>

    <style>
        .content-section {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .nav-btn.active {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .nav-btn {
            transition: all 0.2s ease-in-out;
        }

        .nav-btn:hover {
            transform: translateY(-1px);
        }
    </style>
</body>
</html>
