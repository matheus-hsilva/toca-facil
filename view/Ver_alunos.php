<?php 
    require "../processamento/funcoesBD.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TocaFácil</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/ver_alunos.css">
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
                <li><a href="Ver_professores.php">Professores</a></li>
                <li id="ativo"><a href="Ver_alunos.php">Alunos</a></li>
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
                <h1>Nossos <span>Alunos</span></h1>
                <p>Todos alunos que estudam em nossa plataforma!</p>
            </div>
        </section>

         <section class="principal-alunos">
            <div class="alunos-cadastrar">
               <button  type="button" id="abrir-modal" onclick="abrirModal()">Cadastrar Aluno <i class="fa-solid fa-plus"></i></button>
            </div>


            <div id="cadastrar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <input type="hidden" name="acao" value="cadastrarAluno">
                    <div class="btn-fechar">
                        <button type="button" class="fechar-modal" onclick="fecharModal()"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <h1>Cadastrar <span>Aluno</span></h1>
                    <input type="text" id="nome" placeholder="Seu nome" name="inputNome" required>
                    <input type="email" id="email" placeholder="Seu e-mail" name="inputEmail" required>
                    <input type="password" id="senha" placeholder="Sua senha" name="inputSenha" required>
                    <button type="submit" class="btn-enviar"><i class="fa-solid fa-user-plus"></i>Cadastrar</button>
                </form>
            </div>


            <div class="alunos-cards">
                <?php
                    $listaAlunos = retornarAlunos();
                    while ($aluno = mysqli_fetch_assoc($listaAlunos)) {
                        echo "<div class=\"cards-item\">";
                        echo "<p>" . $aluno["nome"] . "</p>";
                        echo "<p>" . $aluno["email"] . "</p>";
                        echo "<div class=\"item-btn\">";
                        echo "<button onclick=\"abrirModalAtualizar(" . $aluno["id"] . ")\"><i class=\"fa-solid fa-eye\"></i> Editar</button>";
                        echo "<button onclick=\"abrirModalExcluir(" . $aluno["id"] . ")\"><i class=\"fa-solid fa-trash-can\"></i> Excluir</button>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>


            <div id="atualizar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <input type="hidden" name="acao" value="atualizarAluno">
                    <div class="btn-fechar">
                        <button class="fechar-modal" onclick="fecharModal()"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <h1>Atualizar <span>Aluno</span></h1>
                    <input type="text" id="nome" placeholder="Novo nome" name="inputNome" required>
                    <input type="email" id="email" placeholder="Novo e-mail" name="inputEmail" required>
                    <input type="password" id="senha" placeholder="Nova senha" name="inputSenha" required>
                    <input type="hidden" id="codigo-aluno" name="inputCodigoAluno">
                    <button type="submit" class="btn-enviar"><i class="fa-solid fa-user-plus"></i>Atualizar</button>
                </form>
            </div>


            <div id="excluir-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <input type="hidden" name="acao" value="excluirAluno">
                    <h1>Excluir <span>Aluno</span></h1>
                    <p>Deseja realmente excluir esse aluno?</p>
                    <input type="hidden" id="codigo-excluir" name="inputCodigoExcluir">
                    <div class="formulario-btn">
                        <button type="button" class="btn-cancelar" onclick="fecharModal()">Cancelar</button>
                        <button type="submit" class="btn-enviar"><i class="fa-solid fa-trash-can"></i> Excluir</button>
                    </div>
                </form>
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