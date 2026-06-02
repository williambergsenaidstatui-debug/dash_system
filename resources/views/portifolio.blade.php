<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portifolio Website</title>
    <!--link to fronta awesome--> website for inserting social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!link to css file for styles -->
    <link rel="stylesheet" href="style.css">
    <style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .hero {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 80px;
            padding: 120px 40px 60px;
            min-height: 100vh;

        }
        .content {
            max-width: 600px;
            opacity: 1;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards 0.5s;
        }

        h1 {
            font-size: 3.5rem;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #ffffff);
            0%, #ffffff 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);


        }

        h2 {
            font-size: 1.8rem
            margin-bottom: 25px;
            color: #ffffff;
            opacity: 0.8;
            font-weight: 400;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #ffffff;

        }

        .typing-text {
            position: relative;
            display: inline-block;
            color: #ffffff;

        }

        .typing-text::after {
            content: '';
            position: absolute;
            right: -8px;
            animation: blink 0.7s infinite;
            color: #ffffff;
        }

        .cta-button {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards 0.8s;


        }
        .btn {
            padding: 15px 35px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display:flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;

        }
        .btn-primary {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            color: #ffffff;
            box-shadow: 0 5px 15px rgba(255, 126, 95, 0.3);

        }

        .btn-primary:hover {
           transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 126, 95, 0.5);
        }

        .btn-primary: before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent,
             rgba(255, 255, 255, 0.3));
            transform: skewX(-45deg);
            transition: all 0.5s ease;
        }


        .btn-primary:hover: before {
            left: 100%;
        }

        .bnt-secundary {
           border: 2px solid #ffffff;
            color: #ffffff;
        }

        .btn-secundary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
        }

        .social-icons {
            display: flex;
            gap: 20px;
            margin-top: 50px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards 1.1s;
        }


    </style>
</head>
<body>

</body>
</html>


    </style>
</head>
<body>
    <!-- meader with logo and navigation -->
    <header>
        <a href="#" class="logo">
            <i class="fas fa-code logo-icon"></i>
            <i class="fas fa-laptop-code logo-icon"></i>
            <span class="logo-text">Dash</span>
        </a>
        <nav>
            <div class="menu toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>




</body>
</html>
