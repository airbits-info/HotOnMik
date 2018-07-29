Energys
Piton
# HotOnMik
Hotspot sms authentecation, and mikrotik.

# Componet auth server
Debian 9
Freeradius 3.0.x
MariaDB (mysql)
openvpn-server
php 7.0

# Files 
db.php - file auth to mysql-server (MariaDB).
login.php - file HTML auth and registration users on db, and auth on freeradius.
user.php - file sql query and sms send api.
script.js - file to login.php need to work.
jquery.maskedinput.js - depency script.js.
jquery-1.8.1.min.js - depency script.js.
md5.js - depency mikrotik html.
