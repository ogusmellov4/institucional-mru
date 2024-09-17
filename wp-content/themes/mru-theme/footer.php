    <!-- Footer -->
    <div class="sticky-bar-container">
    <h1 class="ft-uppercase">Central de vendas</h1>
    <div id="contatos-sticky" class="flex gap-md">
        <div class="flex gap-sm full-center">
            <i class="bx bxs-phone-call bx-md"></i>
            <p>(55) 3095-0020</p>
        </div>
        <a class="link-style" target="__blank" href="https://api.whatsapp.com/send/?phone=5555996751159&text=Ol%C3%A1%2C+quero+conhecer+os+im%C3%B3veis+da+MRU+Constru%C3%A7%C3%B5es%2C+para+morar+e+investir.+Voc%C3%AA+pode+me+ajudar%3F&type=phone_number&app_absent=0">
            <div class="flex gap-sm full-center">
                <i class="bx bxl-whatsapp bx-md"></i>
                <p>(55) 99675-1159</p>
            </div>
        </a>
    </div>
</div>
    <footer class="footer">
        <section class="info-container">
            <h1 class="info-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo MRU Footer.png"/>
            </h1>
            <div class="info-social">
                <a target="__blank" href="https://www.facebook.com/mruconstrucoes/?locale=pt_BR">
                    <i class="bx bxl-facebook-square"></i>
                </a>
                <a target="__blank" href="https://www.instagram.com/mruconstrucoes/">
                    <i class="bx bxl-instagram"></i>
                </a>
                <a target="__blank" href="https://api.whatsapp.com/send/?phone=5555996751159&text=Ol%C3%A1%2C+quero+conhecer+os+im%C3%B3veis+da+MRU+Constru%C3%A7%C3%B5es%2C+para+morar+e+investir.+Voc%C3%AA+pode+me+ajudar%3F&type=phone_number&app_absent=0">
                    <i class="bx bxl-whatsapp"></i>
                </a>
                <a target="__blank" href="https://www.youtube.com/@mruconstrucoes820?app=desktop">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Seleciona todos os inputs que têm "telefone" no nome
            const telefoneInputs = document.querySelectorAll('input[type="tel"][name*="telefone"]');

            telefoneInputs.forEach(input => {
                // Adiciona o código do país quando o campo ganha foco
                input.addEventListener('focus', function(event) {
                    if (input.value === "") {
                        input.value = "+55 "; // Adiciona +55 no início se o campo estiver vazio
                    }
                });

                // Formata o telefone em tempo real enquanto o usuário digita
                input.addEventListener('input', function(event) {
                    let value = event.target.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

                    // Limita o comprimento a 11 dígitos (DDD + número)
                    if (value.length > 11) value = value.slice(0, 11);

                    // Formatação: Se for celular (11 dígitos) ou fixo (10 dígitos)
                    if (value.length > 10) {
                        value = `(${value.substring(0, 2)}) ${value.substring(2, 7)}-${value.substring(7)}`;
                    } else if (value.length > 6) {
                        value = `(${value.substring(0, 2)}) ${value.substring(2, 6)}-${value.substring(6)}`;
                    } else if (value.length > 2) {
                        value = `(${value.substring(0, 2)}) ${value.substring(2)}`;
                    }

                    // Atualiza o valor do campo com a formatação
                });

                // Remove a formatação ao perder o foco, para garantir o formato correto para envio
                input.addEventListener('blur', function(event) {
                    let value = event.target.value.replace(/\D/g, ''); // Remove a formatação
                    if (value.length === 11) {
                        event.target.value = `+55${value}`; // Formato final para envio ao banco
                    }
                });
            });
        });
    </script>


</body>
</html>
