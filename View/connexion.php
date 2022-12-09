<?php



class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset($pdo)) {
            try {
                $pdo = new PDO(
                    'mysql:host=localhost;dbname=pdocrud',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return $pdo;
    }
}
?>

