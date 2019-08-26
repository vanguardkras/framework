<!DOCTYPE html>
<html>
    <head>
        <title>Apache MySQL PHP Установка</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta name="description" content="Apache MySQL PHP Windows установка" >
        <link type="text/css" rel="stylesheet" href="css/main.css" >
    </head>
    <body>
        <h2>Установка веб-сервера.</h2>
        <p>
            Ниже будет рассмотрен пример последовательной установки Apache + MySQL + PHP сервера.
        </p>
        <h3>1 Установка Apache.</h3>
        <p>
            Загрузите последнюю версию Apache для совего сайта:<br>
            <a href="https://www.apachelounge.com/download/">www.apachelounge.com/download/</a><br>
            Распакуйте архив и скопируйте его содержимое в "C:\Server\Apache"
        </p>
        <p>Откройте httpd.conf в C:\Server\Apache\conf.</p>
        <p>
            Замените
        </p>
        <p class="code">
            Define SRVROOT "C:/Apache24"
        </p>
        <p>
            на
        </p>
        <p class="code">
            Define SRVROOT "C:/Server\Apache"
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            #ServerName www.example.com:80
        </p>
        <p>
            на
        </p>
        <p class="code">
            ServerName localhost
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            DocumentRoot "${SRVROOT}/htdocs"
        </p>
        <p>
            на
        </p>
        <p class="code">
            DocumentRoot "C:/Server/www/"
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            &lsaquo;Directory "${SRVROOT}/htdocs"&lsaquo;
        </p>
        <p>
            на
        </p>
        <p class="code">
            &lsaquo;Directory "C:/Server/www/"&lsaquo;
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            DirectoryIndex index.html
        </p>
        <p>
            на
        </p>
        <p class="code">
            DirectoryIndex index.php
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            # AllowOverride controls what directives may be placed in .htaccess files.<br>
            # It can be "All", "None", or any combination of the keywords:<br>
            #   AllowOverride FileInfo AuthConfig Limit<br>
            #<br>
            AllowOverride None<br>
        </p>
        <p>
            на
        </p>
        <p class="code">
            # AllowOverride controls what directives may be placed in .htaccess files.<br>
            # It can be "All", "None", or any combination of the keywords:<br>
            #   AllowOverride FileInfo AuthConfig Limit<br>
            #<br>
            AllowOverride All<br>
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            #LoadModule rewrite_module modules/mod_rewrite.so
        </p>
        <p>
            на
        </p>
        <p class="code">
            LoadModule rewrite_module modules/mod_rewrite.so
        </p>
        <p>
            Чтобы установить сервер, откройте командную строку cmd.exe и введите:
        </p>
        <p class="code">
            C:\Server\Apache\bin\httpd.exe -k install
        </p>
        <p>
            А затем запустите сервер:
        </p>
        <p class="code">
            C:\Server\Apache\bin\httpd.exe -k start
        </p>
        <p>
            С этого моменты вы можете видеть веб-страницы на своем компьютере в браузере.
            Наберите <a href="http://localhost">http://localhost</a> в нем.
        </p>
        <h3>2 Установка MySQL сервера.</h3>
        <p>
            Загрузите zip-архив MySQL 8 здесь: 
            <a href="https://dev.mysql.com/downloads/mysql/">https://dev.mysql.com/downloads/mysql/</a>.
            Регистрация не обязательна, просто нажмите кнопку "No thanks, just start my download".
        </p>
        <p>
            Распакуйте файлы из MySQL архива в C:\Server\MySQL.
            Создайте файл my.ini и добавьте туда:
        </p>
        <p class="code">
            [mysqld]<br>
            <br>
            sql_mode=NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES<br>
            datadir="C:/Server/MySQL/DB/data/"<br>
            default_authentication_plugin=mysql_native_password<br>
        </p>
        <p>
            Для непосредственно установки, откройте cmd.exe и наберите:
        </p>
        <p class="code">
            C:\Server\MySQL\bin\mysqld --initialize-insecure --user=root<br>
            C:\Server\MySQL\bin\mysqld --install<br>
            net start mysql<br>
        </p>
        <h3>3 Установка PHP сервера.</h3>
        <p>
            Загрузите последнюю версию Thread Safe пакета для своей версии операционной системы:  
            <a href="https://windows.php.net/download">https://windows.php.net/download</a>.
        </p>
        <p>Скопируйте все файлы в "C:\Server\PHP". Создайте папку C:\Server\PHP\tmp. 
            Переименуйте php.ini-development в php.ini и откройте его.</p>
        <p>
            Замените
        </p>
        <p class="code">
            ; extension_dir = "ext"
        </p>
        <p>
            на
        </p>
        <p class="code">
            extension_dir = "C:\Server\PHP\ext\"
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            max_execution_time = 30
        </p>
        <p>
            на
        </p>
        <p class="code">
            max_execution_time = 120
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            memory_limit = 128M
        </p>
        <p>
            на
        </p>
        <p class="code">
            memory_limit = 1024M
        </p>
        <p>
            Замените
        </p>
        <p class="code">
            ;extension=bz2<br>
            ;extension=curl<br>
            ;extension=fileinfo<br>
            ;extension=gd2<br>
            ;extension=gettext<br>
            ;extension=gmp<br>
            ;extension=intl<br>
            ;extension=imap<br>
            ;extension=interbase<br>
            ;extension=ldap<br>
            ;extension=mbstring<br>
            ;extension=exif      ; Must be after mbstring as it depends on it<br>
            ;extension=mysqli<br>
            ;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client<br>
            ;extension=odbc<br>
            ;extension=openssl<br>
            ;extension=pdo_firebird<br>
            ;extension=pdo_mysql<br>
            ;extension=pdo_oci<br>
            ;extension=pdo_odbc<br>
            ;extension=pdo_pgsql<br>
            ;extension=pdo_sqlite<br>
            ;extension=pgsql<br>
            ;extension=shmop<br>
            <br>
            ; The MIBS data available in the PHP distribution must be installed.<br>
            ; See http://www.php.net/manual/en/snmp.installation.php<br>
            ;extension=snmp<br>
            <br>
            ;extension=soap<br>
            ;extension=sockets<br>
            ;extension=sodium<br>
            ;extension=sqlite3<br>
            ;extension=tidy<br>
            ;extension=xmlrpc<br>
            ;extension=xsl<br>
        </p>
        <p>
            на
        </p>
        <p class="code">
            ;extension=bz2<br>
            extension=curl<br>
            extension=fileinfo<br>
            extension=gd2<br>
            ;extension=gettext<br>
            ;extension=gmp<br>
            ;extension=intl<br>
            extension=imap<br>
            ;extension=interbase<br>
            ;extension=ldap<br>
            extension=mbstring<br>
            ;extension=exif      ; Must be after mbstring as it depends on it<br>
            extension=mysqli<br>
            ;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client<br>
            ;extension=odbc<br>
            extension=openssl<br>
            ;extension=pdo_firebird<br>
            extension=pdo_mysql<br>
            ;extension=pdo_oci<br>
            ;extension=pdo_odbc<br>
            ;extension=pdo_pgsql<br>
            ;extension=pdo_sqlite<br>
            ;extension=pgsql<br>
            ;extension=shmop<br>
            <br>
            ; The MIBS data available in the PHP distribution must be installed.<br>
            ; See http://www.php.net/manual/en/snmp.installation.php<br>
            extension=snmp<br>
            <br>
            ;extension=soap<br>
            extension=sockets<br>
            ;extension=sodium<br>
            ;extension=sqlite3<br>
            ;extension=tidy<br>
            ;extension=xmlrpc<br>
            extension=xsl<br>
        </p>
        <p>Загрузите библиотеки MIB из пакета NET-SNMP для PHP <a href="mibs.rar">mibs.rar</a> и положите их в папку "C:\Server\mibs".<br> 
            Добавьте каталог "C:\Server\mibs" в переменную среды Windows "MIBDIRS" and "C:\Server\PHP" в "Path".<br>
            Процедуру добавления вы можете найти здесь: 
            <a href="https://docs.microsoft.com/ru-ru/previous-versions/office/developer/sharepoint-2010/ee537574(v%3Doffice.14)">
                https://docs.microsoft.com/ru-ru/previous-versions/office/developer/sharepoint-2010/ee537574(v%3Doffice.14)</a>
        </p>
        <p>
            Откройте C:\Server\Apache\conf\httpd.conf опять и добавьте следующие строки в конец файла:
        </p>
        <p class="code">
            PHPIniDir "C:/Server/PHP"<br>
            AddHandler application/x-httpd-php .php<br>
            LoadModule php7_module "C:/Server/PHP/php7apache2_4.dll"<br>
        </p>
        <p>Перезагрузите сервер Apache в консоли (cmd.exe).</p>
        <p class="code">
            C:\Server\Apache\bin\httpd.exe -k start
        </p>
    </body>
</html>