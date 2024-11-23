<?php
require_once "../lib/mysql.php";

$chat_list = $pdo->query("SELECT * FROM chat ORDER BY date DESC")->fetchAll(PDO::FETCH_OBJ);
if(count($chat_list)<1){
    echo "<div class='msg_empty'>
    <p>Повідомлень ще немає.</p>
    </div>";
    } else {
        foreach ($chat_list as $el) {
        $date = date("H:i", $el->date); 
        echo "<div class='msg'>
        <p><b>" .$el->username. " <small><i>" .$date. ": </i></small></b>" .$el->message. "</p>
        </div>";
        }
    }
        