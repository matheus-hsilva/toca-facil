<?php
    require "../processamento/funcoesBD.php";
    $cursoId = $_GET['id'];
    $listaAulas = retornarAulas($cursoId);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TocaFácil</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/ver_aulas.css">
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
                <li id="ativo"><a href="Ver_cursos.php">Cursos</a></li>
                <li><a href="Ver_professores.php">Professores</a></li>
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
                <h1>Aulas do Curso</h1>  
                <p>Aprenda os primeiros acordes e músicas para começar a tocar um instrumento do zero!</p>
            </div>
        </section>

        <section class="principal-aulas">
            <div class="aulas-cadastrar">
                <h1>Aulas do Curso</h1>
                <button id="abrir-modal" onclick="abrirModal()">Cadastrar Aula <i class="fa-solid fa-plus"></i></button>
            </div>

            <div id="cadastrar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <div class="btn-fechar">
                        <button type="button" class="fechar-modal" onclick="fecharModal()">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <input type="hidden" name="acao" value="cadastrarAula">
                    <input type="hidden" name="inputCursoId" value="<?php echo $cursoId; ?>">
                    <h1>Cadastrar <span>Aula</span></h1>
                    <input type="text" name="inputTitulo" placeholder="Título da aula" required>
                    <textarea name="inputDescricao" placeholder="Descrição da aula" required></textarea>
                    <input type="number" name="inputOrdem" placeholder="Ordem da aula" required>
                    <input type="number" name="inputDuracao" placeholder="Duração (em minutos)" required>
                    <button type="submit" class="btn-enviar">
                        <i class="fa-solid fa-plus"></i> Cadastrar
                    </button>

                </form>
            </div>

            <div id="atualizar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <div class="btn-fechar">
                        <button type="button" class="fechar-modal" onclick="fecharModal()">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <input type="hidden" name="acao" value="atualizarAula">
                    <input type="hidden" name="inputCodigoAula" id="codigo-aula">
                    <input type="hidden" name="inputCursoId" value="<?php echo $cursoId; ?>">
                    <h1>Editar <span>Aula</span></h1>
                    <input type="text" name="inputTitulo" id="titulo-aula" placeholder="Título da aula" required>
                    <textarea name="inputDescricao" id="descricao-aula" placeholder="Descrição da aula" required></textarea>
                    <input type="number" name="inputOrdem" id="ordem-aula" placeholder="Ordem da aula" min="1" required>
                    <input type="number" name="inputDuracao" id="duracao-aula" placeholder="Duração (em minutos)" min="1" required>
                    <button type="submit" class="btn-enviar">
                        <i class="fa-solid fa-pencil"></i> Salvar alterações
                    </button>
                </form>
            </div>

            <div id="excluir-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <input type="hidden" name="acao" value="excluirAula">
                    <input type="hidden" name="inputCursoId" value="<?php echo $cursoId; ?>">
                    <h1>Excluir <span>Aula</span></h1>
                    <p>Deseja realmente excluir esta aula?</p>
                    <input type="hidden" id="codigo-excluir-aula" name="inputCodigoExcluirAula">
                    <div class="formulario-btn">
                        <button type="button" class="btn-cancelar" onclick="fecharModal()">Cancelar</button>
                        <button type="submit" class="btn-enviar">
                            <i class="fa-solid fa-trash-can"></i> Excluir
                        </button>
                    </div>
                </form>
            </div>


            <div class="aulas-cards">
                <?php
                    while ($aula = mysqli_fetch_assoc($listaAulas)) {
                ?>
                    <div class="cards-item">
                        <div class="item-info">
                            <p><?php echo $aula['ordem']; ?></p>
                            <p><?php echo htmlspecialchars($aula['titulo']); ?></p>
                            <p><?php echo htmlspecialchars($aula['descricao']); ?></p>
                            <p>
                                <i class="fa-regular fa-clock"></i>
                                <?php echo $aula['duracao']; ?> min
                            </p>
                        </div>
                        <div class="item-btn">
                            <button type="button" onclick="abrirModalAtualizarAula(
                                '<?php echo $aula['id']; ?>',
                                '<?php echo htmlspecialchars(addslashes($aula['titulo'])); ?>',
                                '<?php echo htmlspecialchars(addslashes($aula['descricao'])); ?>',
                                '<?php echo $aula['ordem']; ?>',
                                '<?php echo $aula['duracao']; ?>'
                            )">
                                <i class="fa-solid fa-pencil"></i> Editar
                                </button>
                            <button type="button" onclick="abrirModalExcluirAula('<?php echo $aula['id']; ?>')">
                                <i class="fa-solid fa-trash-can"></i> Excluir
                            </button>
                        </div>
                    </div>
                <?php
                    }
                ?>
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