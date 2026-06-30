# Attorney Lite

**Attorney Lite** is a clean and easy-to-use WordPress theme made for legal and professional websites. It works well as a **Free Attorney WordPress Theme** for individual lawyers, small law offices, and legal advisors who want a simple online presence. The design is clear and focused on information.

This theme can also be used as an [**Attorney WordPress Theme**](https://www.sktthemes.org/shop/attorney-wordpress-theme/) for legal services, case details, and client information. Pages are easy to manage and content stays readable. You can add practice areas, profiles, and contact details without effort.

Attorney Lite also fits as a [**Lawyer WordPress Theme**](https://www.sktthemes.org/product-category/lawyer/ ) for advocates and legal consultants. The layout is simple, professional, and works smoothly on all devices. It helps you create a trusted and organized website using easy language and a straightforward design.

---

## 🚀 Local Development Setup (XAMPP)

### Requirements
- [XAMPP](https://www.apachefriends.org/) with Apache & MySQL running
- PHP 7.4+
- WordPress 5.0+

### Steps

**1. Install XAMPP**
Download and install from https://www.apachefriends.org/. Start **Apache** and **MySQL** from the XAMPP Control Panel.

**2. Download WordPress**
Download from https://wordpress.org/download/ and extract to:
```
C:\xampp\htdocs\attorney\
```

**3. Create Database**
```bash
mysql -u root -e "CREATE DATABASE attorney_db;"
```
Or open http://localhost/phpmyadmin and create `attorney_db`.

**4. Configure WordPress**
Visit http://localhost/attorney and complete the setup:
- Database: `attorney_db`
- Username: `root`
- Password: *(leave blank)*
- Host: `localhost`

**5. Import Database**
Import the included `attorney_db.sql` via phpMyAdmin or run:
```bash
mysql -u root attorney_db < attorney_db.sql
```

**6. Install the Theme**
- Go to **Appearance → Themes → Add New → Upload Theme**
- Upload `Attorney-Lite.zip` (zip this repository folder)
- Activate the theme

**7. Install Required Plugins**
- Go to **Appearance → Install Plugins**
- Install & activate: **Elementor** and **SKT Templates**

**8. Import Demo Content**
- Go to **SKT Templates** in the WP admin sidebar
- Find the Lawyer/Attorney template and click **Import**

### Local URLs
- 🌐 Site: http://localhost/attorney/wordpress-7.0/wordpress
- 🔧 Admin: http://localhost/attorney/wordpress-7.0/wordpress/wp-admin

---

## 📁 Files
| File | Description |
|------|-------------|
| `style.css` | Theme stylesheet & metadata |
| `functions.php` | Theme functions & plugin registration |
| `front-page.php` | Homepage template |
| `attorney_db.sql` | Database export for local setup |

---

## 🔗 Links
- [Live Demo](https://sktperfectdemo.com/themepack/lawyer/)
- [Documentation](https://www.sktthemesdemo.net/documentation/skt-coach-doc/)
- [Pro Version](https://www.sktthemes.org/shop/attorney-wordpress-theme/)

