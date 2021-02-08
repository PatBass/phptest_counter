<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 12/10/13
 * Time: 5:42 PM
 */

    session_destroy();
header('Location: ?module=login&action=log_in');

