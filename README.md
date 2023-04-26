
# Job Market
Job Market is a platform that intended for employers and job seekers, to connect and find the right match for their needs.
Employers can post Job openings, explore resumes of different profiles. Job seekers on the other hand can explore job postings and apply for positions that better fit their profiles.
Our job market website leverages the power of Single Page Application (SPA) technology to deliver an engaging user experience. Built using Vue.js, the website loads quickly and efficiently, with no page refreshes or delays.  



## Acknowledgements

 - The design of the platform was integrated using [Tailwind CSS](https://tailwindcss.com) and inspired from [Tailwind UI](https://tailwindui.com) components
 - Most of the SVG icons of the website uses [HeroIcons](https://github.com/matiassingers/awesome-readme)


## Installation

Install my-project with npm

```bash
  cd my-project
```
To install the Job Market Platform, follow these steps:

  - Clone the repository to your local machine and go to project's folder.
    ```bash
     cd my-project
    ```
  - To install the required PHP dependencies.
    ```bash
    composer install
    ```
  - To install the required JavaScript dependencies.
    ```bash
    npm install
    ```

   - Rename the .env.example file to .env, and update the DB_* variables to match your local database settings.
   - Generate a new application key
     ```bash
        php artisan key:generate
     ```

   - To create the necessary database tables.
     ```bash
        Run php artisan migrate
     ```
   - Compile the assets and start the development server.
     ```bash
     Run npm run dev
     ```
 
The Platform should now be accessible at http://localhost:8000.
    