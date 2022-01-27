### Keys System

## Apresentação

Sistema de geração de par chaves para criptografar dados em transito. Foi utilizado Resource para centralizar o retorno dos dados e Observer para criptografar a chave privada antes de armazena-lá no banco de dados. Foi criada uma camada de Serviços para realizar as tarefas de criação das chaves e criptografia de dados.

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

4. Execute as migrations de banco de dados, usando o comando abaixo:
```
php artisan migrate
```

5. Execute as seeds para povoar o banco de dados com dados de teste, usando o comando abaixo:
```
php artisan db:seed
```

## Testar o Sistema

1. Gerar e salvar as chaves, acesse a URL abaixo: 
```
/keys/user/1/generate
```

2. Recuperar a chave publica do usuário, acesse a URL abaixo:
 ```
/keys/user/1/public-key
```

3. Para criptografar dados, acesse a URL abaixo:
 ```
/cryptography/1/encrypt
```

4. Para descriptografar dados, acesse a URL abaixo:
 ```
/cryptography/1/decrypt
```
