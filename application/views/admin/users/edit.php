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
            
            <form method="post" action="<?= base_url('admin/users/edit_post/'.$user->user_id); ?>" >
                <table class="fullwidth border cell_input">
                    <tr>
                        <td><label for="name">Imię i nazwisko:</label> <span class="required right">*</span></td>
                        <td><input type="name" id="pass" name="name" value="<?= set_value('name', $user->name) ?>" /></td>
                        <td class="error"><?php echo form_error('name'); ?></td>
                    </tr>
                    <tr>
                        <td width="300px"><label for="login">Login:</label> <span class="required right">*</span></td>
                        <td><input type="text" name="login" value="<?= set_value('login', $user->login); ?>" required /></td>
                        <td class="error"><?php echo form_error('login'); ?></td>
                    </tr>
                    <tr>
                        <td width="300px"><label for="login">Email:</label> <span class="required right">*</span></td>
                        <td><input type="text" name="mail" value="<?= set_value('mail', $user->email); ?>" required /></td>
                        <td class="error"><?php echo form_error('mail'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="repassword">Grupa:</label> <span class="required right">*</span></td>
                        <td><select name="group_id">
                                <?php foreach ($groups as $group): ?>
                                <option value="<?= $group->group_id; ?>" <?php echo set_select('group_id', $user->group_id, $user->group_id == $group->group_id); ?>><?php echo $group->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="error"><?php echo form_error('group_id'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="password">Hasło:</label> <span class="required right">*</span></td>
                        <td><input type="password" id="pass" name="password" /></td>
                        <td class="error"><?php echo form_error('password'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="repassword">Powtórz hasło:</label> <span class="required right">*</span></td>
                        <td><input type="password" id="pass2" name="password2" /></td>
                        <td class="error"><?php echo form_error('repassword'); ?></td>
                    </tr>
                </table>
                <div>
                    <input type='submit' value='ZAPISZ'/>
                </div>
            </form>
        </div>

    </body>
</html>