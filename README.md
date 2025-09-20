# 🔗 Laravel URL Shortener API

This is a REST API for shortening URLs, built with Laravel. It includes user authentication, URL management, and bonus features like visit tracking.

---

## ✅ Features Checklist

This project successfully implements the following features:

### 🔐 Core Features
- ✅ **User Registration** → `POST /api/register`
- ✅ **User Login** → `POST /api/login`
- ✅ **URL Shortening** → `POST /api/shorten` (Authenticated)
- ✅ **List User URLs** → `GET /api/urls` (Authenticated)


---

## 📦 Installation Instructions

Follow these steps to set up this project locally:

### 1. Clone the repository
```bash
git clone https://github.com/Omarabdullah99/assignment-4-shortURL
cd assignment-4-shortURL
2. Install PHP dependencies
composer install
3. Create environment file
cp .env.example .env
4. Generate app key
php artisan key:generate
5. Configure database
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
6. Run migrations
php artisan migrate
7. Start local server
php artisan serve
App will run at: http://127.0.0.1:8000

📖 API Documentation
All API endpoints expect and return JSON.

Header required for all requests:
Accept: application/json
1️⃣ Register New User
Endpoint: POST /api/register
Authentication: Public

✅ Request Body
{
  "name": "Person 2",
  "email": "person2@gmail.com",
  "password": "12345678"
}
📥 Success Response (201 Created)
{
  "message": "User create successfully",
  "user": {
    "name": "Person 2",
    "email": "person2@gmail.com",
    "updated_at": "2025-09-20T06:13:15.000000Z",
    "created_at": "2025-09-20T06:13:15.000000Z",
    "id": 3
  }
}
2️⃣ User Login
Endpoint: POST /api/login
Authentication: Public

✅ Request Body

{
  "email": "person2@gmail.com",
  "password": "12345678"
}
📥 Success Response (200 OK)

{
  "token": "4|pFt52OSmdhLdJPLe9zWlJNCwkIqn2gFXyxwQJ2Puf46ce4a8",
  "status": true,
  "user": {
    "id": 3,
    "name": "Person 2",
    "email": "person2@gmail.com",
    "created_at": "2025-09-20T06:13:15.000000Z",
    "updated_at": "2025-09-20T06:13:15.000000Z"
  }
}
Use the token from this response as a Bearer Token in the Authorization header for all authenticated routes.

3️⃣ Shorten a URL
Endpoint: POST /api/shorten
Authentication: Required (Bearer Token)

✅ Headers

Authorization: Bearer <your_token>
Accept: application/json
✅ Request Body

{
  "original_url": "https://www.person2another.com"
}
📥 Success Response

{
  "original_url": "https://www.person2another.com",
  "short_url": "http://127.0.0.1:8000/Zrcj39"
}
4️⃣ Get All URLs for Authenticated User
Endpoint: GET /api/urls
Authentication: Required (Bearer Token)

📥 Success Response
[
  {
    "id": 3,
    "user_id": 3,
    "original_url": "https://www.person2.com",
    "short_code": "J0s5S8",
    "visits": 0,
    "created_at": "2025-09-20T06:14:17.000000Z",
    "updated_at": "2025-09-20T06:14:17.000000Z"
  },
  {
    "id": 4,
    "user_id": 3,
    "original_url": "https://www.person2another.com",
    "short_code": "Zrcj39",
    "visits": 0,
    "created_at": "2025-09-20T06:14:25.000000Z",
    "updated_at": "2025-09-20T06:14:25.000000Z"
  }
]
