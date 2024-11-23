<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<header>
    <span class="logo">Blog Master</span>
    <nav class="full">
        <a href="/">Головна</a>
        <a href="/contacts.php">Контакти</a>
        <?php if (isset($_COOKIE['login'])) : ?>
            <a href="/add-article.php">Додати статтю</a>
          <!--  <a href="/users.php">Список користувачив</a>  -->
            <a href="/login.php" class="btn">Кабінет користувача</a>
        <?php else : ?>
            <a href="/login.php" class="btn">Увійти</a>
            <a href="/register.php" class="btn">Реєстрація</a>
        <?php endif; ?>
    </nav>
            
    <div class="bars fa-solid fa-bars" onclick="showmenu()"></div>
    <div class="arrow fa-solid fa-arrow-up" onclick="hidemenu()"></div>
    
    <nav class="mobile ">
        <a href="/">Головна</a>
        <a href="/contacts.php">Контакти</a>
        <?php if (isset($_COOKIE['login'])) : ?>
            <a href="/add-article.php">Додати статтю</a>
            <a href="/login.php" >Кабінет<br> користувача</a>
        <?php else : ?>
            <a href="/login.php" >Увійти</a>
            <a href="/register.php">Реєстрація</a>
        <?php endif; ?>
    </nav>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function handleNavigation() {
            let screenWidth = $(window).width();
            if(screenWidth > 900){
                $('.full').show();
                $('.mobile').hide();
                $('.bars').hide();
                $('.arrow').hide();
            } else {
                $('.full').hide();
                if($('.mobile').is(':visible')){
                    $('.bars').hide();
                    $('.arrow').show();
                }else{
                    $('.bars').show();
                    $('.arrow').hide();
                }
            }
        }
        
        handleNavigation();
        
        $(window).resize(function() {
            handleNavigation();
        });
        $('.arrow').hide();
    });
  
    function showmenu(){
       $('.mobile').show(600);
       $('.bars').hide();
       $('.arrow').show();
    }
    function hidemenu(){
       $('.mobile').hide(600);
       $('.arrow').hide();
       $('.bars').show();
    }
    

</script>