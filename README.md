
## Projeto para Avaliação

Projeto desenvolvido para vaga de programador php.

- CRUD.
- Envio de e-mails.

## Ajustes

Ao clonar o projeto: 
- Crie um arquivo .env baseado no arquivo .env.example.
- Crie uma base de dados mysql e insira o nome em [DB_DATABASE].
- Crie uma conta https://mailtrap.io/ para envio de e-mails.
- As credenciais do e-mail devem ser inseridas em [MAIL_USERNAME] e [MAIL_PASSWORD].
- Rode as migrations (php artisan migrate)
- Execute os seed para criar usuários com acesso ao sistema. (php artisan db:seed)
- Inicie a aplicação (php artisan serve)
- Inicie a fila de e-mails (php artisan queue:work --tries=3)
