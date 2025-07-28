
# Polis.online - тестовое задание

---

## 🚀 Запуск проекта 

### 1. Клонируйте репозиторий
```bash
git clone https://github.com/Dimiqhz/polis-test-task.git
cd blog
```

### 2. Запуск приложения
```bash
docker-compose build
docker-compose up -d
```

### 3. Установка зависимостей

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

### 🎉 Проект доступен по адресу:
- Frontend: [`http://localhost`](http://localhost)
- Backend API: [`http://localhost:8000/api`](http://localhost:8000/api)

---

## 🛠️ Команды управления приложением

| Команда                                             | Описание                      |
|-----------------------------------------------------|--------------------------------|
| `docker-compose up -d`                              | Запустить проект в фоне        |
| `docker-compose down`                               | Остановить проект              |
| `docker-compose exec backend php artisan migrate`   | Выполнить миграции БД          |
| `docker-compose exec backend php artisan db:seed`   | Заполнить базу тестовыми данными |
| `docker-compose logs -f backend`                    | Посмотреть логи Backend        |
| `docker-compose logs -f frontend`                   | Посмотреть логи Frontend       |

---

## 📌 Маршруты приложения (API):

| Метод | Маршрут                                | Описание                          |
|-------|----------------------------------------|-----------------------------------|
| GET   | `/api/articles`                        | Список всех статей                |
| GET   | `/api/articles/{id}`                   | Получить конкретную статью        |
| POST  | `/api/articles`                        | Создать новую статью              |
| POST  | `/api/articles/{id}/comments`          | Создать комментарий к статье      |

---

## 📑 Примеры API-запросов

### 1. Получить список статей
```bash
curl -X GET http://localhost:8000/api/articles
```

**Ответ:**
```json
[
  {
    "id": 1,
    "title": "Название статьи",
    "body": "Текст статьи"
  }
]
```

---

### 2. Создать новую статью
```bash
curl -X POST http://localhost:8000/api/articles \
-H "Content-Type: application/json" \
-d '{"title":"Новая статья","body":"Содержимое статьи"}'
```

**Ответ:**
```json
{
  "id": 2,
  "title": "Новая статья",
  "body": "Содержимое статьи"
}
```

---

### 3. Получить статью по ID
```bash
curl -X GET http://localhost:8000/api/articles/2
```

**Ответ:**
```json
{
  "id": 2,
  "title": "Новая статья",
  "body": "Содержимое статьи",
  "comments": [
    {
      "id": 1,
      "author_name": "Иван",
      "body": "Отличная статья!"
    }
  ]
}
```

---

### 4. Создать комментарий к статье
```bash
curl -X POST http://localhost:8000/api/articles/2/comments \
-H "Content-Type: application/json" \
-d '{"author_name":"Анна","body":"Спасибо за материал!"}'
```

**Ответ:**
```json
{
  "id": 2,
  "article_id": 2,
  "author_name": "Анна",
  "body": "Спасибо за материал!"
}
```

---

## 🧱 Стек технологий
- Backend: **Laravel 12** (PHP 8.2), **MySQL**
- Frontend: **React 19**, **TypeScript**, **Bootstrap 5**
- Контейнеризация: **Docker**, **docker-compose**
- Веб-сервер: **Nginx**

---

