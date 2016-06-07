#Navision
A Mobile Web Application to find your way in our school's building during open days

#Installation

Make sure you have apache2,mysql-server,php5,php5-mysql,git,wget and openjdk-7-jre packages installed before continue.
If you want to compile the java sources, please install openjdk-7-jdk instead of openjdk-7-jre

#Application  
run (in root / or sudo ):

        cd /var/www/html  
        wget http://tp.apremel.fr/install.sh   
        chmod +x install.sh   
        
Now fill the configuration in install.sh(you can use any text-editor you want,here we use nano, in root or sudo):  

        nano install.sh
     
run (in root / or sudo ):  

        ./install.sh  
        
#DataBase  

  run (in root / or sudo ):
        
        mysql -u root -p  
           
  then enter the password you entered during mysql installation  
  in the following commands, yourname and yourpassword must be the same than the ones your entered in install.sh  
  inside mysql run :  
   
        CREATE DATABASE navision;  
        CREATE USER 'yourname'@'localhost' IDENTIFIED BY 'yourpassword';  
        GRANT ALL PRIVILEGES ON navision.* TO 'yourname'@'localhost' WITH GRANT OPTION;  
        use navision;  
        source /var/www/html/Navision/bdd/Navision.sql;  
        exit;
    
#Java

If the java jar file not working properly (usually do)
you can recompile the class file and recreate an executable jar file

In the Navision Directory go in the java folder
remove the previous class file:

    rm -r bin/dijkstra/
    
to compile run this command:

    javac -d bin/ -cp src/ src/dijkstra/main/main.java

and now we can create our runnable jar file
go in the Navision folder in the java folder

    cd Navision/

and create your jar file:

    jar cvmf META-INF/MANIFEST.MF Navision.jar dijkstra/

the last thing to do is to copy the new file in the java folder

    cp Navision.jar ../
    
add tada the new file is created
you can test if the jar file work by running this command

    java -jar Navision.jar

and if the main programme work

    java -cp lib/mysql-connector-java-5.1.39-bin.jar:bin/ dijkstra.main.main


#Utilisation  
to access client interface (will only work on mobile terminals):  
your.domain.com or yourip  

to access adminstration interface  
your.domain.com/admin or yourip/admin  
