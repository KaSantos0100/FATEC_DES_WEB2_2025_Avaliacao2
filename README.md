# Avaliação Desenvolvimeto Web II -  Fatec Araras

# Sistema de gerenciamento de Loja
Este  projeto  e para simula um sistema basico de  loja de Artesanato e Decoração , no intuito e objetivo de gerenciamento de produtos. O Sistema em PHP Orientado a Objetos, para que um lojista possa cadastrar, visualizar e remover produtos de sua lojinha. desenvolvido em PHP, HTML e CSS.

# Funcionalidade – Acesso restrito para gerenciar o sistema
 
- Login /Logout
Obs: Com verifição de login e senha

- Cadastro de Produto

- Remover Produto

- Visualizar Produto

# Ferramentas

- **PHP** (sem frameworks)
- **MySQL** (banco de dados)
- **HTML/CSS**
- **XAMPP** como servidor local

# Estrutura de Pastas

| Caminho                           | Descrição                                         |
| --------------------------------- | ------------------------------------------------- |
| `FATEC_DES_WEB2_2025_AVALIACAO2/` | Raiz do projeto                                   |
| └── `code/`                       | Diretório principal contendo o código-fonte       |
|     └── `classes/`                | Pasta com as classes PHP                          |
|         ├── `DB.php`              | Classe de conexão com o banco de dados            |
|         ├── `login.php`           | Classe ou script de autenticação                  |
|         ├── `cadastro.php`        | Lógica para cadastro de dados (usuários/produtos) |
|         ├── `home.php`            | Página principal do sistema (após login)          |
|         ├── `index.php`           | Página de entrada do sistema                      |
|         ├── `login.php`           | **Possivelmente duplicado — revisar necessidade** |
|         ├── `remover.php`         | Script para remoção de registros                  |
|         └── `vizualizar.php`      | Página para visualização de registros             |



## Classe DB

Local: `classes/DB.php`

- Conexão com o banco de dados é estabelecida no construtor.
- Métodos públicos:
  - `getproduto_artesanais()`
  - `getcadastroProduto($nome_produto, $preco, $descrição, $categoria,)`
  - `selectProdutoPorId($id)`
  - `deleteProduto($id)`


#  Para  realizar o teste 

| **Usuário** | **Senha**  |
|-------------|------------|
| admin       | admin      |


# Instruções para Rodar

1. Clone ou baixe o repositório.
2. Importe o arquivo `loja.sql` no seu banco de dados MySQL.
3. Atualize as credenciais do banco na classe `DB.php` conforme necessário.
4. Execute o projeto em um servidor PHP local (como `localhost` no XAMPP).
5. Acesse `index.php` e utilize as credenciais de teste.


# 📌 Orientação
- Realizado para fins acadêmicos;

# Créditos

Desenvolvido por  Karina Santos  
Curso de Desenvolvimento Software Multiplataforma- FATEC  
Disciplina: Desenvolvimento Web 2 - Prof.Orlando Saraiva