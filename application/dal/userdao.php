<?php
require_once 'config.php';
require_once 'models/userentity.php';

class UserDAO {
    private $db_connection;

    public function __construct() {
        $this->db_connection = get_default_connection();
    }

    public function adduser(UserEntity $user) {
        $conn = mysqli_connect(
            $this->db_connection["cx_server"],
            $this->db_connection["cx_login"],
            $this->db_connection["cx_pwd"],
            $this->db_connection["cx_dbname"]
        );
        if (!$conn) {
            die("Connexion échouée : " . mysqli_connect_error());
        }

        // Échapper les valeurs
        $nom = mysqli_real_escape_string($conn, $user->utilisateur_nom);
        $login = mysqli_real_escape_string($conn, $user->utilisateur_login);
        $pwd = mysqli_real_escape_string($conn, $user->utilisateur_pwd);
        $email = mysqli_real_escape_string($conn, $user->utilisateur_email);
        $creation = $user->utilisateur_creation;

        $sql = "INSERT INTO utilisateur (utilisateur_nom, utilisateur_login, utilisateur_pwd, utilisateur_email, utilisateur_creation)
                VALUES ('$nom', '$login', '$pwd', '$email', '$creation')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    public function getuserlist($filtrenom = null) {
        $conn = mysqli_connect(
            $this->db_connection["cx_server"],
            $this->db_connection["cx_login"],
            $this->db_connection["cx_pwd"],
            $this->db_connection["cx_dbname"]
        );
        if (!$conn) {
            die("Connexion échouée : " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM utilisateur";
        if (!empty($filtrenom)) {
            $filtrenom = mysqli_real_escape_string($conn, $filtrenom);
            $sql .= " WHERE utilisateur_nom LIKE '%$filtrenom%'";
        }

        $result = mysqli_query($conn, $sql);
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new UserEntity();
            $user->id_utilisateur = $row['id_utilisateur'];
            $user->utilisateur_nom = $row['utilisateur_nom'];
            $user->utilisateur_login = $row['utilisateur_login'];
            $user->utilisateur_pwd = $row['utilisateur_pwd'];
            $user->utilisateur_email = $row['utilisateur_email'];
            $user->utilisateur_creation = $row['utilisateur_creation'];
            $users[] = $user;
        }
        mysqli_close($conn);
        return $users;
    }
}
?>