# Instalación

- Descargar el repositorio y abrir el archivo.SQL


## crear una conexion 

      entrara al Mysql 
 
 Remplazar datos con:
 
- nombre: Proyecto
- HostName: localhost
- Port: 3306
- UsersName: root
- Password: clear

      ya esta creada la conexion 

## entrar a la conexion 

    escribir:
  
  - create database if not exists Netclip;
  - use NetClip;
  
  Darle al rayito.
  
  Copiar todo el script de la base de dato `netclip`
  
  dirigirnos a `FILE`, apretar  `NEW QUERY TAB`
 y cuando se genere el archivo `SQL File1*` pegar lo copiado de `netclip` y darle al rayito.


  ## verificar en el primwer querry `Querry 1` 
  
  select * from usuarios;  `con control ENTER`
  
  select * from catalogo;   `con control ENTER`
  
  ## si aparece las tablas correctas estaria pronto `catalogo`,`usuarios`
  
