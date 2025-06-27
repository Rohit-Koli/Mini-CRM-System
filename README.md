---

## 📘 MINI CRM SYSTEM

A simple CRM (Customer Relationship Management) web app built using **Core PHP**, **MySQL**, and **Bootstrap**. This project simulates real-world backend development scenarios like authentication, session management, CRUD operations, and data validation.

---

## 🔧 Features

* ✅ **User Authentication**

  * Hardcoded login (`admin@test.com` / `admin123`)
  * Logout with session handling
  * Protected routes (redirects if not logged in)

* ✅ **Dashboard**

  * Displays welcome message
  * Shows all stored clients in a table

* ✅ **CRUD Operations for Clients**

  * Add new client
  * Edit existing client
  * Delete client
  * View all clients

* ✅ **Search Functionality**

  * Live search by name, email, mobile, or company
  * Highlights matched record
  * Displays "No record found" if no match

* ✅ **Form Validations**

  * Mobile number: must be exactly 10 digits
  * Required fields: name, email, mobile

---

## 💡 Tech Stack

| Layer    | Technology               |
| -------- | ------------------------ |
| Backend  | PHP (Core, no framework) |
| Database | MySQL                    |
| Frontend | HTML, CSS, Bootstrap 5   |
| Session  | PHP Sessions             |

---

## 🔐 Login Credentials

```
Email: admin@test.com
Password: admin123
```

> These are hardcoded inside `login.php` — no registration needed.

---

## 📁 Project Structure

```
/crm
│
├── includes/
│   ├── auth.php
│   └── dbconnect.php
│
├── clients/
│   ├── add.php
│   ├── edit.php
│   └── delete.php
│
├── index.php         ← Dashboard
├── login.php         ← Login form
├── logout.php        ← Ends session
├── README.md
└── crmdb.sql           ← SQL file for database
```

---

## 🛠️ How to Run the Project

1. **Clone the Repository**

   ```bash
   git clone https://github.com/YOUR_USERNAME/mini-crm.git
   cd mini-crm
   ```

2. **Setup MySQL Database**

   * Create a database named `crmdb`
   * Import the `crmdb.sql` file into it:

     ```sql
     SOURCE path/to/crmdb.sql;
     ```

3. **Configure Environment**

   * Update DB credentials in `includes/dbconnect.php` if necessary

4. **Run on Localhost**

   * Place project inside `htdocs` (XAMPP) or `www` (WAMP)
   * Start Apache & MySQL
   * Visit: `http://localhost/crm/login.php`

---

## 🔍 SQL Table Structure (clients)

```sql
CREATE TABLE `clients` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `mobile` VARCHAR(10) NOT NULL,
  `company` VARCHAR(255),
  `notes` TEXT
);
```

---

## 📝 Optional Improvements

* Add registration
* Pagination and sorting
* Export to CSV/PDF
* Add admin panel with more controls

---

## 📌 Notes

* This is a learning project, not production-ready
* Built to demonstrate clean backend logic using Core PHP and MySQL
* UI kept simple with Bootstrap 5

---

## 📄 License

This project is open-source and free to use for learning purposes.

---

Let me know your GitHub username and repo URL if you'd like this `README.md` customized and committed into your project folder!
