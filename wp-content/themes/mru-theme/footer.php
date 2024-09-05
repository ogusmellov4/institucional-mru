    <!-- Footer -->
    <footer class="footer">
        <section class="info-container">
            <h1 class="info-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo MRU Footer.png"/>
            </h1>
            <div class="info-social">
                <a target="__blank" href="#">
                    <i class="bx bxl-facebook-square"></i>
                </a>
                <a target="__blank" href="https://www.instagram.com/mruconstrucoes/">
                    <i class="bx bxl-instagram"></i>
                </a>
                <a target="__blank" href="https://api.whatsapp.com/send/?phone=5555996751159&text=Ol%C3%A1%2C+quero+conhecer+os+im%C3%B3veis+da+MRU+Constru%C3%A7%C3%B5es%2C+para+morar+e+investir.+Voc%C3%AA+pode+me+ajudar%3F&type=phone_number&app_absent=0">
                    <i class="bx bxl-whatsapp"></i>
                </a>
                <a target="__blank" href="#">
                    <i class="bx bxl-youtube"></i>
                </a>
            </div>
            <div class="info-address">
                <i class='bx bxs-map-pin' ></i>
                <p>Rua André Marques 820, sala 1101, Santa Maria (RS)</p>
            </div>
            <div class="info-rights">
                <p>MRU CONSTRUÇÕES 2024<br>TODOS OS DIREITOS RESERVADOS</p>
            </div>
        </section>
        <section class="site-menu">
            <h1>Links úteis</h1>
            <ul class="site-menu-list">
                <li class="site-menu-item">
                    <a href="<?php echo get_permalink( get_page_by_path( 'empreendimentos' ) ); ?>" class="site-menu-link">Empreendimentos</a>
                </li>
                <li class="site-menu-item">
                    <a href="<?php echo get_permalink( get_page_by_path( 'institucional' ) ); ?>" class="site-menu-link">Institucional</a>
                </li>
                <li class="site-menu-item">
                    <a href="<?php echo get_permalink( get_page_by_path( 'contato' ) ); ?>" class="site-menu-link">Contato</a>
                </li>
            </ul>
        </section>
        <section class="top-buildings">
            <h1>Top Empreendimentos</h1>
            <ul class="buildings-menu-list">
                <li class="buildings-menu-item">
                    <a href="#" class="buildings-menu-link">Centro Clínico Cezar Ugalde</a>
                </li>
                <li class="buildings-menu-item">
                    <a href="#" class="buildings-menu-link">Residencial Aspen</a>
                </li>
                <li class="buildings-menu-item">
                    <a href="#" class="buildings-menu-link">Prime</a>
                </li>
                <li class="buildings-menu-item">
                    <a href="#" class="buildings-menu-link">Altos do Cerrito</a>
                </li>
            </ul>
        </section>
        <section class="certificates">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pbqp.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/iso.png" />
        </section>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
