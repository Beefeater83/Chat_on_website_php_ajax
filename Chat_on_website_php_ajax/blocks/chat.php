
    <div class="chat">
    <div id="chat_messages"></div>
        
        <input type="text" name="mess" id="mess" placeholder="Повідомлення">
        <button type="button" id='add_chat_mess' class="btn">Відправити</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
        $('#add_chat_mess').click(function() {
            let message = $('#mess').val();
            let login = "<?=$_COOKIE['login']?>";
             if(message =='') return;

            $.ajax({
                url: 'ajax/add_chat_mess.php',
                type: 'POST',
                cache: false,
                data: {
                    'message': message,
                    'login': login
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                        $('#mess').val('');
                    } 
                }
            });
        });

        function downloadMessages(){
            $.ajax({
                url: 'ajax/download_messages.php',
                type: 'GET',
                cache: false,
                success: function(data){
                    $('#chat_messages').html(data);
                }
            });
        }
        $(document).ready(function() {
         downloadMessages();
        });

        setInterval(downloadMessages, 1000);

        
    </script>