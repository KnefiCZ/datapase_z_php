<?php //Načtení všech knihoven z adresáře VENDOR
    require_once "vendor/autoload.php";

    use Illuminate\Database\Capsule\Manager as DB;

    $db = new DB;
    $db->addConnection(
        [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'ossp_wars',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]
        );

    $db->setAsGlobal();
    $db->bootEloquent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
    try {
        $users = DB::select("SELECT * FROM classes;");
    } catch (\Throwable $th) {
        echo "Nepovedl se SELECT z userů!" . "<br>";
        $users = array();
    }
        
        
        foreach ($users as $user) {
            echo $user->id_class . "<br>";
            echo $user->name;
        }

        $name = "Zombie";
try {
    $inserted = DB::insert("INSERaT INTO classes 
                                (name)
                                 VALUES(
                                     '$name');");

        if ($inserted == true) {
            echo "Přidáno!";
        }
} catch (\Throwable $th) {
    echo "Nebylo možné přidat!" . "<br>";
    $users = array();
}
    
    ?>
    
</body>
</html>