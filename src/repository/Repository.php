<?php

namespace CR;

interface Repository
{

    function save($entity);

    function load();
}
