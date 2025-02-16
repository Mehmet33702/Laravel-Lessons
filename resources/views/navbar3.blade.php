<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navbar</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
    }

    .navbar {
      background-color: #333;
      color: white;
      padding: 10px;
    }

    .navbar .logo a {
      color: white;
      text-decoration: none;
      font-size: 24px;
    }

    .nav-links {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nav-links .links {
      display: flex;
      list-style: none;
    }

    .nav-links .links li {
      margin: 0 15px;
    }

    .nav-links .links li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
    }

    .nav-links .sub-menu {
      display: none;
      position: absolute;
      background-color: #444;
      padding: 10px;
      border-radius: 5px;
      top: 40px;
      z-index: 1;
    }

    .nav-links .sub-menu li {
      margin: 10px 0;
    }

    .nav-links .sub-menu li a {
      color: white;
    }

    .nav-links .links li:hover .sub-menu {
      display: block;
    }

    .search-box {
      display: flex;
      align-items: center;
    }

    .search-box .input-box input {
      padding: 5px;
      border-radius: 5px;
      border: none;
    }
  </style>
</head>
<body>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">CodingLab</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">CodingLab</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
          <li><a href="#">HOME</a></li>
          <li>
            <a href="#">HTML & CSS</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Login Forms</a></li>
              <li><a href="#">Card Design</a></li>
              <li class="more">
                <span><a href="#">More</a>
                <i class='bx bxs-chevron-right arrow more-arrow'></i>
              </span>
                <ul class="more-sub-menu sub-menu">
                  <li><a href="#">Neumorphism</a></li>
                  <li><a href="#">Pre-loader</a></li>
                  <li><a href="#">Glassmorphism</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">JAVASCRIPT</a>
            <i class='bx bxs-chevron-down js-arrow arrow'></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Dynamic Clock</a></li>
              <li><a href="#">Form Validation</a></li>
              <li><a href="#">Card Slider</a></li>
              <li><a href="#">Complete Website</a></li>
            </ul>
          </li>
          <li><a href="#">ABOUT US</a></li>
          <li><a href="#">CONTACT US</a></li>
        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
        </div>
      </div>
    </div>
  </nav>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuIcon = document.querySelector('.bx-menu');
      const closeIcon = document.querySelector('.bx-x');
      const navLinks = document.querySelector('.nav-links');

      menuIcon.addEventListener('click', function() {
        navLinks.style.display = 'flex';
      });

      closeIcon.addEventListener('click', function() {
        navLinks.style.display = 'none';
      });

      // Dropdown menu functionality
      const arrowIcons = document.querySelectorAll('.arrow');
      arrowIcons.forEach(icon => {
        icon.addEventListener('click', function() {
          const subMenu = this.parentElement.querySelector('.sub-menu');
          subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
        });
      });
    });
  </script>
</body>
</html>
