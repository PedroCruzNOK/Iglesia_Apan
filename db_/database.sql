# Usuario debe de ser "iglesia"
# Password debe de ser "aaaX4#efsW098_____!Asad43"

CREATE DATABASE iglesiapan;

CREATE TABLE usuarios (
  usuario_id INT(4) KEY NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(20) NOT NULL,
  password VARCHAR(32) NOT NULL
); 

CREATE TABLE servicios (
  servicio_id INT(4) KEY NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  descripcion TEXT,
  costo INT(5)
);

CREATE INDEX index_usuario_id ON usuarios(usuario_id);
CREATE INDEX index_servicio_id ON servicios(servicio_id);