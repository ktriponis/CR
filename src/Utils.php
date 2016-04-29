<?php
function getVar($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : null;
}
