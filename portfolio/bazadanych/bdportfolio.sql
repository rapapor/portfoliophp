drop schema if exists portfolio;
create schema portfolio default character set utf8 collate utf8_polish_ci;
grant all on portfolio. *to wisnia@localhost identified by'wisnia';
flush privileges;
