<?php

session_start();

require_once "php/dbConnection.php";
require_once "php/functions.php";

$db = getDbConnection();
$aboutMeText = getAboutMeText($db);
$displayAboutMeText = displayAboutMeText($aboutMeText);
$aboutMeQuote = getAboutMeQuote($db);
$displayAboutMeQuote = displayAboutMeQuote($aboutMeQuote);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kate Starks</title>
    <link rel='stylesheet' type='text/css' href='css/normalize.css'/>
    <link href="https://fonts.googleapis.com/css?family=Nova+Square|Open+Sans" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='css/styles.css'/>
    <script src="javascript/index.js" defer></script>
</head>

<body>
    <main>
        <div class="hero">
        <h1>Kate Starks {</h1>
        <p>Full Stack Developer</p>
        <p id="heroText"></p>
            <h1>}</h1>
        <a href="#about"><img class="heroArrow" src="IMG/heroArrow.png" alt="arrow to navigate down the site"></a>
        </div>
    </main>
    <nav>

        <ul>
            <li class="aboutNav"><h1><a href="#about">About</a></h1></li>
            <li class="projectsNav"><h1><a href="#projects">Projects</a></h1></li>
            <li class="contactNav"><h1><a href="#contact">Contact me</a></h1></li>
        </ul>
    </nav>
    <section id="about" class="about">
        <img src="IMG/about_illustration.svg" class="aboutImage" alt="Illustration of myself and my dog in silhouette">
        <div class="aboutContentLeft">
            <h1>" Welcome to my portfolio,</h1>
            <?php
            echo $displayAboutMeText;
            echo $displayAboutMeQuote;
            ?>
        </div>
        <div class="aboutContentRight">
            <h4 class="skillsListLineOne">Here are some other useful</h4>
            <h4>skills I've learnt along the way:</h4>
            <ul>
                <li class="teamWork">Team working</li>
                <li class="communication">Communication</li>
                <li class="organisation">Organisation</li>
                <li class="influencing">Influencing</li>
                <li class="emotionalIntelligence">Emotional intelligence</li>
            </ul>
        </div>
    </section>
    <section id="projects" class="projects">
        <h1>Example Projects</h1>
        <div class="project1">
            <div class="cover">
                <h1>Top Dog PHP App</h1>
                <a href="http://bit.ly/topdog-nmr" target="_blank"><h1>view here</h1></a>
                <a href="https://github.com/Mayden-Academy/2019-nmr-TopDog" target="_blank"><img src="IMG/GithubLogo.svg"></a>
            </div>
        </div>
        <div class="project2">
            <div class="cover">
                <h1>Responsive web page</h1>
                <a href="http://dev.maydenacademy.co.uk/students/2019/feb/kate/PilotShop/" target="_blank"><h1>view here</h1></a>
                <a href="https://github.com/katestarks/PilotShop" target="_blank"><img src="IMG/GithubLogo.svg"></a>
            </div>
        </div>
        <div class="project3">
            <div class="cover">
                <h1>Task Organisation PHP App</h1>
                <a href="http://dev.maydenacademy.co.uk/students/2019/feb/kate/toDoApp/public/" target="_blank"><h1>view here</h1></a>
                <a href="https://github.com/katestarks/toDoList" target="_blank"><img src="IMG/GithubLogo.svg"></a>
            </div>
        </div>
        <div class="project4">
            <div class="cover">
                <h1>Content Management System</h1>
<!--                <a href="" target="_blank"><h1>view here</h1></a>-->
                <a href="https://github.com/katestarks/Portfolio" target="_blank"><img src="IMG/GithubLogo.svg"></a>
            </div>
        </div>
        <div class="project5">
            <div class="cover">
                <h1>JavaScript Paint App</h1>
                <a href="http://dev.maydenacademy.co.uk/projects/2019Feb/2019-paint-app/" target="_blank"><h1>view here</h1></a>
                <a href="https://github.com/Mayden-Academy/2019-paint-app" target="_blank"><img src="IMG/GithubLogo.svg"></a>
            </div>
        </div>
        <div class="project6">
            <div class="cover">
                <h1>Logo created entirely in CSS</h1>
                <a href="http://dev.maydenacademy.co.uk/students/2019/feb/kate/MaydenAcademyLogo/" target="_blank"><h1>view here</h1></a>
                <a href="https://github.com/katestarks/AcademyLogo" target="_blank"><img src="IMG/GithubLogo.svg"></a>
            </div>
        </div>
    </section>
    <section id="contact" class="contactMe">
        <h1>Get in touch in the usual ways:</h1>
        <div>
            <a href="mailto:kfstarks@gmail.com"><img src="IMG/envelope.png" alt = "Envelope icon"></a>
            <a href="tel:07962-071468"><img src="IMG/phone.png" alt = "Telephone icon"></a>
            <a href="https://github.com/katestarks" target="_blank"><img src="IMG/GithubLogo.svg" alt = "Github icon"></a>
        </div>
        <div>
            <a href="https://www.linkedin.com/in/kate-starks/" target="_blank"><img src="IMG/linkedin.png" alt = "LinkedIn icon"></a>
            <a href="https://twitter.com/K8CodeandCoffee" target="_blank"><img src="IMG/twitter.png" alt = "Twitter icon"></a>
            <a href="https://www.instagram.com/picnic_bath/" target="_blank"><img src="IMG/instagram.png" alt = "Instagram icon"></a>
        </div>
        <p>I'm also happy to help with student talks; careers sessions or other ways I can get involved in the Bath, UK area.</p>
        <p>As well as coding, my favourite topics include swapping travel stories, solving dog behaviour and training issues, comparing photography portfolios or talking about behavioural economics; all areas of amateur enthusiasm for me.</p>
    </section>
    <footer>
        <a href="login_page.php"><img class="cmsIcon" src="IMG/padlock.svg" alt="padlock, link to admin login"></a>
    </footer>
</body>
</html>
