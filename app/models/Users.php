<?php
class Users extends Model
{
    public function checkLogin($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Check hashed password first
            if (password_verify($password, $user['password'])) {
                return $user;
            }

            // Fallback to plain text comparison (if passwords are not hashed)
            if ($user['password'] === $password) {
                return $user;
            }
        }

        return false;
    }
}
