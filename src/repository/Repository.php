<?php

namespace CR;

interface Repository
{

    public function save($entity);

    public function load();
}
