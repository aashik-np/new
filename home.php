<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 0.8rem 1rem;
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
            letter-spacing: 1px;
            color: #fff !important;
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            padding: 0.5rem 1.2rem !important;
            margin: 0 0.3rem;
            transition: all 0.3s ease;
            border-radius: 4px;
        }
        .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,0.1);
            transform: translateY(-2px);
        }
        .content {
            flex: 1;
            padding: 4rem 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgMTBoNDBNMTAgMHY0ME0wIDEwaDQNMTAgMHY0MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZTZlNmU2IiBvcGFjaXR5PSIwLjMiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=');
        }
        .hero-section {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            padding: 3rem;
            background: rgba(255,255,255,0.95);
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }
        .hero-section h1 {
            font-weight: 600;
            color: #2a5298;
            margin-bottom: 1.5rem;
            font-size: 2.5rem;
        }
        .hero-section p {
            color: #6c757d;
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 2rem;
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: #1e3c72;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .feature-icon img {
            width: 30px;
            height: 30px;
        }
        @media (max-width: 768px) {
            .navbar-nav {
                margin-top: 1rem;
            }
            .nav-link {
                margin: 0.2rem 0;
            }
            .hero-section {
                padding: 2rem;
                margin: 1rem;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="home.php">NATIONAL SCHOOL OF SCIENCES</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">View Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            <div class="hero-section">
                <h1>WELCOME</h1>
                <p>Efficiently manage student records, track academic progress, and streamline school administration processes with our comprehensive management solution.</p>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="feature-icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjZmZmIj48cGF0aCBkPSJNMTIgMkM2LjQ4NiAyIDIgNi40ODYgMiAxMnM0LjQ4NiAxMCAxMCAxMCAxMC00LjQ4NiAxMC0xMFMxNy41MTQgMiAxMiAyem0xIDE1aC0ydi02aDJ2NnptMC04aC0yVjdoMnYyeiIvPjwvc3ZnPg==" alt="Manage">
                        </div>
                        <h4>Student Management</h4>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjZmZmIj48cGF0aCBkPSJNMTkgM0g1Yy0xLjEgMC0yIC45LTIgMnYxNGMwIDEuMS45IDIgMiAyaDE0YzEuMSAwIDItLjkgMi0yVjVjMC0xLjEtLjktMi0yLTJ6TTggN2g4djJIOFY3em00IDhINnYtMmg2djJ6bS0yLTNIOHYyaDJ2LTJ6bTktM0g2VjdoMTJ2MnptLTIgM2gtNHYyaDR2LTJ6Ii8+PC9zdmc+" alt="Records">
                        </div>
                        <h4>Academic Records</h4>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjZmZmIj48cGF0aCBkPSJNMTIgMkM2LjQ4NiAyIDIgNi40ODYgMiAxMnM0LjQ4NiAxMCAxMCAxMCAxMC00LjQ4NiAxMC0xMFMxNy41MTQgMiAxMiAyem0wIDJjMy4zMTMgMCA2IDIuNjg2IDYgNnMtMi42ODcgNi02IDYtNi0yLjY4Ni02LTYgMi42ODctNiA2LTZ6bS0zIDZsMy0yIDMgMi0xIDVIOHoiLz48L3N2Zz4=" alt="Secure">
                        </div>
                        <h4>Secure Platform</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>