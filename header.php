
<header>
    <div class="header">
        <span class="header-text"><h1>Black&White Shop</h1></span>
    </div>
    <form method="get" action="search.php" >
        <input name="q" id="form-query" class="form-search" value="" placeholder="Поиск по товарам"style="
color: rgb(255, 255, 255);
border: 2px solid rgb(100, 117, 134);
padding: 5px 2px 5px 30px;
background: url(&quot;http://1.bp.blogspot.com/_hljKDuw-cxQ/SDEJPIeJG2I/AAAAAAAAGaM/N_Lu4sxLH_4/s00/lpDemoBuscador.gif&quot;) no-repeat scroll 5% 50% rgb(68, 85, 102);
position: absolute;
margin-top: 40px;
margin-left: 767px
"></form>
    <nav>
        <ul class="menu">
            <li><a href="/index.php">Home</a> </li>
            <li><a href="#">Личный кабинет</a>
            <ul class="submenu">
                <li><?php if(empty($_SESSION['login'])){ echo '<a href="/login.php">Войти</a>' ?>
                    <?php }else echo ("<a href=\"exit.php\">Выйти </a>") ?>
                <li><a href="office.php">Изменить информацию</a></li>
                <?php if(!empty($_SESSION['login']) && $_SESSION['login'] == "admin"){
                    echo ("<li><a href='adminpanel.php'>Админ-панель</a></li>");
                } else {}?>
            </ul>
            </li>
            <li><a href="/registration.php">Регистрация</a></li>
      <!--      <li><a href="#">Категории</a>
            <ul class="submenu">
                <li><a href="#">Все для дома</a></li>
                <li><a href="#">Телефоны</a></li>
            </ul> -->
            </li>
        </ul>
    </nav>
