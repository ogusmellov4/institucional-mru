<?php
/* 
Template Name: Single Empreendimento
Template Post Type: empreendimento
*/

get_header(); ?>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <!-- Pagina Empreendimento -->
            <div class="content-wrapper">
            <section class="banner-empreendimento-container">
    <div class="principal-banner">
        <div class="pintura-banner"></div>
        <div class="flex space-between w-100 informacoes-principal">
        <?php
            function formatarCampo($campo) {
                return is_array($campo) ? implode(', ', $campo) : $campo;
            }

            $tituloDoEmpreendimento = formatarCampo(get_field('titulo_do_empreendimento'));
            $tipoDoEmpreendimento = formatarCampo(get_field('tipo_do_empreendimento'));
            $faseAtual = formatarCampo(get_field('fase_atual'));
        ?>
        <div class="flex gap-md">
            <div class="banner-decorator"></div>
            <div class="flex-col gap-sm py-lg">
                <h1 class="fw-bold ft-uppercase fs-xl"><?php echo esc_html($tituloDoEmpreendimento); ?></h1>
                <div class="flex space-between w-100">
                    <p class="ft-uppercase"><?php echo esc_html($tipoDoEmpreendimento); ?></p>
                    <p class="ft-uppercase"><?php echo esc_html($faseAtual); ?></p>
                </div>
            </div>
        </div>
        <a href="#formEmpreendimento">
            <button>Registre seu interesse</button>
        </a>
        </div>
        <?php
        // Recuperar a galeria de imagens
        $galeria_imagens = get_field('galeria_de_imagens');
        if ($galeria_imagens):
            // Usar a primeira imagem como a imagem principal
            $imagem_principal = $galeria_imagens[0];
            ?>
            <img src="<?php echo esc_url($imagem_principal['url']); ?>" alt="<?php echo esc_attr($imagem_principal['alt']); ?>">
        <?php endif; ?>
    </div>

    <?php if ($galeria_imagens && count($galeria_imagens) >= 4): // Exibir a sidebar apenas se houver 4 ou mais imagens ?>
        <div class="banner-empreendimento-sidebar">
            <?php
            // Exibir as imagens restantes na sidebar
            $counter = 0;
            foreach ($galeria_imagens as $index => $imagem):
                if ($index === 0) {
                    continue; // Pular a primeira imagem, que já foi usada como a principal
                }
                
                // Exibir as próximas 2 imagens
                if ($counter < 3):
                    ?>
                    <img src="<?php echo esc_url($imagem['url']); ?>" alt="<?php echo esc_attr($imagem['alt']); ?>">
                    <?php
                endif;
                $counter++;
            endforeach;

            // Verificar se há mais de 3 imagens no total (a primeira já foi usada como principal)
            if (count($galeria_imagens) > 3):
                ?>
                <button>
                    <p>+<?php echo esc_html(count($galeria_imagens) - 3); ?></p>
                    <img src="<?php echo esc_url($galeria_imagens[3]['url']); ?>" alt="<?php echo esc_attr($galeria_imagens[3]['alt']); ?>">
                </button>
                <?php
            endif;
            ?>
        </div>
    <?php endif; ?>
</section>


<section class="flex gap-lg py-lg full-center w-100 menu-empreendimento full-center">
    <ul class="flex wrap px-2xl w-100 gap-2xl full-center menu-empreendimento-links">
        <li>
            <a class="link-style" href="#apresentacao">Apresentação</a>
        </li>
        <li>
            <a class="link-style" href="#galeria">Galeria</a>
        </li>
        <li>
            <a class="link-style" href="#progresso">Progresso</a>
        </li>
        <?php
        // Verificar se o repetidor "Infraestrutura" tem dados
        if (have_rows('infraestrutura')): ?>
            <li>
                <a class="link-style" href="#infraestrutura">Infraestrutura</a>
            </li>
        <?php endif; ?>
        <?php
        // Verificar se o repetidor "Planta Baixa" tem dados
        if (have_rows('planta_baixa')): ?>
            <li>
                <a class="link-style" href="#progresso">Plantas</a>
            </li>
        <?php endif; ?>
        <li>
            <a class="link-style" href="#localizacao">Localização</a>
        </li>
        <li>
            <a class="link-style" href="#contato">Contato</a>
        </li>
    </ul>
</section>



<main class="container-wrapper flex-col gap-2xl">
<section id="apresentacao" class="flex w-100 gap-xl space-between">
    <div class="w-100">
        <img class="w-100 h-100 obj-fit-cover" src="<?php echo esc_url($imagem_principal['url']); ?>" alt="<?php echo esc_attr($imagem_principal['alt']); ?>">
    </div>
    <div class="flex-col gap-md w-100">
        <div class="flex full-center gap-lg">
            <h3 class="fw-light text-secondary-gray text-nowrap fs-sm ft-uppercase"><?php echo esc_html($tipoDoEmpreendimento); ?></h3>
            <div class="min-line"></div>
        </div>
        <div class="flex full-center space-between">
            <div class="flex-col">
                <h1 class="ft-uppercase fw-semibold fs-lg text-primary-black"><?php echo esc_html($tituloDoEmpreendimento); ?></h1>
                <div class="flex space-between w-100">
                    <?php if ($faseAtual): ?>
                        <p class="fs-sm ft-uppercase"><?php echo esc_html($faseAtual); ?></p>
                    <?php endif; ?>
                    <p class="fs-sm ft-uppercase"><?php echo esc_html($tipoDoEmpreendimento); ?></p>
                </div>
            </div>
            <a href="#formEmpreendimento">
                <button class="empreendimento-btn">Solicitar Orçamento</button>
            </a>
        </div>

        <?php
            // Recuperar o conteúdo do campo WYSIWYG
            $apresentacao_do_empreendimento = get_field('apresentacao_do_empreendimento');

            // Verificar se o campo não está vazio
            if ($apresentacao_do_empreendimento):
                // Exibir o conteúdo com toda a formatação do WYSIWYG
                echo $apresentacao_do_empreendimento;
            else:
                // Mensagem opcional caso o campo esteja vazio
                echo '<p>Descrição do projeto não disponível.</p>';
            endif;
        ?>

        <div class="flex full-center gap-lg">
            <h3 class="fw-light text-secondary-gray text-nowrap fs-sm ft-uppercase">Informações Gerais</h3>
            <div class="min-line"></div>
        </div>

        <div class="flex wrap gap-xl full-center">
            <?php
            // Recuperar o grupo de campos "Informações Gerais"
            $informacoes_gerais = get_field('informacoes_gerais');

            // Verificar se existe o grupo de campos
            if ($informacoes_gerais):
                // Recuperar as informações
                $min_dormitorios = $informacoes_gerais['min_dormitorios'];
                $max_dormitorios = $informacoes_gerais['max_dormitorios'];
                $min_garagens = $informacoes_gerais['min_garagem'];
                $max_garagens = $informacoes_gerais['max_garagem'];
                $metragem_minima = $informacoes_gerais['metragem_minima'];
                $metragem_maxima = $informacoes_gerais['metragem_maxima'];
                $registro_incorporacao = $informacoes_gerais['registro_de_incorporacao'];
                $previsao_entrega = $informacoes_gerais['previsao_de_entrega'];
                $unidades_disponiveis = $informacoes_gerais['unidades_disponiveis'];

                // Dormitórios (apenas para Residencial)
                if ($tipo_do_empreendimento == 'Residencial'):
                    ?>
                    <div class="flex-col gap-xs">
                        <h2 class="ft-uppercase fs-sm">
                            <?php echo ($min_dormitorios == 1) ? 'Dormitório' : 'Dormitórios'; ?>
                        </h2>
                        <p class="fs-sm">
                            <?php 
                                if ($min_dormitorios) {
                                    echo esc_html(
                                        $min_dormitorios . 
                                        ($min_dormitorios > 1 ? ' a ' . $max_dormitorios : '') . 
                                        ' ' . 
                                        ($min_dormitorios == 1 ? '' : 'Dormitórios')
                                    );
                                }
                                 else {
                                    echo 'Indisponível';
                                }
                            ?>
                        </p>
                    </div>
                    <?php
                endif;

                // Garagem
                ?>
                <div class="flex-col gap-xs">
                    <h2 class="ft-uppercase fs-sm">
                        <?php echo ($min_garagens == 1) ? 'Garagem' : 'Garagens'; ?>
                    </h2>
                    <p class="fs-sm">
                        <?php 
                            if ($min_garagens) {
                                echo esc_html(
                                    $min_garagens . 
                                    ($min_garagens > 1 ? ' a ' . $max_garagens : '') . 
                                    ' ' . 
                                    ($min_garagens == 1 ? '' : 'Garagens')
                                );
                            }
                            else {
                                echo 'Indisponível';
                            }
                        ?>
                    </p>
                </div>

                <!-- Metragem (usar mínima e máxima) -->
                <div class="flex-col gap-xs">
                    <h2 class="ft-uppercase fs-sm">Metragem</h2>
                    <p class="fs-sm">
                        <?php echo esc_html(($metragem_minima && $metragem_maxima) ? $metragem_minima . ' até ' . $metragem_maxima . ' m²' : 'Indisponível'); ?>
                    </p>
                </div>

                <!-- Registro de Incorporação -->
                <div class="flex-col gap-xs">
                    <h2 class="ft-uppercase fs-sm">Registro de Incorporação</h2>
                    <p class="fs-sm">
                        <?php echo esc_html($registro_incorporacao ? $registro_incorporacao : 'Indisponível'); ?>
                    </p>
                </div>

                <!-- Previsão de Entrega -->
                <div class="flex-col gap-xs">
                    <h2 class="ft-uppercase fs-sm">Previsão de Entrega</h2>
                    <p class="fs-sm">
                        <?php echo esc_html($previsao_entrega ? date('m/Y', strtotime($previsao_entrega)) : 'Indisponível'); ?>
                    </p>
                </div>

                <!-- Unidades Disponíveis -->
                <div class="flex-col gap-xs">
                    <h2 class="ft-uppercase fs-sm">Unidades Disponíveis</h2>
                    <p class="fs-sm">
                        <?php echo esc_html($unidades_disponiveis ? $unidades_disponiveis : 'Indisponível'); ?>
                    </p>
                </div>

                <?php
            else:
                // Caso o grupo de campos seja nulo ou não exista
                ?>
                <p>Nenhuma informação disponível.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

            <section id="galeria" class="flex-col gap-xl w-100">
                <div class="flex full-center gap-lg">
                    <h3 class="fw-light text-secondary-gray text-nowrap fs-sm ft-uppercase"> <?php echo esc_html($tituloDoEmpreendimento); ?> / GALERIA</h3>
                    <div class="min-line"></div>
                </div>
                
                <?php
                $galeria = get_field('galeria_de_imagens');
                if ($galeria):
                    if (count($galeria) < 8): // Se houver menos de 8 imagens
                        ?>
                        <div class="flex-col full-center gap-lg">
                            <h2 class="ft-uppercase fs-xl fw-light text-center">CONHEÇA O CONCEITO E ÁREAS COMUNS DO SEU FUTURO LAR</h2>
                            <div class="flex full-center gap-sm">
                                <?php for ($i = 0; $i < 4; $i++): ?>
                                    <?php if (isset($galeria[$i])): ?>
                                        <img src="<?php echo esc_url($galeria[$i]['url']); ?>" alt="<?php echo esc_attr($galeria[$i]['alt']); ?>" class="w-100 obj-fit-cover"/>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <?php
                    else: // Se houver 8 ou mais imagens, manter a estrutura atual
                        ?>
                        <div class="grid cols-12 gap-sm">
                            <div class="col-set-1">
                                <?php if (isset($galeria[0])): ?>
                                    <img src="<?php echo esc_url($galeria[0]['url']); ?>" alt="<?php echo esc_attr($galeria[0]['alt']); ?>" class="w-100 h-100 obj-fit-cover"/>
                                <?php endif; ?>
                                <?php if (isset($galeria[1])): ?>
                                    <img src="<?php echo esc_url($galeria[1]['url']); ?>" alt="<?php echo esc_attr($galeria[1]['alt']); ?>" class="w-100 h-100 obj-fit-cover"/>
                                <?php endif; ?>
                            </div>
                            <div class="col-set-2">
                                <div class="flex full-center">
                                    <h2 class="ft-uppercase fs-xl fw-light text-center">CONHEÇA O CONCEITO E ÁREAS COMUNS DO SEU FUTURO LAR</h2>
                                </div>
                                <?php if (isset($galeria[2])): ?>
                                    <img src="<?php echo esc_url($galeria[2]['url']); ?>" alt="<?php echo esc_attr($galeria[2]['alt']); ?>" class="w-100 h-100 obj-fit-cover"/>
                                <?php endif; ?>
                                <?php if (isset($galeria[3])): ?>
                                    <img src="<?php echo esc_url($galeria[3]['url']); ?>" alt="<?php echo esc_attr($galeria[3]['alt']); ?>" class="w-100 h-100 obj-fit-cover"/>
                                <?php endif; ?>
                            </div>
                            <div class="col-set-3">
                                <?php if (isset($galeria[4])): ?>
                                    <img src="<?php echo esc_url($galeria[4]['url']); ?>" alt="<?php echo esc_attr($galeria[4]['alt']); ?>" class="w-100 obj-fit-cover"/>
                                <?php endif; ?>
                                <?php if (isset($galeria[5])): ?>
                                    <img src="<?php echo esc_url($galeria[5]['url']); ?>" alt="<?php echo esc_attr($galeria[5]['alt']); ?>" class="w-100 obj-fit-cover"/>
                                <?php endif; ?>
                                <?php if (isset($galeria[6])): ?>
                                    <img src="<?php echo esc_url($galeria[6]['url']); ?>" alt="<?php echo esc_attr($galeria[6]['alt']); ?>" class="w-100 obj-fit-cover"/>
                                <?php endif; ?>
                                <?php if (isset($galeria[7])): ?>
                                    <img src="<?php echo esc_url($galeria[7]['url']); ?>" alt="<?php echo esc_attr($galeria[7]['alt']); ?>" class="w-100 obj-fit-cover"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endif;
                endif;
                ?>
            </section>


            <section id="progresso" class="flex-col w-100 gap-xl space-between">
    <div class="flex full-center gap-lg">
        <div class="min-line"></div>
        <?php
        // Verificar se o repetidor "Planta Baixa" tem dados
        $has_plantas_baixas = have_rows('planta_baixa');
        ?>
        <h3 id="progresso-planta" class="fw-light text-secondary-gray text-nowrap fs-sm">
             <?php echo esc_html($tituloDoEmpreendimento); ?> / PROGRESSO<?php echo $has_plantas_baixas ? ' & PLANTA BAIXA' : ''; ?>
        </h3>
    </div>
    
    <main id="conteudoProgresso" class="flex space-between gap-xl w-100">
        <section class="w-100 space-between flex-col gap-xl">
            <?php
            // Recuperar o grupo de campos "Progresso"
            $progresso = get_field('progresso');
            
            // Verificar se o grupo de campos não é nulo
            if ($progresso):
                // Iterar sobre cada item no grupo e gerar o HTML dinâmico
                foreach ($progresso as $nome_campo => $valor):
                    // Converter o valor para inteiro, caso esteja como string
                    $valor = (int) $valor;
                    $progresso_width = $valor . '%';
                    $base_width = (100 - $valor) . '%';
                    ?>
                    <div class="flex w-100 gap-md space-between pe-xl">
                        <h2 class="fw-light ft-uppercase"><?php echo esc_html(ucfirst($nome_campo)); ?></h2>
                        <div class="medidor-container">
                            <div class="medidor-progresso" style="width: <?php echo esc_attr($progresso_width); ?>"></div>
                            <div class="medidor-base" style="width: <?php echo esc_attr($base_width); ?>"></div>
                        </div>
                        <p class="fw-semibold ft-italic"><?php echo esc_html($valor); ?>%</p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum dado de progresso encontrado.</p>
            <?php endif; ?>
        </section>
        
        <?php if ($has_plantas_baixas): // Verificar se há plantas baixas ?>
            <section class="w-100 flex-col gap-lg">
                <div class="flex full-center space-between">
                    <div class="flex-col">
                        <h1 class="ft-uppercase fw-semibold fs-lg text-primary-black">Plantas Baixas</h1>
                        <div class="flex gap-md w-100">
                            <p class="fs-sm"><?php echo esc_html($metragem_minima); ?>m²</p>
                            <p class="fs-sm">até</p>
                            <p class="fs-sm"><?php echo esc_html($metragem_maxima); ?>m²</p>
                        </div>
                    </div>
                    <button class="empreendimento-btn">Ver Lista Completa</button>
                </div>
                <div class="flex-col gap-lg w-100">
                    <?php
                    $counter = 0; // Inicializar contador
                    while (have_rows('planta_baixa')): the_row();
                        // Limitar a exibição aos primeiros 3 itens
                        if ($counter >= 3) {
                            break;
                        }

                        // Recuperar os campos de cada planta baixa
                        $tipo_imovel = get_sub_field('tipo_de_imovel');
                        $numero_imovel = get_sub_field('numero_do_imovel');
                        $area_privativa = get_sub_field('area_privativa');
                        $disponivel = get_sub_field('disponivel') ? 'Disponível' : 'Indisponível';
                        $imagem = get_sub_field('planta_baixa_imagem');

                        // Incrementar o contador
                        $counter++;
                        ?>
                        <div class="planta-item wrap flex gap-md p-md w-100">
                            <button class="planta-baixa-btn">
                                <i class="bx bx-show"></i>
                                <img src="<?php echo esc_url($imagem['url']); ?>" alt="Planta Baixa <?php echo esc_attr($tipo_imovel . ' ' . $numero_imovel); ?>" />
                            </button>
                            <div class="flex-col space-around gap-sm w-100">
                                <div class="flex gap-lg space-between w-100">
                                    <h3 class="fw-semibold"><?php echo esc_html($tipo_imovel); ?></h3>
                                    <h4 class="fw-semibold">Apartamento <?php echo esc_html($numero_imovel); ?></h4>
                                    <h5 class="ft-uppercase fw-light"><?php echo esc_html($disponivel); ?></h5>
                                </div>
                                <p>Área privativa: <?php echo esc_html($area_privativa); ?>m²</p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>
</section>


<?php
// Verificar se o repetidor "Infraestrutura" tem dados antes de renderizar a seção
if (have_rows('infraestrutura')): ?>
    <section id="infraestrutura" class="flex-col w-100 gap-xl space-between">
        <div class="flex full-center gap-lg">
            <h3 class="fw-light text-secondary-gray text-nowrap fs-sm ft-uppercase"> <?php echo esc_html($tituloDoEmpreendimento); ?> / INFRAESTRUTURA</h3>
            <div class="min-line"></div>
        </div>
        <div class="flex wrap gap-xl full-center">
            <?php
            // Mapeamento dos ícones
            $icon_classes = array(
                'Academia' => 'bx-dumbbell',
                'Brinquedoteca' => 'bxs-cube',
                'Espaço Kids' => 'bx-dice-3',
                'Salão de Festas' => 'bx-party',
                'Carregador Veicular' => 'bxs-plug',
                'Gás Central' => 'bx-gas-pump',
                'Hidrômetro Individual' => 'bx-droplet',
                'Captação de Água da Chuva' => 'bx-cloud-rain',
                'Hall de Entrada' => 'bx-buildings',
                'Elevador' => 'bx-caret-up-square',
                'Jardim' => 'bxs-leaf',
                'Área Verde' => 'bxs-leaf',
                'Bicicletário' => 'bx-lock-alt',
                'Playground' => 'bx-game',
                'Quadra Poliesportiva' => 'bx-basketball',
                'Beach Tennis' => 'bx-tennis-ball',
                'Padel' => 'bx-tennis-ball',
                'Energia Solar' => 'bx-sun',
                'Estacionamento Rotativo' => 'bx-car',
                'Salão Gourmet' => 'bx-restaurant',
                'Lavanderia' => 'bxs-washer',
                'Carro' => 'bx-car',
                'Área' => 'bx-area',
                'Banheira' => 'bx-bath',
                'Acessibilidade' => 'bx-accessibility',
                'Wi-Fi' => 'bx-wifi',
                'Energia Sustentável' => 'bxs-leaf',
                'CCTV' => 'bx-cctv',
                'Mercado' => 'bx-cart-alt',
                'Cama' => 'bx-bed',
                'Vinho' => 'bx-wine',
                'Lixeira' => 'bx-trash',
                'Tennis' => 'bx-tennis-ball',
                'Videogame' => 'bxs-joystick',
            );

            // Recuperar os dados do campo repetidor "Infraestrutura"
            while (have_rows('infraestrutura')): the_row();
                $titulo = get_sub_field('titulo_da_qualidade');
                $descricao = get_sub_field('descricao_da_qualidade');
                $icone = get_sub_field('icone');

                // Verificar se o ícone selecionado está no mapeamento
                $icon_class = isset($icon_classes[$icone]) ? $icon_classes[$icone] : 'bx-placeholder';
                ?>
                <div class="flex-col gap-sm full-center qualidade text-center">
                    <i class="bx <?php echo esc_attr($icon_class); ?> bx-md"></i>
                    <h2 class="ft-uppercase fw-bold"><?php echo esc_html($titulo); ?></h2>
                    <p class="text-center"><?php echo esc_html($descricao); ?></p>
                </div>
                <?php
            endwhile;
            ?>
        </div>
    </section>
<?php endif; ?>

            <section id="localizacao" class="flex-col w-100 gap-xl space-between">
                <div class="flex full-center gap-lg">
                    <div class="min-line"></div>
                    <h3 class="fw-light text-secondary-gray text-nowrap fs-sm ft-uppercase"> <?php echo esc_html($tituloDoEmpreendimento); ?> / LOCALIZAÇÃO</h3>
                    <div class="min-line"></div>
                </div>
                <div id="infoLocalizacao" class="flex wrap gap-2xl full-center">
                    <?php
                    // Recuperar o grupo de campos "Localização"
                    $localizacao = get_field('localizacao');

                    // Verificar se o grupo de campos não é nulo
                    if ($localizacao):
                        // Recuperar os campos individuais do grupo
                        $estado = $localizacao['estado'];
                        $cidade = $localizacao['cidade'];
                        $bairro = $localizacao['bairro'];
                        $rua = $localizacao['rua'];
                        $numero = $localizacao['numero'];
                        $cep = $localizacao['cep'];

                        // Criar uma string de endereço completa
                        $endereco_completo = '';

                        if ($rua) {
                            $endereco_completo .= $rua;
                        }
                        if ($numero) {
                            $endereco_completo .= ', ' . $numero;
                        }
                        if ($bairro) {
                            $endereco_completo .= ' - ' . $bairro;
                        }
                        if ($cidade) {
                            $endereco_completo .= ', ' . $cidade;
                        }
                        if ($estado) {
                            $endereco_completo .= ', ' . $estado;
                        }
                        if ($cep) {
                            // Formatar o CEP para adicionar um hífen antes dos últimos 3 dígitos
                            if (strlen($cep) === 8) {
                                $cep_formatado = substr($cep, 0, 5) . '-' . substr($cep, 5);
                                $endereco_completo .= ', ' . $cep_formatado;
                            } else {
                                $endereco_completo .= ', ' . $cep;
                            }
                        }

                        

                        // Exibir os detalhes do endereço
                        if ($estado):
                            ?>
                            <div class="flex-col gap-xs">
                                <h2 class="ft-uppercase fs-sm">Estado</h2>
                                <p class="fs-sm"><?php echo esc_html($estado); ?></p>
                            </div>
                            <?php
                        endif;
                        if ($cidade):
                            ?>
                            <div class="flex-col gap-xs">
                                <h2 class="ft-uppercase fs-sm">Cidade</h2>
                                <p class="fs-sm"><?php echo esc_html($cidade); ?></p>
                            </div>
                            <?php
                        endif;
                        if ($bairro):
                            ?>
                            <div class="flex-col gap-xs">
                                <h2 class="ft-uppercase fs-sm">Bairro</h2>
                                <p class="fs-sm"><?php echo esc_html($bairro); ?></p>
                            </div>
                            <?php
                        endif;
                        if ($rua):
                            ?>
                            <div class="flex-col gap-xs">
                                <h2 class="ft-uppercase fs-sm">Rua</h2>
                                <p class="fs-sm"><?php echo esc_html($rua); ?></p>
                            </div>
                            <?php
                        endif;
                        if ($numero):
                            ?>
                            <div class="flex-col gap-xs">
                                <h2 class="ft-uppercase fs-sm">Nº</h2>
                                <p class="fs-sm"><?php echo esc_html($numero); ?></p>
                            </div>
                            <?php
                        endif;
                        if ($cep):
                            ?>
                            <div class="flex-col gap-xs">
                                <h2 class="ft-uppercase fs-sm">CEP</h2>
                                <p class="fs-sm"><?php echo esc_html($cep_formatado); ?></p>
                            </div>
                            <?php
                        endif;
                    endif;

                    // Verificar se o endereço completo não está vazio antes de gerar o iframe
                    if (!empty($endereco_completo)):
                        // Codificar o endereço para a URL
                        $endereco_url = urlencode($endereco_completo);
                        ?>
                        <iframe onload="iframe_load();" id="preview" class="maps-contato" frameborder="0"
                                src="https://www.google.com/maps/embed/v1/place?q=<?php echo esc_attr($endereco_url); ?>&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
                        </iframe>
                        <?php
                    endif;
                    ?>
                </div>
            </section>
            <section id="contato" class="flex-col w-100 gap-xl space-between">
                <div class="flex w-100 full-center gap-lg">
                    <h3 id="contato-titulo" class="fw-light text-secondary-gray text-nowrap fs-sm"> <?php echo esc_html($tituloDoEmpreendimento); ?> / CONTATO</h3>
                    <div class="min-line"></div>
                </div>
                <div id="contatoInfo" class="flex w-100 gap-2xl">
                    <div class="flex-col gap-xl">
                        <div class="flex-col gap-sm">
                            <h1 class="fw-semibold ft-uppercase fs-lg text-nowrap">Gostou do Empreendimento?</h1>
                            <p>Descubra a melhor opção de investimento para você e negocie condições facilitadas</p>
                        </div>
                        <form action="" method="post" class="flex-col gap-lg" id="formEmpreendimento">
                            <input type="hidden" name="form_id" value="formulario_empreendimento">
                            <input type="hidden" name="nome_empreendimento" value="<?php echo esc_attr( get_field('titulo_do_empreendimento') ); ?>">
                            <div class="input-group">
                                <label for="interesse_nome" class="fw-medium">Nome</label>
                                <input type="text" class="basic-input" id="interesse_nome" name="interesse_nome" placeholder="Nome" required>
                            </div>
                            <div class="input-group">
                                <label for="interesse_email" class="fw-medium">E-mail</label>
                                <input type="email" class="basic-input" id="interesse_email" name="interesse_email" placeholder="E-mail" required>
                            </div>
                            <div class="input-group">
                                <label for="interesse_telefone" class="fw-medium">Telefone (com DDD)</label>
                                <input type="tel" class="basic-input" id="interesse_telefone" name="interesse_telefone" placeholder="Telefone (com DDD)" required>
                            </div>
                            <div class="input-group">
                                <label for="interesse_desejo" class="fw-medium">Quanto pretende investir?</label>
                                <select class="basic-input" id="interesse_desejo" name="interesse_desejo" required>
                                    <?php
                                        $custoEmpreendimento = get_field('custo_do_empreendimento');
                                        if ($custoEmpreendimento == 'Baixo'):
                                            ?>
                                                <option value="ate_200_mil">Até R$200.000</option>
                                                <option value="entre_200_e_400_mil">Entre R$200.000 e R$400.000</option>
                                                <option value="entre_400_e_600_mil">Entre R$400.000 e R$600.000</option>
                                                <option value="acima_600_mil">Acima de R$600.000</option>
                                            <?php
                                        endif;
                                        if ($custoEmpreendimento == 'Medio'):
                                            ?>
                                                <option value="ate_500_mil">Até R$500.000</option>
                                                <option value="entre_500_mil_e_1_milhao">Entre R$500.000 e R$1.000.000</option>
                                                <option value="acima_1_milhao">Acima de R$1.000.000</option>
                                            <?php
                                        endif;
                                        if ($custoEmpreendimento == 'Alto'):
                                            ?>
                                                <option value="ate_1_milhao">Até R$1.000.000</option>
                                                <option value="entre_1_e_3_milhoes">Entre R$1.000.000 e R$3.000.000</option>
                                                <option value="acima_3_milhao">Acima de R$3.000.000</option>
                                            <?php
                                        endif;
                                    ?>
                                </select>
                            </div>
                            <div class="flex gap-sm">
                                <input type="checkbox" class="interesse_politicas" id="interesse_politicas" name="interesse_politicas" value="1" required>
                            <label for="contato_politica" class="checkbox-label">Eu concordo com a <a href="<?php echo get_permalink(get_page_by_path('politica-de-privacidade')); ?>">Política de Privacidade</a>                            .</label>
                            </div>
                            <button type="submit" class="basic-form-btn">Enviar</button>
                        </form>
                    </div>
                    <div class="w-100">
                        <img class="w-100 h-100 obj-fit-cover" src="<?php echo esc_url($galeria[1]['url']); ?>" alt="<?php echo esc_attr($galeria[1]['alt']); ?>" style="max-height: 550px;">
                    </div>
                </div>
            </section>
        </main>
    </div>

            <?php
        endwhile;
    else :
        echo '<p>Nenhum conteúdo encontrado.</p>';
    endif;
    ?>

<?php get_footer(); ?>