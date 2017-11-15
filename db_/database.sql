# Usuario debe de ser "iglesia"
# Password debe de ser "aaaX4#efsW098_____!Asad43"

CREATE DATABASE iglesiapan;

CREATE TABLE usuarios (
  usuario_id INT(4) KEY NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(20) NOT NULL,
  password VARCHAR(32) NOT NULL
); 

CREATE INDEX index_usuario_id ON usuarios(usuario_id);