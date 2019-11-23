<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>Registro</title>
</head>

<body>
<div class="ui text container">
        <h1 class="title">FOR SALE</h1>
     
            <div class="ui two column very relaxed stackable grid">
                <div class="column">
                    <h1>Registrar cuenta</h1>
                    <form action="./controller.php?op=1" method="post" class="ui form">
                        <div class="field">
                            <label for="email">Email <br><input type="text" name="email" id="email" required></label>
                        </div>
                        <div class="field">
                            <label for="name">Nombre <br><input type="text" name="name" id="name" required></label>
                        </div>
                        <div class="field">
                            <label for="email">Password <br><input type="password" name="password" id="password" required></label><br>
                        </div>
                        <div class="field">
                            <label for="email">Repita el password <br><input type="password" name="password2" id="password2" required></label><br>
                        </div>
                        <div class="field">
                        <button type="submit" class="ui fluid large teal submit button">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
      
        <div class="column">

        </div>
        </div>
        <!-- https://semantic-ui.com/modules/sidebar.html -->
        <?php if (isset($_GET['msg'])) { ?>
        <p><?php echo $_GET['msg'] ?></p>
        <?php
     }?>
    </div>
</body>

</html>