

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Sidebar</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>:root {
                --primary-color: #191919;
                --primary: #408CF9;
                --white: #FFFFFF;
                --sidebar-hover: #F5F5F5;
                --sidebar-bg: #FFFFFF;
                --bg: #EFEFEF;
                --text-link: #141B34;
                --expand-button: #408CF9;
                --logout: #FA7575;
                --headline-text: #546471;
                --text: #141B34;
                --divider-bg: var(--bg);
                --shadow-color: #E9E6E4;
                --shadow: 0px 0px 0px 1.4px var(--shadow-color),
                0px 0px 2.8px 0px var(--shadow-color);
            }

            body {
                font-family: 'Inter', sans-serif;
                font-size: 16px;
                padding: 1rem;
                height: 100%;
                background: var(--bg);
            }

            html {
                height: 100%;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .sidebar {
                position: relative;
                top: 0;
                left: 0;
                height: 100%;
                border-radius: 0rem;
                user-select: none;
                max-width: 15rem;
                min-width: 4rem;
                max-height: 100%;

                display: flex;
                color: var(--white);
                flex-direction: column;
                background-color: var(--sidebar-bg);
                box-shadow: var(--shadow);
                transition: max-width 0.2s ease-in-out;
            }

            .sidebar h2 {
                color: var(--headline-text);
                font-size: 1rem;
                margin-top: 1rem;
                line-height: 1.5rem;
            }

            body.collapsed .sidebar h2 {
                display: none;
            }

            body.collapsed .sidebar {
                max-width: 5rem;
                display: flex;
            }

            body.collapsed .hide {
                position: absolute;
                visibility: hidden;
            }

            /*? sidebar top */
            .sidebar-top-wrapper {
                position: relative;
                display: flex;
                background: var(--primary-color-light);
            }

            .sidebar-top {
                display: flex;
                align-items: start;
                justify-content: center;
                flex-direction: column;
                overflow: hidden;
                height: 4rem;
                padding: 1rem;
                padding-top: 2rem;
            }

            .logo__wrapper {
                display: flex;
                align-items: center;
                color: var(--text-link);
                font-weight: 700;
                text-decoration: none;
                font-size: 1.35rem;
                gap: 0.75rem;
            }

            .logo-small {
                height: 3rem;
                width: 3rem;
                border-radius: 0.4rem;
                padding: 0.25rem;
                overflow: hidden;
                object-fit: cover;
            }

            .company-name {
                white-space: nowrap;
            }

            /*? menu links */

            .sidebar-links-wrapper {
                /* overflow-y: auto; */
                overflow: hidden;
                padding: 1rem;
                position: relative;
            }

            body.collapsed .sidebar-links-wrapper {
                overflow: hidden;
            }

            .sidebar-links ul {
                list-style-type: none;
                display: flex;
                row-gap: 0.5rem;
                flex-direction: column;
            }

            .sidebar-links li {
                color: var(--text-link);
                min-width: 3rem;
            }

            .sidebar-links li svg {
                stroke: var(--text-link);
                width: 1.75rem;
                height: 1.75rem;
                min-width: 1.75rem;
            }

            .sidebar-links li a:hover {
                background: var(--sidebar-hover);
            }

            .sidebar-links li a {
                color: var(--text-link);
                width: 100%;
                padding: 0 0.6rem;
                font-size: 1.25rem;
                display: flex;
                gap: 0.75rem;
                border-radius: 0.75rem;
                justify-content: start;
                align-items: center;
                min-height: 3.25rem;
                text-decoration: none;
                transition: background 0.2s ease-in-out;
            }

            .sidebar-links li .tag {
                margin-left: auto;
                padding: 0.25rem 0.5rem;
                border-radius: 0.5rem;
                font-size: 0.75rem;
                background: var(--sidebar-hover);
                color: var(--text-link);
                border: 1px solid var(--shadow-color);
            }

            .sidebar-links li a .link {
                overflow: hidden;
                white-space: nowrap;
                animation: fadeIn 0.2s ease-in-out;
            }

            .sidebar-links .active:hover {
                background: var(--sidebar-hover);
            }

            .sidebar-links .active {
                text-decoration: none;
                background: var(--sidebar-hover);
                color: var(--text-link);
            }

            .sidebar-links .active svg {
                stroke: var(--text-link);
            }

            .divider {
                display: none;
            }

            body.collapsed .divider {
                width: 100%;
                display: block;
                background: var(--divider-bg);
                height: 2px;
                margin: 0.5rem 0;
            }

            /*? profile part */
            .sidebar__profile {
                display: flex;
                padding: 1rem;
                align-items: center;
                gap: 0.75rem;
                flex-direction: row;
                color: var(--text-link);
                overflow: hidden;
                min-height: 4rem;
                margin-top: auto;
            }

            .avatar__wrapper {
                position: relative;
                display: flex;
            }

            .avatar {
                display: block;
                min-height: 3rem;
                cursor: pointer;
                border-radius: 50%;
                transition: all 0.2s ease-in-out;
            }

            .avatar__name {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
                white-space: nowrap;
            }

            .user-name {
                font-weight: 600;
                text-align: left;
                color: var(--text-link);
            }

            .email {
                color: var(--text-link);
                font-size: 0.8rem;
            }

            .sidebar__profile .menu {
                margin-left: auto;
                padding: 0.5rem;
                height: 2.5rem;
                width: 2.5rem;
                cursor: pointer;
            }

            .sidebar__profile .menu:hover {
                padding: 0.5rem;
                border-radius: 50%;
                background: var(--sidebar-hover);
            }

            /*? Expand button */
            .expand-btn {
                position: absolute;
                display: grid;
                place-items: center;
                cursor: pointer;
                background: var(--sidebar-bg);
                z-index: 2;
                right: -1.2rem;
                top: 0;
                width: 2rem;
                height: 2rem;
                border: none;
                border-radius: 0 50% 50% 0;
            }

            .expand-btn svg {
                transform: rotate(-180deg);
                stroke: var(--text-link);
                width: 1.25rem;
                height: 1.25rem;
            }

            body.collapsed .expand-btn svg {
                transform: rotate(-360deg);
            }

            @keyframes fadeIn {
                from {
                    width: 4rem;
                    opacity: 0;
                }

                to {
                    opacity: 1;
                    width: 100%;
                }
            }

        </style>

    </head>

    <body>
    <nav class="sidebar">
        <div class="sidebar-top-wrapper">
            <div class="sidebar-top">
                <a href="#" class="logo__wrapper p-1">
                    <span class="hide company-name">Admin</span><br>
                        <div class="text-sm text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">{{ Auth::user()->name }}</div>
                </a>
            </div>
            <button class="expand-btn" type="button">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.00979 2.72L10.3565 7.06667C10.8698 7.58 10.8698 8.42 10.3565 8.93333L6.00979 13.28"
                          stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button><br>
        </div>
        <div class="sidebar-links-wrapper">
            <div class="sidebar-links">
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}" title="Dashboard" class="tooltip">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.82764 11.8634C1.82764 8.49248 1.82764 6.80699 2.57126 5.61223C2.84639 5.17021 3.18813 4.78574 3.58105 4.47623C4.64306 3.63965 6.14126 3.63965 9.13767 3.63965H12.7927C15.7891 3.63965 17.2873 3.63965 18.3493 4.47623C18.7422 4.78574 19.084 5.17021 19.3591 5.61223C20.1027 6.80699 20.1027 8.49248 20.1027 11.8634C20.1027 15.2344 20.1027 16.9199 19.3591 18.1146C19.084 18.5567 18.7422 18.9411 18.3493 19.2506C17.2873 20.0872 15.7891 20.0872 12.7927 20.0872H9.13767C6.14126 20.0872 4.64306 20.0872 3.58105 19.2506C3.18813 18.9411 2.84639 18.5567 2.57126 18.1146C1.82764 16.9199 1.82764 15.2344 1.82764 11.8634Z"
                                    stroke="#141B34" stroke-width="1.4" />
                                <path d="M8.68066 3.63965L8.68066 20.0872" stroke="#141B34" stroke-width="1.4"
                                      stroke-linejoin="round" />
                                <path d="M4.56885 7.29492H5.4826M4.56885 10.0362H5.4826" stroke="#141B34" stroke-width="1.4"
                                      stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span class="link hide">ACCUEIL</span>
                        </a>
                    </li>
                </ul>
                <h2>People</h2>
                <div class="divider"></div>
                <ul>

                    <li>
                        <a href="{{route('agens.index')}}" title="Team" class="tooltip">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_15_5297)">
                                    <path
                                        d="M18.9821 17.2756C19.6667 17.2756 20.2113 16.8447 20.7003 16.2423C21.7013 15.009 20.0578 14.0234 19.431 13.5407C18.7938 13.05 18.0824 12.7721 17.361 12.7068M16.4473 10.8793C17.7089 10.8793 18.7317 9.85656 18.7317 8.59493C18.7317 7.3333 17.7089 6.31055 16.4473 6.31055"
                                        stroke="#141B34" stroke-width="1.4" stroke-linecap="round" />
                                    <path
                                        d="M2.94755 17.2756C2.26287 17.2756 1.71829 16.8447 1.22932 16.2423C0.22834 15.009 1.8718 14.0234 2.49861 13.5407C3.1358 13.05 3.84726 12.7721 4.56859 12.7068M5.02547 10.8793C3.76384 10.8793 2.74108 9.85656 2.74108 8.59493C2.74108 7.3333 3.76384 6.31055 5.02547 6.31055"
                                        stroke="#141B34" stroke-width="1.4" stroke-linecap="round" />
                                    <path
                                        d="M7.38635 14.6364C6.4527 15.2138 4.00471 16.3926 5.4957 17.8677C6.22403 18.5883 7.03521 19.1036 8.05506 19.1036H13.8745C14.8944 19.1036 15.7056 18.5883 16.4339 17.8677C17.9249 16.3926 15.4769 15.2138 14.5432 14.6364C12.3538 13.2826 9.57576 13.2826 7.38635 14.6364Z"
                                        stroke="#141B34" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M14.1629 7.68154C14.1629 9.44782 12.731 10.8797 10.9647 10.8797C9.19846 10.8797 7.7666 9.44782 7.7666 7.68154C7.7666 5.91525 9.19846 4.4834 10.9647 4.4834C12.731 4.4834 14.1629 5.91525 14.1629 7.68154Z"
                                        stroke="#141B34" stroke-width="1.4" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_15_5297">
                                        <rect width="21.9301" height="21.9301" fill="white" transform="translate(0 0.828125)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="link hide">agen-auxiliere</span>
                            <div class="tag hide">New</div>

                        </a>
                    </li>

                    <li>
                        <a href="{{route('diplomes.index')}}" title="Diplome" class="tooltip">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.74121 10.7832L2.8809 13.7318C3.031 16.8766 3.10604 18.449 4.16561 19.4133C5.22519 20.3776 6.87792 20.3776 10.1834 20.3776H11.7466C15.0521 20.3776 16.7048 20.3776 17.7644 19.4133C18.824 18.449 18.899 16.8766 19.0491 13.7318L19.1888 10.7832"
                                    stroke="#141B34" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M2.60142 10.2747C4.15416 13.2274 7.65632 14.4386 10.9648 14.4386C14.2734 14.4386 17.7755 13.2274 19.3283 10.2747C20.0695 8.86524 19.5082 6.21484 17.6828 6.21484H4.24693C2.42146 6.21484 1.86022 8.86524 2.60142 10.2747Z"
                                    stroke="#141B34" stroke-width="1.4" />
                                <path d="M10.9648 10.7832H10.9731" stroke="#141B34" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path
                                    d="M14.6196 6.21474L14.5389 5.93233C14.1369 4.52511 13.9358 3.8215 13.4572 3.41905C12.9786 3.0166 12.3429 3.0166 11.0715 3.0166H10.8577C9.58627 3.0166 8.95056 3.0166 8.47196 3.41905C7.99335 3.8215 7.79232 4.52511 7.39026 5.93233L7.30957 6.21474"
                                    stroke="#141B34" stroke-width="1.4" />
                            </svg>
                            <span class="link hide">Les Diplomes</span>
                        </a>
                    </li>
                </ul>
                <h2>Management</h2>
                <div class="divider"></div>
                <ul>

                    <li>
                        <a href="{{route('conges.index')}}" title="conges" class="tooltip">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.4475 2.49023V4.31774M5.48242 2.49023V4.31774" stroke="#141B34" stroke-width="1.4"
                                      stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.961 12.542H10.9692M10.961 16.197H10.9692M14.6119 12.542H14.6201M7.31006 12.542H7.31826M7.31006 16.197H7.31826"
                                    stroke="#141B34" stroke-width="1.59" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.19775 7.97266H18.7316" stroke="#141B34" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path
                                    d="M2.28418 11.8503C2.28418 7.86884 2.28418 5.87809 3.42831 4.64119C4.57244 3.4043 6.41388 3.4043 10.0968 3.4043H11.8329C15.5158 3.4043 17.3573 3.4043 18.5014 4.64119C19.6455 5.87809 19.6455 7.86884 19.6455 11.8503V12.3196C19.6455 16.3011 19.6455 18.2918 18.5014 19.5287C17.3573 20.7656 15.5158 20.7656 11.8329 20.7656H10.0968C6.41388 20.7656 4.57244 20.7656 3.42831 19.5287C2.28418 18.2918 2.28418 16.3011 2.28418 12.3196V11.8503Z"
                                    stroke="#141B34" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.74121 7.97266H19.1888" stroke="#141B34" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="link hide">Conges-Agens</span>
                        </a>
                    </li>

                    <li>
                        <a href="#document" title="Expenses" class="tooltip">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.82764 11.8539C1.82764 9.0971 1.82764 7.71871 2.6923 6.86228C3.55695 6.00586 4.9486 6.00586 7.73189 6.00586H8.71594C11.4992 6.00586 12.8909 6.00586 13.7555 6.86228C14.6202 7.71871 14.6202 9.0971 14.6202 11.8539V14.7779C14.6202 17.5347 14.6202 18.9131 13.7555 19.7695C12.8909 20.6259 11.4992 20.6259 8.71594 20.6259H7.73189C4.9486 20.6259 3.55695 20.6259 2.6923 19.7695C1.82764 18.9131 1.82764 17.5347 1.82764 14.7779V11.8539Z"
                                    stroke="#141B34" stroke-width="1.4" stroke-linejoin="round" />
                                <path
                                    d="M14.1977 15.1431H15.0413C17.4273 15.1431 18.6203 15.1431 19.3615 14.3938C20.1027 13.6444 20.1027 12.4383 20.1027 10.0261V7.46761C20.1027 5.05542 20.1027 3.84933 19.3615 3.09996C18.6203 2.35059 17.4273 2.35059 15.0413 2.35059H14.1977C11.8117 2.35059 10.6187 2.35059 9.87746 3.09996C9.22927 3.75526 9.14791 4.75983 9.1377 6.61477"
                                    stroke="#141B34" stroke-width="1.4" stroke-linejoin="round" />
                                <path d="M5.48242 11.4883H8.22368M5.48242 16.0571H10.0512" stroke="#141B34" stroke-width="1.4"
                                      stroke-linecap="round" />
                                <path d="M9.59473 3.26465L13.2497 6.46279" stroke="#141B34" stroke-width="1.4"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="link hide">Document</span>
                        </a>
                    </li>
                    <br>
                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <li>
                        <a href="{{route('profile.update')}}" title="Profile" class="tooltip ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path  d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                            </svg>
                            <span class="link hide text-blue-800">Profile</span>
                        </a>
                    </li>

                    <li class="Btn">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link : onclick="event.preventDefault(); this.closest('form').submit();">
                                <div class="sign">
                                    <svg viewBox="0 0 512 512">
                                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                                    </svg>
                                </div>
                                <span class="link hide text-red-700">{{ __('Deconnexion') }}</span>
                            </x-dropdown-link>
                        </form>
                    </li>


                </ul>


            </div>
        </div>
    </nav>
    <script>
        const expand_btn = document.querySelector(".expand-btn");

        let activeIndex;

        expand_btn.addEventListener("click", () => {
            document.body.classList.toggle("collapsed");
        });

        const current = window.location.href;

        const allLinks = document.querySelectorAll(".sidebar-links a");

        allLinks.forEach((elem) => {
            elem.addEventListener("click", function () {
                const hrefLinkClick = elem.href;

                allLinks.forEach((link) => {
                    if (link.href == hrefLinkClick) {
                        link.classList.add("active");
                    } else {
                        link.classList.remove("active");
                    }
                });
            });
        });
    </script>
    </body>

    </html>


