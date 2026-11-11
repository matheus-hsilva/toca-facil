<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TocaFácil</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/ver_professores.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header class="cabecalho"> 
        <nav class="cabecalho-info">
            <nav class="cabecalho-logo">
                <img src="../assets/images/logo toca-facil.png" alt="Logo do TocaFácil">
                <h1>Toca<span>Fácil</span></h1>
            </nav>
            <ul class="cabecalho-menu">
                <li><a href="Principal.php">Início</a></li>
                <li><a href="Ver_cursos.php">Cursos</a></li>
                <li id="ativo"><a href="Ver_professores.php">Professores</a></li>
                <li><a href="Ver_alunos.php">Alunos</a></li>
            </ul>
        </nav>
        <nav class="cabecalho-sair">
            <a href="../index.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
        </nav>
    </header>

    <main class="principal">
        <section class="principal-hero">
            <img src="../assets/images/login.png" alt="Foto do Hero">
            <div class="hero-conteudo">
                <h1>Nossos <span>Professores</span></h1>
                <p>Conheça nossos professores e especialistas em música, prontos para te ensinar!</p>
            </div>
        </section>

         <section class="principal-professores">
            <div class="professores-cadastrar">
                <button id="abrir-modal" onclick="abrirModal()">Cadastrar Professor <i class="fa-solid fa-plus"></i></button>
            </div>


            <div id="cadastrar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <div class="btn-fechar">
                        <button class="fechar-modal" onclick="fecharModal()"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <h1>Cadastrar <span>Professor</span></h1>
                    <input type="text" id="nome" placeholder="Seu nome">
                    <input type="email" id="email" placeholder="Seu e-mail">
                    <input type="password" id="senha" placeholder="Sua senha">
                    <select id="especialidade" name="especialidade">
                    <option value="" disabled selected>Selecione a especialidade</option>
                        <option value="violao">Violão</option>
                        <option value="guitarra">Guitarra</option>
                        <option value="teclado">Teclado</option>
                        <option value="bateria">Bateria</option>
                        <option value="baixo">Baixo</option>
                        <option value="canto">Canto</option>
                    </select>
                    <button type="submit" class="btn-cadastrar"><i class="fa-solid fa-user-plus"></i>Cadastrar</button>
                </form>
            </div>


            <div class="professores-cards">
                <div class="cards-item">
                    <p>João Pereira</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde porro omnis eum minus accusamus nemo aspernatur, culpa, hic eligendi consequatur accusantium molestias mollitia ea provident, delectus possimus quae quo perferendis.</p>
                    <div class="item-btn">
                        <a href="#"><i class="fa-solid fa-eye"></i> Visualizar</a>
                        <a href="#"><i class="fa-solid fa-pencil"></i> Editar</a>
                        <a href="#"><i class="fa-solid fa-trash-can"></i> Excluir</a>
                    </div>
                </div>
                <div class="cards-item">
                    <p>Maria Souza</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo quia, illum reprehenderit, ut ipsam vel suscipit ipsa, quas ab non blanditiis. Eius cupiditate architecto, esse quis incidunt tempora doloremque facere.</p>
                    <div class="item-btn">
                        <a href="#"><i class="fa-solid fa-eye"></i> Visualizar</a>
                        <a href="#"><i class="fa-solid fa-pencil"></i> Editar</a>
                        <a href="#"><i class="fa-solid fa-trash-can"></i> Excluir</a>
                    </div>
                </div>
                <div class="cards-item">
                    <p>Carlos Mender</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laudantium voluptas veritatis aliquam omnis maiores libero ipsa provident suscipit, natus saepe temporibus soluta odit quibusdam dicta! Ullam quidem tempora sint.</p>
                    <div class="item-btn">
                        <a href="#"><i class="fa-solid fa-eye"></i> Visualizar</a>
                        <a href="#"><i class="fa-solid fa-pencil"></i> Editar</a>
                        <a href="#"><i class="fa-solid fa-trash-can"></i> Excluir</a>
                    </div>
                </div>
                <div class="cards-item">
                    <p>Lucas Almeida</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos veritatis facilis aliquid, corrupti, temporibus voluptate exercitationem illum optio quia harum maiores repellat minus sed ipsa suscipit asperiores animi. Sunt, nobis.</p>
                    <div class="item-btn">
                        <a href="#"><i class="fa-solid fa-eye"></i> Visualizar</a>
                        <a href="#"><i class="fa-solid fa-pencil"></i> Editar</a>
                        <a href="#"><i class="fa-solid fa-trash-can"></i> Excluir</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="rodape"> 
        <section class="rodape-informacoes"> 
            <section class="rodape-atendimento">
                <p>ATENDIMENTO AO CLIENTE</p>
                <ul>
                    <li>Central de Ajuda</li>
                    <li>Como Comprar</li>
                    <li>Métodos de Pagamento</li>
                    <li>Garantia Xhopii</li>
                    <li>Devolução e Reembolso</li>
                    <li>Fale Conosco</li>
                    <li>Ouridoria</li>
                </ul>
            </section>
            <section class="rodape-sobre">
                <p>SOBRE A TOCAFÁCIL</p>
                <ul>
                    <li>Sobre Nós</li>
                    <li>Políticas TocaFácil</li>
                    <li>Política de Privacidade</li>
                    <li>Programa de Aliados da TocaFácil</li>
                    <li>Ofertas Relâmpago</li>
                    <li>TocaFácil Blog</li>
                    <li>Impresa</li>
                </ul>
            </section>
            <section class="rodape-pagamento">
                <p>PAGAMENTO</p>
                <section class="pagamento-imagens">
                    <img src="../assets/images/pix.png" alt="Logo do Pix">
                    <img src="../assets/images/americanexpress.png" alt="Logo da American Express">
                    <img src="../assets/images/visa.png" alt="Logo da Visa">
                    <img src="../assets/images/mastercard.png" alt="Logo do MasterCard">
                    <img src="../assets/images/hipercard.png" alt="Logo do HiperCard">
                    <img src="../assets/images/elo.png" alt="Logo da Elo">
                </section>
            </section>
            <section class="rodape-seguir">
                <p>SIGA-NOS</p>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i> YouTube</a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a></li>
                </ul>
            </section>
            <section class="rodape-qrcode">
                <p>ATENDIMENTO AO CLIENTE</p>
                <img src="../assets/images/qr-code.png" alt="Foto do Qr-code">
            </section>
        </section>
        <hr>
        <p class="rodape-copyright">© 2026 TocaFácil. Todos os direitos acadêmicos reservados</p>
    </footer>
    <script src="../assets/script.js"></script>
</body>
</html>