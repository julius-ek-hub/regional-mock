﻿# Regional Mock project (To whom it concerns)

## First thing first

- Clone or download this repository to your local machine
- Change the name of the folder containing the project to the name you prefer, default is `regional-mock`.
- Move the folder into XAMPP director (Specifically `htdocs` folder). So your project will be found in `C:\xampp\htdocs\`
- Now open the project folder using your fovorite editor (Sublime, VSCode etc).

- Go to [workers/var.php](https://github.com/julius-ek-hub/regional-mock/blob/main/workers/var.php) and change the following.

  - Set `$base_url` to `http://localhost/project-name` where `project-name` is whatever name you choose to give your project in step 2.
  - In case you want to open the website on other devices connected to the same network with your machine running the server, change `localhost` in the `$base_url` above to `IPv4:Port` where `Port` is the port in which the server is running on your computer, usually `80` (You will see it when you start your XAMPP - Apache server). `IPv4` is the `IPv4` of your machine on the network it is connected to. To know the `IPv4` of your machine,
    - Open the command prompt (Win + R, type cmd and hit Enter).
    - On the new terminal, Enter ipconfig /all
    - On the list provided, search for `IPv4`, usally in the form `192.168.X.X`
    - So to open on other deveices, the `$base_url` will look something like `http://192.168.X.X:80/project-name`.
  - In the `CONSTANTS`, change the values for `username`, `password` and `db` to match the values for your own database.
  - The `CONSTANTS['carousel_images']` are the list of images that slide on the landing page of the website. You can add more to the list or remove from the list and it will reflect automatically.
  - Leave the rest unchanged.
  - Save the changes.
  - Open XAMPP control panel (`C:\xampp\control-panel`) as administrator and start both `Apache` and `MySQL` server.
  - Now open the `$base_url` above in your browser.
