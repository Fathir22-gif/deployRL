<?php

echo "Loaded php.ini: " . php_ini_loaded_file() . "<br><br>";

echo "curl.cainfo = " . ini_get('curl.cainfo') . "<br>";
echo "openssl.cafile = " . ini_get('openssl.cafile') . "<br>";