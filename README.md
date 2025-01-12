# Project Demo video
https://github.com/user-attachments/assets/a80b30dd-0abb-4cd6-9a3e-a53446e25764

# Laravel Project Setup Guide

## Prerequisites
Before you begin, make sure you have the following installed on your system:
- PHP >= 8.0
- Composer
- MySQL or any other database of your choice


---

## Installation Steps

### 1. Clone the Project Repository
Clone the repository to your local machine:
```bash
git clone https://github.com/akashsagar2805/customer-management-portal.git
cd customer-management-portal

```
2. Set Up the .env File
Copy the .env.example file to .env:
```bash
 cp .env.example .env
```
3.Update the .env file with your database credentials and other necessary configurations:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

```

4. Install Dependencies
   ```
   composer install
   ```
5. Run Migrations
   ```
   php artisan migrate
   ```
6. Create a Personal Access Client
   ```
   php artisan passport:client --personal
   ```
7. Serve the Application
   ```
   php artisan serve
   ```
Your application will be accessible at http://localhost:8000.

Please check attached Insomnia_2025-01-12.yaml file for api refernce
in project root directory and also index.html in public folder of project
for auto generated api documentation 



