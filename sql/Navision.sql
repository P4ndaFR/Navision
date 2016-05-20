/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  20/05/2016 16:47:07                      */
/*==============================================================*/


drop table if exists BATIMENTS;

drop table if exists LIAISON;

drop table if exists POINT;

/*==============================================================*/
/* Table : BATIMENTS                                            */
/*==============================================================*/
create table BATIMENTS
(
   CODE_BAT             varchar(1024) not null,
   NOM_BAT              varchar(1024) not null,
   primary key (CODE_BAT)
);

/*==============================================================*/
/* Table : LIAISON                                              */
/*==============================================================*/
create table LIAISON
(
   POI_ID_PT            int not null,
   ID_PT                int not null,
   primary key (POI_ID_PT, ID_PT)
);

/*==============================================================*/
/* Table : POINT                                                */
/*==============================================================*/
create table POINT
(
   ID_PT                int not null,
   CODE_BAT             varchar(1024) not null,
   X                    int not null,
   Y                    int not null,
   ETAGE                int not null,
   NOM                  varchar(1024),
   DESCRIPTION          varchar(1024),
   QR_CODE              longblob,
   URL                  varchar(1024),
   primary key (ID_PT)
);

alter table LIAISON add constraint FK_LIAISON foreign key (POI_ID_PT)
      references POINT (ID_PT) on delete restrict on update restrict;

alter table LIAISON add constraint FK_LIAISON2 foreign key (ID_PT)
      references POINT (ID_PT) on delete restrict on update restrict;

alter table POINT add constraint FK_APPARTIENT foreign key (CODE_BAT)
      references BATIMENTS (CODE_BAT) on delete restrict on update restrict;

