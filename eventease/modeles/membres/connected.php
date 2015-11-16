<?php
function connected() {
    if(isset($_SESSION['connected'])) {
        if($_SESSION['connected']) {
            return True;
        }
        else {
            return False;
        }
    }
    else {
        return False;
    }
}
