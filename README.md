# 📚 Biblioteca Virtual

Projeto de biblioteca desenvolvido em **Laravel** com **Docker (Laravel Sail)** e **MySQL**.  
Este repositório contém um CRUD simples para gerenciamento de livros e gêneros.

---

## ✅ Pré-requisitos

Antes de começar, você e seu grupo precisam ter instalado:

- Docker Desktop  
- Git  
- PHP (opcional, apenas se quiser rodar comandos fora do Docker)  
- Composer (opcional, mas recomendado para gerenciamento local)  

---

## 🚀 Passo a passo para rodar o projeto

### 1. Clonar o repositório
Abra o terminal e rode:

```bash
git clone https://github.com/xdanielcvmr/projeto-biblioteca-uni.git
cd projeto-biblioteca-uni
```

---

### 2. Configurar variáveis de ambiente
Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure assim (valores padrão do Sail):

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

# Porta que a aplicação vai rodar
APP_PORT=8000

# Banco de dados (MySQL no container)
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

# Porta do Vite (frontend hot reload)
VITE_PORT=5174
VITE_APP_NAME="${APP_NAME}"
```

---

### 3. Subir os containers com Sail
Na raiz do projeto, rode:

```bash
./vendor/bin/sail up -d
```

Isso vai iniciar:  
- `laravel.test` → aplicação Laravel  
- `mysql` → banco de dados MySQL  

---

### 4. Instalar dependências
Ainda com os containers rodando, rode:

```bash
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail artisan key:generate
```

---

### 5. Rodar migrations
Crie as tabelas no banco:

```bash
./vendor/bin/sail artisan migrate
```

---

### 6. Acessar o projeto
- Aplicação Laravel: [http://localhost:8000](http://localhost:8000)  
- Banco MySQL rodando dentro do container na porta **3306**  

---

### 7. Criar link de storage para exibir imagens
Se as imagens de capa não aparecerem, rode:

```bash
./vendor/bin/sail artisan storage:link
```

---

## 🛠️ Comandos úteis

- Subir containers:  
  ```bash
  ./vendor/bin/sail up -d
  ```

- Derrubar containers:  
  ```bash
  ./vendor/bin/sail down
  ```

- Acessar logs:  
  ```bash
  ./vendor/bin/sail logs -f
  ```

- Executar comandos Artisan:  
  ```bash
  ./vendor/bin/sail artisan migrate
  ./vendor/bin/sail artisan tinker
  ```

---
