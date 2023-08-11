<?php
require 'src/models/warnings.php';

$warnings = getWarnings();

require 'src/views/users/warnings.php';