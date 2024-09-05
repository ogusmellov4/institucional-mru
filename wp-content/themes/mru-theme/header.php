<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRU Construções</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/min-styles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon.png" type="image/x-icon">
</head>
<body>
    <!-- Navbar -->
    <header class="header">
        <h1 class="header-brand">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo MRU.png" alt="MRU Construções" class="logo-mru" />
        </a>
        </h1>
        <button class="menu-mobile-btn">
            <i class='bx bx-menu' ></i>
        </button>
        <nav class="navigation-menu-desktop">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                ));
            ?>
            <!-- <ul class="navigation-list">
                <li class="navigation-item">
                    <a class="navigation-link" href="empreendimentos.html">Empreendimentos</a>
                </li>
                <li class="navigation-item">
                    <a class="navigation-link" href="institucional.html">Institucional</a>
                </li>
                <li class="navigation-item">
                    <a class="navigation-link" href="contato.html">Contato</a>
                </li>
            </ul>
             -->
            <a target="__blank" href="https://api.whatsapp.com/send/?phone=5555996751159&text=Ol%C3%A1%2C+quero+conhecer+os+im%C3%B3veis+da+MRU+Constru%C3%A7%C3%B5es%2C+para+morar+e+investir.+Voc%C3%AA+pode+me+ajudar%3F&type=phone_number&app_absent=0">
                <button class="contact-buttton">
                    <i class='bx bxl-whatsapp'></i>
                    Fale Com a Nossa Equipe
                </button>
            </a>
        </nav>
        <nav class="navigation-menu-mobile">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                ));
            ?>
            <!-- <ul class="navigation-list">
                <li class="navigation-item">
                    <a class="navigation-link" href="#">Empreendimentos</a>
                </li>
                <li class="navigation-item">
                    <a class="navigation-link" href="#">Institucional</a>
                </li>
                <li class="navigation-item">
                    <a class="navigation-link" href="#">Contato</a>
                </li>
            </ul>
            <button class="contact-buttton">
                <i class='bx bxl-whatsapp'></i>
                Fale Com a Nossa Equipe
            </button> -->
        </nav>
    </header>
    <script>
        const menuMobileBtn = document.querySelector('.menu-mobile-btn');
        const navigationMenuMobile = document.querySelector('.navigation-menu-mobile');

        menuMobileBtn.addEventListener('click', () => {
            console.log('Botão clicado');
            navigationMenuMobile.classList.toggle('active'); // Toggle active class for visibility
        }); 
    </script>
    <style>
        .navigation-menu-mobile {
            display: none;
        }

        .navigation-menu-mobile.active {
            display: block;
        }
    </style>