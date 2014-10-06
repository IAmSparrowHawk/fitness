drop table if exists tbl_typeserv;
create table IF NOT EXISTS tbl_typeserv( -- справочник типы устлуг
  id integer not null primary key auto_increment,-- ключ
  descript varchar(255) not null -- название типа
) ENGINE = InnoDB;
insert into tbl_typeserv(descript)values ('Тонус-зал');
insert into tbl_typeserv(descript)values ('Фитнес-зал');
insert into tbl_typeserv(descript)values ('Спа-зал');
insert into tbl_typeserv(descript)values ('Косметологические');
insert into tbl_typeserv(descript)values ('Бассейн');
insert into tbl_typeserv(descript)values ('Товар');

drop table if exists tbl_typestatus;
create table IF NOT EXISTS tbl_typestatus( -- справочник статус записи в расписании
  id integer not null primary key auto_increment,-- ключ
  descript varchar(255) not null -- статус
) ENGINE=InnoDB  DEFAULT CHARACTER SET utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
insert into tbl_typestatus(descript)values ('Выполнено');
insert into tbl_typestatus(descript)values ('Подтвержено');
insert into tbl_typestatus(descript)values ('Отклонено');
insert into tbl_typestatus(descript)values ('Не выполнено');
insert into tbl_typestatus(descript)values ('Ожидание ответа');

drop table if exists tbl_typerole;
create table IF NOT EXISTS tbl_typerole( -- справочник роли пользователей
  id integer not null primary key auto_increment,-- ключ
  descript varchar(255) not null -- статус
) ENGINE=InnoDB  AUTO_INCREMENT=1;
insert into tbl_typerole(descript)values ('admin');
insert into tbl_typerole(descript)values ('coach');
insert into tbl_typerole(descript)values ('client');

drop table if exists tbl_typeduration;
create table IF NOT EXISTS tbl_typeduration( -- справочник "время действия абонемента"
  id integer not null primary key auto_increment,-- ключ
  descript varchar(255) not null -- статус
) ENGINE=InnoDB  AUTO_INCREMENT=1;
insert into tbl_typeduration(descript)values ('Основное');
insert into tbl_typeduration(descript)values ('Утро: 8-14');
insert into tbl_typeduration(descript)values ('Вечер: 14-22');

drop table if exists tbl_typeabon;
create table IF NOT EXISTS tbl_typeabon( -- справочник типы абонемента
  id integer not null primary key auto_increment, -- ключ
  descript varchar(255) not null -- название типа
) ENGINE=InnoDB  AUTO_INCREMENT=1;
insert into tbl_typeabon(descript)values ('Основной');
insert into tbl_typeabon(descript)values ('Тонус зона');
insert into tbl_typeabon(descript)values ('Фитнес зона');
insert into tbl_typeabon(descript)values ('Спа зона');
insert into tbl_typeabon(descript)values ('Групповой');
insert into tbl_typeabon(descript)values ('Единичный');

drop table if exists tbl_serv;
create table IF NOT EXISTS tbl_serv( -- список услуг фитнесс-зала
  id integer not null primary key auto_increment,-- ключ
  typeserv integer not null, -- тип услуги
  servname varchar(255) not null, -- название услуги
  pricemoney float not null, -- цена в руб
  priceunit integer not null, -- цена в единицах
  timeserv int, -- время услуги в минутах
  KEY FK_serv_type(typeserv)
)ENGINE=InnoDB  AUTO_INCREMENT=1;
-- тонус-зал
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Тонусные столы-8', 1, 2, 56);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Тонусные столы-4', 1, 1, 28);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Виброплатформа 5', 1, 1, 5);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Виброплатформа 10', 1, 2, 10);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Баланс-платформа 15', 1, 1, 15);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Баланс-платформа 30', 1, 2, 30);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (1, 'Иппотренажер', 1, 1, 15);
-- фитнесс-зал
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (2, 'Функциональный тренинг', 250, 1, 60);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (2, 'Восточные танцы', 250, 1, 60);
-- спа
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (3, 'Ягодное сияние', 2100, 6, 56);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (3, 'Бархатная кожа (с аромамаслом «Омолаживающее» (регенерирующее))', 1600, 6, 28);
-- Косметологические
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (4, 'Химический пилинг лица L+', 900, 0, 10);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (4, 'Химический пилинг лица GLS', 950, 0, 15);
-- Товар
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (6, 'Крем-гель корректирующий Альганика 500 ml', 590, 0, 0);
insert into tbl_serv(typeserv, servname,pricemoney,priceunit,timeserv)values (6, 'Омолаживающий крем Janssen Cosmetics', 300, 0, 0);

drop table if exists tbl_client;
create table IF NOT EXISTS  tbl_client( -- клиенты
  id integer not null primary key auto_increment,-- ключ
  familyname varchar(50) not null,-- фамилия
  personname varchar(50) not null,-- имя
  farthername varchar(50),-- отчество
  birthdate date not null,-- дата рождения
  adres varchar(255), -- адрес
  phone varchar(20), -- контактный телефон
  limits varchar(255), -- ограничения на занятия спортом
  program varchar(1024), -- рекомендованная программа
  diet varchar(1024), -- рекомендованная диета
  begindate date not null, -- дата прихода
  email varchar(128) -- контактный эл.адрес
) ENGINE=InnoDB  AUTO_INCREMENT=1;
insert into tbl_client(familyname,personname,farthername,birthdate,phone,limits, begindate)values
('Иванова','Анна','Ивановна',date('1980-01-01'),'+7-905-606-01-01','Травма позвоночника',date('2014-01-10'));
insert into tbl_client(familyname,personname,farthername,birthdate,phone,limits, begindate)values
('Петрова','Инна','Петровна',date('1988-10-10'),'+7-905-305-05-05','Нет',date('2014-11-04'));

drop table if exists tbl_coach;
create table IF NOT EXISTS tbl_coach( -- тренеры
  id integer not null primary key auto_increment,-- ключ
  familyname varchar(50) not null,-- фамилия
  personname varchar(50) not null,-- имя
  farthername varchar(50),-- отчество
  birthdate date not null,-- дата рождения
  adres varchar(255), -- адрес
  phone varchar(20), -- контактный телефон
  begindate date not null, -- дата приема на работу
  enddate date, -- дата увольнения
  email varchar(128), -- контактный эл.адрес
  office varchar(128), -- должность
  schedule varchar(50) -- график
) ENGINE=InnoDB  AUTO_INCREMENT=1;
insert into tbl_coach(familyname,personname,farthername,birthdate,phone,begindate,office) values
('Смирнова','Екатерина','Васильевна',date('1984-01-23'),'+7-937-909-02-34',date('2010-04-11'),'Старший тренер');
insert into tbl_coach(familyname,personname,farthername,birthdate,phone,begindate,office) values
('Васильева','Марина','Ивановна',date('1986-06-02'),'+7-937-945-34-34',date('2013-11-04'),'Косметолог');

drop table if exists tbl_abonement;
create table IF NOT EXISTS tbl_abonement(-- абонемент
  id integer not null primary key auto_increment,-- ключ
  num integer not null, -- №
  countunit integer, -- количество единиц
  paydate date not null, -- дата оплаты
  datebegin date not null, -- срок действия начало
  dateend date not null, -- срок дейтсвия конец
  typeduration integer not null, -- тип времени действия
  balance integer, -- остаток единиц
  typeabon integer not null, -- тип абонемента
  client integer, -- клиент
  coach integer, -- персонал
  KEY FK_abonement_durname(typeduration),
  KEY FK_abonement_abon(typeabon),
  KEY FK_abonement_client(client),
  KEY FK_abonement_coach(coach)
) ENGINE=InnoDB  AUTO_INCREMENT=1;
insert into tbl_abonement(num,countunit,paydate,datebegin,dateend,typeduration,typeabon,client)values
(1, -1,date('2014-06-02'),date('2014-06-02'),date('2014-12-02'),1,1,1);
insert into tbl_abonement(num,countunit,paydate,datebegin,dateend,typeduration,typeabon,client,balance)values
(1, 300,date('2014-07-22'),date('2014-08-01'),date('2015-03-01'),1,1,1,300);

drop table if exists tbl_metering;
create table IF NOT EXISTS tbl_metering(-- замер
 id integer not null primary key auto_increment,-- ключ
 client integer, -- клиент
 coach integer, -- персонал
 datemetr date, -- дата замера
 weight float, -- вес
 chest float, -- обхват груди
 waistline float, -- обхват талии
 abdominalgirth float, -- обхват живота
 hips float, -- обхват бедер
 rhip float, -- обхват правого бедра
 rknee float, -- обхват правого колена
 rtibia float, -- обхват правой голени
 rforearm float, -- обхват правого предплечья
 KEY FK_metering_client(client),
  KEY FK_metering_coach(coach)
)ENGINE=InnoDB  AUTO_INCREMENT=1;

drop table if exists tbl_schedule;
create table IF NOT EXISTS  tbl_schedule( -- расписание
 id integer not null primary key auto_increment,-- ключ
 client integer, -- клиент
 coach integer, -- персонал
 datevisit date, -- дата визита
 timevisit time, -- время визита
 serv integer, -- услуга
 status integer, -- статус
 KEY FK_schedul_client(client),
  KEY FK_schedul_coach(coach),
  KEY FK_schedul_serv(serv),
  KEY FK_schedul_status(status)
)ENGINE=InnoDB  AUTO_INCREMENT=1;

drop table if exists tbl_user;
create table IF NOT EXISTS  tbl_user ( -- набор пользователей
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, -- ключ
    username VARCHAR(128) NOT NULL, -- логин
    password VARCHAR(128) NOT NULL, -- пароль
    role INTEGER NOT NULL, -- роль
    client integer, -- указатель на клиента
    coach integer, -- указатель на тренера
    KEY FK_user_role (role),
    KEY FK_user_client (client),
    KEY FK_user_coach (coach)
) ENGINE=InnoDB  AUTO_INCREMENT=1;

INSERT INTO tbl_user (username, password, role) VALUES ('admin', 'admin', 1);-- запись админа
INSERT INTO tbl_user (username, password, role, coach) VALUES ('coach1', '1', 2, 1);-- запись младшего тренера
INSERT INTO tbl_user (username, password, role, coach) VALUES ('coach2', '2', 2, 2);-- запись старшего администратора
INSERT INTO tbl_user (username, password, role, client) VALUES ('client1', '1', 3, 1); -- запись клиента 1
INSERT INTO tbl_user (username, password, role, client) VALUES ('client2', '2', 3, 2); -- запись клиента 2