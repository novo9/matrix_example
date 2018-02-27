<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 27/02/2018
 * Time: 17:17
 */

namespace App\Matrix;


use Updivision\Matrix\Resources\AbstractResource;

class RoomsResource extends AbstractResource
{
    public function getStatus()
    {
        return $this->matrix()->request(
            'GET',
            $this->endpoint('sync'),
            [],
            [
                'access_token' => $this->data['access_token']
            ]
        );
    }
    public function getRoomState($roomId)
    {
        return $this->matrix()->request(
            'GET',
            $this->endpoint('rooms/'.$roomId.'/state/m.room.name/'),
            [],
            [
                'access_token' => $this->data['access_token']
            ]
        );
    }
    public function getJoinedRooms()
    {
        return $this->matrix()->request(
            'GET',
            $this->endpoint('joined_rooms'),
            [],
            [
                'access_token' => $this->data['access_token']
            ]
        );
    }

    public function sendMessage($roomId, Message $message)
    {
        if ($this->check()) {
            $roomString = sprintf('rooms/%s/send/m.room.message', $roomId);

            return $this->matrix()->request('POST', $this->endpoint($roomString), [
                'msgtype' => $message->getType(),
                'body' => $message->getBody()
            ], [
                'access_token' => $this->data['access_token']
            ]);
        }
    }
}