<?php
    session_start();
    
    if (isset($_SESSION['proprietarioId'])) {
        header('Location:Principal.php');
        die();
    }

    $erro = $_SESSION['erroLogin'] ?? null;
    unset($_SESSION['erroLogin']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TocaFácil</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/redefinir_senha.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="../assets/script.js"></script>
</head>
<body>
    <header class="cabecalho">
        <nav class="cabecalho-logo">
            <img src="../assets/images/logo toca-facil.png" alt="Logo do TocaFácil">
            <h1>Toca<span>Fácil</span></h1>
        </nav>
        <nav class="cabecalho-info">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-solid fa-cart-shopping"></i>
            <a href="login.php">Entrar</a>
            <a href="Cadastrar_proprietario.php">Cadastrar</a>
        </nav>
    </header>

    <main class="principal">
        <img  class="principal-image" src="../assets/images/login.png" alt="Foto principal">
        <section class="principal-formulario">
            <div class="formulario-info">
                <img src="../assets/images/logo toca-facil.png" alt="Logo do TocaFácil">
                <div class="info-titulo">
                    <h1>Redefina sua Senha!</h1>
                    <p>Coloque seu e-mail para redefinir a sua senha.</p>
                </div>
                <form method="POST" action="../processamento/processamento.php">
                    <input type="hidden" name="acao" value="redefinirSenha">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="inputEmail" placeholder="Digite o seu e-mail" required>
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="inputSenha" placeholder="Digite sua nova senha" required>
                    <div class="btn-redefinir">
                        <button type="submit">Redefinir Senha</button>
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
</body>
</html>