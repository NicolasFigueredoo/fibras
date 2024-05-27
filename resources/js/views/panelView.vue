<template>
    <div class="adminPanel-view">


        <div class="div1">
            <nav id="sidebar" class="sidebar bg-body-light shadow-right" style="height: 100vh;">
                <a class="sidebar-brand">
                    <!-- <img src="../../../../img/logoelroble.png" class="w-75"> -->
                </a>
                <ul class="sidebar-nav nav ">
                    <li class="sidebar-header text-uppercase">
                        Administrador EL ROBLE
                    </li>
                    <hr class="mx-3">
                    <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseHome"
                            aria-expanded="false" aria-controls="collapseHome">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Home</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseHome" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(180)" class="nav-link ">Header</a>
                            </nav>
                        </div>
                        <div id="collapseHome" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(7)" class="nav-link ">Banner</a>
                            </nav>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(190)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Categorias</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(123)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Calidad</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseServicio"
                            aria-expanded="false" aria-controls="collapseServicio">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                </svg>
                            </div>
                            <span>Servicios</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseServicio" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(120)" class="nav-link ">Banner 1</a>
                            </nav>
                        </div>
                        <div id="collapseServicio" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(50)" class="nav-link ">Servicios</a>
                            </nav>
                        </div>
                        <div id="collapseServicio" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(121)" class="nav-link ">Banner 2</a>
                            </nav>
                        </div>
                    </li>

                    <!-- <li class="sidebar-item">
                        <a @click="mostrarComponenteF(50)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Servicios</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li> -->

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(195)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Sectores</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(200)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Litros</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEmpresa"
                            aria-expanded="false" aria-controls="collapseEmpresa">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#ffffff"
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z" />
                                </svg>
                            </div>
                            <span>Nosotros</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseEmpresa" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(122)" class="nav-link ">Banner</a>
                            </nav>
                        </div>
                        <div id="collapseEmpresa" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(32)" class="nav-link ">Valores</a>
                            </nav>
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProductos"
                            aria-expanded="false" aria-controls="collapseProductos">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z" />
                                </svg>
                            </div>
                            <span>Productos</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseProductos" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(25)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>

                    </li>


                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(500)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Clientes</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>

                    <!-- <li class="sidebar-item">
                        <a @click="mostrarComponenteF(50)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M80 48a48 48 0 1 1 96 0A48 48 0 1 1 80 48zm64 193.7v65.1l51 51c7.1 7.1 11.8 16.2 13.4 26.1l15.2 90.9c2.9 17.4-8.9 33.9-26.3 36.8s-33.9-8.9-36.8-26.3l-14.3-85.9L66.8 320C54.8 308 48 291.7 48 274.7V186.6c0-32.4 26.2-58.6 58.6-58.6c24.1 0 46.5 12 59.9 32l47.4 71.1 10.1 5V160c0-17.7 14.3-32 32-32H384c17.7 0 32 14.3 32 32v76.2l10.1-5L473.5 160c13.3-20 35.8-32 59.9-32c32.4 0 58.6 26.2 58.6 58.6v88.1c0 17-6.7 33.3-18.7 45.3l-79.4 79.4-14.3 85.9c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l15.2-90.9c1.6-9.9 6.3-19 13.4-26.1l51-51V241.7l-19 28.5c-4.6 7-11 12.6-18.5 16.3l-59.6 29.8c-2.4 1.3-4.9 2.2-7.6 2.8c-2.6 .6-5.3 .9-7.9 .8H256.7c-2.5 .1-5-.2-7.5-.7c-2.9-.6-5.6-1.6-8.1-3l-59.5-29.8c-7.5-3.7-13.8-9.4-18.5-16.3l-19-28.5zM2.3 468.1L50.1 348.6l49.2 49.2-37.6 94c-6.6 16.4-25.2 24.4-41.6 17.8S-4.3 484.5 2.3 468.1zM512 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm77.9 348.6l47.8 119.5c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8l-37.6-94 49.2-49.2z" />
                                </svg>
                            </div>
                            <span>Servicios</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>
-->
               <!--

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(60)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                </svg>
                            </div>
                            <span>Descargas</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li> -->

                    <!-- <li class="sidebar-item">
                        <a @click="mostrarComponenteF(40)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </div>
                            <span>Novedades</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li> -->

                    <!-- <li class="sidebar-item">
                        <a @click="mostrarComponenteF(70)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M396.6 6.5L235.8 129.1c9.6 1.8 18.9 5.8 27 12l168 128c13.2 10.1 22 24.9 24.5 41.4l6.2 41.5H608c9.3 0 18.2-4.1 24.2-11.1s8.8-16.4 7.4-25.6l-24-160c-1.2-8.2-5.6-15.7-12.3-20.7l-168-128c-11.5-8.7-27.3-8.7-38.8 0zm-153.2 160c-11.5-8.7-27.3-8.7-38.8 0l-168 128c-6.6 5-11 12.5-12.3 20.7l-24 160c-1.4 9.2 1.3 18.6 7.4 25.6S22.7 512 32 512H176h16c17.7 0 32-14.3 32-32V361.9c0-5.5 4.4-9.9 9.9-9.9c3.7 0 7.2 2.1 8.8 5.5l68.4 136.8c5.4 10.8 16.5 17.7 28.6 17.7H400h16c9.3 0 18.2-4.1 24.2-11.1s8.8-16.4 7.4-25.6l-24-160c-1.2-8.2-5.6-15.7-12.3-20.7l-168-128z" />
                                </svg>
                            </div>
                            <span>Ferias</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li> -->

                    <!-- <li class="sidebar-item">
                        <a @click="mostrarComponenteF(80)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="#ffffff"
                                        d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                </svg>
                            </div>
                            <span>Videos</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li> -->

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(13)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                            <div class="nav-link-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                </svg>
                            </div>
                            <span>Contacto</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>

                    </li>



                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(19)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseLogos" aria-expanded="false" aria-controls="collapseLogos">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                                </svg>
                            </div>
                            <span>Logos</span>
                            <div class="sidenav-collapse-arrow">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </a>


                    </li>

                    <hr class="mx-3 mt-5">

                    <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseUsuario"
                            aria-expanded="false" aria-controls="collapseUsuario">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v17.7c0 7.8 4.8 14.8 11.6 18.7c6.8 3.9 15.1 4.5 21.8 .6l13.8-7.9c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-14.4 8.3c-6.5 3.7-10 10.9-10 18.4s3.5 14.7 10 18.4l14.4 8.3c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-13.8-7.9c-6.7-3.9-15.1-3.3-21.8 .6c-6.8 3.9-11.6 10.9-11.6 18.7v17.7c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V467.8c0-7.9-4.9-14.9-11.7-18.9c-6.8-3.9-15.2-4.5-22-.6l-13.5 7.8c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l14-8.1c6.5-3.8 10.1-11.1 10.1-18.6s-3.5-14.8-10.1-18.6l-14-8.1c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l13.6 7.8c6.8 3.9 15.2 3.3 22-.6c6.9-3.9 11.7-11 11.7-18.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                                </svg>
                            </div>
                            <span>Usuarios</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseUsuario" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(99)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>
                    </li>

                    <!-- <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseClientes"
                            aria-expanded="false" aria-controls="collapseClientes">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </div>
                            <span>Clientes</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseClientes" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(105)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>
                    </li> -->
                    <li class="sidebar-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSuscripciones"
                            aria-expanded="false" aria-controls="collapseSuscripciones">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                                </svg>
                            </div>
                            <span>Suscripciones</span>
                            <div class="sidenav-collapse-arrow">
                                <svg class="fa-solid fa-angle-down" xmlns="http://www.w3.org/2000/svg" height="14"
                                    width="14" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </div>
                        </a>
                        <div id="collapseSuscripciones" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(17)" class="nav-link">Mostrar</a>
                            </nav>
                        </div>
                        <div id="collapseSuscripciones" class="collapse">
                            <nav class="sidenav-menu-nested nav ">
                                <a @click="mostrarComponenteF(18)" class="nav-link">Enviar Mensaje</a>
                            </nav>
                        </div>
                    </li>
                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(90)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseMetadatos" aria-expanded="false" aria-controls="collapseMetadatos">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 640 512">
                                    <path fill="#ffffff"
                                        d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 65.1c-37.8 5.4-69.4 29.6-85.2 62.9L360 224l0 64 56 0 0 8.6c-19.1 11.1-32 31.7-32 55.4l-24 0 0 64 24 0 0 64L64 480c-35.3 0-64-28.7-64-64L0 96zM64 224l0 64 88 0 0-64-88 0zm232 0l-88 0 0 64 88 0 0-64zM152 352l-88 0 0 64 88 0 0-64zm56 0l0 64 88 0 0-64-88 0zM528 240c-17.7 0-32 14.3-32 32l0 48 64 0 0-48c0-17.7-14.3-32-32-32zm-80 32c0-44.2 35.8-80 80-80s80 35.8 80 80l0 48c17.7 0 32 14.3 32 32l0 128c0 17.7-14.3 32-32 32l-160 0c-17.7 0-32-14.3-32-32l0-128c0-17.7 14.3-32 32-32l0-48z" />
                                </svg>
                            </div>
                            <span>Metadatos</span>

                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a @click="mostrarComponenteF(130)" class="nav-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#collapseMetadatos" aria-expanded="false" aria-controls="collapseMetadatos">
                            <div class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="#ffffff"
                                        d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                </svg>
                            </div>
                            <span>Carga Masiva</span>

                        </a>

                    </li>

                </ul>
            </nav>
            <div class="div2">
                <div>
                    <nav class="navbar navbar-expand-lg bg-body-light topbar mb-4">
                        <div class="container-fluid px-2">
                            <div class="d-flex align-items-center gap-lg-2">
                                <button class="button-toggle-menu" id="sidebarToggle">
                                    <i class="fa-solid fa-bars"></i>
                                </button>

                            </div>
                            <div class="">
                                <ul class="navbar-nav ms-automb-lg-0">

                                    <div class="p-2 mt-2">
                                        <p>Bienvenido {{ this.nombre }}</p>

                                    </div>

                                    <div class="p-2">
                                        <button @click="logout()" type="button"
                                            class="btn btn-danger botonSalir">Salir</button>
                                    </div>


                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
                <div class="componentesV" style="max-height: 500px; overflow-y: scroll; overflow-x: hidden;">

                    <Alerta style="position: fixed; z-index: 5;" v-if="mostrarAlerta === true" />
                    <!--COMPONENTES SLIDER -->
                    <ShowSlider v-if="mostrarComponente === 1" />
                    <CrearSlider v-if="mostrarComponente === 29" />
                    <EditSlider v-if="mostrarComponente === 2" />

                    <!--COMPONENTES CONTACTO -->
                    <ShowContactos v-if="mostrarComponente === 13" />

                    <!--COMPONENTES LOGO -->
                    <ShowLogos v-if="mostrarComponente === 19" />

                    <!--COMPONENTES PRODUCTOS -->
                    <ShowProductos v-if="mostrarComponente === 25" />
                    <CrearProducto v-if="mostrarComponente === 26" />
                    <EditProducto v-if="mostrarComponente === 28" />
                    <ProductosImagenes v-if="mostrarComponente === 27" />

                    <!--COMPONENTES SECCION -->
                    <EditBanner v-if="mostrarComponente === 7" /> <!--COMPONENTES SECCION HOME -->
                    <EditBanner v-if="mostrarComponente === 122" /> <!--COMPONENTES SECCION NOSOTROS-->
                    <EditBanner v-if="mostrarComponente === 120" /> <!--COMPONENTES SECCION SERVICIO 1-->
                    <EditBanner v-if="mostrarComponente === 121" /> <!--COMPONENTES SECCION SERVICIO 2-->
                    <EditBanner v-if="mostrarComponente === 123" /> <!--COMPONENTES SECCION CALIDAD-->


                    <!--COMPONENTES NOVEDADES -->
                    <ShowNovedades v-if="mostrarComponente === 40" />
                    <EditarNovedad v-if="mostrarComponente === 41" />
                    <CrearNovedad v-if="mostrarComponente === 42" />

                    <!--COMPONENTES SERVICIOS -->
                    <ShowServicios v-if="mostrarComponente === 50" />
                    <CrearServicio v-if="mostrarComponente === 52" />
                    <EditarServicio v-if="mostrarComponente === 53" />

                    <!--COMPONENTES DESCARGAS -->
                    <ShowDescarga v-if="mostrarComponente === 60" />
                    <CrearDescarga v-if="mostrarComponente === 62" />
                    <EditarDescarga v-if="mostrarComponente === 63" />

                    <!--COMPONENTES FERIAS -->
                    <ShowFerias v-if="mostrarComponente === 70" />
                    <EditarFeria v-if="mostrarComponente === 71" />
                    <CrearFeria v-if="mostrarComponente === 72" />
                    <ProductosImagenesFeria v-if="mostrarComponente === 73" />

                    <!--COMPONENTES VIDEOS -->
                    <ShowVideos v-if="mostrarComponente === 80" />
                    <CrearVideo v-if="mostrarComponente === 81" />
                    <EditarVideo v-if="mostrarComponente === 82" />

                    <!--COMPONENTES SUBCRIPCIONES -->
                    <ShowSuscripciones v-if="mostrarComponente === 17" />
                    <EnviarSuscripciones v-if="mostrarComponente === 18" />

                    <!--COMPONENTES VALORES -->

                    <CrearSeccion v-if="mostrarComponente === 31" />
                    <ShowSeccionesNosotros v-if="mostrarComponente === 32" />
                    <EditSeccionesNosotros v-if="mostrarComponente === 33" />

                    <!--COMPONENTES METADATOS -->
                    <MetaDatos v-if="mostrarComponente === 90" />
                    <EditMetadatos v-if="mostrarComponente === 91" />

                    <!--COMPONENTES USUARIOS -->
                    <ShowUsuarios v-if="mostrarComponente === 99" />
                    <CrearUsuario v-if="mostrarComponente === 100" />
                    <EditUsuario v-if="mostrarComponente === 101" />

                    <!--COMPONENTES CLIENTES -->
                    <ShowClientes v-if="mostrarComponente === 105" />



                    <!--COMPONENTES ShowCargaMasiva -->
                    <ShowCargaMasiva v-if="mostrarComponente === 130" />


                    <!--COMPONENTES HOME 1 SOLA PAGINA -->
                    <ShowHomeHeader v-if="mostrarComponente === 180" />

                    <!--COMPONENTES CATEGORIAS -->
                    <ShowCategorias v-if="mostrarComponente === 190" />
                    <CrearCategorias v-if="mostrarComponente === 191" />
                    <EditarCategorias v-if="mostrarComponente === 192" />

                    <!--COMPONENTES SECTORES -->
                    <ShowSectores v-if="mostrarComponente === 195" />
                    <CrearSectores v-if="mostrarComponente === 196" />
                    <EditarSectores v-if="mostrarComponente === 197" />

                    <!--COMPONENTES LITROS -->
                    <ShowLitros v-if="mostrarComponente === 200" />
                    <CrearLitros v-if="mostrarComponente === 201" />
                    <EditarLitros v-if="mostrarComponente === 202" />

                    <!--COMPONENTES CLIENTE EMPRESA -->
                    <ShowClienteEmpresa v-if="mostrarComponente === 500" />
                    <EditarClienteEmpresa v-if="mostrarComponente === 501" />
                    <CrearClienteEmpresa v-if="mostrarComponente === 502" />

                    





                </div>



            </div>




        </div>


    </div>
</template>

<script>


import Alerta from "@/components/admin/alerta/Alerta.vue";
import ShowSlider from "@/components/admin/home/sliderHome/ShowSlider.vue";
import CrearSlider from "@/components/admin/home/sliderHome/CrearSlider.vue";
import EditSlider from "@/components/admin/home/sliderHome/EditSlider.vue";

import ShowContactos from "@/components/admin/contactos/ShowContactos.vue";

import ShowLogos from "@/components/admin/logos/ShowLogos.vue";

import ShowProductos from "@/components/admin/productos/ShowProductos.vue";
import CrearProducto from "@/components/admin/productos/CrearProducto.vue";
import EditProducto from "@/components/admin/productos/EditProducto.vue";
import ProductosImagenes from "@/components/admin/productos/ProductosImagenes.vue";

import EditBanner from "@/components/admin/home/banner/EditBanner.vue";

import ShowNovedades from "@/components/admin/novedades/ShowNovedades.vue";
import CrearNovedad from "@/components/admin/novedades/CrearNovedad.vue";
import EditarNovedad from "@/components/admin/novedades/EditarNovedad.vue";

import ShowServicios from "@/components/admin/servicios/ShowServicios.vue";
import CrearServicio from "@/components/admin/servicios/CrearServicio.vue";
import EditarServicio from "@/components/admin/servicios/EditarServicio.vue";

import ShowDescarga from "@/components/admin/descargas/ShowDescargas.vue";
import CrearDescarga from "@/components/admin/descargas/CrearDescarga.vue";
import EditarDescarga from "@/components/admin/descargas/EditarDescarga.vue";

import ShowVideos from "@/components/admin/videos/ShowVideos.vue";
import CrearVideo from "@/components/admin/videos/CrearVideo.vue";
import EditarVideo from "@/components/admin/videos/EditarVideo.vue";

import ShowFerias from "@/components/admin/ferias/ShowFerias.vue";
import CrearFeria from "@/components/admin/ferias/CrearFeria.vue";
import EditarFeria from "@/components/admin/ferias/EditarFeria.vue";
import ProductosImagenesFeria from "@/components/admin/ferias/ShowFeriaImagenes.vue";

import ShowSuscripciones from "@/components/admin/suscripciones/ShowSuscripciones.vue";
import EnviarSuscripciones from "@/components/admin/suscripciones/EnviarSuscripciones.vue";

import ShowSeccionesNosotros from "@/components/admin/empresa/ShowSeccionesNosotros.vue";
import EditSeccionesNosotros from "@/components/admin/empresa/EditSeccionesNosotros.vue";
import CrearSeccion from "@/components/admin/empresa/CrearSeccion.vue";

import MetaDatos from "@/components/admin/metadatos/MetaDatos.vue";
import EditMetadatos from "@/components/admin/metadatos/EditMetadatos.vue";

import ShowUsuarios from "@/components/admin/usuario/ShowUsuarios.vue";
import CrearUsuario from "@/components/admin/usuario/CrearUsuario.vue";
import EditUsuario from "@/components/admin/usuario/EditUsuario.vue";

import ShowClientes from "@/components/admin/clientes/ShowClientes.vue";
import ShowHomeHeader from "@/components/admin/home/header/ShowHomeHeader.vue";


import ShowCargaMasiva from "@/components/admin/cargaMasiva/ShowCargaMasiva.vue";

import ShowCategorias from "@/components/admin/categorias/ShowCategorias.vue";
import CrearCategorias from "@/components/admin/categorias/CrearCategorias.vue";
import EditarCategorias from "@/components/admin/categorias/EditCategorias.vue";

import ShowSectores from "@/components/admin/sectores/ShowSectores.vue";
import CrearSectores from "@/components/admin/sectores/CrearSectores.vue";
import EditarSectores from "@/components/admin/sectores/EditarSectores.vue";


import ShowLitros from "@/components/admin/litros/ShowLitro.vue";
import CrearLitros from "@/components/admin/litros/CrearLitro.vue";
import EditarLitros from "@/components/admin/litros/EditarLitro.vue";

import ShowClienteEmpresa from "@/components/admin/clientesEmpresas/ShowClienteEmpresa.vue";
import EditarClienteEmpresa from "@/components/admin/clientesEmpresas/EditarClienteEmpresa.vue";
import CrearClienteEmpresa from "@/components/admin/clientesEmpresas/CrearClienteEmpresa.vue";

import axios from "axios";

export default {
    components: {
        Alerta,
        ShowSlider,
        ShowContactos,
        ShowLogos,
        CrearSlider,
        ShowProductos,
        CrearProducto,
        EditSlider,
        ProductosImagenes,
        EditProducto,
        EditBanner,
        ShowNovedades,
        CrearNovedad,
        EditarNovedad,
        ShowSuscripciones,
        EnviarSuscripciones,
        ShowSeccionesNosotros,
        EditSeccionesNosotros,
        CrearSeccion,
        ShowServicios,
        CrearServicio,
        EditarServicio,
        ShowDescarga,
        CrearDescarga,
        EditarDescarga,
        ShowFerias,
        CrearFeria,
        EditarFeria,
        ProductosImagenesFeria,
        ShowVideos,
        CrearVideo,
        EditarVideo,
        MetaDatos,
        EditMetadatos,
        ShowUsuarios,
        CrearUsuario,
        EditUsuario,
        ShowClientes,
        ShowCargaMasiva,
        ShowHomeHeader,
        ShowCategorias,
        CrearCategorias,
        EditarCategorias,
        ShowSectores,
        CrearSectores,
        EditarSectores,
        ShowLitros,
        CrearLitros,
        EditarLitros,
        ShowClienteEmpresa,
        EditarClienteEmpresa,
        CrearClienteEmpresa

    },
    data() {
        return {
            admin: 0
        }
    },
    computed: {
        mostrarComponente() {
            return this.$store.getters['getMostrarComponente'];
        },
        mostrarAlerta() {
            return this.$store.getters['getMostrarAlerta'];
        },
        getIdLogin() {
            return this.$store.getters['getIdLogin'];
        },
    },
    methods: {
        logout() {
            this.$router.push('/');
            this.$store.commit("setLoginId", null);
            localStorage.setItem('idLogin', JSON.stringify(null));

        },

        obtenerUsuario() {
            axios.get(`/api/obtenerIdUsuario/${this.getIdLogin}`)
                .then(response => {
                    this.admin = response.data.admin
                    this.nombre = response.data.usuario
                })
                .catch(error => {
                    console.error(error);
                });
        },

        mostrarComponenteF(idComponente) {

            console.log(idComponente, 'hola')
            this.$store.commit('mostrarComponente', idComponente);
        }
    },
    mounted() {
        this.obtenerUsuario();
        if (this.getIdLogin == null) {
            this.$router.push('/');
        }
    }



};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Bona+Nova&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,300;0,700;1,300;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:wght@100;400;500;600;700&display=swap');


.botonSalir {
    width: 60px;
    height: 40px;
}

.componentesV {
    width: 72%;
    margin-left: 5%;
}

.div1 {
    display: flex;
}

.div2 {
    display: flex;
    flex-direction: column;
    width: 100%;
}

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

a {
    text-decoration: none !important;
}

li {
    list-style: none;
}

.user-avatar {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    overflow: hidden;
}

body {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    line-height: 1.5;
    font-size: 0.88rem !important;
    color: black;
}

.wrapper {
    display: flex;
    width: 100%;
}

.main {
    width: 100%;
    flex-direction: column;
    min-height: 100vh;
}

.sidebar {
    overflow-y: scroll;
    background: rgb(0, 0, 0, 0.5);
    ;
    height: 100%;
    width: 15rem;
    transform: translateX(-15rem);
    transition: all 300ms ease-in-out;
}

.sidebar::-webkit-scrollbar {
    width: 3px;
}

/* Sidebar collapsed */

.sidebar.hide {
    transform: translateX(0);
}

/* Sidebar collapsed end */

.sidebar-brand {
    color: #fff;
    display: flex;
    justify-content: center;
    font-size: 1.125rem;
    font-weight: 500;
    gap: 0.6rem;
    padding: 1.15rem 1.15rem;
    align-items: center;
}

.sidebar-brand svg {
    fill: #4a88eb;
    height: 24px;
    width: 24px;
}

.sidebar-nav {
    flex-direction: column;
    flex-wrap: nowrap;
    list-style: none;
    padding-left: 0;
    font-size: 0.9rem;
    color: #fff;
    height: 100%;
}

.shadow-right {
    box-shadow: 0.15rem 0 1.75rem 0 rgba(33, 40, 50, 0.15);
}

.sidebar-header {
    color: white;
    padding: 1.75rem 1rem 0.75rem;
    font-size: 0.75rem;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.05;
}


.nav-link {
    display: flex;
    align-items: center;
    line-height: normal;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    font-size: 0.825rem;
    position: relative;
    color: white;
    padding: 10px;
}

.nav-link-icon {
    font-size: 0.9rem;
    padding-right: 0.5rem;
    display: inline-flex;
    margin-right: 0.5rem;
}

.nav-link-icon svg {
    width: 14px;
    height: 14px;
}

/**/
.nav-link.active {
    color: white !important;
}



.navbar-nav .nav-link:hover {
    color: rgba(233, 236, 239, 0.884) !important;

}

.nav-link:focus,
.nav-link:hover {
    color: white
}

/**/
.sidebar-item.active .nav-link:hover,
.sidebar-item.active>.nav-link {
    color: white;
}

.nav-link:hover {
    color: white
}

.nav-lin:focus,
.nav-link:hover {
    color: white !important;
}

/*
.sidebar-nav .sidebar-item.active{
    
}*/

.sidenav-collapse-arrow {
    display: inline-block;
    margin-left: auto;
    transition: transform 0.15s ease;

}

.nav-link.collapsed .sidenav-collapse-arrow {
    transform: rotate(180deg);
}

.sidenav-menu-nested {
    flex-direction: column;
    margin-left: 1.4375rem;
    border-left-style: solid;
    border-left-width: thin;
    border-color: white;
    padding-left: 0.5625rem !important;
}

.sidenav-menu-nested .nav-link {
    color: black;
    font-weight: 400;
}

.nav-link,
a.nav-link {
    cursor: pointer;
    transition: color 300ms ease-in-out;
}

/* Topbar */

.main {
    /* ===== */
    position: relative;
    width: 100%;
    left: 0;
    min-height: 100vh;
    transition: all 300ms ease-in-out;
}

.sidebar.hide~.main {
    width: calc(100% - 15rem);
    ;
    left: 15rem;
}

.topbar {
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, .15);
    /*height: 4.375rem;*/
    padding: 0 !important;
}

.container-fluid .navbar-nav {
    flex-direction: row !important;
}

button {
    outline: 0 !important
}

.button-toggle-menu {
    color: #6c757d;
    border: none;
    width: 60px;
    background-color: transparent;
    font-size: 20px;
    position: relative;
}

.app-search form .form-control {
    color: #6c757d;
    background-color: #f0f3f8;
    border: none;
    padding-left: 40px;
    padding-right: 20px;
    box-shadow: none;
}

.search-icon {
    line-height: 35px;
    left: 10px;
    top: 0;
    z-index: 20;
    color: white;
}

.search-btn {
    color: #fff !important;
    background-color: #727cf5 !important;
    border-top-right-radius: 0.15rem !important;
    border-bottom-right-radius: 0.15rem !important;
    border-color: #727cf5 !important;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.125) !important;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}

.search-btn:hover {
    background-color: #6973e3 !important;
    border-color: #6973e3 !important;
}

.topbar-divider {
    width: 0;
    border-right: 1px solid #e3e6f0;
    margin: auto 1rem;
    height: calc(4.375rem - 2rem);
}

.nav-user {
    border: solid #e3e6f0;
    border-width: 0 1px;
    gap: 10px;
    background-color: #fafafd !important;
    overflow: hidden;
}

.topbar .nav-link {
    height: 4.375rem;
    display: flex;
    align-items: center;
    padding: 0 0.75rem;
    cursor: pointer;
    position: relative;
}

.dropdown-menu .dropdown-item {
    display: flex;
    align-items: center;
}

/* Main section */

.container-fluid {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.border-left-primary {
    border-left: 0.25rem solid #293042 !important;
}

.text-xs {
    font-size: .7rem;
}

.font-weight-bold {
    font-weight: 400 !important;
}

.text-primary {
    color: var(--primary);
}

.stat {
    background: #e0eafc;
    border-radius: 50%;
    height: 48px;
    padding: 0.75rem;
    width: 48px;
    font-size: 1.5rem;
}

.stat:before {
    display: flex;
    justify-content: center;
}

.card-title {
    color: #495057;
    font-size: .95rem;
    font-weight: 500;
}

.equivalencia-fila {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.eliminar-equivalencia {
    margin-top: 5px;
}

.equivalencia-rectangulo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right: 10px;
    padding: 10px 20px;
    cursor: pointer;
    background-color: #f9f9f9;
    border-radius: 8px;
    margin-top: 10px;
}

.equivalencia-nombre {
    color: #484848;
    font-size: 16px;
    font-weight: 400;
    line-height: 140%;
}

.equivalencia_codigo {
    color: #0C0C0C;
    font-size: 16px;
    font-weight: 500;
    line-height: 140%;
}

.aplicacion-box {
    min-height: 215px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-radius: 8px;
    padding: 15px;
    background: #F4F4F4;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.datos-aplicacion {
    color: #0C0C0C;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
}

.year-aplicacion,
.posicion-aplicacion {
    color: #0C0C0C;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 140%;

}

.aplicacion-box:hover {
    transform: scale(1.05);
}

.aplicacion-box p {
    margin: 0;
}

.eliminar-aplicacion {
    margin-top: 10px;
}

#aplicaciones-container {
    display: flex;
    flex-wrap: wrap;
}

/** video **/
.slider-video {
    width: 100%;
    height: auto;
    margin: 0;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

@media (min-width:992px) {
    .sidebar {
        transform: translate(0);
    }

    .sidebar.hide {
        transform: translateX(-15rem);
    }

    .main {
        width: calc(100% - 15rem);
        left: 15rem;
    }

    .sidebar.hide~.main {
        width: 100%;
        left: 0rem;
    }
}

@media (max-width: 767.98px) {
    .wrapper {
        overflow-y: hidden;
    }

    .sidebar.hide~.main {
        width: 100%;
        left: 15rem;
    }

}
</style>