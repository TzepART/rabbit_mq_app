If you want to save only 'warning' and 'error' (and not 'info') log messages to a file, just open a console and type:


``
php receive_logs_direct.php warning error > logs_from_rabbit.log
``

If you'd like to see all the log messages on your screen, open a new terminal and do:

``
php receive_logs_direct.php info warning error
``

    # => [*] Waiting for logs. To exit press CTRL+C

And, for example, to emit an error log message just type:


``
php emit_log_direct.php error "Run. Run. Or it will explode."
``    
    
    # => [x] Sent 'error':'Run. Run. Or it will explode.'