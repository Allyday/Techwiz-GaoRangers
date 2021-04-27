# FoodMate: A Cloud Kitchen Solution 
*FoodMate by Gao Rangers Team* requires PHP v7.3+ and XAMPP to run. 

## Team Members
Tran Hien Anh (Leader)
Giap Van Hien
Pham Huy Hoang
Nguyen Tien Duong
## Instructions for Local Deploy
Follow these steps to deploy:

1. Open up XAMPP. Start the **Apache** & **MySQL** services in the *Services* tab.
2. Go to the IP address specified in XAMPP's **General** tab.
3. Click **phpMyAdmin** at top right corner.
4. On the left side menu, click **New** to create a new database named **techwiz**.
5. Select the **Import** tab.
6. Upload the **database.sql** file in the project's folder. Click **Go**.
7. Open your favorite Terminal and run: `php artisan serve`
8. You should be done. Verify the deployment by navigating to [127.0.0.1:8000](127.0.0.1:8000) in your preferred browser.

## Test Accounts
##### Customer
Account: **testuser**
Password: **123456**
##### Restaurant Staff
Account: **_99testadmin**
Password: **123456**