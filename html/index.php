<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/theme/firstTheme/css/main.css">
    <link rel="stylesheet" href="./view/theme/firstTheme/css/autorisation/autorisation.css">
    <link rel="stylesheet" href="./view/theme/firstTheme/css/addFiles/addFiles.css">

    <title>SERVER HOME</title>
    <script>
        window.globalThis.CONTROL_STATE = {
            NO_LOGGED: "no-logged",
            JUST_LOGGED_IN: "just-logged-in",
        };

        window.globalThis.CURRENT_STATE = window.globalThis.CONTROL_STATE.NO_LOGGED;
    </script>
</head>

<body>
    <div class="content main-page">
        <div id="content-no-logged">
            <?php include './view/content/autorisation.php'; ?>
        </div>
        <div id="content-just-logged-in" class="hide">
            <?php include './view/content/addFiles.php'; ?>
        </div>
    </div>
    <script src="./control/mainControl.js"></script>
</body>

</html>