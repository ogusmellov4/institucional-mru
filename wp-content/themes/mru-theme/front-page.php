<?php
/* Template Name: Front Page */

get_header(); ?>


    <!-- Carrossel -->
    <section class="carrossel-container" style="height: 700px">
        <div class="carrossel-setas">
            <button class="seta-btn">
                <i class='bx bxs-chevron-left-circle' ></i>
            </button>
            <button class="seta-btn">
                <i class='bx bxs-chevron-right-circle' ></i>
            </button>
        </div>
        <div class="carrossel-imagens">
            <?php
            $args = array(
                'post_type' => 'banner_imagens',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $imagem = get_field('imagem_banner'); // Supondo que você criou um campo ACF para a imagem
                    $link = get_field('link_banner');
                    ?>
                    <a href="<?php echo esc_url($link); ?>"   style="height: 700px; object-fit: cover;">
                        <img src="<?php echo esc_url($imagem['url']); ?>" class="carrossel-img" style="height: 700px; object-fit: cover;"/>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div class="carrossel-options">
            <?php if ($query->have_posts()) :
                $count = $query->post_count;
                for ($i = 0; $i < $count; $i++) : ?>
                    <button class="carrossel-option <?php echo $i === 0 ? 'active' : ''; ?>"></button>
                <?php endfor;
            endif; ?>
        </div>
    </section>

    <!-- Lista de Empreendimentos -->
    
    <?php get_template_part('templates/components/empreendimentos'); ?>

    <section class="section-line-wrapper">
    <?php
    $args = array(
        'post_type' => 'lancamentos',
        'posts_per_page' => 1, // Mostra o lançamento mais recente
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $imagem = get_field('imagem_lancamento');
            $logo = get_field('logo_lancamento');
            $titulo = get_field('titulo_do_empreendimento');
            ?>
            <div class="image-wrapper">
                <div class="launch-tag">
                    <h2>Lançamento</h2>
                </div>
                <img src="<?php echo esc_url($imagem['url']); ?>" class="image-display" />
                <div class="background-rectangle"></div>
            </div>
            <div class="caracteristicas-lancamento gap-2xl">
                <img src="<?php echo esc_url($logo['url']); ?>">
                <div class="grid-caracteristicas">
                    <?php if (have_rows('qualidades_lancamento')): ?>
                        <?php while (have_rows('qualidades_lancamento')): the_row(); 
                            $titulo_qualidade = get_sub_field('titulo_da_qualidade');
                            $descricao_qualidade = get_sub_field('descricao_da_qualidade');
                            $icone_qualidade = get_sub_field('icone');

                            // Verificar se o ícone selecionado está no mapeamento
                            $icon_classes = array(
                                'Academia' => 'bx-dumbbell',
                                'Brinquedoteca' => 'bx-paint-roll',
                                'Espaço Kids' => 'bx-child',
                                'Salão de Festas' => 'bx-party',
                                'Carregador Veicular' => 'bx-car',
                                'Gás Central' => 'bx-gas-pump',
                                'Hidrômetro Individual' => 'bx-droplet',
                                'Captação de Água da Chuva' => 'bx-cloud-rain',
                                'Hall de Entrada' => 'bx-building-house',
                                'Elevador' => 'bx-elevator',
                                'Jardim' => 'bx-leaf',
                                'Área Verde' => 'bx-tree',
                                'Bicicletário' => 'bx-bike',
                                'Playground' => 'bx-play',
                                'Quadra Poliesportiva' => 'bx-basketball',
                                'Beach Tennis' => 'bx-tennis-ball',
                                'Padel' => 'bx-tennis',
                                'Energia Solar' => 'bx-sun',
                                'Estacionamento Rotativo' => 'bx-parking',
                                'Salão Gourmet' => 'bx-restaurant',
                                'Lavanderia' => 'bx-washer',
                                'Carro' => 'bx-car',
                                'Área' => 'bx-area',
                                'Banheira' => 'bx-bath',
                                'Acessibilidade' => 'bx-accessibility',
                                'Wi-Fi' => 'bx-wifi',
                                'Energia Sustentável' => 'bx-leaf',
                                'CCTV' => 'bx-cctv',
                                'Mercado' => 'bx-cart-alt',
                                'Cama' => 'bx-bed',
                                'Vinho' => 'bx-wine',
                                'Lixeira' => 'bx-trash-alt',
                                'Tennis' => 'bx-tennis-ball',
                                'Videogame' => 'bx-joystick',
                            );

                            $icon_class = isset($icon_classes[$icone_qualidade]) ? $icon_classes[$icone_qualidade] : 'bx-placeholder';
                        ?>
                            <div class="container-caracteristica">
                                <i class="bx <?php echo esc_attr($icon_class); ?> bx-md"></i>
                                <h3><?php echo esc_html($titulo_qualidade); ?></h3>
                                <p><?php echo esc_html($descricao_qualidade); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</section>



    <section class="dark-section">
        <div class="section-column-wrapper">
            <div class="titles">
                <h1>Visite nossa sede</h1>
                <p>Descubra a melhor opção de investimento para você e negocie condições facilitadas</p>
            </div>
            <iframe onload="iframe_load();" id="preview" class="maps" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Rua%20Andr%C3%A9%20Marques%2C%20820%20-%20sala%201101%20-%20Centro%2C%20Santa%20Maria%20-%20RS%2C%2097010-041&amp;key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                <form action="" method="post" id="contatoInicio">
                    <input type="hidden" name="form_id" value="formulario_home">
                    <section>
                        <div class="input-group">
                            <label for="contato_nome" class="label">Nome</label>
                            <input type="text" id="contato_nome" name="contato_nome" class="input" placeholder="Insira seu nome aqui" required/>
                        </div>
                        <div class="input-group">
                            <label for="contato_email" class="label">E-mail</label>
                            <input type="email" id="contato_email" name="contato_email" class="input" placeholder="Insira seu e-mail aqui" required/>
                        </div>
                        <div class="input-group">
                            <label for="contato_telefone" class="label">Telefone</label>
                            <input type="tel" id="contato_telefone" name="contato_telefone" class="input" placeholder="Insira seu telefone aqui" required/>
                        </div>
                    </section>
                    <section>
                        <div class="chck-input-group">
                            <input type="checkbox" class="checkbox-input" id="contato_politica" value="1" name="contato_politica" required/>
                            <label for="contato_politica" class="checkbox-label">Eu concordo com a <a href="#">Política de Privacidade</a>.</label>
                        </div>
                        <button class="light-form-button">Registrar interesse</button>
                    </section>
                </form>
        </div>
    </section>
    
    <section class="section-column-wrapper">
        <div class="section-titles">
            <h1 class="section-title">Nos acompanhe nas redes sociais</h1>
            <h2 class="section-subtitle">Transparência e qualidade são nossos compromissos com os clientes</h2>
        </div>
        <div class="social-media-posts">
            <div class="post">1</div>
            <div class="post">2</div>
            <div class="post">3</div>
            <div class="post">4</div>
            <div class="post">5</div>
            <div class="post">6</div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const carrosselImgs = document.querySelectorAll('.carrossel-img');
        const options = document.querySelectorAll('.carrossel-option');
        const setaEsquerda = document.querySelector('.seta-btn:nth-child(1)');
        const setaDireita = document.querySelector('.seta-btn:nth-child(2)');
        let currentIndex = 0;
        let autoPlayInterval;

        function updateCarrossel(index) {
            carrosselImgs.forEach((img, i) => {
                img.style.display = i === index ? 'block' : 'none';
                options[i].classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % carrosselImgs.length;
            updateCarrossel(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + carrosselImgs.length) % carrosselImgs.length;
            updateCarrossel(currentIndex);
        }

        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 3000);
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }

        setaDireita.addEventListener('click', () => {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        });

        setaEsquerda.addEventListener('click', () => {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        });

        options.forEach((option, index) => {
            option.addEventListener('click', () => {
                stopAutoPlay();
                currentIndex = index;
                updateCarrossel(currentIndex);
                startAutoPlay();
            });
        });

        // Inicializar o carrossel na primeira imagem
        updateCarrossel(currentIndex);

        // Iniciar o autoplay
        startAutoPlay();
    });
</script>



<?php get_footer(); ?>