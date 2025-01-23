## Running App Instructions

1. Clone the repository to your computer:
   ```sh
   git clone https://github.com/hrvojesesar/wunder-mobility-test.git
   ```
2. Open the project with editor like Visual Studio Code.
3. Run Apache and MySQL using XAMPP.
4. Import database **wunder_db.sql** to MySQL.
5. Using the terminal, go to project directory:  <br>
   `wunder-test`
6. Install all PHP dependencies: <br/>
   `composer install`
7. Copy the **.env.example** file and rename it to **.env**: <br>
   `cp .env.example .env`
8. Generate the application key: <br>
   `php artisan key:generate`
9. Start the Laravel development server: <br>
   `php artisan serve`
