<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= CDN_URL ?>/css/style.css" />
        <link rel="stylesheet" href="<?= CDN_URL ?>/css/splide-core.min.css" />
        <link rel="stylesheet" href="<?= CDN_URL ?>/css/remixicon.css" />
        <link rel="icon" type="image/x-icon" href="<?= CDN_URL ?>/images/test">
        <title>gaku!</title>
    </head>
    <body class="bg-black">
        <div class="bg-black text-center text-white text-sm py-1">
        Ce site est purement fictif et ne propose aucun produit réel. Aucune transaction ni livraison de produit n'a lieu sur cette plateforme. Veuillez ne pas fournir des informations personnelles.
        </div>
        <nav class="sticky top-0 z-50 overflow-hidden border-b border-b-slate-300">
            <div class="bg-[white] w-full" id="navbar">
                <div class="py-3 mx-5">
                    <div class="flex justify-between gap-10 items-center">
                        <!--Logo, à minifier-->
                        <div id="logo">
                            <div class="h-auto">
                                <a href="http://gaku.local/">
                                <svg viewBox="0 0 125 39" class="h-9">
                                    <path
                                        class="cls-2"
                                        d="m65.18,13.57v12.89c0,4.76-3.29,7.73-8.01,7.73-3.63,0-6.31-1.96-7.24-4.87l3.17-1.15c.78,1.64,2.13,2.57,4.21,2.57,2.36,0,3.83-1.27,3.83-3.89v-.69c-.95,1.1-2.28,1.73-4.01,1.73-3.92,0-6.95-3.26-6.95-7.38s2.97-7.35,6.95-7.35c1.67,0,3.03.66,4.01,1.79v-1.35h4.04Zm-4.09,6.95c0-2.31-1.41-3.92-3.4-3.92s-3.4,1.61-3.4,3.92,1.41,3.89,3.4,3.89,3.4-1.61,3.4-3.89Z"
                                    />
                                    <path
                                        class="cls-2"
                                        d="m81.03,19.14v8.99h-3.69v-1.79c-.81,1.35-2.16,2.08-3.95,2.08-2.85,0-4.76-1.82-4.76-4.38,0-2.39,1.64-3.72,4.67-4.24l3.69-.63c-.09-1.53-1.1-2.57-2.59-2.57-1.64,0-2.51.89-3.08,2.57l-3.14-.95c.55-2.97,3-5.07,6.43-5.07,4.06,0,6.43,2.45,6.43,6Zm-4.04,3.29v-.52l-2.51.49c-1.01.2-1.82.69-1.82,1.73,0,.95.69,1.53,1.67,1.53,1.59,0,2.65-1.47,2.65-3.23Z"
                                    />
                                    <path
                                        class="cls-2"
                                        d="m90.58,22.14l-2.05,2.25v3.75h-4.04V7.95h4.04v11.27l5.05-5.65h4.84l-5.16,5.62,5.65,8.94h-4.67l-3.66-6Z"
                                    />
                                    <path
                                        class="cls-2"
                                        d="m114.45,13.57v14.56h-4.04v-2.36c-1.01,1.73-2.57,2.65-4.56,2.65-3.06,0-5.22-2.19-5.22-5.68v-9.17h4.04v8.62c0,1.64.89,2.77,2.42,2.77,1.64,0,3.31-1.3,3.31-4.5v-6.89h4.04Z"
                                    />
                                    <path
                                        class="cls-2"
                                        d="m117.68,7.95h4.47l-.78,14.18h-2.91l-.78-14.18Zm.14,16.09h4.21v4.09h-4.21v-4.09Z"
                                    />
                                    <path
                                        class="cls-2"
                                        d="m7.06,26.97l-5.33.12c-.23,0-.35,0-.46-.12,0,0-.12-.23-.12-.35v-2.89c0-.23,0-.35.12-.46,0,0,.23-.12.35-.12l5.33.12h9.84c0-1.04-.12-1.97-.23-2.78.23,0,1.74.12,4.4.23.46,0,.58.23.58.46,0,.12,0,.23-.12.35-.12.12-.12.23-.12.35-.12.35-.23.81-.23,1.27h10.42l5.33-.12c.23,0,.35,0,.46.12,0,0,.12.23.12.46v2.89c0,.23,0,.35-.12.35s-.23.12-.46.12l-5.33-.12h-7.52c3.7,3.01,8.57,5.33,14.35,6.71-.58.69-1.16,1.5-1.74,2.66-.35.69-.58,1.04-.81,1.04s-.58-.12-1.04-.23c-5.67-1.85-10.42-4.75-13.89-8.68l.46,9.49c0,.23,0,.35-.12.35s-.23.12-.35.12h-3.59c-.23,0-.35,0-.46-.12s-.12-.23-.12-.35v-1.62c.12-2.66.12-5.09.12-7.52-3.13,3.47-7.64,6.37-13.31,8.33-.58.23-.93.23-1.04.23-.23,0-.46-.35-.81-1.04-.46-1.16-1.04-1.97-1.62-2.66,5.9-1.5,10.42-3.7,13.89-6.71h-6.83v.12Zm2.66-15.16c0,.23.35,1.16.81,2.66.12.46.23.81.23,1.04s-.35.58-.93.93c-1.62,1.16-3.36,2.2-5.33,3.36-.58.35-1.04.69-1.16.93-.12.23-.35.35-.46.35-.23,0-.46-.12-.58-.46-.69-1.16-1.27-2.55-1.74-3.94.93-.23,1.74-.58,2.66-1.04,2.32-1.04,4.4-2.32,6.48-3.82ZM4.63,2.66c2.08,1.5,3.94,3.01,5.33,4.51.12.12.23.23.23.35s-.12.23-.35.58l-1.97,2.32c-.23.23-.35.35-.46.35s-.23-.12-.35-.23c-1.5-1.62-3.24-3.24-5.33-4.75-.23-.12-.23-.23-.23-.35s.12-.23.35-.46l1.97-2.08c.23-.23.46-.35.46-.35,0,0,.12.12.35.12Zm17.13,1.85l4.28-.12c.23,0,.35,0,.35.12s.12.23.12.35l-.12,4.05v6.6l.12,3.94c0,.23,0,.35-.12.46s-.23.12-.35.12l-4.28-.12h-5.21l-4.28.12c-.23,0-.35,0-.46-.12,0,0-.12-.23-.12-.35l.12-3.94v-6.71l-.12-4.05c0-.23,0-.35.12-.46,0,0,.23-.12.46-.12l3.7.12c.35-.69.58-1.5.93-2.32.23-.69.35-1.39.46-2.08,1.85.23,3.24.35,4.05.46.35.12.58.23.58.46s-.12.46-.35.58c-.23.23-.35.58-.58.93-.35.81-.58,1.5-.81,1.85h1.5v.23Zm.93,3.13h-6.95v2.89h6.95v-2.89Zm0,9.03v-3.01h-6.95v3.01h6.95Zm4.63-8.1c2.08-1.5,3.82-3.01,4.98-4.63.58-.58.93-1.16,1.27-1.74,1.27.93,2.32,1.62,3.01,2.32.35.35.58.58.58.81s-.23.46-.58.58-.69.46-1.16.93c-.93,1.04-2.32,2.32-4.17,3.82-.46.46-.81.58-.93.58s-.46-.23-.93-.81c-.81-.81-1.5-1.39-2.08-1.85Zm2.89,3.7c2.43,1.27,4.86,2.78,7.41,4.51.12.12.23.23.23.35s-.12.23-.23.46l-1.62,2.66c-.12.23-.35.46-.46.46s-.23-.12-.35-.23c-2.08-1.74-4.51-3.36-7.29-4.86-.23-.12-.23-.23-.23-.35s.12-.23.23-.46l1.62-2.32c.12-.23.35-.35.46-.35-.12-.12,0,0,.23.12Z"
                                    />
                                </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Fouiller pour le :has(:focus-visible) tailwindcss-->
                        <form action="/results" id="search"
                            class="group rounded-full border py-1 px-5 items-center hidden max-w-lg w-10/12 md:flex">
                            <input
                                id="search-input"
                                name="query"
                                type="text"
                                class="focus-visible:outline-transparent bg-transparent w-full py-1"
                                placeholder="Vous cherchez quelque chose ?"
                            />
                            <div>
                               <i id="search-submit" class="cursor-pointer ri-search-line text-xl"></i>
                            </div>
                        </form>
                        
                        <div id="user-pc" class="items-center hidden md:flex gap-6">
                        <a href="/cart/">
                            <div class="cart relative">
                                <i class="ri-shopping-basket-line text-3xl"></i>
                                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                                    <div class="cart-count absolute font-bold flex items-center justify-center right-[-10px] top-[-3px] h-5 w-5 text-sm rounded-full text-center text-white bg-red-500">
                                        <?= count($_SESSION['cart']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                        <?php if (!isset($_SESSION['id'])): ?> 
                            <div class="cursor-pointer">
                                <a href="/login/">
                                <p class="whitespace-nowrap">Se connecter</p>
                                </a>
                            </div>
                            <a href="/register/">
                            <button class="rounded-full bg-black text-white px-7 py-2">S'inscrire</button>
                            </a>
                        <?php else: ?>
                            <p class="whitespace-nowrap">Bonjour, <span class="font-bold"><?= $_SESSION['prenom'] ?></span> ! </p>
                            <a href="/account/">
                            <i class="ri-user-3-line text-3xl"></i>
                            </a>
                            <?php if (isset($_SESSION['idRole']) && $_SESSION['idRole'] == 999): ?>
                            <a href="/back-office/hyper-secret/">
                                <i class="ri-shield-star-line text-3xl"></i>
                            </a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div>
                       


                        <div id="user-mobile" class="md:hidden flex items-center gap-6">
                            
                            <form action="/results" id="search-mobile" class="relative">
                                <input class="h-10 rounded-full px-5 w-full pr-10 border" name="query" placeholder="Recherche ..." />
                                <i id="search-submit-2" class="ri-search-line absolute top-[7px] right-[14px] text-xl cursor-pointer"></i>
                            </form>
                            <a href="/cart/">
                            <div class="cart relative">
                                <i class="ri-shopping-basket-line text-3xl"></i>
                                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                                    <div class="cart-count absolute font-bold flex items-center justify-center right-[-10px] top-[-3px] h-5 w-5 text-sm rounded-full text-center text-white bg-red-500">
                                        <?= count($_SESSION['cart']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                            <?php if (!isset($_SESSION['id'])): ?> 
                            <a href="/login/">
                            <?php else: ?>
                            <a href="/account/">
                            <?php endif; ?>
                                <i class="ri-user-3-line text-3xl"></i>
                            </a>
                            <?php if (isset($_SESSION['idRole']) && $_SESSION['idRole'] == 999): ?>
                            <a href="/back-office/hyper-secret/">
                                <i class="ri-shield-star-line text-3xl"></i>
                            </a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>