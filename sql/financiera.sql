CREATE SCHEMA `financiera` ;

-- tabla usuario
CREATE TABLE `financiera`.`usuario` (
    `idUsuario` CHAR(8) NOT NULL,
    `nombre` VARCHAR(40) NOT NULL,
    `apellido` VARCHAR(60) NOT NULL,
    `contrasenia` CHAR(8) NOT NULL,
    `foto` VARCHAR(255) NULL,
    `nivel` VARCHAR(45) NOT NULL,
    `estado` TINYINT(2) NOT NULL,
    PRIMARY KEY (`idUsuario`));
-- tabla cliente
CREATE TABLE `financiera`.`cliente` (
    `idcliente` CHAR(8) NOT NULL,
    `nombre` VARCHAR(40) NOT NULL,
    `apellido` VARCHAR(60) NOT NULL,
    `celular` VARCHAR(9) NOT NULL,
    `domicilio` VARCHAR(50) NULL,
    `estado` TINYINT(2) NOT NULL,
    PRIMARY KEY (`idcliente`));
-- tabla parametro
CREATE TABLE `financiera`.`parametro` (
    `idParametro` INT NOT NULL AUTO_INCREMENT,
    `tipoParametro` VARCHAR(60) NOT NULL,
    `descripcion` VARCHAR(45) NOT NULL,
    `estado` TINYINT(2) NOT NULL,
    PRIMARY KEY (`idParametro`));
-- tabla prestamo
CREATE TABLE `financiera`.`prestamo` (
    `idPrestamo` CHAR(7) NOT NULL,
    `idUsuario` CHAR(8) NOT NULL,
    `idCliente` CHAR(8) NOT NULL,
    `cantidad` FLOAT NOT NULL,
    `fechaI` DATE NOT NULL,
    `fechaF` DATE NOT NULL,
    `garantia` VARCHAR(60) NULL,
    `interes` FLOAT NOT NULL,
    `estado` TINYINT(2) NOT NULL,
    PRIMARY KEY (`idPrestamo`),
    INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
    INDEX `idCliente_idx` (`idCliente` ASC) VISIBLE,
    CONSTRAINT `idUsuario`
        FOREIGN KEY (`idUsuario`)
        REFERENCES `financiera`.`usuario` (`idUsuario`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    CONSTRAINT `idCliente`
        FOREIGN KEY (`idCliente`)
        REFERENCES `financiera`.`cliente` (`idCliente`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION);
-- tabla historial
CREATE TABLE `financiera`.`historial` (
    `idHistorial` INT NOT NULL AUTO_INCREMENT,
    `fecha` DATE NOT NULL,
    `usuario` VARCHAR(60) NOT NULL,
    `accion` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idHistorial`));