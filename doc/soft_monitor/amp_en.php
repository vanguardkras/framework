<!DOCTYPE html>
<html>
    <head>
        <title>Apache MySQL PHP Installation</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta name="description" content="Apache MySQL PHP Windows setup" >
        <link type="text/css" rel="stylesheet" href="css/main.css" >
    </head>
    <body>
        <h2>Web-server Installation.</h2>
        <p>
            You can see an example Apache + MySQL + PHP installation sequence below.
        </p>
        <h3>1 Apache installation</h3>
        <p>
            Download the latest apache package for your website:<br>
            <a href="https://www.apachelounge.com/download/">www.apachelounge.com/download/</a><br>
            Unpack the archive and copy everything to "C:\Server\Apache"
        </p>
        <p>Open httpd.conf in C:\Server\Apache\conf.</p>
        <p>
            Replace
        </p>
        <p class="code">
            Define SRVROOT "C:/Apache24"
        </p>
        <p>
            with
        </p>
        <p class="code">
            Define SRVROOT "C:/Server\Apache"
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            #ServerName www.example.com:80
        </p>
        <p>
            with
        </p>
        <p class="code">
            ServerName localhost
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            DocumentRoot "${SRVROOT}/htdocs"
        </p>
        <p>
            with
        </p>
        <p class="code">
            DocumentRoot "C:/Server/www/"
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            &lsaquo;Directory "${SRVROOT}/htdocs"&lsaquo;
        </p>
        <p>
            with
        </p>
        <p class="code">
            &lsaquo;Directory "C:/Server/www/"&lsaquo;
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            DirectoryIndex index.html
        </p>
        <p>
            with
        </p>
        <p class="code">
            DirectoryIndex index.php
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            # AllowOverride controls what directives may be placed in .htaccess files.<br>
            # It can be "All", "None", or any combination of the keywords:<br>
            #   AllowOverride FileInfo AuthConfig Limit<br>
            #<br>
            AllowOverride None<br>
        </p>
        <p>
            with
        </p>
        <p class="code">
            # AllowOverride controls what directives may be placed in .htaccess files.<br>
            # It can be "All", "None", or any combination of the keywords:<br>
            #   AllowOverride FileInfo AuthConfig Limit<br>
            #<br>
            AllowOverride All<br>
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            #LoadModule rewrite_module modules/mod_rewrite.so
        </p>
        <p>
            with
        </p>
        <p class="code">
            LoadModule rewrite_module modules/mod_rewrite.so
        </p>
        <p>
            To install Apache server, open cmd.exe and insert:
        </p>
        <p class="code">
            C:\Server\Apache\bin\httpd.exe -k install
        </p>
        <p>
            And start the server:
        </p>
        <p class="code">
            C:\Server\Apache\bin\httpd.exe -k start
        </p>
        <p>
            From now on, you can see a web page on your computer in a browser.
            Input <a href="http://localhost">http://localhost</a> there.
        </p>
        <h3>2 MySQL server installation.</h3>
        <p>
            Download MySQL 8 zip-archive here: 
            <a href="https://dev.mysql.com/downloads/mysql/">https://dev.mysql.com/downloads/mysql/</a>.
            Registration is not necessary, just push "No thanks, just start my download".
        </p>
        <p>
            Unpack the files from MySQL archive to C:\Server\MySQL.
            Create a file my.ini and add there:
        </p>
        <p class="code">
            [mysqld]<br>
            <br>
            sql_mode=NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES<br>
            datadir="C:/Server/MySQL/DB/data/"<br>
            default_authentication_plugin=mysql_native_password<br>
        </p>
        <p>
            For the installation, open cmd.exe and insert:
        </p>
        <p class="code">
            C:\Server\MySQL\bin\mysqld --initialize-insecure --user=root<br>
            C:\Server\MySQL\bin\mysqld --install<br>
            net start mysql<br>
        </p>
        <h3>3 PHP server installation.</h3>
        <p>
            Download the latest Thread Safe package for your operating system from:  
            <a href="https://windows.php.net/download">https://windows.php.net/download</a>.
        </p>
        <p>Copy all files to "C:\Server\PHP". Make a directory C:\Server\PHP\tmp. 
            Rename php.ini-development to php.ini and open it.</p>
        <p>
            Replace
        </p>
        <p class="code">
            ; extension_dir = "ext"
        </p>
        <p>
            with
        </p>
        <p class="code">
            extension_dir = "C:\Server\PHP\ext\"
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            max_execution_time = 30
        </p>
        <p>
            with
        </p>
        <p class="code">
            max_execution_time = 120
        </p>
        <p>
            Replace
        </p>
        <p class="code">
            memory_limit = 128M
        </p>
        <p>
            with
        </p>
        <p class="code">
            memory_limit = 1024M
        </p>
        <p>
            Replace
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
            with
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
        <p>Download MIBs from NET-SNMP package for PHP <a href="mibs.rar">mibs.rar</a> and put it into "C:\Server\mibs".<br> 
            Add directory "C:\Server\mibs" to Windows' environment variable "MIBDIRS" and "C:\Server\PHP" to "Path".<br>
            You can find this procedure here: 
            <a href="https://www.computerhope.com/issues/ch000549.htm">https://www.computerhope.com/issues/ch000549.htm</a>
        </p>
        <p>
            Open C:\Server\Apache\conf\httpd.conf again and add next to the very end of it:
        </p>
        <p class="code">
            PHPIniDir "C:/Server/PHP"<br>
            AddHandler application/x-httpd-php .php<br>
            LoadModule php7_module "C:/Server/PHP/php7apache2_4.dll"<br>
        </p>
        <p>Restart apache server in console (cmd.exe).</p>
        <p class="code">
            C:\Server\Apache\bin\httpd.exe -k start
        </p>
    </body>
</html>