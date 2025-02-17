# Era-Ecommerce

## 📌 Overview
**Era-Ecommerce** is a dynamic **e-commerce website** that allows users to browse products, add items to their cart, and place orders seamlessly. The platform is built using **HTML, CSS, JavaScript, jQuery, PHP, and MySQL** to deliver a smooth shopping experience.

## 🚀 Features
### **1. User Features**
- Browse and search for products
- Add products to the shopping cart
- Secure checkout and order placement
- User authentication (Login/Signup)
- Order history

## 🏗️ Technology Stack
- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Backend:** PHP
- **Database:** MySQL
- **Authentication:** PHP Sessions
- **Hosting:** Apache Server / XAMPP

## 🔧 Installation Guide
### **1. Clone the Repository**
```sh
git clone https://github.com/AkbarAli-Khorajiya/Era-ecommerce.git
cd era-ecommerce
```

### **2. Configure Database**
- Import the provided **SQL script** (`database.sql`) into **MySQL**
- Update the **database configuration** in `config.php`:
```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "era_ecommerce";
$conn = new mysqli($servername, $username, $password, $database);
```

### **3. Run the Application**
- Open **XAMPP** and start **Apache & MySQL**
- Place the project folder inside `htdocs`
- Open browser and visit: `http://localhost/era-ecommerce`

## 📞 Support & Contact
For any issues, reach out to us at [support@era-ecommerce.com](mailto:support@era-ecommerce.com).
