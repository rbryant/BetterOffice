SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `better-office` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `better-office` ;

-- -----------------------------------------------------
-- Table `better-office`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`address` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `address1` VARCHAR(128) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `address2` VARCHAR(128) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `city` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `state` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `zip` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `module` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `ref_id` INT(11) NOT NULL,
  `primary_address` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `better-office`.`authitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`authitem` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`authassignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`authassignment` (
  `itemname` VARCHAR(64) NOT NULL,
  `userid` VARCHAR(64) NOT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`itemname`, `userid`),
  CONSTRAINT `authassignment_ibfk_1`
    FOREIGN KEY (`itemname`)
    REFERENCES `better-office`.`authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`authitemchild`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`authitemchild` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC),
  CONSTRAINT `authitemchild_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `better-office`.`authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `better-office`.`authitem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`catalog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`catalog` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(20) NULL DEFAULT NULL,
  `description` VARCHAR(128) NULL DEFAULT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  `cost` DOUBLE NULL DEFAULT NULL,
  `category` INT(11) NULL DEFAULT NULL,
  `catalog` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `content` TEXT NOT NULL,
  `status` INT(11) NOT NULL,
  `create_time` DATETIME NOT NULL,
  `userId` INT(11) NOT NULL,
  `ref_id` INT(11) NOT NULL,
  `module` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comment_post` (`ref_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
AUTO_INCREMENT = 35;


-- -----------------------------------------------------
-- Table `better-office`.`social`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`social` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `account` VARCHAR(20) NOT NULL,
  `type` INT(11) NOT NULL,
  `module` VARCHAR(20) NOT NULL,
  `ref_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`websites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`websites` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(128) NOT NULL,
  `module` VARCHAR(20) NOT NULL,
  `ref_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`users` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL DEFAULT 'noEmail@noEmail.com',
  `pass` VARCHAR(150) NOT NULL,
  `salt` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `surname` VARCHAR(45) NULL DEFAULT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '0',
  `status` TINYINT(4) NOT NULL DEFAULT '0',
  `date_of_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_of_update` TIMESTAMP NULL DEFAULT NULL,
  `date_of_last_access` TIMESTAMP NULL DEFAULT NULL,
  `date_of_password_last_change` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_user_name_UNIQUE` (`user_name` ASC),
  UNIQUE INDEX `users_email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`company` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `address` INT(11) NULL DEFAULT NULL,
  `social` INT(11) NULL DEFAULT NULL,
  `website` INT(11) NULL DEFAULT NULL,
  `manager` BIGINT(20) UNSIGNED NULL,
  `create_date` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `company_address_idx` (`address` ASC),
  INDEX `company_social_idx` (`social` ASC),
  INDEX `company_websites_idx` (`website` ASC),
  INDEX `company_users_idx` (`manager` ASC),
  CONSTRAINT `fk_company_address`
    FOREIGN KEY (`address`)
    REFERENCES `better-office`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_social`
    FOREIGN KEY (`social`)
    REFERENCES `better-office`.`social` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_websites`
    FOREIGN KEY (`website`)
    REFERENCES `better-office`.`websites` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_users`
    FOREIGN KEY (`manager`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3;


-- -----------------------------------------------------
-- Table `better-office`.`im`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`im` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `account` VARCHAR(20) NOT NULL,
  `type` INT(11) NOT NULL,
  `location` INT(11) NOT NULL,
  `module` VARCHAR(20) NOT NULL,
  `ref_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`email` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(128) NOT NULL,
  `type` INT(11) NOT NULL,
  `module` VARCHAR(20) NOT NULL,
  `ref_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`contact` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(128) NOT NULL,
  `title` VARCHAR(128) NULL DEFAULT NULL,
  `company` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `im` INT NULL,
  `email` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `contact_company` (`company` ASC),
  INDEX `contact__im_idx` (`im` ASC),
  INDEX `contact__email_idx` (`email` ASC),
  CONSTRAINT `fk_contact_company`
    FOREIGN KEY (`company`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_contact_im`
    FOREIGN KEY (`im`)
    REFERENCES `better-office`.`im` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contact_email`
    FOREIGN KEY (`email`)
    REFERENCES `better-office`.`email` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3;


-- -----------------------------------------------------
-- Table `better-office`.`dashboard_page`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`dashboard_page` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `title` VARCHAR(1000) NULL DEFAULT NULL,
  `path` VARCHAR(1000) NULL DEFAULT NULL,
  `weight` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`dashboard_portlet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`dashboard_portlet` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dashboard` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `uid` INT(10) UNSIGNED NULL DEFAULT NULL,
  `settings` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`emails`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`emails` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(60) NULL DEFAULT NULL,
  `verified` TINYINT(1) NOT NULL DEFAULT '0',
  `verification_code` VARCHAR(40) NULL DEFAULT NULL,
  `date_of_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visible` TINYINT(1) NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `emails_user_emails_UNIQUE` (`id_user` ASC, `name` ASC),
  CONSTRAINT `emails_ibfk_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`invitations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`invitations` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` BIGINT(20) UNSIGNED NOT NULL,
  `id_user_invited` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `email` VARCHAR(60) NOT NULL,
  `note` TEXT NULL DEFAULT NULL,
  `invitation_code` VARCHAR(10) NOT NULL,
  `date_of_invitation_send` TIMESTAMP NULL DEFAULT NULL,
  `date_of_invitation_accepted` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `invitations_email_code_UNIQUE` (`email` ASC, `invitation_code` ASC),
  INDEX `id_user` (`id_user` ASC),
  INDEX `id_user_invited` (`id_user_invited` ASC),
  CONSTRAINT `invitations_ibfk_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `invitations_ibfk_2`
    FOREIGN KEY (`id_user_invited`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`invoice` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) DEFAULT NULL,
  `description` VARCHAR(100) DEFAULT NULL,
  `customer` INT(11) DEFAULT NULL,
  `invoicedate` DATE DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `invoice_company_idx` (`customer` ASC),
  CONSTRAINT `fk_invoice_company`
    FOREIGN KEY (`customer`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`text`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`text` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `text` TEXT NULL DEFAULT NULL,
  `ref` INT(11) NULL DEFAULT NULL,
  `module` INT(11) NULL DEFAULT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`valuelist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`valuelist` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `value` INT(11) NULL DEFAULT NULL,
  `name` VARCHAR(20) NULL DEFAULT NULL,
  `module` VARCHAR(20) NULL DEFAULT NULL,
  `field` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`proposal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`proposal` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL DEFAULT NULL,
  `description` VARCHAR(128) NULL DEFAULT NULL,
  `company` INT(11) NULL DEFAULT NULL,
  `total` DOUBLE NULL DEFAULT NULL,
  `cover` INT(11) NULL DEFAULT NULL,
  `pdf` CHAR(1) NULL DEFAULT NULL,
  `sendto` INT(11) NULL DEFAULT NULL,
  `message` VARCHAR(256) NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT NULL,
  `project` INT(11) NULL DEFAULT NULL,
  `opportunity` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `proposal_company_idx` (`company` ASC),
  INDEX `proposal_cover_idx` (`cover` ASC),
  INDEX `proposal_sendto_idx` (`sendto` ASC),
  INDEX `proposal_status_idx` (`status` ASC),
  INDEX `proposal_project_idx` (`project` ASC),
  CONSTRAINT `fk_proposal_company`
    FOREIGN KEY (`company`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposal_cover`
    FOREIGN KEY (`cover`)
    REFERENCES `better-office`.`text` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposal_sendto`
    FOREIGN KEY (`sendto`)
    REFERENCES `better-office`.`contact` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposal_status`
    FOREIGN KEY (`status`)
    REFERENCES `better-office`.`valuelist` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposal_project`
    FOREIGN KEY (`project`)
    REFERENCES `better-office`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `better-office`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`project` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL DEFAULT NULL,
  `description` VARCHAR(256) NULL DEFAULT NULL,
  `user` INT(11) NULL DEFAULT NULL,
  `total` DOUBLE NOT NULL DEFAULT '0',
  `startdate` DATETIME NULL DEFAULT NULL,
  `enddate` DATETIME NULL DEFAULT NULL,
  `company` INT(11) NULL DEFAULT NULL,
  `budget` DOUBLE NOT NULL DEFAULT '0',
  `percent_complete` DOUBLE NOT NULL DEFAULT '0',
  `status` INT(11) NULL DEFAULT NULL,
  `proposal` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `project_company_idx` (`company` ASC),
  INDEX `project_proposal_idx` (`proposal` ASC),
  CONSTRAINT `fk_project_company`
    FOREIGN KEY (`company`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_proposal`
    FOREIGN KEY (`proposal`)
    REFERENCES `better-office`.`proposal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `better-office`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`task` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL DEFAULT NULL,
  `project` INT(11) NULL DEFAULT NULL,
  `startdate` DATETIME NULL DEFAULT NULL,
  `enddate` DATETIME NULL DEFAULT NULL,
  `assignedto` INT(11) NULL DEFAULT NULL,
  `quantity` DOUBLE NULL DEFAULT '0',
  `time` INT(11) NULL DEFAULT NULL,
  `module` VARCHAR(20) NULL DEFAULT NULL,
  `ref_id` INT(11) NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT NULL,
  `percent_complete` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `task_project_idx` (`project` ASC),
  INDEX `task_time_idx` (`time` ASC),
  CONSTRAINT `fk_task_project`
    FOREIGN KEY (`project`)
    REFERENCES `better-office`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_time`
    FOREIGN KEY (`time`)
    REFERENCES `better-office`.`valuelist` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`invoice_line`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`invoice_line` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `description` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `product` INT(11) NULL DEFAULT NULL,
  `project` INT(11) NULL DEFAULT NULL,
  `quantity` DOUBLE NULL DEFAULT NULL,
  `unit` INT(11) NULL DEFAULT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  `linecost` DOUBLE NULL DEFAULT NULL,
  `task` INT(11) NULL DEFAULT NULL,
  `invoice` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_invoice_line_invoice_idx` (`invoice` ASC),
  INDEX `fk_invoice_line_project_idx` (`project` ASC),
  INDEX `fk_invoice_line_task_idx` (`task` ASC),
  INDEX `fk_invoice_line_catalog_idx` (`product` ASC),
  CONSTRAINT `fk_invoice_line_invoice`
    FOREIGN KEY (`invoice`)
    REFERENCES `better-office`.`invoice` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_line_project`
    FOREIGN KEY (`project`)
    REFERENCES `better-office`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_line_task`
    FOREIGN KEY (`task`)
    REFERENCES `better-office`.`task` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_line_catalog`
    FOREIGN KEY (`product`)
    REFERENCES `better-office`.`catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`issue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`issue` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(128) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `company_id` INT(11) NOT NULL,
  `assignedto` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `owner` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT NULL,
  `create_date` DATE NULL DEFAULT NULL,
  `due_date` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_issue_company` (`company_id` ASC),
  INDEX `fk_issue_assignedto_idx` (`assignedto` ASC),
  INDEX `fk_issue_owner_idx` (`owner` ASC),
  CONSTRAINT `fk_issue_company`
    FOREIGN KEY (`company_id`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_issue_assignedto`
    FOREIGN KEY (`assignedto`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_issue_owner`
    FOREIGN KEY (`owner`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6;


-- -----------------------------------------------------
-- Table `better-office`.`meeting`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`meeting` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `location` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `activity_id` INT(11) UNSIGNED NULL DEFAULT NULL,
  `category_id` INT(11) UNSIGNED NULL DEFAULT NULL,
  `description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `startdatetime` DATETIME NULL DEFAULT NULL,
  `enddatetime` DATETIME NULL DEFAULT NULL,
  `url` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `attendee` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `company` INT(11) NULL DEFAULT NULL,
  `project` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_meeting_company_idx` (`company` ASC),
  INDEX `fk_meeting_project_idx` (`project` ASC),
  INDEX `fk_meeting_users_idx` (`attendee` ASC),
  CONSTRAINT `fk_meeting_company`
    FOREIGN KEY (`company`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_meeting_project`
    FOREIGN KEY (`project`)
    REFERENCES `better-office`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_meeting_users`
    FOREIGN KEY (`attendee`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`opportunity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`opportunity` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `amount` DOUBLE NULL DEFAULT '0',
  `type` INT(11) NULL DEFAULT NULL,
  `category` INT(11) NULL DEFAULT NULL,
  `owner` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT NULL,
  `change_date` DATETIME NULL DEFAULT NULL,
  `change_by` INT(11) NULL DEFAULT NULL,
  `company` INT(11) NULL DEFAULT NULL,
  `probability` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `opportunity_type_idx` (`type` ASC),
  INDEX `opportunity_category_idx` (`category` ASC),
  INDEX `opportunity_owner_idx` (`owner` ASC),
  INDEX `opportunity_status_idx` (`status` ASC),
  INDEX `opportunity_change_by_idx` (`change_by` ASC),
  INDEX `opportunity_company_idx` (`company` ASC),
  CONSTRAINT `fk_opportunity_company`
    FOREIGN KEY (`company`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opportunity_owner`
    FOREIGN KEY (`owner`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3;


-- -----------------------------------------------------
-- Table `better-office`.`phone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`phone` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `number` VARCHAR(128) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `type` INT(11) NOT NULL,
  `module` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `ref_id` INT(11) NOT NULL,
  `contact` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `phone_contact_idx` (`contact` ASC),
  INDEX `phone_type_idx` (`type` ASC),
  CONSTRAINT `fk_phone_contact`
    FOREIGN KEY (`contact`)
    REFERENCES `better-office`.`contact` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_phone_type`
    FOREIGN KEY (`type`)
    REFERENCES `better-office`.`valuelist` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4;


-- -----------------------------------------------------
-- Table `better-office`.`proposal_line`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`proposal_line` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `catnum` INT(11) NULL DEFAULT NULL,
  `description` VARCHAR(128) NULL DEFAULT NULL,
  `quantity` DOUBLE NULL DEFAULT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  `time` INT(11) NULL DEFAULT NULL,
  `linecost` DOUBLE NULL DEFAULT NULL,
  `taxable` CHAR(1) NULL DEFAULT NULL,
  `proposal` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `proposal`),
  INDEX `proposal_line_catnum_idx` (`catnum` ASC),
  INDEX `proposal_line_proposal_idx` (`proposal` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_proposal_line_catnum`
    FOREIGN KEY (`catnum`)
    REFERENCES `better-office`.`catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposal_line_proposal`
    FOREIGN KEY (`proposal`)
    REFERENCES `better-office`.`proposal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `better-office`.`resource`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`resource` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `company` INT(11) NULL DEFAULT NULL,
  `email` INT(11) NULL DEFAULT NULL,
  `payrate` DOUBLE NULL DEFAULT NULL,
  `userid` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `billrate` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `resource_users_idx` (`userid` ASC),
  INDEX `resource_company_idx` (`company` ASC),
  CONSTRAINT `fk_resource_users`
    FOREIGN KEY (`userid`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resource_company`
    FOREIGN KEY (`company`)
    REFERENCES `better-office`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5;


-- -----------------------------------------------------
-- Table `better-office`.`settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`settings` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `value` VARCHAR(45) NOT NULL,
  `label` VARCHAR(80) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `date_of_update` TIMESTAMP NULL DEFAULT NULL,
  `setting_order` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `settings_name_UNIQUE` (`name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`users_data`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`users_data` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `obs` TEXT NULL DEFAULT NULL,
  `site` VARCHAR(1500) NULL DEFAULT NULL,
  `facebook_address` VARCHAR(60) NULL DEFAULT NULL,
  `twitter_address` VARCHAR(60) NULL DEFAULT NULL,
  `activation_code` VARCHAR(45) NULL DEFAULT NULL,
  `date_of_update` TIMESTAMP NULL DEFAULT NULL,
  `invitations_left` SMALLINT(6) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  CONSTRAINT `users_data_ibfk_1`
    FOREIGN KEY (`id`)
    REFERENCES `better-office`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `better-office`.`worklog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `better-office`.`worklog` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `task` INT(11) NULL DEFAULT NULL,
  `resource` INT(11) NULL DEFAULT NULL,
  `hours` DOUBLE NULL DEFAULT NULL,
  `workdate` DATETIME NULL DEFAULT NULL,
  `log` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `worklog_task_idx` (`task` ASC),
  INDEX `worklog_resource_idx` (`resource` ASC),
  CONSTRAINT `fk_worklog_task`
    FOREIGN KEY (`task`)
    REFERENCES `better-office`.`task` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_worklog_resource`
    FOREIGN KEY (`resource`)
    REFERENCES `better-office`.`resource` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6;

USE `better-office` ;

-- -----------------------------------------------------
-- procedure test_multi_sets
-- -----------------------------------------------------

DELIMITER $$
USE `better-office`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `better-office`.`authitem`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('AccountPortal_Access', 1, 'Access to the Accounts Portal', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Comment_Access', 1, 'Access to Comments, Call Log, etc.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Company.Create', 0, 'Create Company', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Company.Index', 0, 'View Companies', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Company_Access', 1, 'Show Company Module', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Contact_Access', 1, 'Access to Contacts Module', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('emails_all_view', 0, 'View all emais.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('emails_create', 0, 'Create a secondary email.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('emails_delete', 0, 'Delete a secondary email.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('emails_verificationLink_resend', 0, 'Resend the verification link.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Issue_Access', 1, 'Access to Issues', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Leads_Access', 1, 'Access to Leads', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Meetings_Access', 1, 'Access to Meetings', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Opportunity_Access', 1, 'Access to Opportunities', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('password_change', 0, 'With this right user can change the password without knowing the old password.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('ProjectPortal_Access', 1, 'Access to the Project Portal', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Project_Access', 1, 'Access to Projects', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('ProposalAccess', 1, 'Access to Proposals', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Resource_Access', 1, 'Access to Resources', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('SalePortal_Access', 1, 'Access to the Sales Portal', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('SalesManager', 2, 'Sales Manager', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('SuperAdmin', 2, 'The most powerful admin!', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('SupportPortal_Access', 1, 'Access to the Support Portal', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('Task_Access', 1, 'Access to Tasks', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('users_admin', 0, 'View all users + options.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('users_all_privateProfile_view', 0, 'View a user private profile.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('users_all_view', 0, 'View all users.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('users_create', 0, 'Create a user.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('users_delete', 0, 'Delete a user.', NULL, 'N;');
INSERT INTO `better-office`.`authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('users_profile_update', 0, 'Update a user profile.', NULL, 'N;');

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`authassignment`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('Company.Create', '2', NULL, 'N;');
INSERT INTO `better-office`.`authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('Company.Index', '2', NULL, 'N;');
INSERT INTO `better-office`.`authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('Company_Access', '2', NULL, 'N;');
INSERT INTO `better-office`.`authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES ('SuperAdmin', '1', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`authitemchild`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`authitemchild` (`parent`, `child`) VALUES ('SalesManager', 'Company_Access');

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`comment`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (1, 'This is a test comment.', 2, '2013-04-07 00:00:00', 1, 1, 'company');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (2, 'Had a discussion to plan future work', 2, '2013-04-19 22:28:14', 1, 1, 'company');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (3, 'testing comments from the dashboard', 2, '2013-04-07 00:00:00', 1, 1, 'comment');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (30, 'tes', 2, '2013-04-21 08:04:35', 1, 1, 'comment');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (31, 'test', 2, '2013-04-21 08:04:35', 1, 1, 'comment');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (32, 'testing', 2, '2013-04-21 08:04:35', 1, 1, 'comment');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (33, 'testing', 2, '2013-04-21 08:04:35', 1, 1, 'comment');
INSERT INTO `better-office`.`comment` (`id`, `content`, `status`, `create_time`, `userId`, `ref_id`, `module`) VALUES (34, 'testing', 2, '2013-04-21 08:04:35', 1, 1, 'comment');

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`users` (`id`, `user_name`, `email`, `pass`, `salt`, `name`, `surname`, `active`, `status`, `date_of_creation`, `date_of_update`, `date_of_last_access`, `date_of_password_last_change`) VALUES (1, 'admin', 'ron@radcg.net', '$6$rounds=12587$ 515f497c2d16b2.$l/2BYRJTw5CNnZUpylDds77.vyrP1Q9DMAfaaEUeERJH7nGnjLCRaapj6UbLe9m5o0.Qcs2foEWaiS6p402Y..', '515f497c2d16b2.83362435', 'Admin', 'User', 1, 10, '2014-01-13 20:38:15', '2013-04-19 21:04:18', '2014-01-13 20:38:15', '2013-04-05 17:00:28');
INSERT INTO `better-office`.`users` (`id`, `user_name`, `email`, `pass`, `salt`, `name`, `surname`, `active`, `status`, `date_of_creation`, `date_of_update`, `date_of_last_access`, `date_of_password_last_change`) VALUES (2, 'demo', 'demo@noEmail.com', '$6$rounds=12587$ 515f497ca09ed2.$Pi.XaGbB/5wADch9pWHtEPi1i9NkNpPTVdUAW7e7On9t6po41LZGl/LPMsLdiH4iIvw4vaYPmmTWzqFPVRR.o0', '515f497ca09ed2.55644107', 'Demo', 'Demo', 1, 0, '2014-01-13 17:00:17', '2013-04-19 13:58:18', '2014-01-13 17:00:17', '2013-04-05 17:00:28');

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`company`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`company` (`id`, `name`, `description`, `address`, `social`, `website`, `manager`, `create_date`) VALUES (1, 'RAD Consulting Group', 'The best!', NULL, NULL, NULL, 1, NULL);
INSERT INTO `better-office`.`company` (`id`, `name`, `description`, `address`, `social`, `website`, `manager`, `create_date`) VALUES (2, 'Tiger Safety', 'Tiger Safety Supply Company', NULL, NULL, NULL, 2, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`contact`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`contact` (`id`, `firstname`, `lastname`, `title`, `company`, `description`, `im`, `email`) VALUES (1, 'Ron', 'Bryant', 'Co-Owner', 1, 'Fearless Leader!', NULL, NULL);
INSERT INTO `better-office`.`contact` (`id`, `firstname`, `lastname`, `title`, `company`, `description`, `im`, `email`) VALUES (2, 'Donald', 'Dartez', 'Co-Owner', 1, '', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`emails`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`emails` (`id`, `id_user`, `name`, `verified`, `verification_code`, `date_of_creation`, `visible`) VALUES (1, 1, 'admin@noEmail.com', 0, NULL, '2013-04-05 17:00:28', 0);
INSERT INTO `better-office`.`emails` (`id`, `id_user`, `name`, `verified`, `verification_code`, `date_of_creation`, `visible`) VALUES (2, 2, 'demo@noEmail.com', 0, NULL, '2013-04-05 17:00:28', 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`valuelist`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (1, 1, 'Business', 'phone', 'type');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (2, 2, 'Home', 'phone', 'type');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (3, 1, 'Pending', 'comment', 'status');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (4, 2, 'Approved', 'comment', 'status');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (5, 1, 'Pending', 'project', 'status');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (6, 2, 'Approved', 'project', 'status');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (7, 3, 'In Progress', 'project', 'status');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (8, 4, 'Complete', 'project', 'status');
INSERT INTO `better-office`.`valuelist` (`id`, `value`, `name`, `module`, `field`) VALUES (9, 5, 'Closed', 'project', 'status');

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`proposal`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`proposal` (`id`, `name`, `description`, `company`, `total`, `cover`, `pdf`, `sendto`, `message`, `status`, `project`, `opportunity`) VALUES (1, 'Proposal', 'test', 1, 1000, NULL, NULL, NULL, NULL, 2, 1, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`project`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`project` (`id`, `name`, `description`, `user`, `total`, `startdate`, `enddate`, `company`, `budget`, `percent_complete`, `status`, `proposal`) 
VALUES (1, 'Tiger Safety', 'Tiger Safety SEO Project', 1, 1500, '2013-04-01 00:00:00', '2013-04-30 00:00:00', 1, 5000, 20, 3, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`task`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`task` (`id`, `name`, `project`, `startdate`, `enddate`, `assignedto`, `quantity`, `time`, `module`, `ref_id`, `status`, `percent_complete`) VALUES (1, 'Est Marina site', 1, NULL, NULL, 1, 4, NULL, 'company', 1, 2, NULL);
INSERT INTO `better-office`.`task` (`id`, `name`, `project`, `startdate`, `enddate`, `assignedto`, `quantity`, `time`, `module`, `ref_id`, `status`, `percent_complete`) VALUES (2, 'Est Port of Delcambre Graphic Update', 1, NULL, NULL, 1, 3, NULL, 'company', 1, 2, NULL);
INSERT INTO `better-office`.`task` (`id`, `name`, `project`, `startdate`, `enddate`, `assignedto`, `quantity`, `time`, `module`, `ref_id`, `status`, `percent_complete`) VALUES (3, 'Complete NuNus', 1, NULL, NULL, 1, 6, NULL, 'company', 1, 2, NULL);
INSERT INTO `better-office`.`task` (`id`, `name`, `project`, `startdate`, `enddate`, `assignedto`, `quantity`, `time`, `module`, `ref_id`, `status`, `percent_complete`) VALUES (4, 'Complete Touchard\'s Marine', 1, NULL, NULL, 1, 2, NULL, 'company', 1, 2, NULL);
INSERT INTO `better-office`.`task` (`id`, `name`, `project`, `startdate`, `enddate`, `assignedto`, `quantity`, `time`, `module`, `ref_id`, `status`, `percent_complete`) VALUES (5, 'Follow up with eBrandz about video', 1, '2013-04-17 11:00:00', '2013-04-19 14:00:00', 1, 2, NULL, 'company', 1, 2, NULL);
INSERT INTO `better-office`.`task` (`id`, `name`, `project`, `startdate`, `enddate`, `assignedto`, `quantity`, `time`, `module`, `ref_id`, `status`, `percent_complete`) VALUES (6, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`issue`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`issue` (`id`, `title`, `description`, `company_id`, `assignedto`, `owner`, `status`, `create_date`, `due_date`) VALUES (1, 'Test Issue', 'Testing adding issues', 1, NULL, NULL, 1, NULL, NULL);
INSERT INTO `better-office`.`issue` (`id`, `title`, `description`, `company_id`, `assignedto`, `owner`, `status`, `create_date`, `due_date`) VALUES (2, 'New Issue', 'testing', 1, NULL, NULL, 2, NULL, NULL);
INSERT INTO `better-office`.`issue` (`id`, `title`, `description`, `company_id`, `assignedto`, `owner`, `status`, `create_date`, `due_date`) VALUES (3, 'New Issue', 'testing', 2, NULL, NULL, 2, NULL, NULL);
INSERT INTO `better-office`.`issue` (`id`, `title`, `description`, `company_id`, `assignedto`, `owner`, `status`, `create_date`, `due_date`) VALUES (4, 'New Issue', 'testing', 2, NULL, NULL, 1, NULL, NULL);
INSERT INTO `better-office`.`issue` (`id`, `title`, `description`, `company_id`, `assignedto`, `owner`, `status`, `create_date`, `due_date`) VALUES (5, 'New Issue', 'what a mess!', 2, NULL, NULL, 2, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`opportunity`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`opportunity` (`id`, `name`, `description`, `amount`, `type`, `category`, `owner`, `status`, `change_date`, `change_by`, `company`, `probability`) VALUES (1, 'Coffee Shop web site', '', 7500, 1, 1, 1, 2, '2013-04-18 00:00:00', 1, 1, NULL);
INSERT INTO `better-office`.`opportunity` (`id`, `name`, `description`, `amount`, `type`, `category`, `owner`, `status`, `change_date`, `change_by`, `company`, `probability`) VALUES (2, 'Test Record', NULL, 5000, 1, 1, 2, 2, '2013-04-18 00:00:00', 1, 1, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`phone`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`phone` (`id`, `number`, `type`, `module`, `ref_id`, `contact`) VALUES (1, '612-801-7658', 1, '', 0, 1);
INSERT INTO `better-office`.`phone` (`id`, `number`, `type`, `module`, `ref_id`, `contact`) VALUES (2, '337-856-2044', 1, '', 0, 2);
INSERT INTO `better-office`.`phone` (`id`, `number`, `type`, `module`, `ref_id`, `contact`) VALUES (3, '337-291-2881', 1, 'company', 1, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`resource`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`resource` (`id`, `name`, `company`, `email`, `payrate`, `userid`, `billrate`) VALUES (1, 'Ron Bryant', 1, 0, 0, 1, 100);
INSERT INTO `better-office`.`resource` (`id`, `name`, `company`, `email`, `payrate`, `userid`, `billrate`) VALUES (2, 'Donald Dartez', 1, NULL, 0, 2, 100);
INSERT INTO `better-office`.`resource` (`id`, `name`, `company`, `email`, `payrate`, `userid`, `billrate`) VALUES (3, 'Leslie Davis', 3, NULL, 60, 3, 75);
INSERT INTO `better-office`.`resource` (`id`, `name`, `company`, `email`, `payrate`, `userid`, `billrate`) VALUES (4, 'Elizabeth Bell', 4, NULL, 75, 4, 90);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`settings`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (1, 'logInIfNotVerified', '0', 'Allow users to LogIn if they are not active?', '', '2013-04-05 16:57:51', 100);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (2, 'enabledSignUp', '0', 'SignUp is enabled?', 'If SignUp is disabled, no SignUps are allowed, in any case!', '2013-04-05 16:57:51', 200);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (3, 'invitationBasedSignUp', '0', 'Only invited users are allowed to SignUp?', 'If SignUp is disabled, no user can SignUp, even invited ones!', '2013-04-05 16:57:51', 300);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (4, 'invitationButtonDisplay', '0', 'Display the invitation button to all users?', '', '2013-04-05 16:57:51', 400);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (5, 'invitationDefaultNumber', '5', 'Default number of invitations per user? (if <0 = infinit number)', '', '2013-04-05 16:57:51', 500);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (6, 'invitationEmail', 'webmaster@localhost', 'Invitation email is sent from:', '', '2013-04-05 16:57:51', 600);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (7, 'hoursInvitationLinkIsActive', '144', 'How many hours the invitation link is active? (if <0 = forever)', '', '2013-04-05 16:57:51', 700);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (8, 'hoursActivationLinkIsActive', '72', 'How many hours the activation link is active? (if <0 = forever)', '', '2013-04-05 16:57:51', 900);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (9, 'notificationSignUpEmail', 'webmaster@localhost', 'Activation email is sent from:', '', '2013-04-05 16:57:51', 800);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (10, 'hoursVerificationLinkIsActive', '144', 'How many hours the email verification link is active? (if <0 = forever)', 'How many hours the email verification link is active? (when user associates a new email address to his/hers account)', '2013-04-05 16:57:51', 1000);
INSERT INTO `better-office`.`settings` (`id`, `name`, `value`, `label`, `description`, `date_of_update`, `setting_order`) VALUES (11, 'notificationVerificationEmail', 'webmaster@localhost', 'Verification email is sent from:', '', '2013-04-05 16:57:51', 1100);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`users_data`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`users_data` (`id`, `description`, `obs`, `site`, `facebook_address`, `twitter_address`, `activation_code`, `date_of_update`, `invitations_left`) VALUES (1, 'The default SuperAdmin user!', '', '', '', '', '398f509a78cf7880f3712b85c6beb12d69000338', '2013-04-06 19:55:34', -1);
INSERT INTO `better-office`.`users_data` (`id`, `description`, `obs`, `site`, `facebook_address`, `twitter_address`, `activation_code`, `date_of_update`, `invitations_left`) VALUES (2, 'The default regular user!', NULL, NULL, NULL, NULL, '9a67add8d8bde84f465136b6c741175fd9fec5f5', '2013-04-05 17:00:28', -1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `better-office`.`worklog`
-- -----------------------------------------------------
START TRANSACTION;
USE `better-office`;
INSERT INTO `better-office`.`worklog` (`id`, `task`, `resource`, `hours`, `workdate`, `log`) VALUES (1, 5, 1, 3, '2013-04-13 00:00:00', 'did something');
INSERT INTO `better-office`.`worklog` (`id`, `task`, `resource`, `hours`, `workdate`, `log`) VALUES (2, 1, 1, 4, NULL, NULL);
INSERT INTO `better-office`.`worklog` (`id`, `task`, `resource`, `hours`, `workdate`, `log`) VALUES (3, 3, 2, 5, NULL, NULL);
INSERT INTO `better-office`.`worklog` (`id`, `task`, `resource`, `hours`, `workdate`, `log`) VALUES (4, 4, 3, 10, NULL, NULL);
INSERT INTO `better-office`.`worklog` (`id`, `task`, `resource`, `hours`, `workdate`, `log`) VALUES (5, 2, 1, 4, NULL, NULL);

COMMIT;

