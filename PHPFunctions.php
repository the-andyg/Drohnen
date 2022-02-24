<?php
class checkUser
{
    function check($user)
    {
        if ($user === null) {
            return true;
        } else {
            return false;
        }
    }
}
?>