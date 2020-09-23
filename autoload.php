<?php
foreach (glob(dirname(__FILE__)."/classes/*.php") as $filename)
{
    include $filename;
}
?>