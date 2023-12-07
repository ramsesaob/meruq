SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `bauditoria` DEFAULT CHARACTER SET utf32 ;
USE `bauditoria`;

-- -----------------------------------------------------
-- Table `bauditoria`.`estados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`estados` (
  `id` INT(2) NOT NULL AUTO_INCREMENT ,
  `nombre_estado` VARCHAR(15) NOT NULL ,
  `descri_estado` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`provinces`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`provinces` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descr_prov` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bauditoria`.`ente_de_controls`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`ente_de_controls` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `nombre_ente_de_control` VARCHAR(70) NOT NULL ,
  `rif_ente_de_control` VARCHAR(12) NOT NULL ,
  `abreviacion_ente_de_control` VARCHAR(30) NULL DEFAULT NULL ,
  `siglas_ente_de_control` VARCHAR(30) NULL DEFAULT NULL ,
  `telefono1_ente_de_control` VARCHAR(30) NOT NULL ,
  `telefono2_ente_de_control` VARCHAR(30) NULL DEFAULT NULL ,
  `fax_ente_de_control` VARCHAR(30) NULL DEFAULT NULL ,
  `email_ente_de_control` VARCHAR(45) NOT NULL ,
  `twitter_ente_de_control` VARCHAR(45) NULL DEFAULT NULL ,
  `pagina_web_ente_de_control` VARCHAR(100) NULL DEFAULT NULL ,
  `publicacion_ente` DATE NULL DEFAULT NULL ,
  `estado_id` INT(2) NOT NULL ,
  `rifletra` VARCHAR(1) NOT NULL ,
  `provinces_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ente_de_control_estado1_idx` (`estado_id` ASC) ,
  UNIQUE INDEX `nombre_ente_de_control_UNIQUE` (`nombre_ente_de_control` ASC) ,
  UNIQUE INDEX `rif_ente_de_control_UNIQUE` (`rif_ente_de_control` ASC) ,
  INDEX `fk_ente_de_controls_provinces1_idx` (`provinces_id` ASC) ,
  CONSTRAINT `fk_ente_de_control_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ente_de_controls_provinces1`
    FOREIGN KEY (`provinces_id` )
    REFERENCES `bauditoria`.`provinces` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`area_controls`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`area_controls` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `nombre_area_control` VARCHAR(250) NOT NULL ,
  `descri_area_control` TEXT NULL DEFAULT NULL ,
  `ente_de_control_id` INT(5) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_area_control_ente_de_control1_idx` (`ente_de_control_id` ASC) ,
  CONSTRAINT `fk_area_control_ente_de_control1`
    FOREIGN KEY (`ente_de_control_id` )
    REFERENCES `bauditoria`.`ente_de_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`estatus_auditorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`estatus_auditorias` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `nombre_estatus_auditoria` VARCHAR(45) NOT NULL ,
  `descri_estatus_auditoria` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`estatus_poas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`estatus_poas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_status` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bauditoria`.`poas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`poas` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `num_poa` VARCHAR(20) NOT NULL ,
  `ejercicio_fiscal_poa` VARCHAR(4) NOT NULL ,
  `descri_poa` VARCHAR(250) NOT NULL ,
  `publicacion_poa` DATE NOT NULL ,
  `status_id` INT(2) NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  `area_controls_id` INT(5) NOT NULL ,
  `estatus_poas_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_poa_estado1_idx` (`estado_id` ASC) ,
  INDEX `fk_poas_area_controls1_idx` (`area_controls_id` ASC) ,
  UNIQUE INDEX `num_poa_UNIQUE` (`num_poa` ASC) ,
  INDEX `fk_poas_estatus_poas1_idx` (`estatus_poas_id` ASC) ,
  CONSTRAINT `fk_poa_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_poas_area_controls1`
    FOREIGN KEY (`area_controls_id` )
    REFERENCES `bauditoria`.`area_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_poas_estatus_poas1`
    FOREIGN KEY (`estatus_poas_id` )
    REFERENCES `bauditoria`.`estatus_poas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`requerimientos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`requerimientos` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `descri_requerimiento` VARCHAR(250) NOT NULL ,
  `emision_requerimiento` DATE NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_requerimiento_estado1_idx` (`estado_id` ASC) ,
  CONSTRAINT `fk_requerimiento_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`tipo_auditorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`tipo_auditorias` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `nombre_tipo_auditoria` VARCHAR(45) NOT NULL ,
  `descri_tipo_auditoria` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`titulos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`titulos` (
  `id` INT(2) NOT NULL AUTO_INCREMENT ,
  `nombre_titulo` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`municipios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`municipios` (
  `id` INT(2) NOT NULL AUTO_INCREMENT ,
  `nombre_municipio` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`entes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`entes` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `nombre_ente` VARCHAR(100) NOT NULL ,
  `rif_ente` INT(8) NOT NULL ,
  `abreviacion_ente` VARCHAR(30) NULL DEFAULT NULL ,
  `siglas_ente` VARCHAR(15) NULL DEFAULT NULL ,
  `telefono1_ente` VARCHAR(13) NOT NULL ,
  `telefono2_ente` VARCHAR(13) NULL DEFAULT NULL ,
  `fax_ente` VARCHAR(13) NULL DEFAULT NULL ,
  `email_ente` VARCHAR(100) NULL DEFAULT NULL ,
  `twitter_ente` VARCHAR(45) NULL DEFAULT NULL ,
  `pagina_web_ente` VARCHAR(100) NULL DEFAULT NULL ,
  `direccion_ente` VARCHAR(250) NOT NULL ,
  `doc_creacion_ente` TEXT NULL DEFAULT NULL ,
  `mision_ente` TEXT NULL DEFAULT NULL ,
  `vision_ente` TEXT NULL DEFAULT NULL ,
  `publicacion_ente` DATE NULL DEFAULT NULL ,
  `ente_rector` INT(5) NULL DEFAULT NULL ,
  `municipio_id` INT(2) NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  `ente_de_controls_id` INT(5) NOT NULL ,
  `area_controls_id` INT(5) NOT NULL ,
  `rifletra` VARCHAR(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ente_municipio1_idx` (`municipio_id` ASC) ,
  INDEX `fk_ente_estado1_idx` (`estado_id` ASC) ,
  UNIQUE INDEX `nombre_ente_UNIQUE` (`nombre_ente` ASC) ,
  UNIQUE INDEX `rif_ente_UNIQUE` (`rif_ente` ASC) ,
  INDEX `fk_entes_ente_de_controls1_idx` (`ente_de_controls_id` ASC) ,
  INDEX `fk_entes_area_controls1_idx` (`area_controls_id` ASC) ,
  CONSTRAINT `fk_ente_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ente_municipio1`
    FOREIGN KEY (`municipio_id` )
    REFERENCES `bauditoria`.`municipios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entes_ente_de_controls1`
    FOREIGN KEY (`ente_de_controls_id` )
    REFERENCES `bauditoria`.`ente_de_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entes_area_controls1`
    FOREIGN KEY (`area_controls_id` )
    REFERENCES `bauditoria`.`area_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`denunciantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`denunciantes` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `ci_denunciante` INT(10) NOT NULL ,
  `nombre_denunciante` VARCHAR(45) NOT NULL ,
  `apellido_denunciante` VARCHAR(45) NOT NULL ,
  `telefo_denunciante` INT(13) NULL DEFAULT NULL ,
  `email_denunciante` VARCHAR(50) NULL DEFAULT NULL ,
  `celular_denunciante` VARCHAR(13) NULL DEFAULT NULL ,
  `dire_denunciante` VARCHAR(200) NULL DEFAULT NULL ,
  `created` DATE NOT NULL ,
  `modified` DATE NULL DEFAULT NULL ,
  `nombre_denuncia` VARCHAR(45) NOT NULL ,
  `motivo_denuncia` TEXT(250) NOT NULL ,
  `cod_denuncia` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`actuacions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`actuacions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_actuaciones` VARCHAR(250) NOT NULL ,
  `ejerciciofiscal` DATE NULL DEFAULT NULL ,
  `poas_id` INT(5) NULL DEFAULT NULL ,
  `titulos_id` INT(2) NOT NULL ,
  `recursos` DECIMAL(9,2) ZEROFILL NOT NULL ,
  `cantidad_per` INT NOT NULL ,
  `inicio_est_act` DATE NOT NULL ,
  `fin_est_act` DATE NOT NULL ,
  `entes_id` INT(5) NULL DEFAULT NULL ,
  `created` DATE NULL DEFAULT NULL ,
  `modified` DATE NULL DEFAULT NULL ,
  `ente_de_controls_id` INT(5) NULL DEFAULT NULL ,
  `ente_actuacion` VARCHAR(45) NULL DEFAULT NULL ,
  `planificacion` VARCHAR(2) NOT NULL ,
  `denunciantes_id` INT(5) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_actuacions_poas1_idx` (`poas_id` ASC) ,
  INDEX `fk_actuacions_titulos1_idx` (`titulos_id` ASC) ,
  INDEX `fk_actuacions_entes1_idx` (`entes_id` ASC) ,
  UNIQUE INDEX `nombre_actuaciones_UNIQUE` (`nombre_actuaciones` ASC) ,
  INDEX `fk_actuacions_ente_de_controls1_idx` (`ente_de_controls_id` ASC) ,
  INDEX `fk_actuacions_denunciantes1_idx` (`denunciantes_id` ASC) ,
  CONSTRAINT `fk_actuacions_poas1`
    FOREIGN KEY (`poas_id` )
    REFERENCES `bauditoria`.`poas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actuacions_titulos1`
    FOREIGN KEY (`titulos_id` )
    REFERENCES `bauditoria`.`titulos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actuacions_entes1`
    FOREIGN KEY (`entes_id` )
    REFERENCES `bauditoria`.`entes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actuacions_ente_de_controls1`
    FOREIGN KEY (`ente_de_controls_id` )
    REFERENCES `bauditoria`.`ente_de_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actuacions_denunciantes1`
    FOREIGN KEY (`denunciantes_id` )
    REFERENCES `bauditoria`.`denunciantes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bauditoria`.`auditorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`auditorias` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `codigo_aud` VARCHAR(8) NOT NULL ,
  `periodo_auditoria` DATE NULL DEFAULT NULL ,
  `alcance_auditoria` VARCHAR(200) NOT NULL ,
  `objetivo_auditoria` VARCHAR(100) NOT NULL ,
  `estatus_auditoria_id` INT(5) NOT NULL ,
  `tipo_auditoria_id` INT(5) NOT NULL ,
  `poa_id` INT(5) NOT NULL ,
  `requerimiento_id` INT(5) NOT NULL ,
  `actuacions_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_auditoria_estatus_auditoria1_idx` (`estatus_auditoria_id` ASC) ,
  INDEX `fk_auditoria_tipo_auditoria1_idx` (`tipo_auditoria_id` ASC) ,
  INDEX `fk_auditoria_poa1_idx` (`poa_id` ASC) ,
  INDEX `fk_auditoria_requerimiento1_idx` (`requerimiento_id` ASC) ,
  INDEX `fk_auditorias_actuacions1_idx` (`actuacions_id` ASC) ,
  UNIQUE INDEX `codigo_aud_UNIQUE` (`codigo_aud` ASC) ,
  CONSTRAINT `fk_auditoria_estatus_auditoria1`
    FOREIGN KEY (`estatus_auditoria_id` )
    REFERENCES `bauditoria`.`estatus_auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditoria_poa1`
    FOREIGN KEY (`poa_id` )
    REFERENCES `bauditoria`.`poas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditoria_requerimiento1`
    FOREIGN KEY (`requerimiento_id` )
    REFERENCES `bauditoria`.`requerimientos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditoria_tipo_auditoria1`
    FOREIGN KEY (`tipo_auditoria_id` )
    REFERENCES `bauditoria`.`tipo_auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditorias_actuacions1`
    FOREIGN KEY (`actuacions_id` )
    REFERENCES `bauditoria`.`actuacions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`nivels`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`nivels` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `nombre_nivel` VARCHAR(45) NOT NULL ,
  `descri_nivel` VARCHAR(200) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`auditors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`auditors` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `ci_auditor` VARCHAR(10) NOT NULL ,
  `nombre_auditor` VARCHAR(45) NOT NULL ,
  `apellido_auditor` VARCHAR(45) NOT NULL ,
  `email_auditor` VARCHAR(50) NOT NULL ,
  `direccion_auditor` VARCHAR(200) NOT NULL ,
  `telefono_auditor` VARCHAR(13) NULL DEFAULT NULL ,
  `celular_auditor` VARCHAR(13) NOT NULL ,
  `cargo_auditor` VARCHAR(50) NULL DEFAULT NULL ,
  `login_auditor` VARCHAR(15) NOT NULL ,
  `pass_auditor` VARCHAR(15) NOT NULL ,
  `area_control_id` INT(5) NOT NULL ,
  `titulo_id` INT(2) NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  `nivel_id` INT(5) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `ci_usuario_UNIQUE` (`ci_auditor` ASC) ,
  INDEX `fk_auditor_area_control1_idx` (`area_control_id` ASC) ,
  INDEX `fk_auditor_titulo1_idx` (`titulo_id` ASC) ,
  INDEX `fk_auditor_estado1_idx` (`estado_id` ASC) ,
  INDEX `fk_auditor_nivel1_idx` (`nivel_id` ASC) ,
  CONSTRAINT `fk_auditor_area_control1`
    FOREIGN KEY (`area_control_id` )
    REFERENCES `bauditoria`.`area_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditor_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditor_nivel1`
    FOREIGN KEY (`nivel_id` )
    REFERENCES `bauditoria`.`nivels` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditor_titulo1`
    FOREIGN KEY (`titulo_id` )
    REFERENCES `bauditoria`.`titulos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`cedula_auditorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`cedula_auditorias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `descripcion_cedula` VARCHAR(250) NOT NULL ,
  `condicion_cedula` VARCHAR(250) NOT NULL ,
  `criterio cedula` VARCHAR(250) NOT NULL ,
  `causa_cedula` VARCHAR(250) NOT NULL ,
  `efecto_cedula` VARCHAR(250) NOT NULL ,
  `pruebas_cedula` VARCHAR(250) NOT NULL ,
  `publicacion_cedula` DATE NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  `objetivos_auditoria_id` INT(11) NOT NULL ,
  `recursos` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cedula_auditoria_estado1_idx` (`estado_id` ASC) ,
  CONSTRAINT `fk_cedula_auditoria_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`conclusions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`conclusions` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `preliminar_conclusion` VARCHAR(250) NOT NULL ,
  `definitiva_conclusion` VARCHAR(250) NULL DEFAULT NULL ,
  `publicacion_conclusion` DATE NOT NULL ,
  `auditoria_id` INT(5) NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_conclusion_auditoria1_idx` (`auditoria_id` ASC) ,
  INDEX `fk_conclusion_estado1_idx` (`estado_id` ASC) ,
  CONSTRAINT `fk_conclusion_auditoria1`
    FOREIGN KEY (`auditoria_id` )
    REFERENCES `bauditoria`.`auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conclusion_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`plan_de_trabajos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`plan_de_trabajos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `actuacions_id` INT NOT NULL ,
  `codigo_plan` VARCHAR(45) NOT NULL ,
  `created` DATE NOT NULL ,
  `auditorias_id` INT(5) NOT NULL ,
  `origen_plan` TEXT(500) NOT NULL ,
  `alcance_plan` TEXT(500) NOT NULL ,
  `objetivos_auditorias_id` INT(11) NOT NULL ,
  `enfoque_plan` TEXT(500) NOT NULL ,
  `baselegal_plan` TEXT(500) NOT NULL ,
  `riesgos_plan` TEXT(500) NOT NULL ,
  `metodos_plan` TEXT(500) NOT NULL ,
  `actividades_plan` TEXT(500) NOT NULL ,
  `tipo_auditorias_id` INT(5) NOT NULL ,
  `descripcion_objetivos` VARCHAR(500) NOT NULL ,
  `objetivo_gen` VARCHAR(500) NOT NULL ,
  `modified` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_plan_de_trabajos_auditorias1_idx` (`auditorias_id` ASC) ,
  INDEX `fk_plan_de_trabajos_actuacions1_idx` (`actuacions_id` ASC) ,
  UNIQUE INDEX `codigo_plan_UNIQUE` (`codigo_plan` ASC) ,
  INDEX `fk_plan_de_trabajos_tipo_auditorias1_idx` (`tipo_auditorias_id` ASC) ,
  CONSTRAINT `fk_plan_de_trabajos_auditorias1`
    FOREIGN KEY (`auditorias_id` )
    REFERENCES `bauditoria`.`auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plan_de_trabajos_actuacions1`
    FOREIGN KEY (`actuacions_id` )
    REFERENCES `bauditoria`.`actuacions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plan_de_trabajos_tipo_auditorias1`
    FOREIGN KEY (`tipo_auditorias_id` )
    REFERENCES `bauditoria`.`tipo_auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bauditoria`.`credencials`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`credencials` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `emision_credencial` DATE NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  `plan_de_trabajos_id` INT NOT NULL ,
  `auditorias_id` INT(5) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_credencial_estado1_idx` (`estado_id` ASC) ,
  INDEX `fk_credencials_plan_de_trabajos1_idx` (`plan_de_trabajos_id` ASC) ,
  INDEX `fk_credencials_auditorias1_idx` (`auditorias_id` ASC) ,
  CONSTRAINT `fk_credencial_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_credencials_plan_de_trabajos1`
    FOREIGN KEY (`plan_de_trabajos_id` )
    REFERENCES `bauditoria`.`plan_de_trabajos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_credencials_auditorias1`
    FOREIGN KEY (`auditorias_id` )
    REFERENCES `bauditoria`.`auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`empleados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`empleados` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `ci_empleado` VARCHAR(10) NOT NULL ,
  `nombre_empleado` VARCHAR(45) NOT NULL ,
  `apellido_empleado` VARCHAR(45) NOT NULL ,
  `cargo_empleado` VARCHAR(45) NOT NULL ,
  `entes_id` INT(5) NOT NULL ,
  `area_controls_id` INT(5) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `ci_empleado_UNIQUE` (`ci_empleado` ASC) ,
  INDEX `fk_empleados_entes1_idx` (`entes_id` ASC) ,
  INDEX `fk_empleados_area_controls1_idx` (`area_controls_id` ASC) ,
  CONSTRAINT `fk_empleados_entes1`
    FOREIGN KEY (`entes_id` )
    REFERENCES `bauditoria`.`entes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleados_area_controls1`
    FOREIGN KEY (`area_controls_id` )
    REFERENCES `bauditoria`.`area_controls` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`observacion_auditorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`observacion_auditorias` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `area_observacion` VARCHAR(50) NULL DEFAULT NULL ,
  `preliminar_observacion` VARCHAR(250) NULL DEFAULT NULL ,
  `alegatos_observacion` VARCHAR(250) NULL DEFAULT NULL ,
  `definitiva_observacion` VARCHAR(250) NULL DEFAULT NULL ,
  `publicacion_observacion` DATE NULL DEFAULT NULL ,
  `auditoria_id` INT(5) NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  PRIMARY KEY (`id`, `auditoria_id`, `estado_id`) ,
  UNIQUE INDEX `auditoria_id_2` (`auditoria_id` ASC) ,
  INDEX `fk_observacion_auditoria_auditoria1_idx` (`auditoria_id` ASC) ,
  INDEX `fk_observacion_auditoria_estado1_idx` (`estado_id` ASC) ,
  INDEX `auditoria_id` (`auditoria_id` ASC) ,
  CONSTRAINT `fk_observacion_auditoria_auditoria1`
    FOREIGN KEY (`auditoria_id` )
    REFERENCES `bauditoria`.`auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_observacion_auditoria_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`recomendacions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`recomendacions` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `preliminar_recomendacion` VARCHAR(250) NOT NULL ,
  `definitiva_recomendacion` VARCHAR(250) NULL DEFAULT NULL ,
  `publicacion_recomendacion` DATE NOT NULL ,
  `auditoria_id` INT(5) NOT NULL ,
  `estado_id` INT(2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_recomendacion_auditoria1_idx` (`auditoria_id` ASC) ,
  INDEX `fk_recomendacion_estado1_idx` (`estado_id` ASC) ,
  CONSTRAINT `fk_recomendacion_auditoria1`
    FOREIGN KEY (`auditoria_id` )
    REFERENCES `bauditoria`.`auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recomendacion_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `bauditoria`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(250) NOT NULL ,
  `password` VARCHAR(250) NOT NULL ,
  `role` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bauditoria`.`actividads`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`actividads` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `actividadsprinc` VARCHAR(500) NOT NULL ,
  `detalleactiv` MEDIUMTEXT NOT NULL ,
  `plan_de_trabajos_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_actividads_plan_de_trabajos1_idx` (`plan_de_trabajos_id` ASC) ,
  CONSTRAINT `fk_actividads_plan_de_trabajos1`
    FOREIGN KEY (`plan_de_trabajos_id` )
    REFERENCES `bauditoria`.`plan_de_trabajos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bauditoria`.`auditors_auditorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bauditoria`.`auditors_auditorias` (
  `auditors_id` INT(5) NOT NULL ,
  `auditorias_id` INT(5) NOT NULL ,
  PRIMARY KEY (`auditors_id`, `auditorias_id`) ,
  INDEX `fk_auditors_has_auditorias_auditorias1_idx` (`auditorias_id` ASC) ,
  INDEX `fk_auditors_has_auditorias_auditors1_idx` (`auditors_id` ASC) ,
  CONSTRAINT `fk_auditors_has_auditorias_auditors1`
    FOREIGN KEY (`auditors_id` )
    REFERENCES `bauditoria`.`auditors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auditors_has_auditorias_auditorias1`
    FOREIGN KEY (`auditorias_id` )
    REFERENCES `bauditoria`.`auditorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
