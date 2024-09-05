<div class="content-wrapper">
    <main class="container-wrapper flex-col gap-xl">
        <div class="flex-col gap-md text-center">
            <h1 class="text-primary-black fs-xl fw-bold">Nossos Empreendimentos</h1>
            <p class="fs-lg w-100">Qualidade e sustentabilidade em todos os detalhes</p>
        </div>
        <div class="section-menu">
            <ul class="flex gap-lg full-center">
                <li><a href="#" class="active">Todos</a></li>
                <li><a href="#">Residencial</a></li>
                <li><a href="#">Comercial</a></li>
                <li><a href="#">Terreno</a></li>
                <li><a href="#">Revenda</a></li>
                <li>
                    <form>
                        <div class="search-group">
                            <input type="search" placeholder="Busque o empreendimento" class="search-input"/>
                            <button class="search-btn"><i class="bx bx-search-alt"></i></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <section class="grid-display">
            <?php
            $args = array(
                'post_type' => 'empreendimento',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $status = get_field('fase');
                    $qualidades = get_field('infraestrutura');
                    $galeria_imagens = get_field('galeria_de_imagens');
                    $tipos = get_field('tipo_do_empreendimento');
                    ?>
                    <div class="card-empreendimento">
                        <div class="carrossel-card">
                            <div class="card-empreendimento-info">
                                <div class="card-tag" id="categoriaTag">
                                    <p><?php echo esc_html($status); ?></p>
                                </div>
                                <div id="tagsTag">
                                <?php if ($qualidades): ?>
                                <?php 
                                    $icon_classes = array(
                                        'Academia' => 'bx-dumbbell',
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

                                    $counter = 0; // Inicializa o contador
                                    foreach ($qualidades as $qualidade): 
                                        $icon_class = isset($icon_classes[$qualidade['icone']]) ? $icon_classes[$qualidade['icone']] : 'bx-placeholder';
                                        if ($counter >= 2) break; // Interrompe o loop após exibir 2 itens
                                        ?>
                                        <div class="card-tag">
                                            <i class="bx <?php echo esc_attr($icon_class); ?>"></i>
                                            <p><?php echo esc_html($qualidade['titulo_da_qualidade']); ?></p>
                                        </div>
                                        <?php 
                                        $counter++;
                                    endforeach; 
                                    ?>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-imagens">
                                <div class="card-setas">
                                    <button class="card-seta-btn esquerda">
                                        <i class='bx bxs-chevron-left-circle'></i>
                                    </button>
                                    <button class="card-seta-btn direita">
                                        <i class='bx bxs-chevron-right-circle'></i>
                                    </button>
                                </div>
                                <div class="card-circles">
                                    <?php if ($galeria_imagens): ?>
                                        <?php foreach ($galeria_imagens as $index => $imagem): ?>
                                            <button class="card-circle <?php echo $index === 0 ? 'active-circle' : ''; ?>"></button>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if ($galeria_imagens): ?>
                                    <div class="card-imagem-container h-100">
                                        <?php foreach ($galeria_imagens as $index => $imagem): ?>
                                            <img src="<?php echo esc_url($imagem['url']); ?>" class="card-imagem h-100 w-100 obj-fit-cover" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;" />
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-titles">
                            <div class="titles">
                                <h1><?php the_title(); ?></h1>
                                <h2><?php echo esc_html($tipos ? implode(', ', $tipos) : ''); ?></h2>
                            </div>
                            <a href="<?php the_permalink(); ?>"><button>Ver Mais</button></a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Nenhum empreendimento encontrado.</p>';
            endif;
            ?>
        </section>
    </main>
</div>

<!-- Adicionando o script do carrossel e filtragem -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carrosselCards = document.querySelectorAll('.carrossel-card');
        const filterMenu = document.querySelectorAll('.section-menu ul li a');
        const empreendimentoCards = document.querySelectorAll('.card-empreendimento');
        const searchInput = document.querySelector('.search-input');

        carrosselCards.forEach(card => {
            const images = card.querySelectorAll('.card-imagem');
            const circles = card.querySelectorAll('.card-circle');
            const leftArrow = card.querySelector('.card-seta-btn.esquerda');
            const rightArrow = card.querySelector('.card-seta-btn.direita');
            let currentIndex = 0;

            function updateCarrossel(index) {
                images.forEach((img, i) => {
                    img.style.display = i === index ? 'block' : 'none';
                    circles[i].classList.toggle('active-circle', i === index);
                });
            }

            rightArrow.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % images.length;
                updateCarrossel(currentIndex);
            });

            leftArrow.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateCarrossel(currentIndex);
            });

            circles.forEach((circle, index) => {
                circle.addEventListener('click', () => {
                    currentIndex = index;
                    updateCarrossel(currentIndex);
                });
            });

            // Inicializar o carrossel na primeira imagem
            updateCarrossel(currentIndex);
        });

        filterMenu.forEach(menuItem => {
        menuItem.addEventListener('click', function (e) {
            e.preventDefault();
            const filter = this.textContent.trim();

            empreendimentoCards.forEach(card => {
                const cardTypes = card.querySelector('.card-titles h2').textContent.trim().split(', ');

                if (filter === 'Todos' || cardTypes.includes(filter)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            filterMenu.forEach(item => item.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Função de busca em tempo real
    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();

        empreendimentoCards.forEach(card => {
            const title = card.querySelector('.card-titles h1').textContent.toLowerCase();

            if (title.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
    });
</script>
