Task: PHP/MySQL Form with AJAX Toggle
For this task, I was asked to create a small web application using PHP and MySQL where I could submit a person’s name and age, store that in a database, and later be able to toggle their status (between 0 and 1) using an AJAX-powered button—without refreshing the page.

Tools I Used:
XAMPP – For setting up the local server (Apache) and MySQL database.
phpMyAdmin – To create and manage the database and table easily.
Visual Studio Code – For writing and editing my PHP and HTML code.
GitHub Desktop – To version control the project and push it to GitHub.

What I Built:
  1. Database Setup
I created a database called summer_db in phpMyAdmin.
Inside it, I created a table called people with the following structure:
id: auto-increment primary key
name: VARCHAR
age: TINYINT
status: TINYINT (default 0)
The status field is what I use to toggle between 0 and 1 later.

  2. Project Files
I created a folder called summer_task in C:\xampp\htdocs\, which contains three main files:
config.php – Handles database connection using mysqli.
index.php – Handles form display, data submission, and shows the list of entries in a table. It also includes JavaScript to send toggle requests.
toggle.php – Handles AJAX requests to flip the status of any row (0 to 1 or 1 to 0) in real-time.

  3. The Web Page Itself
On the front end, I built a simple form that lets me submit a name and age.
Below that is a table listing all submitted entries with their ID, name, age, and current status.
Each row has a "Toggle" button. When clicked, it sends a background request (AJAX) to toggle.php, which flips the status in the database. The status in the table updates instantly without refreshing the page.

  4. Version Control
Once everything was working locally, I opened GitHub Desktop, added the project folder as a local repo, and published it to GitHub under the name summer-task.

Reflection:
This task helped me get hands-on experience with PHP, MySQL database handling, and using AJAX to interact with the server without full-page reloads. It also got me more comfortable with working inside XAMPP and setting up databases with phpMyAdmin. I now understand how to connect PHP files with MySQL and how to handle background data updates using JavaScript fetch calls.

