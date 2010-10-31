/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/31/2010 7:47:35 PM                        */
/*==============================================================*/


drop table if exists BANDOCYKIEN;

drop table if exists BINHCHON;

drop table if exists CACVITRI;

drop table if exists LIENKET;

drop table if exists LOAITIN;

drop table if exists NHOM;

drop table if exists PHUONGAN;

drop table if exists QUANGCAO;

drop table if exists SUKIEN;

drop table if exists THELOAI;

drop table if exists TIN;

drop table if exists USER;

drop table if exists USERLOG;

/*==============================================================*/
/* Table: BANDOCYKIEN                                           */
/*==============================================================*/
create table BANDOCYKIEN
(
   IDYKIEN              varchar(10) not null,
   IDTIN                varchar(10),
   NGAY                 datetime,
   NOIDUNG              text,
   EMAIL                varchar(50),
   HOTEN                varchar(100),
   DIACHI               varchar(200),
   primary key (IDYKIEN)
);

/*==============================================================*/
/* Table: BINHCHON                                              */
/*==============================================================*/
create table BINHCHON
(
   IDBC                 varchar(10) not null,
   MOTA                 varchar(100),
   IDLT                 varchar(10),
   SOLANCHON            int,
   ANHIEN               bit,
   THUTU                int,
   primary key (IDBC)
);

/*==============================================================*/
/* Table: CACVITRI                                              */
/*==============================================================*/
create table CACVITRI
(
   IDVITRI              varchar(10) not null,
   TENVITRI             varchar(50),
   primary key (IDVITRI)
);

/*==============================================================*/
/* Table: LIENKET                                               */
/*==============================================================*/
create table LIENKET
(
   IDWEBLINK            varchar(10) not null,
   TEN                  varchar(100),
   URL                  varchar(200),
   THUTU                int,
   primary key (IDWEBLINK)
);

/*==============================================================*/
/* Table: LOAITIN                                               */
/*==============================================================*/
create table LOAITIN
(
   IDLT                 varchar(10) not null,
   TEN                  varchar(100),
   URL                  varchar(200),
   THUTU                int,
   ANHIEN               bit,
   IDTL                 varchar(10),
   KEYWORD              varchar(30),
   TARGET               varchar(200),
   ICONHINH             varchar(100),
   FILECSS              varchar(100),
   primary key (IDLT)
);

/*==============================================================*/
/* Table: NHOM                                                  */
/*==============================================================*/
create table NHOM
(
   IDNHOM               varchar(10) not null,
   MOTA                 varchar(100),
   primary key (IDNHOM)
);

/*==============================================================*/
/* Table: PHUONGAN                                              */
/*==============================================================*/
create table PHUONGAN
(
   IDPA                 varchar(10) not null,
   MOTA                 varchar(100),
   SOLANCHON            int,
   IDBC                 varchar(10),
   primary key (IDPA)
);

/*==============================================================*/
/* Table: QUANGCAO                                              */
/*==============================================================*/
create table QUANGCAO
(
   IDQC                 varchar(10) not null,
   MOTA                 varchar(100),
   URL                  varchar(200),
   URLHINH              varchar(200),
   IDLT                 varchar(10),
   IDVITRI              varchar(10),
   SOLANCLICK           int,
   primary key (IDQC)
);

/*==============================================================*/
/* Table: SUKIEN                                                */
/*==============================================================*/
create table SUKIEN
(
   IDSK                 varchar(10) not null,
   MOTA                 varchar(100),
   primary key (IDSK)
);

/*==============================================================*/
/* Table: THELOAI                                               */
/*==============================================================*/
create table THELOAI
(
   IDTL                 varchar(10) not null,
   TENTL                varchar(50),
   THUTU                int,
   ANHIEN               bit,
   primary key (IDTL)
);

/*==============================================================*/
/* Table: TIN                                                   */
/*==============================================================*/
create table TIN
(
   IDTIN                varchar(10) not null,
   TIEUDE               varchar(100),
   TOMTAT               text,
   URLHINH              varchar(200),
   NGAY                 datetime,
   IDUSER               varchar(10),
   IDSK                 varchar(10),
   CONTENT              text,
   IDLT                 varchar(10),
   SOLANXEM             int,
   KEYWORD              varchar(30),
   TINNOIBAT            boolean,
   ANHIEN               bit,
   primary key (IDTIN)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   IDUSER               varchar(10) not null,
   HOTEN                varchar(100),
   USERNAME             varchar(50),
   PASSWORD             varchar(50),
   EMAIL                varchar(50),
   NGAYDANGKY           date,
   IDNHOM               varchar(10),
   NGAYSINH             date,
   GIOITINH             bit,
   primary key (IDUSER)
);

/*==============================================================*/
/* Table: USERLOG                                               */
/*==============================================================*/
create table USERLOG
(
   ID                   varchar(10) not null,
   IDUSER               varchar(10),
   IPADRESS             varchar(12),
   LASTLOGINDATE        datetime,
   LASTACTIVEDATE       datetime,
   SESSION              varchar(200),
   primary key (ID)
);

alter table BANDOCYKIEN add constraint FK_IDTIN foreign key (IDTIN)
      references TIN (IDTIN) on delete restrict on update restrict;

alter table BINHCHON add constraint FK_IDLT foreign key (IDLT)
      references LOAITIN (IDLT) on delete restrict on update restrict;

alter table LOAITIN add constraint FK_IDTL foreign key (IDTL)
      references THELOAI (IDTL) on delete restrict on update restrict;

alter table PHUONGAN add constraint FK_IDBC foreign key (IDBC)
      references BINHCHON (IDBC) on delete restrict on update restrict;

alter table QUANGCAO add constraint FK_IDLT foreign key (IDLT)
      references LOAITIN (IDLT) on delete restrict on update restrict;

alter table QUANGCAO add constraint FK_IDVITRI foreign key (IDVITRI)
      references CACVITRI (IDVITRI) on delete restrict on update restrict;

alter table TIN add constraint FK_IDLT foreign key (IDLT)
      references LOAITIN (IDLT) on delete restrict on update restrict;

alter table TIN add constraint FK_IDSK foreign key (IDSK)
      references SUKIEN (IDSK) on delete restrict on update restrict;

alter table TIN add constraint FK_IDUSER foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

alter table USER add constraint FK_IDGROUP foreign key (IDNHOM)
      references NHOM (IDNHOM) on delete restrict on update restrict;

alter table USERLOG add constraint FK_IDUSER foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

