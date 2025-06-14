<?php

    namespace App\helper;

    class Flash {
        public static function set($type, $message) {
            $_SESSION['flash'] = ['type' => $type, 'message' => $message];
        }

        public static function display() {
            if (!empty($_SESSION['flash'])) {
                $flash = $_SESSION['flash'];
                echo '<div class="alert alert-' . htmlspecialchars($flash['type']) . '">';
                echo htmlspecialchars($flash['message']);
                echo '</div>';
                unset($_SESSION['flash']);
            }
        }
    }
?>