<?php

require_once '../Model/Model_Login.php';
session_start();
$Model_Login = new Model_Login();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {

    case "iniciar_sesion_admin":
        $cedula_admin = $_REQUEST['cedula_admin'];
        $email = $_REQUEST['email_admin'];

        $login_admin = $Model_Login->Get_Administrador_by_Cedula_Email($cedula_admin, $email);
        if ($login_admin == true) {
            $admin = $Model_Login->Get_Administrador($cedula_admin);
            $_SESSION['admin'] = serialize($admin);
            $_SESSION['cedula_admin'] = $cedula_admin;
            $_SESSION['login_admin'] = TRUE;
            //require '../View/';
            header('Location: ../View/MenuAdmin.php');
        } else {
            header('Location: ../../Error_inicio_sesion.php');
        }
        break;

    case "iniciar_sesion_cajero":
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $email = $_REQUEST['email_cajero'];

        $login_cajero = $Model_Login->Get_Cajero_by_Cedula_Email($cedula_cajero, $email);
        if ($login_cajero == true) {
            $cajero = $Model_Login->Get_Cajero($cedula_cajero);
            $_SESSION['cajero'] = serialize($cajero);
            $_SESSION['cedula_cajero'] = $cedula_cajero;
            $_SESSION['login_cajero'] = TRUE;
            header('Location: ../View/MenuCajero.php');
        } else {
            header('Location: ../../Error_inicio_sesion.php');
        }
        break;


    case "Menu_Admin":
        require '../View/MenuAdmin.php';
        header('Location: ../View/MenuAdmin.php');
        break;

    case "Menu_Cajero":
        header('Location: ../View/MenuCajero.php');
        break;


    case "Cerrar_Sesion_Admin":
        session_destroy();
        $_SESSION['login_admin'] = FALSE;
        header('Location: ../../index.php');
        break;

    case "Cerrar_Sesion_Cajero":
        session_destroy();
        $_SESSION['login_cajero'] = FALSE;
        header('Location: ../../index.php');
        break;
}