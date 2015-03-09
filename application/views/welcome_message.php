<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>

        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body{
                margin: 0 15px 0 15px;
            }

            p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container{
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <?php if(validation_errors()): ?>
            <div style="border: lpx solid red;">
                 <?php echo "Są błędy. zobacz niżej" ?>
        </div>
            <?php endif; ?>
            
            <form method="post">
                <table class="fullwidth border cell_input">
                    <tr>
                        <td width="300px"><label for="login">Login:</label> <span class="required right">*</span></td>
                        <td><input type="text" name="login" value="<?= set_value('login'); ?>" required /></td>
                        <td class="error"><?php echo form_error('login'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="password">Hasło:</label> <span class="required right">*</span></td>
                        <td><input type="password" id="pass" name="password" /></td>
                        <td class="error"><?php echo form_error('password'); ?></td>
                    </tr>
                </table>
                <div>
                    <input type='submit' value='Zaloguj'/>
                </div>
            </form>
        </div>
        
        <div>
            
            <a href="register" >Zarejestruj </a>
            
        </div>

    </body>
</html>