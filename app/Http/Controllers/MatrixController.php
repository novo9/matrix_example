<?php

namespace App\Http\Controllers;

use App\Matrix\Message;
use App\Matrix\RoomsResource;
use Illuminate\Http\Request;
use Updivision\Matrix\Facades\Matrix;
use Updivision\Matrix\Resources\UserData;
use Updivision\Matrix\Resources\UserSession;

class MatrixController extends Controller
{
    //
    public function index()
    {
        /** @var UserSession $session */
        $session = Matrix::session();
        $session->login('i_mortulev', '6FZuZ8Smiq');
//        /** @var UserData $user */
//        $user = Matrix::user();
//        $d = $user->getProfile('@o_samoylenko:matrix.bingo-boom.ru');
        $matrix = app('matrix');
        $roomResource = new RoomsResource( $matrix );
        var_dump($roomResource->getJoinedRooms());
        var_dump($roomResource->getRoomState('!kILGMGBmiZseGqsbfG:matrix.bingo-boom.ru'));

        /*$roomResource->sendMessage(
            '!kILGMGBmiZseGqsbfG:matrix.bingo-boom.ru',
            new Message('Test Notifuce', Message::TYPE_NOTICE )
        );*/
    }
}
