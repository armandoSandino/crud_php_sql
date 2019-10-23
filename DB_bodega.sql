

use master;
go
if DB_ID(N'bodega') is not null
drop database bodega;
go
create database bodega;

go
use bodega;
go

if OBJECT_ID('dbo.herramientas','U')is not null
drop table dbo.herramientas;
go
create table dbo.herramientas(
Id  int identity(1,1) primary key not null,
code nvarchar(10) not null,
nombre nvarchar(100) not null,
cantidad int not null
);
go

if OBJECT_ID('dbo.material','U')is not null
drop table dbo.material;
go
create table dbo.material(
Id int identity(1,1) primary key not null,
nombre nvarchar(200) not null,
detalle nvarchar(150) not null
);