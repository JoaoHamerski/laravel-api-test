# Adoorei teste backend

### Setup
- Na raiz do diretório `docker compose up --build`
- Acesse a aplicação em [localhost:8000](http://localhost:8000)

### Docker Helpers
- Dê permissão para executar os helpers para o docker `chmod +x -R ./docker-helpers`

### Migrations

- Rode os migrations `./docker-helpers/migrate`

### Tests
- Rode os testes `./docker-helpers/test`

## Documentação da API
- Acesse o diretório da documentação `cd ./api-documentation` 
- Rode `docker build -t docs . && docker run -it -p 3000:3000 docs`
- Acesse em [localhost:3000](http://localhost:3000)
