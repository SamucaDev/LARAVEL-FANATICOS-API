# 🍕 API Pizzaria Fanaticos 🍕

Apis desenvolvidas para manipular e gerenciar toda arquiterura de dados do projeto, desenvolvido com o Framework Laravel.
Front-end do projeto desenolvido em Ionic + Angular. [Repositorio Front](https://github.com/DevSamuelRodrigues/IONIC-FANATICOS-APP).

## Funções

- Autenticação de usuário
- Utilização do método de autenticação JWT. 
- Migrações para cadastrar as tabelas da plataforma.
- Seed desenvolvido para simular registros de produtos.
- Script de envio de email para quando um usuário abandona o carrinho.
- Manipulação de dados para a criação do carrinho de compras.

## Requisitos
- [PHP] >= 7.2
- [COMPOSER] >= 1.10
- [APACHE] >= 2.0
- [MYSQL] >= 5.7 ~ Sem suporte para MariaDB

## Tecnologias

Para desenvolver este projeto utilizei as seguintes tecnologias:

- [Laravel] - Utilizado para desenvolver todas as vertentes do backend da aplicação.
- [MYSQL] - Utilizado para armazenar todos os dados da aplicação.


## Instalação




Clone este repositório.
```sh
git clone https://github.com/DevSamuelRodrigues/LARAVEL-FANATICOS-API.git
```

Dentro do projeto...

```sh
composer update
```

**Em seguida crie um banco de dados [MySql] com o nome 'app_fanaticos', pref: 'utf8_general_ci'. **

Em seguida **crie** o arquivo '.env' na raiz do projeto, **copiando** o conteúdo do arquivo '.env.exemple', **modificando os parametros caso necessite**.
Exemplo: Dados de entrada e porta do banco de dados.

No projeto execute a seguinte linha de comando: 
```sh
php artisan migrate
```

Ok, Tabelas criadas agora iremos adicionar os produtos da plataforma. 
Execute os seguintes comandos:

```sh
composer dump-autoload
```

```sh
php artisan db:seed
```

```sh
php artisan db:seed --class=CreateProduct
```


Execute este comando para gerar a chave de autenticação do JWT:

```sh
php artisan jwt:secret
```

Execute este comando para iniciar o servidor php local:

```sh
php -S localhost:1533 -t public
```

## Script de carrinho abandonado

Para desenvolver este script utilizei um dos recursos do Framework Laravel, Commands, que possibilita a criação de comandos agendáveis. 
Fazendo um pesquisa de como algumas lojas onlines trabalham decidi considerar um carrinho abandonado após 3 horas de ausência de qualquer manipulação.

Fluxo do Script: 
- Uma consulta para coletar todos os carrinhos que estão com 3 horas a menos que o horário atual.
- Coletar as informações do usuário.
- Utilizar uma função para montar um template blade de email.
- Enviar o email para o usuário.
- Registrar esta ação para ter controle e utilizar estes dados para planos futuros!

Para executar este comando basta executar o seguinte comando: 

```sh
php artisan AbandonedCartCommand:Execute
```
PS: Posteriormente este comando será programado em um servidor para ser executado em um intervalo de tempo.

## Banco de dados

![N|Solid](https://i.imgur.com/7PkE4Tf.png)
Para desenvolver este projeto, recebi um [modelo] de banco de dados, o qual tomei a liberdade de melhorar alguns pontos:
- Nomeclatura das tabelas: Utilizei alguns métodos e convensões,  modificando os nomes das tabelas para ficar mais sugestivo. 
- Tabela product: Modifiquei o nome das colunas para manter a convensão que estou utilizando, inclui colunas para atender as necessidades da plataforma.
- Tabela group_product: Criei esta tabela para separa em grupos os itens que serão mostrados no front-end da aplicaçào.
- Tabela cart: Destinada a armazenar o carrinho do usuário e facilitar o script de abandono de carrinho.
- Tabela cart_items: Criada para armazenar todos os produtos que estão incluidos no carrinho do usuário.
- Tabela cart_notification: Criada para registrar quando foi encaminhado um emailMarketing para o usuário, dado importante para funcionalidade posteriores.
- Tabela user: Modifiquei para entrar na convesão.
- Tabela order: Criada para registrar os pedidos do usuário, funcionalidade que será implementada no próximo modulo!



## Por que usar Laravel?
Laravel é um framework de desenvolvimento rápido para PHP, livre e de código aberto. Tendo como principal objetivo, permitir que você trabalhe de forma estruturada e rápida, aprimorando este framework contamos um Micro-Framework, Lumen, que oferece todos os serviço do Laravel porém de uma maneira mais voltada aquilo que você realmente precisa em seu projeto.
Dentre as características realço as seguintes:
- Comunidade: Contamos com um suporte extremamente fantastico, tanto dos criadores do framework quanto dos desenvolvedores quando se trata de resolver problemas e melhorar funcionalidades.
- Segurança: Contamos com um cuidado muito bem arquitetado quando falamos de segurança, oferecendo diversas maneiras de autenticação e proteção de um projeto Laravel.
- Agilidade: Contamos com diversas funções pré-feitas e totalmente editáveis, ou seja, resolvendo rapidamentes problemas e necessidades comuns e tendo total controle do que esta acontecendo em determinado script.


## Licença
Desenvolvedor FullStack
Samuel Rodrigues
[Linkedin] - [GitHub] 





   [AngularJS]: <http://angularjs.org>
   [Ionic]: <https://ionicframework.com>
   [Linkedin]: <https://www.linkedin.com/in/samuelrodrigues18>
   [GitHub]: <https://github.com/DevSamuelRodrigues>
   [modelo]: <https://drawsql.app/fabapp/diagrams/teste>
   [COMPOSER]: <https://getcomposer.org/>
   [PHP]: <https://www.wampserver.com/en/>
   [MYSQL]: <https://www.wampserver.com/en/>
   [APACHE]: <https://www.wampserver.com/en/>
   [Laravel]: <http://localhost:8100/page-menu>
