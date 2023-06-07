# Prototipo Ong lar bastet

Seja bem-vindo(a)ao meu protótipo, o projeto é um lar para adoção de animais, desenvolvido em OOP, com CRUD administrativo. Foram utilizadas as tecnologias PHP,JS, HTML e CSS.

## significado das abreviações
PHP: Hypertext Preprocessor;</br>
JS: JavaScript;</br>
HTML: HyperText Markup Language;</br>
CSS: Cascading Style Sheets;</br>
CRUD: Create, Read, Update, Delete;</br>
OOP: Object oriented programming;</br>
SQL: Structured Query Language;</br>
XAMPP: Pacote com os principais servidores de código aberto do mercado, incluindo FTP, banco de dados MySQL e Apache com suporte as linguagens PHP e Perl.

## Índice
- [Instalação](#instalação)
- [Uso](#uso)
- [Configurações MYSQL](#Mysql)
- [Pastas e arquivos existentes](#pastas-e-arquivos-existentes)
- [Recursos](#recursos)
- [Contato](#contato)

## Instalação

 Para realizar a instalação do projeto em sua maquina é necessário o uso do aplicativo XAMPP(com a versão mais recente deve funcionar normalmente).

1. Clone o repositório para sua maquina local.
2. Abra o Xampp.
3. Ative as opções Apache e MySQL.
4. Logo após vá em Explorer, que aparece no lado direito do programa.
5. Busque pela pasta HTDOCS.
6. Na pasta HTDOCS, crie uma pasta chamada POO.
7. Coloque os arquivos e pastas nessa pasta.

## Uso

Após o passo anterior ([Instalação](#instalação)) é possivel continuar configurando sua máquina

1. Com seu Xampp aberto e seu VSCODE também, inicie seu navegador padrão do windows e digite http://localhost/.
2. Após isso entre na pasta POO que estará agora aparecendo em sua tela.
3. Clique e pronto você estará visualizando o projeto.
4. Aproveite as funcionalidades do projeto tais como [feed], [se cadastrar] , [adotar],[colocar para adoção],[fechar parcerias] etc.

## Mysql

Para configurar seu banco de dados são necessarias as seguintes ações:

1. No seu projeto clonado existe um arquivo chamado <strong>dbcadastro.php</strong>
2. Há um codigo SQL inserido no arquivo, copie o codigo completo e em seguida abra seu XAMPP.
3. Com o painel<strong> Xampp Control Painel</strong> aberto clique na opção admin do modulo MYSQL .
4. Após isso será aberto uma guia no seu navegador padrão com o seguinte caminho: http://localhost/phpmyadmin/
5. Vá em novo e digite o nome do Database: <strong>dbcadastro</strong>, após isso selecione utf8mb4_unicode_ci.
6. Clique em <strong>Criar</strong> após isso será aberta outra guia, clique em  SQL e cole o código que está em sua Área de Transfêrencia.

## Pastas e arquivos Existentes

A estrutura de pastas e arquivos do projeto está da seguinte forma:<br>
|-- /index.php <br>
|-- /estilo.php<br>
|-- /css<br>
|-- /css2<br>
|-- /css3<br>
|-- /classes<br>
|-- /tela_inicial<br>
|-- /sistema<br>
|-- /administracao<br>
|--/uploads<br>
|-- /img <br>
|-- script.js <br>
|-- dbcadastro.sql 

## Recuros

- [adotar animal por foto]:Adote um animal apenas clicando em sua foto, existe as descrições do mesmo.
- [se cadastrar]: Para empresas e usuarios que desejam fechar parcerias ou colocar um animal para adotar.
- [sistema administrativo]: um sistema de inserção para os administradores do sistema, atualizarem o banco de dados, deletando, visualizando todos os usuarios,empresas, animais e etc.
- [se candidatar para nossa equipe]: caso deseje fazer parte da nossa equipe de cuidadores, é sua chance, pois voce pode se candidar para a vaga.

## Contato

Caso haja alguma duvida ou feedback referente ao projeto entre em contato pelo email  [vic.vl674@gmail.com]