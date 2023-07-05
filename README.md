# README - Executando uma aplicação Laravel localmente

Este repositório contém os passos necessários para executar uma aplicação Laravel localmente. Siga as instruções abaixo para configurar seu ambiente de desenvolvimento e começar a executar a aplicação.

## Pré-requisitos

Certifique-se de que seu sistema atenda aos seguintes pré-requisitos:

- [PHP](https://www.php.net/) (versão 8.1 ou superior) (https://www.locaweb.com.br/blog/temas/codigo-aberto/como-instalar-o-php-no-ubuntu/)
- [EXTENSÕES_PHP] unzip, php8.1-dom, php8.1-xml, php8.1-curl, php8.1-mysql
- [Composer](https://getcomposer.org/) (gerenciador de dependências do PHP) (https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-pt)
- [Node.js](https://nodejs.org/) (versão 14.x ou superior)
- [Npm] (gerenciador de pacotes do Node.js) (versão 9.x LTS ou superior)
- [MySQL](https://www.mysql.com/) para o desenvolvimento, foi utilizada uma imagem docker com MYSQL.

## Configuração inicial

1. Clone este repositório para sua máquina local usando o seguinte comando:
   ```
   git clone https://github.com/PedroSarment/notifacil.git
   ```

2. Navegue até o diretório do projeto:
   ```
   cd notifacil

2. Navegue até o diretório do CMS:
   ```
   cd notifacil-cms

3. Instale as dependências do Composer executando o seguinte comando:
   ```
   composer install
   ```

3. Instale as dependências do npm executando o seguinte comando:
   ```
   npm install
   ```

3. Inicie o fontend da aplicação:
   ```
   npm run build
   ```

4. Copie o arquivo `.env.example` para um novo arquivo chamado `.env`:
   ```
   cp .env.example .env
   ```

5. Gere a chave da aplicação Laravel executando o comando:
   ```
   php artisan key:generate
   ```

6. Abra o arquivo `.env` e configure as informações do banco de dados de acordo com suas configurações locais. Por exemplo:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=nome_do_usuario
   DB_PASSWORD=senha_do_usuario
   ```

7. Execute as migrações do banco de dados para criar as tabelas necessárias:
   ```
   php artisan migrate
   ```

8. Inicie o servidor de desenvolvimento do Laravel:
   ```
   php artisan serve
   ```

9. Abra um navegador da web e acesse a URL `http://localhost:8000`. A aplicação Laravel agora deve estar em execução localmente.

## Executando um aplicativo Ionic localmente

Este repositório também contém um aplicativo Ionic. Siga as instruções abaixo para executar o aplicativo Ionic localmente.

## Pré-requisitos

Certifique-se de que seu sistema atenda aos seguintes pré-requisitos:

- Node.js (versão 14.x ou superior)
- Npm (gerenciador de pacotes do Node.js) (versão 9.x LTS ou superior)
- Ionic CLI (versão 6.x ou superior)

## Configuração inicial

1. Certifique-se de que você já tenha clonado este repositório e esteja no diretório raiz do projeto.

2. Navegue até o diretório do aplicativo Ionic:
   ```
   cd notifi-app
   ```

3. Instale as dependências do npm executando o seguinte comando:
   ```
   npm install
   ```

4. Inicie o aplicativo Ionic no seu navegador:
   ```
   ionic serve
   ```

   O comando acima iniciará o servidor de desenvolvimento do Ionic e abrirá o aplicativo no seu navegador padrão.

   Se você quiser visualizar o aplicativo em um dispositivo móvel, adicione a flag `--external` ao comando `ionic serve`:
   ```
   ionic serve --external
   ```
   Isso permitirá que você acesse o aplicativo por meio de um endereço IP local no seu dispositivo móvel.

5. Agora você pode interagir com o aplicativo Ionic localmente no seu navegador ou dispositivo móvel.

Certifique-se de que o servidor de desenvolvimento do Laravel também esteja em execução (etapas 8 e 9 do README principal) para que o aplicativo Ionic possa se comunicar corretamente com a API do Laravel.

Se você encontrar algum problema durante a execução do aplicativo Ionic, verifique se você seguiu corretamente os pré-requisitos e as etapas de configuração inicial. Certifique-se também de que as dependências do npm foram instaladas corretamente.