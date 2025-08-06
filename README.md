
# A simple RestAPI blog created using React, Laravel and Docker

A blog based on RestAPI and created using Laravel, React and Docker. The project was performed as a test task.

## 🚀 Project Launch

### 1. Clone the repository
```bash
git clone https://github.com/Dimiqhz/Simple-Laravel-React-Blog.git
cd Simple-Laravel-React-Blog
```

### 2. Start the application
```bash
docker-compose build
docker-compose up -d
```

### 3. Install dependencies

#### Backend (Laravel)
```bash
docker-compose exec backend composer install
docker-compose exec backend cp .env.example .env
docker-compose exec backend php artisan key:generate
docker-compose exec backend php artisan migrate --seed
```

#### Frontend (React)
```bash
docker-compose exec frontend npm install
```

### 🎉 Project available at:
- Frontend: [`http://localhost`](http://localhost)
- Backend API: [`http://localhost:8000/api`](http://localhost:8000/api)

---

## 🛠️ Application Management Commands

| Command                                             | Description                        |
|-----------------------------------------------------|------------------------------------|
| `docker-compose up -d`                              | Run the project in the background  |
| `docker-compose down`                               | Stop the project                   |
| `docker-compose exec backend php artisan migrate`   | Run database migrations            |
| `docker-compose exec backend php artisan db:seed`   | Seed the database with test data   |
| `docker-compose logs -f backend`                    | View backend logs                  |
| `docker-compose logs -f frontend`                   | View frontend logs                 |

---

## 📌 Application Routes (API):

| Method | Route                                  | Description                        |
|--------|----------------------------------------|------------------------------------|
| GET    | `/api/articles`                        | Get all articles                   |
| GET    | `/api/articles/{id}`                   | Get a specific article             |
| POST   | `/api/articles`                        | Create a new article               |
| POST   | `/api/articles/{id}/comments`          | Post a comment to an article       |

---

## 📑 API Request Examples

### 1. Get all articles
```bash
curl -X GET http://localhost:8000/api/articles
```

**Response:**
```json
[
  {
    "id": 1,
    "title": "Article title",
    "body": "Article content"
  }
]
```

---

### 2. Create a new article
```bash
curl -X POST http://localhost:8000/api/articles \
-H "Content-Type: application/json" \
-d '{"title":"New Article","body":"Article content"}'
```

**Response:**
```json
{
  "id": 2,
  "title": "New Article",
  "body": "Article content"
}
```

---

### 3. Get article by ID
```bash
curl -X GET http://localhost:8000/api/articles/2
```

**Response:**
```json
{
  "id": 2,
  "title": "New Article",
  "body": "Article content",
  "comments": [
    {
      "id": 1,
      "author_name": "Ivan",
      "body": "Great article!"
    }
  ]
}
```

---

### 4. Post a comment to an article
```bash
curl -X POST http://localhost:8000/api/articles/2/comments \
-H "Content-Type: application/json" \
-d '{"author_name":"Anna","body":"Thanks for the material!"}'
```

**Response:**
```json
{
  "id": 2,
  "article_id": 2,
  "author_name": "Anna",
  "body": "Thanks for the material!"
}
```

---

## 🧱 Tech Stack
- Backend: **Laravel 12** (PHP 8.2), **MySQL**
- Frontend: **React 18**, **TypeScript**, **Bootstrap 5**
- Containerization: **Docker**, **docker-compose**
- Web Server: **Nginx**

