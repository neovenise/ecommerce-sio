<?php
require_once 'src/models/UserManager.php';
require_once 'Controller.php';
require_once 'src/models/Album.php';
require_once 'src/models/AlbumManager.php';
require_once 'src/models/CartManager.php';
require_once 'src/models/CheckoutManager.php';

class CheckoutController extends Controller
{
    public static function renderView($params)
    {
        // L'utilisateur doit se connecter pour commander.
        if (!isset($_SESSION['id'])) {
            // 511 peut-être plus approprié ? jsp
            http_response_code(403);
            header('Location: /login?err=403');
            exit();
        }
        $params['cart'] = [];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $params['cart'][] = array(
                    'album' => AlbumManager::GetAlbumInfo($item['idAlbum']),
                    'qte' => $item['qte']
                );
            }
            if (isset($params['err']) && $params['err'] == '404') {
                $params['error'] = 'Une erreur est survenue lors de la validation de votre commande. Veuillez réessayer.';
            }
            $params['total'] = CartManager::GetCartTotal();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
                    isset($_POST['mail']) &&
                    isset($_POST['phone']) &&
                    isset($_POST['adress']) &&
                    isset($_POST['postal']) &&
                    ctype_digit($_POST['postal']) &&
                    isset($_POST['city']) &&
                    isset($_POST['first-name']) &&
                    isset($_POST['last-name']) &&
                    isset($_POST['card-number']) &&
                    ctype_digit($_POST['postal']) &&
                    isset($_POST['exp-date']) &&
                    preg_match('/^(0[1-9]|1[0-2])\/[0-9]{2}$/', $_POST['exp-date']) &&
                    isset($_POST['security-code']) &&
                    ctype_digit($_POST['security-code']) &&
                    isset($_POST['card-name'])) {
                $_SESSION['checkout-confirming'] = true;
                $_SESSION['order-info']['mail'] = $_POST['mail'];
                $_SESSION['order-info']['phone'] = $_POST['phone'];
                $_SESSION['order-info']['adress'] = $_POST['adress'];
                $_SESSION['order-info']['adress-2'] = $_POST['adress-2'];
                $_SESSION['order-info']['postal'] = $_POST['postal'];
                $_SESSION['order-info']['city'] = $_POST['city'];
                $_SESSION['order-info']['first-name'] = $_POST['first-name'];
                $_SESSION['order-info']['last-name'] = $_POST['last-name'];
                $_SESSION['order-info']['card-number'] = $_POST['card-number'];
                $_SESSION['order-info']['exp-date'] = $_POST['exp-date'];
                $_SESSION['order-info']['security-code'] = $_POST['security-code'];
                $_SESSION['order-info']['card-name'] = $_POST['card-name'];
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $params['error'] = 'Veuillez remplir correctement tous les champs.';
                unset($_SESSION['checkout-confirming'], $_SESSION['order-info']);
            } else {
                unset($_SESSION['checkout-confirming'], $_SESSION['order-info']);
            }
            $scripts = [];
            if (!isset($_SESSION['checkout-confirming'])) {
                $scripts = ['checkout.js'];
            }
            self::render('templates/front/checkout.php', $params, $scripts);
        } else {
            header('Location: /cart');
            exit();
        }
    }

    public static function confirmPurchase($params)
    {
        if (isset($_SESSION['checkout-confirming'])) {
            $order = CheckoutManager::createOrder($_SESSION['order-info'], $_SESSION['id']);
            unset($_SESSION['cart'], $_SESSION['checkout-confirming'], $_SESSION['order-info']);
            header('Location: /order/' . $order);
            exit();
        } else {
            header('Location: /checkout?err=404');
            exit();
        }
    }
}
