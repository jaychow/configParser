<?php
require('Parser.php'); 
use JayChow\ConfigParser\Parser;

$parser = new Parser();

$parser->load('config.ini');


echo "host: " . $parser->host.PHP_EOL;
echo "server_id: " . $parser->server_id.PHP_EOL;
echo "server_load_alarm: " . $parser->server_load_alarm.PHP_EOL;
echo "user: " . $parser->user.PHP_EOL;
echo "verbose: ";
echo ($parser->verbose) ? "true" : "false"; 
echo PHP_EOL;
echo "test_mode: ";
echo ($parser->test_mode) ? "true" : "false";
echo PHP_EOL;
echo "debug_mode: ";
echo ($parser->debug_mode) ? "true" : "false";
echo PHP_EOL;
echo "log_file_path: ";
echo $parser->log_file_path . PHP_EOL;
echo "send_notifications: ";
echo ($parser->send_notifications) ? "true" : "false";
echo PHP_EOL;

