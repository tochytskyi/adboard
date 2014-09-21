<?php

class View {

    protected $title = "default title";

    function generate($content_view, $template_view, $data = null) {
        session_start();
        if (is_array($data)) {
            extract($data);
        }
        include 'application/views/' . $template_view;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
        return $title;
    }

}
