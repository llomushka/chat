<?php
    include_once("Chat.php");

    $chat = new Chat();

    function GetVar($name) {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
    }

    $action = GetVar('action');

    switch ($action) {
        case 'send':
            $name = GetVar('name');
            $text = GetVar('text');
            $result = $chat->addMessage($name, $text);
            echo(json_encode($result));
            break;
        case 'get':
            $result = $chat->getMessages();
            echo(json_encode($result));
            break;
        case 'update':
            $id = GetVar('id');
            $result = $chat->getLastMessages($id);
            echo(json_encode($result));
            break;
        default:
            break;
    }
?>