CREATE DATABASE databarang;


 CREATE TABLE admin(
id int(25) NOT NULL AUTO_INCREMENT,
username varchar(120) NOT NULL,
password varchar(200) NOT NULL,
PRIMARY KEY(id)
 );

 CREATE TABLE masuk(
  id int(35) NOT NULL AUTO_INCREMENT,
  nama  varchar(150) NOT  NULL,
  jenis  varchar(100) NOT NULL,
  suplier varchar(100) NOT NULL,
  hargaU varchar(100) NOT NULL,
  hargaJ varchar(100) NOT NULL,
  JumlahB varchar(100) NOT NULL,
  PRIMARY KEY(id)

 );

CREATE TABLE keluar(
id int(35) NOT NULL AUTO_INCREMENT,
tanggal varchar(100) NOT NULL,
namabarang varchar(100) NOT NULL,
hargaU varchar(100) NOT NULL,
JumlahB varchar(100) NOT NULL,
PRIMARY KEY(id)

);


CREATE TABLE modal(

id int(35) NOT NULL AUTO_INCREMENT,
jumlah_modal varchar(100) NOT NULL,
PRIMARY KEY(id)


);


CREATE TABLE about(

id int(35) NOT NULL AUTO_INCREMENT,
foto varchar(100) NOT NULL,
nama varchar(150) NOT NULL,
PRIMARY KEY(id)



);
