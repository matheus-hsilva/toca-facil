<?php
    require "../processamento/funcoesBD.php";
    $listaProfessores = retornarProfessores();
    $listaCursos = retornarCursos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TocaFácil</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/ver_cursos.css">
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
                <h1>Nossos <span>Cursos</span></h1>
                <p>Aprenda no seu ritmo e evolua no instrumento que você ama!</p>
            </div>
        </section>

         <section class="principal-cursos">
            <div class="cursos-cadastrar">
                <button type="button" id="abrir-modal" onclick="abrirModal()">Cadastrar Curso <i class="fa-solid fa-plus"></i></button>
            </div>


            <div id="cadastrar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                <input type="hidden" name="acao" value="cadastrarCurso">
                    <div class="btn-fechar">
                        <button type="button" class="fechar-modal" onclick="fecharModal()"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <h1>Cadastrar <span>Curso</span></h1>
                    <input type="text" id="nome" placeholder="Nome do curso" name="inputNome">
                    <textarea id="descricao" name="inputDescricao" placeholder="Descrição do curso" required></textarea>
                    <select id="categoria" name="inputCategoria" onchange="filtrarProfessores('categoria', 'professor')" required>
                        <option value="" disabled selected>Selecione a categoria</option>
                        <option value="violao">Violão</option>
                        <option value="guitarra">Guitarra</option>
                        <option value="piano">Piano</option>
                        <option value="bateria">Bateria</option>
                    </select>
                    <select id="professor" name="inputProfessorId" required disabled>
                        <option value="" disabled selected>Selecione o Professor</option>
                        <?php
                            while ($professor = mysqli_fetch_assoc($listaProfessores)) {
                        ?>
                            <option value="<?php echo $professor['id']; ?>" data-especialidade="<?php echo $professor['especialidade']; ?>">
                                <?php echo $professor['nome']; ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                    <button type="submit" class="btn-enviar"><i class="fa-solid fa-user-plus"></i>Cadastrar</button>
                </form>
            </div>


             <div class="cursos-cards">
                <?php
                    while ($curso = mysqli_fetch_assoc($listaCursos)) {
                ?>
                    <div class="cards-item">
                        <img src="../assets/images/curso <?php echo $curso['categoria']; ?>.png" alt="Imagem do curso">
                        <p><?php echo $curso['nome']; ?></p>
                        <p><?php echo $curso['descricao']; ?></p>
                        <div class="item-btn">
                            <a href="Ver_aulas.php?id=<?php echo $curso['id']; ?>"><i class="fa-solid fa-eye"></i> Visualizar</a>
                            <button onclick="abrirModalAtualizarCurso('<?php echo $curso['id']; ?>')"><i class="fa-solid fa-pencil"></i> Editar</button>
                            <button onclick="abrirModalExcluirCurso('<?php echo $curso['id']; ?>')"><i class="fa-solid fa-trash-can"></i> Excluir</button>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>


            <div id="atualizar-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <input type="hidden" name="acao" value="atualizarCurso">
                    <input type="hidden" name="inputCodigoCurso" id="codigo-curso">
                    <div class="btn-fechar">
                        <button type="button" class="fechar-modal" onclick="fecharModal()"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <h1>Editar <span>Curso</span></h1>
                    <input type="text" placeholder="Nome do curso" name="inputNome" required>
                    <textarea name="inputDescricao" placeholder="Descrição do curso" required></textarea>
                    <select id="categoria-curso" name="inputCategoria" onchange="filtrarProfessores('categoria-curso', 'professor-curso')" required>
                        <option value="" disabled selected>Selecione a categoria</option>
                        <option value="violao">Violão</option>
                        <option value="guitarra">Guitarra</option>
                        <option value="piano">Piano</option>
                        <option value="bateria">Bateria</option>
                    </select>
                    <select id="professor-curso" name="inputProfessorId" required>
                        <option value="" disabled selected>Selecione o Professor</option>
                        <?php
                            mysqli_data_seek($listaProfessores, 0);
                            while ($professor = mysqli_fetch_assoc($listaProfessores)) {
                        ?>
                            <option value="<?php echo $professor['id']; ?>" data-especialidade="<?php echo $professor['especialidade']; ?>">
                                <?php echo $professor['nome']; ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                    <button type="submit" class="btn-enviar"><i class="fa-solid fa-pencil"></i> Salvar alterações</button>
                </form>
            </div>


            <div id="excluir-modal">
                <form class="modal-formulario" action="../processamento/processamento.php" method="POST">
                    <input type="hidden" name="acao" value="excluirCurso">
                    <input type="hidden" name="inputCodigoExcluirCurso" id="codigo-excluir-curso">
                    <h1>Excluir <span>Curso</span></h1>
                    <p>Deseja realmente excluir este curso? As aulas dele também serão excluídas.</p>
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