<?php
    class seguridad {

        public function abrirSesion($usuarios) {
            $_SESSION["Email"] = $usuarios->Email;
            $_SESSION["Password"] = $usuarios->Password;
            $_SESSION["Id"] = $usuarios->Id;
            $_FILES["imagen"]['name'] = $usuarios->imagen;

        }

        public function cerrarSesion() {
            session_destroy();
        }

        public function get($variable) {
            return $_SESSION[$variable];
        }

        public function haySesionIniciada() {
            if (isset($_SESSION["Id"])) {
                return true;
            } else {
                return false;
            }
        }

        public function errorAccesoNoPermitido() {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuarios/formularioLogin", $data);
        }
    }
