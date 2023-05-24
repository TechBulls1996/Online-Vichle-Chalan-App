<?php $MAINURL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        .container h2 {
            text-align: center;
        }

        .container input[type="text"],
        .container input[type="email"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        #errMsg {
            color: red;
        }

        .container button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }

        .container button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <h4 id="errMsg"></h4>
        <form method="post" id="lofrm">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    $("#lofrm").submit(function(e) {
        e.preventDefault();

        let name = $("#username").val();
        let email = $("#email").val();
        $.ajax({
            url: 'adminAjax.php',
            method: 'post',
            data: {
                name: name,
                email: email,
                login: 'login'
            },
            success: function(result) {
                //console.log(result);

                var remsg = $.parseJSON(result);
                //console.log(remsg);
                if (remsg.status == 200) {
                    window.location.href = "http://localhost/rajat-main/admin/admin.php";
                } else {
                    $("#errMsg").html(remsg.msg);
                    $("#lofrm")[0].reset();
                    setTimeout(() => {
                        $("#errMsg").html("");
                    }, 4000);
                }



            }
        })

    });
</script>

</html>