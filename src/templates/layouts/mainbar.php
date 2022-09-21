<header id="navbar" class="fixed top-0 z-50 w-full dark:bg-black bg-zinc-50 h-14 items-center shadow-sm">
    <div class="z-50 md:max-w-6xl mx-auto flex justify-between items-center">
        <div class="flex flex-row items-center space-x-4">
            <a href="." class="p-2 inline-flex items-center">
                <img id="brand-icon" class="h-10" src="./assets/img/light/brand_icon.svg">
                <img id="brand-text" class="h-10 hidden md:inline-flex" src="./assets/img/light/brand_text.svg">
            </a>
            <form method="GET" name="find" class="mx-auto" title="Rechercher">
                <input type="text" class="hidden md:inline-flex" placeholder="Rechercher">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="align-middle">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>

        <div class="flex flex-row space-x-8 items-center">
            <nav class="fixed w-full h-14 sm:h-auto bg-zinc-50 sm:bg-inherit sm:relative sm:w-auto bottom-0 left-0 flex flex-row space-x-4 items-center mx-auto shadow-sm sm:shadow-none">
                <a href="./home/" class="flex flex-col">
                    <svg class="mx-auto h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="align-middle">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="mx-auto text-xs text-center hidden md:inline-flex">Accueil</span>
                </a>
                <a href="./discover/" class="flex flex-col">
                    <svg class="mx-auto h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="align-middle">
                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                <line x1="8" y1="2" x2="8" y2="18"></line>
                                <line x1="16" y1="6" x2="16" y2="22"></line>
                    </svg>
                    <span class="mx-auto text-xs text-center hidden md:inline-flex">Découvrir</span>
                </a>
                <a href="./library/" class="flex flex-col">
                    <svg class="mx-auto h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="align-middle">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <span class="mx-auto text-xs text-center hidden md:inline-flex">Bibliotèque</span>
                </a>
            </nav>
            <div class="dropdown relative">
                <button onclick="document.getElementById('dropdownMenuButton1d').classList.toggle('hidden')" class="text-xs focus:outline-none focus:ring-0 flex items-center whitespace-nowrap" type="button">
                    <img class="h-8 w-8 rounded-full" src="<?= $user->getAvatarUrl() ?>">
                </button>
                <ul id="dropdownMenuButton1d" class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton1d">
                    <li>
                        <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"href="#">Separated link</a>
                    </li>
                    <hr class="h-0 my-2 border border-solid border-t-0 border-gray-700 opacity-25" />
                    <li>
                        <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>