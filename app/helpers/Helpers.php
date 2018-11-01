<?php
ob_start();
// Simple Page redirector
function redirector($location)
{
    header('location: '. SITEURL. '/'. $location);
}
