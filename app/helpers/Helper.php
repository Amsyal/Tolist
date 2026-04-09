<?php
function isLogin() {
    if( !isset($_SESSION['is_logged_in'])) {
        header(('Location: ' . BASEURL . 'Auth/login'));
        exit;
    }
}