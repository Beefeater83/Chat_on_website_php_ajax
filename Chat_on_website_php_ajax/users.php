<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Список всіх користувачив на сайті";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>
    
    <main>
     <h1>Список користувачив</h1> 
     <div class="users_block">
        <?php
        require_once "./lib/mysql.php";
        $users_list = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
        foreach($users_list as $user){
            echo "<div class='user' id='$user->id'>
                <div class='user_info'><b>Ім'я: </b>$user->name, <b>логін: </b>$user->login</div>
                <button onclick='return deleteUser($user->id);'>Видалити</button>
                </div>";
        }
        ?>
        <div class="error" id="error-block"></div>
     </div>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        function deleteUser(id) { 
                        
            $.ajax({
                url: 'ajax/deleteUser.php',
                type: 'POST',
                cache: false,
                data: {
                    'id': id,
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                        $('#' + id).remove();
                    } else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        };
        
      
    </script>
</body>

</html>