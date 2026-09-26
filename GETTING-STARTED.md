# Getting started

## Requirements

- [XAMPP](https://www.apachefriends.org/) with Apache, PHP, and MySQL
- PHP version:
- Git

## 1. Clone the repository

**Mac users:** Open Terminal and run these commands. This clones the project directly into XAMPP's web folder, which is required for step 4 to work.

```
cd /Applications/XAMPP/xamppfiles/htdocs
git clone https://github.com/nisalindusara/fitnesshub.git
cd fitnesshub
```

**Windows users:** Open Command Prompt or Git Bash and run:

```
cd C:\xampp\htdocs
git clone https://github.com/nisalindusara/fitnesshub.git
cd fitnesshub
```

## 2. Create the database

1. Open the XAMPP Control Panel and click **Start** next to both **Apache** and **MySQL**. Both rows should turn green.
2. Open your browser and go to `http://localhost/phpmyadmin`.
3. Click **New** in the left sidebar.
4. In the **Database name** field, type `fitnesshub_db`.
5. In the **Collation** dropdown, select `utf8mb4_general_ci`.
6. Click **Create**.
7. Click on `fitnesshub_db` in the left sidebar to open it, then click the **Import** tab at the top.
8. Click **Choose File**, and select the SQL file located in the `database/` folder of the project you cloned.
9. Scroll down and click **Import**.

Full import instructions, including the command-line method, are in `database/README.md`.

## 3. Configure the application

1. Open the `config/` folder in the project.
2. Find the database connection file and open it in a text editor.
3. Make sure the database name, username, and password in that file match your local MySQL setup. By default, XAMPP's MySQL username is `root` with no password, so unless you changed this, leave the username as `root` and the password blank.

## 4. Set up the local domain (VirtualHost)

This makes the project load at `http://fitnesshub.local` in your browser instead of a long localhost path.

### Mac users

1. Open Terminal and run this command to open the VirtualHost config file in a text editor:

   ```
   open -a TextEdit /Applications/XAMPP/xamppfiles/etc/extra/httpd-vhosts.conf
   ```

2. Scroll to the bottom of the file and paste this in:

   ```
   <VirtualHost *:80>
       ServerName fitnesshub.local
       DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/fitnesshub/public"

       <Directory "/Applications/XAMPP/xamppfiles/htdocs/fitnesshub/public">
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

3. Save the file and close it.
4. Open Terminal and run this command to edit your hosts file:

   ```
   sudo nano /etc/hosts
   ```

5. Enter your Mac login password when prompted (you won't see it as you type — this is normal).
6. Use the arrow keys to move to the bottom of the file and add this line:

   ```
   127.0.0.1   fitnesshub.local
   ```

7. Press `Control + O`, then `Enter`, to save. Press `Control + X` to exit.
8. Go back to the XAMPP Control Panel, click **Stop** next to Apache, then click **Start** again.

### Windows users

1. Open File Explorer and navigate to `C:\xampp\apache\conf\extra\`.
2. Open `httpd-vhosts.conf` with Notepad.
3. Scroll to the bottom of the file and paste this in:

   ```
   <VirtualHost *:80>
       ServerName fitnesshub.local
       DocumentRoot "C:/xampp/htdocs/fitnesshub/public"

       <Directory "C:/xampp/htdocs/fitnesshub/public">
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

4. Save the file and close it.
5. Open File Explorer and navigate to `C:\Windows\System32\drivers\etc\`.
6. Right-click `hosts`, select **Open with**, choose **Notepad**, and confirm any prompt to run as Administrator.
7. Scroll to the bottom of the file and add this line:

   ```
   127.0.0.1   fitnesshub.local
   ```

8. Save the file. If it won't save, close Notepad, right-click Notepad in the Start menu, select **Run as administrator**, then open the file from within Notepad and try again.
9. Go back to the XAMPP Control Panel, click **Stop** next to Apache, then click **Start** again.

**Both platforms:** Open your browser and go to `http://fitnesshub.local`. You should see the app loading.

## 5. Folder permissions

PHP needs write access to `storage/logs/`, `storage/uploads/`, and the folders under `public/uploads/`. Without this, features like file uploads and logging will fail silently or throw permission errors.

**Mac users:** Open Terminal, navigate into the project folder, and run:

```
cd /Applications/XAMPP/xamppfiles/htdocs/fitnesshub
chmod -R 777 storage/logs storage/uploads public/uploads
```

**Windows users:** No action needed since XAMPP on Windows typically has write access to these folders by default. If you do get a permission error, right-click the `storage` folder, go to **Properties → Security**, and make sure your user account has **Full control**.
