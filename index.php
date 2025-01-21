<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="stili.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses tracker</title>

    </script>
</head>

<body>
    <div class="container">

        <div class="upper_content">
            <!--Pjesa e Navbar-->
            <img class="logo" src="./assets/img/logoo.png" />
            <div class="item_container">

                <a href="./index.php">
                    <li>Home</li>
                </a>
                <a href="./About0us/About-Us.php">
                    <li>About us</li>
                </a>
                <a href="./contact-us/contact-us.php">
                    <li>Contact us</li>
                </a>

                <a href="./features/features.php">
                    <li>Features</li>
                </a>
                <div class="burger_menu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </div>
            </div>

            <!--Sidebar-->
            <div class="sidebar_item_container">
                <div class="sidebar_content">

                    <a href="/index.php">
                        <li>Home</li>
                    </a>
                    <a href="./About0us/About-Us.php">
                        <li>About Us</li>
                    </a>

                    <a href="./contact-us/contact-us.php">
                        <li>Contact us</li>
                    </a>

                    <a href="./features/features.php">
                        <li>Features</li>
                    </a>
                    <div class="close_button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </div>
                </div>
            </div>

            <!--Log and Sign up Buttons-->
            <div class="login_and_signUp">
                <a href="log-in/login.php">
                    <button>Log in</button>
                </a>
                <a href="./Sing-up/sing-up.php">
                    <button>Sign Up</button>
                </a>
            </div>
        </div>
        <!--Pjesa e main contentit -->
        <div class="main">
            <div class="main_content">
                <div class="title">
                    <h1>Track your expenses easily</h1>
                </div>
                <p class="manage">Manage your finances effortlessly with our simple and powerful expense tracker</p>
            </div>
            <div class="cards_container">
                <!--These are the cards each of them contains different data-->
                <div class="card">
                    <div class="card_content">
                        <div class="img"><img src="./assets/img/icons8-overview-80.png"></div>
                        <div class="card_title">
                            <h1>Overview</h1>
                        </div>
                        <div class="card_text">
                            <p>Get a quick snapshot of your spending habits and financial health</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card_content">
                        <div class="img"><img src="./assets/img/icons8-budget-64.png"></div>
                        <div class="card_title">
                            <h1>Budget </h1>
                        </div>
                        <div class="card_text">
                            <p>Set budgets to control spending and stay on top of your finances</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card_content">
                        <div class="img"><img src="./assets/img/icons8-dollar-sign-48.png"></div>
                        <div class="card_title">
                            <h1>Transaction</h1>
                        </div>
                        <div class="card_text">

                            <p>View,categorize,and search through all your expenses in one place</p>
                        </div>
                    </div>
                </div>
            </div>
            <section class="contener">
                <div class="slider-wrapper">
                    <div class="slider">
                        <img id="slide-1" src="./assets/img/austin-distel-DfjJMVhwH_8-unsplash.jpg" alt="">
                        <img id="slide-2" src="./assets/img/towfiqu-barbhuiya-joqWSI9u_XM-unsplash.jpg" alt="">
                        <img id="slide-3" src="./assets/img/ibrahim-rifath-OApHds2yEGQ-unsplash.jpg" alt="">
                        <img id="slide-4" src="./assets/img/stephen-dawson-qwtCeJ5cLYs-unsplash.jpg" alt="">
                    </div>
                    <div class="slider-nav">
                        <a href="#slide-1"></a>
                        <a href="#slide-2"></a>
                        <a href="#slide-3"></a>
                        <a href="#slide-4"></a>
                    </div>
                </div>
            </section>
        </div>

        <!--Why choose us section-->
        <div class="why_choose_us">
            <div class="choose_us_content">
                <div class="choose_title">
                    <h1>Why Choose Us</h1>
                </div>
                <div class="choose_text">
                    <p>Our tracker provides all the tools you need to make smart financial decisions,without any hassle</p>
                </div>
            </div>
        </div>
        <!--What our user says-->

        <div class="what_our_user_says_container">
            <div class="what_our_user_says_content">
                <div class="titlee">
                    <h1>What Our Users Say</h1>
                </div>
                <div class="first_and_second_cards">
                    <div class=" card_style first_card">
                        <div class="first_card_content">
                            <div class="first_card_text">
                                <p> "This app has completely transformed the way I manage my expenses.Highly Recommend "</p>
                            </div>
                            <div class="author">
                                <p>- Jane Doe</p->
                            </div>
                        </div>
                    </div>

                    <div class="  card_style second_card">
                        <div class=" second_card_content">
                            <div class="second_card_text">
                                <p> "Ease to use and extremely helpful.I feel more in control of my finances"</p>
                            </div>
                            <div class="author">
                                <p> - John Smith</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--FAQ-->
        <div class="faq_container">
            <div class="faq_content">
                <div class="faq_title">
                    <h1>Frequently asked questions</h1>
                </div>
                <div class="items">
                    <li class="how_secure">How secure is my data ?</li>
                    <p class="first_item" id="first_item">Your data is protected with industry-standard encryption, ensuring that only you have access to your information. We prioritize your privacy and data security.</p>
                    <li class="is_there_a_free_version">Is there a free version?</li>
                    <p class="second_item" id="second_item">
                        Yes, our app offers a free version with essential features to help you track your expenses effectively. Upgrade options are available for additional features.
                    </p>
                    <li class="can_i_export_my_reports">Can i export my reports?</li>
                    <p class="third_item" id="third_item">Absolutely! You can easily export your reports in multiple formats, making it convenient to analyze your expenses outside the app.</p>
                </div>

            </div>

        </div>
        <!--Footeri-->
        <div class="footer">
            <p><span>© Copyright Expenses Tracker </span> </p>
        </div>
    </div>
    <script src="./index.js"></script>

</body>

</html>