#Navision
A Mobile Web Application to find your way in our school's building during open days

##Technos
The Web App is based on a MVC in PHP,with a MySQL database and a PDO methods. basically, we use PHP to communicate between model and controller, and AJAX with JSON to communicate between controller and javascript
From javascript we create a interactive map using [Leaflet JS Library](https://github.com/Leaflet/Leaflet) , and we place points of interest on route points using data received from AJAX.
To get user's location we use this [qr code scanner](https://github.com/dwa012/html5-qrcode) and administrater will put qr codes at key points of the building.

The Administration side works almost like the Client side but implementing a [qr code generator](https://github.com/davidshimjs/qrcodejs) instead of the reader, which allow the app to generate on the fly the qr code we need from the data used to create a point.
##Installation

Make sure you have apache2,mysql-server,php5,php5-mysql,git,wget and openjdk-7-jre packages installed before continue.
If you want to compile the java sources, please install openjdk-7-jdk instead of openjdk-7-jre

###Application  
run (in root / or sudo ):
```bash
cd /var/www/html  
wget http://tp.apremel.fr/install.sh   
chmod +x install.sh   
```        
Now fill the configuration in install.sh(you can use any text-editor you want,here we use nano, in root or sudo):  
```bash
nano install.sh
```
run (in root / or sudo ):  
```bash
./install.sh  
```
###DataBase  

  run (in root / or sudo ):  
```bash
mysql -u root -p  
```      
  then enter the password you entered during mysql installation  
  in the following commands, yourname and yourpassword must be the same than the ones your entered in install.sh  
  inside mysql run :  
```SQL
CREATE DATABASE navision;  
CREATE USER 'yourname'@'localhost' IDENTIFIED BY 'yourpassword';  
GRANT ALL PRIVILEGES ON navision.* TO 'yourname'@'localhost' WITH GRANT OPTION;  
use navision;  
source /var/www/html/Navision/bdd/Navision.sql;  
exit;
```
###Java

If the java jar file not working properly (usually do)
you can recompile the class file and recreate an executable jar file

In the Navision Directory go in the java folder
remove the previous class file:
```bash
rm -r bin/dijkstra/
```
to compile run this command:
```bash
    javac -d bin/ -cp src/ src/dijkstra/main/main.java
```
and now we can create our runnable jar file
go in the Navision folder in the java folder
```bash
    cd Navision/
```
and create your jar file:
```bash
    jar cvmf META-INF/MANIFEST.MF Navision.jar dijkstra/
```
the last thing to do is to copy the new file in the java folder
```bash
    cp Navision.jar ../
  ```  
add tada the new file is created
you can test if the jar file work by running this command
```bash
    java -jar Navision.jar
```
and if the main programme work
```bash
    java -cp lib/mysql-connector-java-5.1.39-bin.jar:bin/ dijkstra.main.main
```

##Utilisation  
to access client interface (will only work on mobile terminals):  
your.domain.com or yourip  

to access adminstration interface  
your.domain.com/admin or yourip/admin  
