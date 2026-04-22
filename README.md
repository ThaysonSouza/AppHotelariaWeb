<div align="center">

# Hotel Management System — Web

**Sistema completo de gestão hoteleira com API REST e interface SPA**

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JWT](https://img.shields.io/badge/JWT-Auth-000000?style=for-the-badge&logo=jsonwebtokens&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![REST API](https://img.shields.io/badge/REST-API-009688?style=for-the-badge&logo=fastapi&logoColor=white)

<br/>

*API RESTful com autenticação JWT, controle transacional ACID para reservas e frontend SPA em JavaScript puro.*

[Funcionalidades](#-funcionalidades) •
[Arquitetura](#%EF%B8%8F-arquitetura) •
[Como Rodar](#%EF%B8%8F-como-rodar-localmente) •
[Diferenciais](#-diferenciais-técnicos)

</div>

---

## Sobre o Projeto

O **Hotel Management System** é uma aplicação web full-stack para gestão operacional de hotéis. O sistema resolve o problema de **controle de reservas com integridade de dados** — garantindo que dois hóspedes nunca reservem o mesmo quarto no mesmo período, mesmo em cenários de requisições simultâneas.

O backend é uma API REST construída em PHP puro com padrão MVC, enquanto o frontend é uma SPA (Single Page Application) em JavaScript Vanilla que consome a API com autenticação via Bearer Token.

### Problema Resolvido

- Gestão manual de quartos, reservas, pedidos e clientes substituída por sistema digital
- Race conditions em reservas simultâneas eliminadas com transações ACID e row-level locking
- Autenticação segura com JWT e controle de acesso por cargo (RBAC)

---

## Funcionalidades

### Autenticação & Segurança
- Login com JWT (HS256) e expiração configurável (1h)
- Role-Based Access Control — validação de cargo por endpoint
- Senhas protegidas com hashing seguro
- Prepared Statements em 100% das queries (anti SQL Injection)

### Gestão de Quartos
- CRUD completo de quartos com nome, número, capacidade (camas) e preço
- Busca de quartos disponíveis por período e quantidade de hóspedes
- Cálculo automático de capacidade: `(camaCasal × 2) + camaSolteiro`
- Upload de fotos dos quartos

### Sistema de Reservas
- Criação de pedidos com múltiplos quartos em uma única transação
- Verificação de conflitos de datas com detecção de sobreposição
- Row-level locking (`SELECT ... FOR UPDATE`) para concorrência segura
- Rollback automático em caso de falha parcial

### Gestão de Clientes
- Cadastro completo com validação de dados
- Histórico de pedidos e reservas por cliente

### Frontend SPA
- Single Page Application com roteamento client-side
- Carrinho de reservas com state management
- Consumo da API com interceptação de headers JWT

---

## 🛠️ Tecnologias Utilizadas

| Camada | Tecnologia | Propósito |
|--------|-----------|-----------|
| **Backend** | PHP 8.0+ | API REST, lógica de negócio |
| **Banco de Dados** | MySQL 8.0+ | Persistência relacional |
| **Autenticação** | Firebase/JWT (HS256) | Tokens stateless |
| **Servidor** | Apache + mod_rewrite | URL rewriting, Front Controller |
| **Frontend** | JavaScript ES6+ | SPA, fetch API, state management |
| **Estilização** | CSS3 | Interface responsiva |

---

## 🏗️ Arquitetura

```
AppHotelariaWeb/
├── config/
│   ├── configuracoes.php      # Constantes de ambiente (DB, JWT secret)
│   └── database.php           # Conexão MySQLi com error handling
├── controllers/
│   ├── AuthController.php     # Login com JWT (admin + cliente)
│   ├── ReservasController.php # CRUD de reservas
│   ├── quartoController.php   # CRUD de quartos + busca disponíveis
│   ├── pedidoController.php   # Gestão de pedidos transacionais
│   ├── clienteController.php  # CRUD de clientes
│   ├── UploadController.php   # Upload de imagens
│   └── validadorController.php# Validação de payload
├── models/
│   ├── ReservaModel.php       # Queries + transações ACID + locking
│   ├── QuartoModel.php        # Queries + busca disponíveis
│   ├── PedidoModel.php        # Criação de ordens transacionais
│   ├── UsuarioModel.php       # Autenticação de usuários
│   ├── ClienteModel.php       # Persistência de clientes
│   └── FotoModel.php          # Gestão de fotos
├── helpers/
│   ├── token_jwt.php          # Criação/validação/RBAC de tokens
│   └── response.php           # JSON response helper
├── routes/                    # Definição de rotas por recurso
├── src/
│   ├── api/                   # Camada de consumo da API (frontend)
│   ├── components/            # Componentes reutilizáveis
│   ├── pages/                 # Páginas da SPA
│   ├── store/                 # State management (carrinho)
│   ├── css/                   # Estilos
│   └── main.js                # Entry point + router
├── .htaccess                  # URL rewriting → Front Controller
└── index.php                  # Front Controller (roteamento central)
```

### Padrões Aplicados

- **Front Controller** — Toda requisição passa pelo `index.php`
- **MVC** — Separação clara entre Models, Controllers e Views
- **Repository-like Models** — Cada model encapsula queries do seu domínio
- **Transações ACID** — `begin_transaction()` + `commit/rollback`
- **Pessimistic Locking** — `SELECT ... FOR UPDATE` para concorrência

---


## Como Rodar Localmente

### Pré-requisitos

- PHP 8.0+
- MySQL 8.0+
- Apache com mod_rewrite (XAMPP recomendado)

### Instalação

```bash
# Clone o repositório
git clone https://github.com/ThaysonSouza/AppHotelariaWeb.git

# Mova para o diretório do Apache
cp -r AppHotelariaWeb /xampp/htdocs/

# Importe o banco de dados
mysql -u root -p < database/hotel.sql

# Configure as credenciais em config/configuracoes.php
# DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, SECRET_KEY

# Acesse no navegador
http://localhost/AppHotelariaWeb
```

---

## Diferenciais Técnicos

| Aspecto | Implementação |
|---------|--------------|
| **Concorrência** | Row-level locking com `FOR UPDATE` dentro de transações ACID — elimina double-booking |
| **Segurança** | JWT com RBAC, Prepared Statements em 100% das queries, validação de inputs |
| **Arquitetura** | MVC puro sem framework — cada camada tem responsabilidade clara |
| **Performance** | Subqueries otimizadas para busca de disponibilidade com cálculo de capacidade |
| **API Design** | REST semântico com status codes corretos (200, 201, 400, 401, 404) |
| **Frontend** | SPA com state management para carrinho, sem dependência de frameworks |

---

## 📚 Aprendizados

Neste projeto aprendi o domínio em:

- Construção de APIs REST do zero, sem frameworks, entendendo cada peça do request lifecycle
- Controle transacional em bancos relacionais para garantir integridade em cenários concorrentes
- Implementação manual de autenticação JWT com role-based access control
- Desenvolvimento de SPAs em JavaScript puro com gerenciamento de estado
- Prevenção de vulnerabilidades (SQL Injection, acesso não autorizado)

---

## 👨‍💻 Autor

Desenvolvido por **Thayson da Silva Sousa**

[![LinkedIn](https://img.shields.io/badge/LinkedIn-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/thayson-sousa)
[![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/ThaysonSouza)

---

<div align="center">
  <sub>Projeto desenvolvido durante formação no Senac Sorocaba</sub>
</div>
