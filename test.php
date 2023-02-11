<?php
    function check($str) {
        $pattern = '/^[a-zA-Z0-9@]{6,20}$/';
        if(preg_match($pattern,$str)) {
            return true;
        } else {
            return false;
        }
    }

    echo check('asasa@sasa');



?>