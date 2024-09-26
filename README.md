<h1 align="center">Exam Quiz Mock Test Application</h1>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p> <p align="center"> <a href="https://github.com/Pijues01/mock-preatration-Quizz"><img src="https://img.shields.io/github/repo-size/Pijues01/mock-preatration-Quizz" alt="Repository Size"></a> <a href="https://github.com/Pijues01/mock-preatration-Quizz/releases"><img src="https://img.shields.io/github/v/release/Pijues01/mock-preatration-Quizz" alt="Latest Release"></a> <a href="https://github.com/Pijues01/mock-preatration-Quizz/blob/main/LICENSE"><img src="https://img.shields.io/github/license/Pijues01/mock-preatration-Quizz" alt="License"></a> </p>
<h2>About The Project</h2>
This is an exam and quiz preparation platform that allows users to take mock tests or quizzes to prepare for exams. Admins can create and manage exams, set time limits for both the full exam and individual questions and track user performance.
<h2>Features</h2>
<ul>
<label>For Users</label>
    <li>Take exams or quizzes for exam preparation.</li>
    <li>View reslits after completing tests.</li>
    <li>Timed tests with automatic submission.</li>
</ul>
<ul>
    <label>For Admins</label>
    <li>Create and manage exams, quizzes, or mock tests.</li>
    <li>Add, edit, and remove questions.</li>
    <li>Set time limits for individual questions and full exams.</li>
    <li>Track user performance and test activity.</li>
</ul>
<ul>
    <label>Built With</label>
    <li>Frontend: HTML, CSS, Bootstrap, JavaScript, jQuery</li>
    <li>Backend: Laravel 8, MySQL</li>
    <li>Data Handling: JSON, Ajax</li>
</ul>
<h2>Installation</h2>
To get a local copy of this project, follow these steps:
<ul>
    <label>Prerequisites</label>
    <li>Composer</li>
    <li>XAMPP or WAMP</li>
    <li>Node.js</li>
</ul>

<ol>
    <label for="">Setup</label>
    <li>Clone the repository:<span>git clone https://github.com/Pijues01/mock-preatration-Quizz.git</span></li>
    <li>Install dependencies: <span>composer install <span>npm install</span></span></li>
    <li>Environment setup:
        <ul>
            <li>Duplicate .env.example and rename it to .env.</li>
            <li>Set up your database connection and other variables in .env.</li>
        </ul>
    </li>
    <li>Generate application key: <span>php artisan key:generate</span></li>
    <li>Run database migrations: <span>php artisan migrate --seed</span></li>
    <li>Run the development server: <span>php artisan serve</span></li>
</ol>
<ul>
    <label>Usage</label>
    <p>After setting up, access the application at http://localhost:8000 in your browser.</p>
    <li>Users can register, log in, and take exams.</li>
    <li>Admins can manage exams and users through the admin dashboard.</li>
</ul>
<ul>
    <label>Contributing</label>
    <p>If you want to contribute to this project:</p>
    <li>Fork the repository.</li>
    <li>Create a new branch (git checkout -b feature/YourFeature).</li>
    <li>Commit your changes (git commit -m 'Add some feature').</li>
    <li>Push to the branch (git push origin feature/YourFeature).</li>
    <li>Open a pull request.</li>
</ul>
<h2>License</h2>
This project is licensed under the MIT License.
