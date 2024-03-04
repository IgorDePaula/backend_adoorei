Desafio desenvolvedor back-end Adoorei
======================================

Requisitos

- Make
- Docker

Para executar o projeto utilize os seguintes comandos `make`:

| Comand           | Descrição                                                                                        |
|------------------|--------------------------------------------------------------------------------------------------|
| bash             | Inicia uma sessao bash                                                                           |
| build            | Constroi os containers                                                                           |
| clear            | Limpa os caches do laravel                                                                       |
| composer-install | Instala as dependencias do                                                                       | composer                      
| coverage-html    | Executa os testes com                                                                            | cobertura                     
| down             | Para e remove containers                                                                         |
| help             | Mostra o menu de ajuda                                                                           |
| logs             | Visualiza os logs do                                                                             | container                     
| migrate          | Executa a migracao do banco                                                                      |
| test             | Executa os testes da apicacao sem cobertura. Use a opcao 'FILTER' para rodar um teste especifico |
| up               | Inicia o container                                                                               |

Endpoints
---------

`GET /api/products ` Retorna os produtos constantes no banco de dados.

`GET /api/sales ` Retorna as vendas constantes no banco de dados.

`POST /api/sales ` Cria uma venda no banco de dados.
