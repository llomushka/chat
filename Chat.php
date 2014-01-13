<?php

class Chat {

    function __construct() {
        $messages = new domDocument("1.0", "utf-8");

        if (!($messages->load("log.xml"))) {

            $root_messages = $messages->createElement("messages");
            $messages->appendChild($root_messages);
            $messages->save("log.xml");

        }
    }

    private function getLastId() {

        $messages = new domDocument("1.0", "utf-8");
        $messages->load("log.xml");

        $root = $messages->documentElement;
        $childs = $root->childNodes;
        $id = $childs->length;

        return $id;

    }

    function addMessage($name, $text) {

        $time = date("m.d.y H:i:s");

        $messages = new domDocument("1.0", "utf-8");
        $messages->load("log.xml");

        $message = $messages->createElement("message");

        $message->setAttribute("id", $this->getLastId()+1);
        $message->setAttribute("time", $time);
        $message->setAttribute("name", $name);
        $message->setAttribute("text", $text);

        $root = $messages->documentElement;
        $root->appendChild($message);

        if ($messages->save("log.xml"))
            return true;
        else
            return false;

    }

    function getMessages() {
        $result = array();

        $messages = new domDocument("1.0", "utf-8");
        $messages->load("log.xml");

        $root = $messages->documentElement;
        $childs = $root->childNodes;

        for ($i = 0; $i < $childs->length; $i++) {

            $item = $childs->item($i);

            $result[$item->getAttribute("id")]["id"] = $item->getAttribute("id");
            $result[$item->getAttribute("id")]["time"] = $item->getAttribute("time");
            $result[$item->getAttribute("id")]["name"] = $item->getAttribute("name");
            $result[$item->getAttribute("id")]["text"] = $item->getAttribute("text");

        }

        return $result;
    }

    function getLastMessages($id) {

        if ($id < $this->getLastId()) {
            $result = array();

            $messages = new domDocument("1.0", "utf-8");
            $messages->load("log.xml");

            $root = $messages->documentElement;
            $childs = $root->childNodes;

            for ($i = 0; $i < $childs->length; $i++) {

                $item = $childs->item($i);

                if ( $id < $item->getAttribute("id") ) {
                    $result[$item->getAttribute("id")]["id"] = $item->getAttribute("id");
                    $result[$item->getAttribute("id")]["time"] = $item->getAttribute("time");
                    $result[$item->getAttribute("id")]["name"] = $item->getAttribute("name");
                    $result[$item->getAttribute("id")]["text"] = $item->getAttribute("text");
                }

            }

            return $result;
        } else {
            return false;
        }

    }

}

?>