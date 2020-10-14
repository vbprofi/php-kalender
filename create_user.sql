create user 'admin'@'localhost' identified by 'test';
grant all privileges on *.* to 'admin'@'localhost' with grant option;
flush privileges;

