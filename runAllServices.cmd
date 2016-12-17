start d:\wamp\wampmanager.exe
start php app/console server:run
timeout /t 20 /nobreak
start "" http://localhost:8000
start "" http://localhost/phpmyadmin/#PMAURL-1:db_structure.php?db=mobiledb
