#Navision
A Mobile Web Application to find your way in our school's building during open days

#Installation

Make sure you have apache2,mysql-server,php5,php5-mysql,git,wget and openjdk-7-jre packages installed before continue.
If you want to compile the java sources, please install openjdk-7-jdk instead of openjdk-7-jre

#Install the Application  
run (in root / or sudo ):  
          
    cd /var/www/html
    wget http://tp.apremel.fr/install.sh    
    chmod +x install.sh  
        
Now fill the configuration in install.sh(you can use any text-editor you want,here we use nano, in root or sudo):  
        
    nano install.sh
      
run (in root / or sudo ):  
     
    ./install.sh  
     
#Install the database 
  
  run (in root / or sudo ):  
       
    mysql -u root -p  
        
  then enter the password you entered during mysql installation  
  in the following commands, yourname and yourpassword must be the same than the ones your entered in install.sh  
  inside mysql run :  
    
    CREATE DATABASE navision;  
    CREATE USER 'yourname'@'localhost' IDENTIFIED BY 'yourpassword';  
    GRANT ALL PRIVILEGES ON navision.* TO 'yourname'@'localhost' WITH GRANT OPTION;  
    use navision;  
    source Navision/bdd/Navision.sql;    
    exit; 
    
#Utilisation  
to access client interface (will only work on mobile terminals):  
your.domain.com or yourip  

to access adminstration interface  
your.domain.com/admin or yourip/admin  
