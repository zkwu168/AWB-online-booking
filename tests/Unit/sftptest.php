<?php
require_once "../vendor/autoload.php";
use Illuminate\Support\Facades\Storage;
Storage::disk('sftp')->files('directory');

