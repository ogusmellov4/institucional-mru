<?php
/* Template Name: Contato */

get_header(); ?>

<div class="content-wrapper">
        <main class="container-wrapper flex-col gap-xl">
            <section class="page-titles">
                <h1 class="fw-semibold fs-xl">
                    Entre em contato com a MRU Construções
                </h1>
                <p class="fs-lg">
                    Assim podemos encontrar o empreendimento ideal para você
                </p>
            </section>
            <section class="grid gap-xl cols-2">
                <div class="flex-col gap-md">
                    <div class="flex gap-md">
                        <div class="title-decorator"></div>
                        <h3 class="fw-semibold fs-lg">Equipe de Vendas</h3>
                    </div>
                    <div class="flex gap-md">
                        <div class="wpp-box">
                            <i class="bx bxl-whatsapp-square bx-lg"></i>
                            <p class="ft-uppercase fw-bold" style="max-width: 100px;">Plantão de Vendas</p>
                        </div>
                        <div class="flex-col gap-sm">
                            <h4 class="fw-semibold fs-lg">Plantão de Vendas</h4>
                            <p class="part-subtitle">CRECI 72110</p>
                            <button class="part-outlined-button">
                                <i class="bx bxl-whatsapp"></i>
                                <span>(55) 99675-1159</span>
                            </button>
                            <button class="part-outlined-button">
                                <i class="bx bxs-phone-call"></i>
                                <span>(55) 3208-5692</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex full-center gap-sm">
                        <h3 class="fw-light text-secondary-gray text-nowrap fs-sm">LOCALIZAÇÃO / MRU CONSTRUÇÕES</h3>
                        <div class="min-line"></div>
                    </div>
                    <iframe onload="iframe_load();" id="preview" class="maps-contato" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Rua%20Andr%C3%A9%20Marques%2C%20820%20-%20sala%201101%20-%20Centro%2C%20Santa%20Maria%20-%20RS%2C%2097010-041&amp;key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                </div>
                <div class="flex-col gap-md">
                    <div class="flex gap-md">
                        <div class="title-decorator"></div>
                        <h3 class="fw-semibold fs-lg">Registre seu interesse</h3>
                    </div>
                    <form action="" method="post" class="flex-col gap-lg">
                        <div class="input-group">
                            <label for="interesse_nome" class="fw-medium">Nome</label>
                            <input type="text" class="basic-input" id="interesse_nome" name="interesse_nome" placeholder="Nome">
                        </div>
                        <div class="input-group">
                            <label for="interesse_email" class="fw-medium">E-mail</label>
                            <input type="email" class="basic-input" id="interesse_email" name="interesse_email" placeholder="E-mail">
                        </div>
                        <div class="input-group">
                            <label for="interesse_telefone" class="fw-medium">Telefone (com DDD)</label>
                            <input type="text" class="basic-input" id="interesse_telefone" name="interesse_telefone" placeholder="Telefone (com DDD)">
                        </div>
                        <div class="input-group">
                            <label for="interesse_desejo" class="fw-medium">O que você deseja?</label>
                            <select class="basic-input" id="interesse_desejo" name="interesse_desejo">
                                <option value="interesse_residencial" id="" name="">Comprar um imóvel residencial</option>
                                <option value="" id="" name=""></option>
                                <option value="" id="" name=""></option>
                                <option value="" id="" name=""></option>
                                <option value="" id="" name=""></option>
                            </select>
                        </div>
                        <div class="flex gap-sm">
                            <input type="checkbox" class="interesse_politicas" id="" name=""interesse_politicas>
                            <label for="interesse_politicas" class="fs-sm">Eu concordo com a <a href="#" class="fs-sm">Política de Privacidade.</a></label>
                        </div>
                        <button type="submit" class="basic-form-btn">Enviar</button>
                    </form> 
                </div>
            </section>
            <section class="flex-col gap-xl">
                <div class="flex full-center gap-sm">
                    <h3 class="fw-light fs-sm text-secondary-gray text-nowrap">INFORMAÇÕES GERAIS / CONTATO</h3>
                    <div class="min-line"></div>
                </div>
                <div class="flex informacoes-gerais gap-md space-between px-xl text-primary-black">
                    <div class="flex-col gap-sm left-centered ">
                        <i class="bx bxs-phone-call bx-lg text-primary-black"></i>
                        <p class="fw-semibold">Telefone</p>
                        <p class="sub-part-text">(55) 3028-5692</p>
                    </div>
                    <div class="flex-col gap-sm left-centered">
                        <i class="bx bxl-whatsapp bx-lg text-primary-black"></i>
                        <p class="fw-semibold">Vendas</p>
                        <p class="sub-part-text">(55) 99675-1159</p>
                        <p class="sub-part-text">(55) 3095-0020</p>
                    </div>
                    <div class="flex-col gap-sm left-centered">
                        <i class="bx bx-at bx-lg text-primary-black"></i>
                        <p class="fw-semibold">E-mail</p>
                        <p class="sub-part-text">contato@mruconstrucoes.com.br</p>
                    </div>
                    <div class="flex-col gap-sm left-centered">
                        <i class="bx bx-map-alt bx-lg text-primary-black"></i>
                        <p class="fw-semibold">Endereço</p>
                        <p class="sub-part-text">Rua André Marques, 820 Centro - Santa Maria/RS CEP 97010-041</p>
                    </div>
                </div>
            </section>
        </main>
    </div>

<?php get_footer(); ?>