<?php

namespace riki34\GameBundle\Topic;

use JDare\ClankBundle\Topic\TopicInterface;
use Ratchet\ConnectionInterface as Conn;
use Ratchet\Wamp\Topic;

class GameTopic implements TopicInterface {

    public function __construct() { }

    /**
     * @param \Ratchet\ConnectionInterface $conn
     * @param Topic $topic
     * @return void
     */
    public function onSubscribe(Conn $conn, $topic) {
        var_dump($conn);
        $topic->broadcast($conn->resourceId . " has joined " . $topic->getId());
    }

    /**
     * @param \Ratchet\ConnectionInterface $conn
     * @param Topic $topic
     * @return void
     */
    public function onUnSubscribe(Conn $conn, $topic) {
        $topic->broadcast($conn->resourceId . " has left " . $topic->getId());
    }

    /**
     * @param \Ratchet\ConnectionInterface $conn
     * @param Topic $topic
     * @param $event
     * @param array $exclude
     * @param array $eligible
     * @return mixed|void
     */
    public function onPublish(Conn $conn, $topic, $event, array $exclude, array $eligible) {
        $topic->broadcast(array(
            "sender" => $conn->resourceId,
            "topic" => $topic->getId(),
            "event" => $event
        ));
    }

    public function getName() {
        return 'game.topic';
    }
}