<?php
function mru_theme_enqueue_styles() {
    // Reset CSS
    wp_enqueue_style('mru-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), '1.0', 'all');

    // Estilos principais
    wp_enqueue_style('mru-main-style', get_template_directory_uri() . '/assets/css/styles.css', array('mru-reset'), '1.0', 'all');

    // Scripts JS
    wp_enqueue_script('mru-custom-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mru_theme_enqueue_styles');

function mru_theme_setup() {
    // Suporte a título dinâmico
    add_theme_support('title-tag');

    // Registro de menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mru-theme'),
    ));
}
add_action('after_setup_theme', 'mru_theme_setup');

function mru_register_post_types() {
    $labels = array(
        'name'               => _x('Empreendimentos', 'post type general name', 'mru-theme'),
        'singular_name'      => _x('Empreendimento', 'post type singular name', 'mru-theme'),
        'menu_name'          => _x('Empreendimentos', 'admin menu', 'mru-theme'),
        'name_admin_bar'     => _x('Empreendimento', 'add new on admin bar', 'mru-theme'),
        'add_new'            => _x('Adicionar Novo', 'empreendimento', 'mru-theme'),
        'add_new_item'       => __('Adicionar Novo Empreendimento', 'mru-theme'),
        'new_item'           => __('Novo Empreendimento', 'mru-theme'),
        'edit_item'          => __('Editar Empreendimento', 'mru-theme'),
        'view_item'          => __('Ver Empreendimento', 'mru-theme'),
        'all_items'          => __('Todos Empreendimentos', 'mru-theme'),
        'search_items'       => __('Buscar Empreendimentos', 'mru-theme'),
        'parent_item_colon'  => __('Empreendimentos Pai:', 'mru-theme'),
        'not_found'          => __('Nenhum empreendimento encontrado.', 'mru-theme'),
        'not_found_in_trash' => __('Nenhum empreendimento encontrado na lixeira.', 'mru-theme')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'empreendimento'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('empreendimento', $args);
}
add_action('init', 'mru_register_post_types');

function processar_formulario_interesse() {
    // Verifique se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_interesse_nonce'])) {

        // Verifique o nonce para segurança
        if (!wp_verify_nonce($_POST['enviar_interesse_nonce'], 'enviar_interesse_action')) {
            die('Falha na verificação de segurança.');
        }

        // Sanitizar e validar os campos
        $nome = sanitize_text_field($_POST['interesse_nome']);
        $email = sanitize_email($_POST['interesse_email']);
        $telefone = sanitize_text_field($_POST['interesse_telefone']);
        $desejo = sanitize_text_field($_POST['interesse_desejo']);
        $politicas = isset($_POST['interesse_politicas']) ? 'Aceito' : 'Não aceito';

        // Verifique se os campos obrigatórios foram preenchidos
        if (empty($nome) || empty($email) || empty($telefone) || empty($desejo)) {
            echo '<p>Por favor, preencha todos os campos obrigatórios.</p>';
            return;
        }

        // Envie um e-mail (exemplo)
        $para = 'seu-email@example.com'; // Substitua pelo seu endereço de e-mail
        $assunto = 'Novo interesse no empreendimento';
        $mensagem = "Nome: $nome\nEmail: $email\nTelefone: $telefone\nInvestimento: $desejo\nPolítica: $politicas";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        wp_mail($para, $assunto, $mensagem, $headers);

        // Exibir uma mensagem de sucesso
        echo '<p>Obrigado pelo seu interesse! Entraremos em contato em breve.</p>';
    }
}
add_action('wp_head', 'processar_formulario_interesse');

function remove_campos_padrao_empreendimentos() {
    // Remover o Editor (o campo de conteúdo principal)
    remove_post_type_support('empreendimento', 'editor');

    // Remover o Resumo
    remove_post_type_support('empreendimento', 'excerpt');

    // Remover a Imagem Destacada
    remove_post_type_support('empreendimento', 'thumbnail');

    // Remover os Comentários
    remove_post_type_support('empreendimento', 'comments');

    // Remover os Trackbacks
    remove_post_type_support('empreendimento', 'trackbacks');

    // Remover as Revisões
    remove_post_type_support('empreendimento', 'revisions');

    // Remover os Autores
    remove_post_type_support('empreendimento', 'author');

    // Remover o Campo de Slug
    remove_post_type_support('empreendimento', 'slug');
}
add_action('init', 'remove_campos_padrao_empreendimentos');

function mru_create_banner_post_type() {
    register_post_type('banner_imagens',
        array(
            'labels' => array(
                'name' => __('Imagens do Banner'),
                'singular_name' => __('Imagem do Banner'),
                'add_new' => __('Adicionar Nova Imagem'),
                'add_new_item' => __('Adicionar Nova Imagem do Banner'),
                'edit_item' => __('Editar Imagem do Banner'),
                'new_item' => __('Nova Imagem do Banner'),
                'view_item' => __('Ver Imagem do Banner'),
                'search_items' => __('Buscar Imagens do Banner'),
                'not_found' => __('Nenhuma Imagem do Banner encontrada'),
                'not_found_in_trash' => __('Nenhuma Imagem do Banner encontrada no lixo'),
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-format-image',
            'supports' => array('title', 'thumbnail'),
            'rewrite' => array('slug' => 'banner-imagens'),
        )
    );
}
add_action('init', 'mru_create_banner_post_type');

function mru_create_lancamentos_post_type() {
    register_post_type('lancamentos',
        array(
            'labels' => array(
                'name' => __('Lançamentos'),
                'singular_name' => __('Lançamento'),
                'add_new' => __('Adicionar Novo Lançamento'),
                'add_new_item' => __('Adicionar Novo Lançamento'),
                'edit_item' => __('Editar Lançamento'),
                'new_item' => __('Novo Lançamento'),
                'view_item' => __('Ver Lançamento'),
                'search_items' => __('Buscar Lançamentos'),
                'not_found' => __('Nenhum Lançamento encontrado'),
                'not_found_in_trash' => __('Nenhum Lançamento encontrado no lixo'),
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-megaphone',
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'lancamentos'),
        )
    );
}
add_action('init', 'mru_create_lancamentos_post_type');
?>
