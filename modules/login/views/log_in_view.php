<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/22/13
 * Time: 2:22 AM
 */


$running_page="shop";
?>
<section>

    <div style="margin-right:20%;margin-left: 20%;">

        <p>
            <?php
            if(!empty($connection_errors))
            {
                echo '<ul>'."\n";
                foreach($connection_errors as $e)
                {
                    echo '<li>'.$e.'</li>'."\n";
                }
                echo '</ul>';
            }
            ?>
        </p>
        <br>
        <br>

        <fieldset>
            <legend style="color: white;font-weight: normal;"> Log In </legend>
            <br>
            <br>
            <form action="" method="post" class="well">

                    <p>
                        <input class="form-control" type="text" name="user" placeholder="User" />
                        <?php if (isset($errors) && in_array(Connection::INVALID_USER, $errors)) echo '<span style="color:red;">Invalid user info.</span>'; ?>
                    </p>

                <br>

                    <p>
                        <input class="form-control" type="password" name="pwd" placeholder="Password" />
                        <?php if (isset($errors) && in_array(Connection::INVALID_PWD, $errors)) echo '<span style="color:red;">Invalid password.</span>'; ?>
                    </p>

                <br><br>
                <p>
                    <button class="btn btn-primary" type="submit" name="submit">Sign In</button>
                </p>


            </form>
            <br>
            <br>
        </fieldset>

    </div>
</section>
