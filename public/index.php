<?php
require "../vendor/autoload.php";

use App\App;

include "../src/helpers.php";

(new App)->boot()->routes();