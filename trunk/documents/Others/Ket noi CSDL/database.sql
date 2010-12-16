/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16/12/2010 1:49:54 CH                        */
/*==============================================================*/


drop table if exists CHUYENMUC;

drop table if exists LINHVUC;

drop table if exists PHIENBAN;

drop table if exists QUANGCAO;

drop table if exists SUKIEN;

drop table if exists THONGKEQUANGCAO;

drop table if exists THONGKETIN;

drop table if exists TIN;

drop table if exists TINHOT;

drop table if exists USER;

drop table if exists USERCHUYENMUC;

drop table if exists VAITRO;

drop table if exists VITRI;

drop table if exists VITRIDANG;

drop table if exists YKIENBANDOC;

/*==============================================================*/
/* Table: CHUYENMUC                                             */
/*==============================================================*/
create table CHUYENMUC
(
   MACM                 smallint not null,
   MALV                 smallint,
   TENCM                char(50),
   MOTA                 varchar(200),
   primary key (MACM)
);

/*==============================================================*/
/* Table: LINHVUC                                               */
/*==============================================================*/
create table LINHVUC
(
   MALV                 smallint not null,
   TENLV                char(50),
   MOTA                 varchar(200),
   primary key (MALV)
);

/*==============================================================*/
/* Table: PHIENBAN                                              */
/*==============================================================*/
create table PHIENBAN
(
   MATIN                int not null,
   SOPHIENBAN           smallint not null,
   TOMTAT               longtext,
   NOIDUNG              longtext not null,
   GHICHU               longtext,
   GOPY                 longtext,
   primary key (MATIN, SOPHIENBAN)
);

/*==============================================================*/
/* Table: QUANGCAO                                              */
/*==============================================================*/
create table QUANGCAO
(
   MAQC                 int not null,
   USERNAME             char(50),
   URLHINH              longtext not null,
   NGAYBATDAU           date not null,
   NGAYKETTHUC          date not null,
   SOTIEN               numeric(8,2),
   primary key (MAQC)
);

/*==============================================================*/
/* Table: SUKIEN                                                */
/*==============================================================*/
create table SUKIEN
(
   IDSK                 int not null,
   MOTA                 varchar(200),
   primary key (IDSK)
);

/*==============================================================*/
/* Table: THONGKEQUANGCAO                                       */
/*==============================================================*/
create table THONGKEQUANGCAO
(
   MAQC                 int not null,
   NGAYGIO              datetime not null,
   SOLANCLICK           int,
   primary key (MAQC, NGAYGIO)
);

/*==============================================================*/
/* Table: THONGKETIN                                            */
/*==============================================================*/
create table THONGKETIN
(
   MATIN                int not null,
   NGAYGIO              datetime not null,
   SOLANXEM             int,
   primary key (MATIN, NGAYGIO)
);

/*==============================================================*/
/* Table: TIN                                                   */
/*==============================================================*/
create table TIN
(
   MATIN                int not null,
   IDSK                 int,
   USERNAME             char(50),
   MACM                 smallint,
   TIEUDE               char(100),
   NGAYDANG             datetime,
   PHIENBAN             smallint comment 'Phiên b?n ðý?c ðãng, n?u không có phiên b?n nào ðý?c ðãng th? null.
            Có ngh?a là bài báo chýa ðý?c duy?t',
   COMMENT              smallint,
   primary key (MATIN)
);

/*==============================================================*/
/* Table: TINHOT                                                */
/*==============================================================*/
create table TINHOT
(
   NGAYBATDAU           datetime not null,
   NGAYKETTHUC          datetime not null,
   MATIN                int,
   primary key (NGAYBATDAU, NGAYKETTHUC)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   USERNAME             char(50) not null,
   MAVT                 smallint,
   PASS                 char(20),
   HOTEN                char(50),
   GIOITINH             smallint,
   NGAYSINH             date,
   DIACHI               text,
   EMAIL                char(255),
   SDT                  char(20),
   CMND                 char(10),
   primary key (USERNAME)
);

/*==============================================================*/
/* Table: USERCHUYENMUC                                         */
/*==============================================================*/
create table USERCHUYENMUC
(
   MACM                 smallint not null,
   USERNAME             char(50) not null,
   primary key (MACM, USERNAME)
);

/*==============================================================*/
/* Table: VAITRO                                                */
/*==============================================================*/
create table VAITRO
(
   MAVT                 smallint not null,
   TENVT                char(100),
   MOTA                 varchar(200),
   primary key (MAVT)
);

/*==============================================================*/
/* Table: VITRI                                                 */
/*==============================================================*/
create table VITRI
(
   MAVT                 smallint not null,
   TEN                  char(50),
   primary key (MAVT)
);

/*==============================================================*/
/* Table: VITRIDANG                                             */
/*==============================================================*/
create table VITRIDANG
(
   MAQC                 int not null,
   MAVT                 smallint not null,
   primary key (MAQC, MAVT)
);

/*==============================================================*/
/* Table: YKIENBANDOC                                           */
/*==============================================================*/
create table YKIENBANDOC
(
   MAYKIEN              int not null,
   MATIN                int,
   NOIDUNG              longtext,
   TENNGUOIDUNG         char(50),
   EMAIL                char(50),
   NGAYGUI              datetime,
   DUOCDANG             smallint,
   primary key (MAYKIEN)
);

alter table CHUYENMUC add constraint FK_CM_LV foreign key (MALV)
      references LINHVUC (MALV) on delete restrict on update restrict;

alter table PHIENBAN add constraint FK_THUOC foreign key (MATIN)
      references TIN (MATIN) on delete restrict on update restrict;

alter table QUANGCAO add constraint FK_DANG_QC foreign key (USERNAME)
      references USER (USERNAME) on delete restrict on update restrict;

alter table THONGKEQUANGCAO add constraint FK_DEM_QUANG_CAO foreign key (MAQC)
      references QUANGCAO (MAQC) on delete restrict on update restrict;

alter table THONGKETIN add constraint FK_THONG_KE foreign key (MATIN)
      references TIN (MATIN) on delete restrict on update restrict;

alter table TIN add constraint FK_TIN_CHUYEN_MUC foreign key (MACM)
      references CHUYENMUC (MACM) on delete restrict on update restrict;

alter table TIN add constraint FK_TIN_SK foreign key (IDSK)
      references SUKIEN (IDSK) on delete restrict on update restrict;

alter table TIN add constraint FK_VIET_BAI foreign key (USERNAME)
      references USER (USERNAME) on delete restrict on update restrict;

alter table TINHOT add constraint FK_LA_TIN_HOT foreign key (MATIN)
      references TIN (MATIN) on delete restrict on update restrict;

alter table USER add constraint FK_MANV_BAN_HANG foreign key (MAVT)
      references VAITRO (MAVT) on delete restrict on update restrict;

alter table USERCHUYENMUC add constraint FK_USER_CHUYENMUC foreign key (MACM)
      references CHUYENMUC (MACM) on delete restrict on update restrict;

alter table USERCHUYENMUC add constraint FK_USER_CHUYENMUC2 foreign key (USERNAME)
      references USER (USERNAME) on delete restrict on update restrict;

alter table VITRIDANG add constraint FK_VI_TRI_DANG foreign key (MAQC)
      references QUANGCAO (MAQC) on delete restrict on update restrict;

alter table VITRIDANG add constraint FK_VI_TRI_DANG2 foreign key (MAVT)
      references VITRI (MAVT) on delete restrict on update restrict;

alter table YKIENBANDOC add constraint FK_Y_KIEN foreign key (MATIN)
      references TIN (MATIN) on delete restrict on update restrict;

