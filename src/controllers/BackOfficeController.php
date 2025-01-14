<?php
require_once ('Controller.php');
require_once ('src/models/AlbumManager.php');
require_once ('src/models/OrderManager.php');
require_once ('src/models/UserManager.php');
require_once ('src/models/CartManager.php');
require_once ('src/models/EventManager.php');

class BackOfficeController extends Controller
{
    public static function renderView($params)
    {
        if (!UserManager::CheckAdmin($_SESSION['id']))
            header('Location: /');
        if (!isset($params['tab']))
            $params['tab'] = 'products';
        if (!isset($params['page']))
            $params['page'] = 1;
        switch ($params['tab']) {
            case 'products':
                // j'ai encore découvert un truc, quelle aventure
                $params['products'] = AlbumManager::GetAlbums($params['limit'] ?? 10, $params['page'] ?? 1);
                $params['total'] = AlbumManager::GetAlbumsCount();
                foreach ($params['products'] as $product) {
                    $params['qteInCart'][$product->GetId()] = AlbumManager::GetQteInCart($product->GetId());
                }
                $params['nbPages'] = ceil($params['total'] / ($params['limit'] ?? 10));
                break;
            case 'orders':
                $params['orders'] = OrderManager::GetOrders($params['limit'] ?? 10, $params['page'] ?? 1);
                foreach ($params['orders'] as $order) {
                    $orderItems = $order->GetOrderItems();
                    $i = 0;
                    while ($i < 3 && $i < count($orderItems)) {
                        $params['ordersItems'][$order->GetId()][] = AlbumManager::GetAlbumInfo($orderItems[$i]['idAlbum']);
                        $i++;
                    }
                }
                $params['total'] = OrderManager::GetOrdersCount();
                $params['nbPages'] = ceil($params['total'] / ($params['limit'] ?? 10));
                break;
            case 'users':
                $params['users'] = UserManager::GetAllUsers($params['limit'] ?? 10, $params['page'] ?? 1);
                $params['total'] = UserManager::GetUsersCount();
                foreach ($params['users'] as $user) {
                    // Note pour plus tard : Prévoir où mettre les fonctions pour éviter un manque de cohérence comme ici
                    $params['usersCartCount'][$user->GetId()] = count(CartManager::GetCartItems($user->GetId()));
                    $params['usersOrdersCount'][$user->GetId()] = count(UserManager::GetUserOrders($user->GetId()));
                }
                $params['nbPages'] = ceil($params['total'] / ($params['limit'] ?? 10));
                break;
            case 'product-form':
                if (isset($params['id'])) {
                    $params['product'] = AlbumManager::GetAlbumInfo($params['id']);
                    $params['songs'] = AlbumManager::GetAlbumSongs($params['id']);
                    $params['events'] = EventManager::GetEvents();
                } else
                    header('Location: /back-office/hyper-secret/products');
                break;
        }
        $params['view'] = 'BackOffice';
        $scripts = ['back-office.js'];
        self::render('templates/admin/back-office.php', $params, $scripts);
    }

    public static function updateAlbum($params)
    {
        if (!UserManager::CheckAdmin($_SESSION['id'])) {
            header('Location: /');
            exit;
        }
        if (!isset($params['id']) || !isset($_POST['title']) || !isset($_POST['price']) || !isset($_POST['dateSortie']) || !isset($_POST['creator']) || !isset($_POST['creator-type']) || !isset($_POST['description']) || !isset($_POST['xfd']) || !isset($_POST['eventId']) || !isset($_POST['eventEdition'])) {
            var_dump($params['id']);
            var_dump($_POST);
        }
        AlbumManager::UpdateAlbum($params['id'], $_POST['title'], $_POST['price'], new DateTime($_POST['release-date']), $_POST['creator'], $_POST['creator-type'], $_POST['description'], $_POST['xfd'], $_POST['event'], $_POST['edition']);
        header('Location: /back-office/hyper-secret/product-form/' . $params['id'] . '?success=200');
    }

    public static function addSongToAlbum($params)
    {
        if (!UserManager::CheckAdmin($_SESSION['id'])) {
            header('Location: /');
            exit;
        }
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);
        if (!isset($data['artist']) || !isset($data['title']) || !isset($data['albumId']))
            header('Location: /back-office/hyper-secret/products');
        $idSong = AlbumManager::AddSongToAlbum($data['albumId'], $data['title'], $data['artist']);
        echo json_encode(['id' => $idSong]);
    }

    public static function EditAlbumCover($params)
    {
        if (!UserManager::CheckAdmin($_SESSION['id'])) {
            header('Location: /');
            exit;
        }
        if (!isset($_POST['albumId']) || !isset($_FILES['cover'])) {
            http_response_code(400);
            echo json_encode(['error' => 'missing data']);
            exit;
        }
        $finfo = new finfo();
        $mimeType = $finfo->file($_FILES['cover']['tmp_name'], FILEINFO_MIME_TYPE);
        if ($mimeType != 'image/jpeg') {
            http_response_code(400);
            echo json_encode(['error' => 'invalid file type']);
            exit;
        } else {
            $album = AlbumManager::GetAlbumInfo($_POST['albumId']);
            list($width, $height) = getimagesize($_FILES['cover']['tmp_name']);
            if ($width != 400 || $height != 400) {
                $newImg = imagecreatetruecolor(400, 400);
                $source = imagecreatefromjpeg($_FILES['cover']['tmp_name']);
                imagecopyresized($newImg, $source, 0, 0, 0, 0, 400, 400, $width, $height);
                imagejpeg($newImg, 'public/images/album/' . $album->getUriImage(), 100);
            } else {
                unlink('public/images/album/' . $album->getUriImage());
                rename($_FILES['cover']['tmp_name'], 'public/images/album/' . $album->getUriImage());
                http_response_code(200);
            }
            echo json_encode(['success' => '200']);
        }
    }
}
