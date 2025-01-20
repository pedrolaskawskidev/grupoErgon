# Laravel Application

Este é um projeto Laravel. Abaixo estão as instruções para rodar a aplicação localmente, configurar o banco de dados e rodar as migrations e seeders obrigatórios.

## Pré-requisitos

Antes de começar, você precisará ter as seguintes ferramentas instaladas em sua máquina:

- **PHP** (versão 7.4 ou superior)
- **Composer** (para gerenciar dependências do Laravel)
- **MySQL** ou **SQLite** (ou outro banco de dados suportado pelo Laravel)

## Passo a passo para rodar a aplicação

1. Clone o repo

git clone https://github.com/pedrolaskawski/grupoErgon.git

E acesse ele:
cd repository-name

2. Instalar as dependências do Laravel
Use o Composer para instalar as dependências do Laravel:
composer install

3. Configurar o ambiente
Copie o arquivo .env.example para .env.
Esse arquivo contém configurações específicas para o ambiente, como as credenciais do banco de dados:

cp .env.example .env

4. Gerar a chave de aplicação
O Laravel precisa de uma chave única para criptografia. Gere uma chave de aplicação executando o comando:

php artisan key:generate

5. Rodar as Migrations
Agora, rode as migrations para criar as tabelas no banco de dados:
php artisan migrate

6. Rodar os Seeders (OBRIGATÓRIO)
Rodar os seeders para popular o banco de dados com dados iniciais. É OBRIGATÓRIO executar este passo para garantir que os dados necessários sejam inseridos corretamente:
php artisan db:seed

7. Iniciar a aplicação
Agora você pode rodar o servidor localmente. Execute o comando:

php artisan serve
