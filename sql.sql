CREATE DATABASE shipyard;
use shipyard;
DROP TABLE IF EXISTS `ship_admin`;
CREATE TABLE IF NOT EXISTS `ship_admin`(
    `adminid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '����ID',
    `adminuser` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '����Ա�˺�',
    `adminpass` CHAR(32) NOT NULL DEFAULT '' COMMENT '����Ա����',
    `adminemail` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '����Ա��������',
    `logintime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '��¼ʱ��',
    `loginip` BIGINT NOT NULL DEFAULT '0' COMMENT '��¼IP',
    `createtime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '����ʱ��',
    PRIMARY KEY(`adminid`),
    UNIQUE shop_admin_adminuser_adminpass(`adminuser`, `adminpass`),
    UNIQUE shop_admin_adminuser_adminemail(`adminuser`, `adminemail`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ship_admin`(adminuser,adminpass,adminemail,createtime) VALUES('admin', md5('123'), 'nill_rhoads@163.com', UNIX_TIMESTAMP());
