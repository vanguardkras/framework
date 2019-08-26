<a href="/"><- Back</a>
<h1>"Soft Monitor" web-system documentation.</h1>
<h2>1. The purpose of this application.</h2>
<p>
    "Soft Monitor" web-application was made to monitor status and 
    failures of different equipment that use SNMP, such as Power Systems
    and telecommunication devices,
    using Apache/Nginx + MySQL + PHP server as a basis.
    It was designed for dispatchers who can detect a malfunction quickly
    using the application's interface and functions.
</p>
<p>
    This system adjusts to any types of equipment by configuring
    equipment and connection templates. It already contains templates for
    Power Systems Eaton APS and PW9130, Elteco BZX and Socomec PS.
    However, it is possible to configure any type of assessed information
    from devices.
</p>
<p>
    The application can gather malfunction history information and saves
    this data. Its performance allows the addition of thousands of devices, and 
    RAM usage can also be configured.
</p>
<p>
    At first, you need a Windows web server Apache/Nginx + MySQL + PHP.<br>
    You can find an instruction here: <a href="amp_en.php" target="_blank">Apache MySQL PHP Installation</a>
</p>
<p>
    Requirements:<br>
    Apache 2.4+<br>
    PHP 7.2+ (with snmp package)<br>
    MySQL 5.7+
</p>
<h2>2. Soft Monitor User's Guide.</h2>
<h3>2.1 Installation and Run.</h3>
<p>
    Copy all the application's to the web-server docs directory. 
    Open your browser and input the web-server address, or http://localhost
    if it is the same computer. You will see the installation dialogue:
</p>
<img class="expandable" src="img/install.jpg">
<p>
    Input your database parameters and change other server variables.
    You can leave default values. Then check them by pressing "Check" button.
</p>
<img class="expandable" src="img/install_success.jpg">
<p>
    If everything is correct, you can press "Install" button.
    After the end of the installation process, you will see the main page.
</p>
<img class="expandable" src="img/main_no_login.jpg">
<p>
    By this moment, the system has only one user with admin rights.
    To login input Login: admin, Password: admin.
    You will see the next main page.
</p>
<img class="expandable" src="img/main.jpg">
<p>
    Here you can Run/Stop monitoring server. 
    This page is available to users with administrator rights only.
</p>
<p>
    If you want to install the server from scratch and erase all existing data,
    you can input the address:<br>
    USE VERY CAREFULLY AS YOU CAN LOSE ALL YOUR DATA.<br>
    http://localhost/admin/reinstall<br>
    Only an administrator can run this option.
</p>
<h3>2.2 Admin menu.</h3>
<p>
    In the right-upper corner, admins can see the admin menu.
</p>
<h4>2.2.1 Devices management.</h4>
<img class="expandable" src="img/devices_manag.jpg">
<p>
    On this page, you can add, modify and delete devices.
    Each device has its name, IP-address (you can use a domain name as well),
    a template that determines the type of data it sends, connection template is
    responsible for SNMP-connection parameters. Ping attempts and timeout
    are used not only for ICMP-requests but for SNMP too. Group is used
    for users without administrator rights. Each device is shown only for users
    of their group.
</p>
<p>
    You can use "Search" to find a certain device and sort any column
    by clicking on their header.
</p>
<h4>2.2.2 User management.</h4>
<img class="expandable" src="img/user_manag.jpg">
<p>
    On this page, administrators can modify, delete and add user groups and 
    users and modify users passwords. Be careful with administrator groups
    and users. There should be at least one user group with Admin rights
    and one user in this group.
</p>
<h4>2.2.3 Default settings.</h4>
<img class="expandable" src="img/default_settings.jpg">
<p>
    This section contains the most valuable settings and options for the server.
</p>
<ul>
    <li>
        "Apply new licence file". A default licence allows adding five devices.
        However, you can acquire a new licence file on the project's main page.
        Just upload a new licence file. 
    </li>
    <li>
        "Clear log data" button erases all log data. You can save it in advance
        on "Log" page.
    </li>
    <li>
        "Number of running processes" determines how many php.exe processes
        are used simultaneously. You can increase the server's performance,
        but do not overload RAM and processor.
    </li>
    <li>
        "Default recovery time" is a period in seconds in which an alarm
        is counted as completely cleared after recovery. You can change this
        parameter for each particular device.
    </li>
    <li>
        "Default ping attempts" and "Default ping timeout" are used when 
        no specific value was set during a device adding. 
    </li>
</ul>
<h4>2.2.4 Connection templates.</h4>
<img class="expandable" src="img/con_templates.jpg">
<p>
    Each connection template contains specific data for SNMP-connection.
    If you use SNMPv1, setting a password is not necessary.
</p>
<h4>2.2.5 Device templates.</h4>
<img class="expandable" src="img/dev_templates.jpg">
<p>
    By clicking on a template name, you'll see it's settings:
</p>
<img class="expandable" src="img/dev_templates_one.jpg">
<p>
    Each template contains custom OIDs with low and high thresholds,
    an alarm message and a severity level. You can add, modify and delete
    them. Learn SNMP-documentation of each type of equipment you want to use.
    This server does not receive SNMP-traps; so, there is no need to configure
    each device for working with this system.
</p>
<p>
    You can Import and Export templates as file and share them. The basic
    version already contains templates for Power System Equipment, such as 
    Eaton, Elteco and Socomec.
</p>
<h3>2.3 User's menu.</h3>
<h4>2.3.1 Alarms page.</h4>
<img class="expandable" src="img/alarms.jpg">
<p>
    This page shows all the alarms. New alarms blink, but a user can press
    "Acknowledge" to make sure that the alarm was registered.
</p>
<h4>2.3.2 Device list page.</h4>
<img class="expandable" src="img/device_list.jpg">
<p>
    Here you can see all devices and their alarms severity levels.
</p>
<h4>2.3.3 Log page.</h4>
<img class="expandable" src="img/log.jpg">
<p>
    All log data is saved in a database. You can download it as a table 
    or show a specific period data.
</p>