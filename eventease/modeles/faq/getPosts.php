<?php
function getPosts($id = False) {
    if($id) {
        $where = " WHERE id = :id";
    }
    else {
        $where = '';
    }

    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $req = $bdd -> prepare("SELECT * FROM faq".$where);

    $param = ($id?['id'=>$id]:[]);
    // var_dump($param);
    $req -> execute($param);
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);

    if($id) {
        var_dump($res);
        return $res[0];
    }
    else {
        return $res;
    }
}
