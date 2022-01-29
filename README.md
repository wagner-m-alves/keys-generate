### KEYS SYSTEM

## Apresentação

Sistema de geração de par de chaves para criptografar dados em transito. Foi utilizado Observer para criar automaticamente as chaves criptográficas após o registro de um Jogador e para criptografar a chave privada antes de armazena-lá no banco de dados. Foi criada uma camada de Serviços para realizar as tarefas de criação das chaves e criptografia de dados. O processo de automatização da criptografia dos dados foi feito utilizando-se Events e listeners. Foi criada uma UI simples para facilitar os testes do projeto.

## Tecnologias Primárias

1. Laravel Framework;
2. Inertia;
3. Vue.JS;
4. Tailwind CSS;

## Tecnologias Secundárias

1. Laravel Jetstream;

## Instuções de Execução

1. Acesse o diretório do projeto.

2. Crie o arquivo .env, usando o comando abaixo:
```
cp .env.example .env
```

3. Gere a Chave do Sistema, usando o comando abaixo:
```
php artisan key:generate
```

4. Instale as dependências, usando os comandos abaixo:
```
composer install
npm install
npm run dev
```

5. Execute as migrations de banco de dados, usando o comando abaixo:
```
php artisan migrate
```

6. Execute as seeds para povoar o banco de dados com dados de teste, usando o comando abaixo:
```
php artisan db:seed
```

## Testar o Sistema

1. Testar criação automática de chaves criptográficas: 
```
Acesse a URI / do projeto e clique no link Register.
```

2. Testar encriptação automática dos dados ao enviar para o Sistema de Pagamento:
```
Acesse a URI / do projeto e clique no botão APOSTAR.
```

3. Testar encriptação automática dos dados da resposta do Sistema de Pagamento:
```
Acesse a URI / do projeto e clique no botão TESTAR RETORNO DO SISTEMA DE PAGAMENTO.

OBS: Para fazer esse teste certifique-se de estar logado com o usuário criado pelo seeder, o que pode ser feito com as credencias abaixo:
email: harvey.specter@test.com;
password: 12345678.
```
