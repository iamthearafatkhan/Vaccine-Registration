# COVID-19 Vaccine Registration System 💉

**A web-based platform designed to streamline the COVID-19 vaccine registration process.**

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

---

## 📖 Overview

The **COVID-19 Vaccine Registration System** is a comprehensive web application that allows citizens to register for vaccinations, select preferred centers, and track their registration status. 

Equipped with a powerful administrative dashboard, healthcare officials can manage appointments, monitor vaccine stock levels, and generate detailed reports to ensure a smooth and organized vaccination rollout.

---

## ✨ Key Features

### 👤 User Panel
- **Secure Authentication:** User registration and login for citizens.
- **Information Verification:** Input key details (NID, Date of Birth, Contact Info) to verify eligibility.
- **Center Selection:** Browse and choose preferred hospitals or vaccination centers.
- **Status Tracker:** Check real-time registration status and scheduled dose dates.
- **Downloadable Certificate:** Generate and print a PDF registration card or dose status certificate.

### 🛡️ Admin Panel
- **Comprehensive Dashboard:** Overview of total registrations, vaccinated individuals, and available centers.
- **Appointment Management:** Schedule and assign dose dates for registered citizens.
- **Inventory Management:** Add, edit, or remove vaccination centers and update vaccine stock levels.
- **Reporting:** View and export detailed registration and vaccine logs for health officials.

---

## 🛠️ Tech Stack

| Component | Technology | Purpose |
| :--- | :--- | :--- |
| **Frontend** | HTML5, CSS3, JavaScript | Responsive UI and client-side interactions. |
| **Backend** | PHP (or Hack) | Server-side logic, authentication, and API routing. |
| **Database** | MySQL | Relational database to store user data, appointments, and stock levels. |

---

## 📋 Prerequisites

To run this project locally, ensure you have the following installed:

- **XAMPP** / **WAMP** / **LAMP** stack (with Apache and PHP support)
- **MySQL Database** (Usually included with XAMPP/WAMP)
- A modern web browser (Chrome, Firefox, Edge, etc.)

---

## 🚀 Installation & Setup

Follow these steps to get the project running on your local machine:

### 1. Clone the Repository
Clone this project directly into your local server's root directory (e.g., `htdocs` for XAMPP or `www` for WAMP):
```bash
cd C:\xampp\htdocs
git clone https://github.com/iamthearafatkhan/covid-vaccine-system.git
```
### 2. Start Your Local Server
Open your XAMPP or WAMP control panel and start both the Apache and MySQL modules.

### 3. Set Up the Database
>> Open your browser and go to http://localhost/phpmyadmin/
>> Create a new database named vaccine_db (or whatever matches your project config).
>> Click on the Import tab, choose the .sql file included in the project repository, and click Go.

### 4. Configure the Database Connection
Locate the database configuration file in the project folder (usually config.php, db.php, or database.php). Update the credentials to match your local setup:

```php
<?php
$servername = "localhost";
$username = "root";     // Default for XAMPP
$password = "";         // Default is blank for XAMPP
$dbname = "vaccine_db"; // Your database name
?>
```
### 5. Run the Application
Open your web browser and navigate to:
```text
http://localhost/covid-vaccine-system/
```

---

## 👤 Author

Arafat Khan

💻 GitHub: @iamthearafatkhan

💼 LinkedIn: iamthearafatkhan

🌐 Portfolio: arafatkhan.vercel.app

---

## 📄 License
This project is open-source and available under the MIT License.
Feel free to use, modify, and distribute it as you see fit.
