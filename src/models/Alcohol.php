<?php

class Alcohol {
    private $name;
    private $image;

    public function __construct($name, $image) {
        $this->name = $name;
        $this->image = $image;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }
}