<header class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-orange-500">
                            Max<span class="text-black">it</span><span class="text-sm">SN</span>
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <img src="https://via.placeholder.com/32x32/f97316/ffffff?text=U" alt="Photo de profil" class="w-8 h-8 rounded-full object-cover">
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content with Sidebar -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <div class="w-64 bg-orange-500 text-white flex flex-col">
                <!-- Logo -->
                <div class="p-6 border-b border-orange-400">
                    <div class="bg-white rounded-xl p-4 mb-4">
                        <div class="bg-orange-500 rounded-lg p-3 text-center">
                            <h1 class="text-white font-bold text-xl">Maxit</h1>
                            <p class="text-white text-xs">SN</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-6 py-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="/dashbordClient" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <span class="font-medium">Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="/payement" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span class="font-medium">Payements</span>
                            </a>
                        </li>
                        <li>
                            <a href="/transaction" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                <span class="font-medium">Transactions</span>
                            </a>
                        </li>
                        <li>
                            <a href="/compte" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="font-medium">mes comptes</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Disconnect Button -->
                <div class="p-6 border-t border-orange-400">
                    <button class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors w-full text-left">
                        <a href="/logout" class="text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                        </a>
                    </button>
                </div>
            </div>
