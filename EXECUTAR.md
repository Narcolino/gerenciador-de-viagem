
# Projeto de Gerenciador de Viagens com Laravel 

Este é um projeto Laravel configurado com Docker para facilitar a execução em diferentes ambientes. O projeto também utiliza Tailwind CSS para a estilização. A seguir, apresento as instruções para configurar e executar o projeto em seu ambiente local.

## Requisitos

Antes de começar, você precisará ter as seguintes ferramentas instaladas em sua máquina:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Node.js e NPM](https://nodejs.org/en/)

## Passos para executar o projeto

### 1. Copiar o arquivo `.env.example`

Na raiz do projeto, você encontrará um arquivo chamado `env.example`. Faça uma cópia desse arquivo e renomeie para `.env`. Este arquivo conterá as configurações necessárias para o seu ambiente local.

```
cp .env.example .env

### 2. Buildar o Container Docker

Em seguida, você precisará construir o container do Docker. O comando abaixo irá fazer o download da imagem necessária e inicializar o ambiente do Docker.

```
docker compose up -d --build

### 3. Instalar Dependências JavaScript

Agora que o Docker está em execução, instale as dependências JavaScript e compile o código para produção.

```
npm install && npm run build

### 4. Gerar a Chave da Aplicação

A partir deste ponto, todos os comandos devem ser executados dentro do container Docker. Para acessar o container do Laravel, execute o seguinte comando:

```
docker exec -it laravel-app bash

Após acessar o container, gere a chave da aplicação Laravel executando o seguinte comando:

```
php artisan key:generate

### 5. Rodar as Migrations

Agora, é hora de rodar as migrations para configurar o banco de dados. Ainda dentro do container, execute o seguinte comando:

```
php artisan migrate

### 6. Rodar o Ambiente de Desenvolvimento

Para iniciar o ambiente de desenvolvimento (servidor Laravel), execute o comando:

```
npm run dev

Isso irá iniciar o servidor de desenvolvimento e compilar os arquivos JavaScript para a aplicação.

## Conclusão

Após concluir essas etapas, o projeto estará pronto para ser executado localmente no seu navegador. Acesse `http://localhost` para visualizar a aplicação em execução.
Se precisar de mais informações ou ajustes, consulte a documentação oficial do Laravel ou do Docker.
