<?php

namespace App\Utilities;

class ValidData {

    public function validPassword($password) {
        $length = strlen($password);
        if ($length < 6 || $length > 16) {
            return false;
        }
        return true;
    }

    public function validLoginYzm($code) {
        $length = strlen($code);
        if ($length != 4) {
            return false;
        }
        $loginYzm = session("loginYzm");
        if ($code != $loginYzm) {
            return false;
        }
        return true;
    }

    public function validAdminName($name) {
        $length = strlen($name);
        if ($length > 30 || $length == 0) {
            return false;
        }
        return true;
    }

}
