BEGIN TRANSACTION;
CREATE TABLE service_loc (id INT,
institutionid INT,
longitude numbers,
latitude numbers,
stage int(1),
loc_name varchar,
address_street varchar,
address_city varchar,
contact_name varchar,
contact_email varchar,
contact_phone varchar,
SSID varchar,
enc_level varchar,
port_restrict int(1),
transp_proxy int(1),
IPv6 int(1),
NAT int(1),
HS20 int(1),
AP_no int,
wired int(1) default 0,
info_URL varchar,
ts date
);
CREATE TABLE realm_data (
id int,
realmid int,
number_inst int,
number_user int,
number_id int,
number_IdP int,
number_SP int,
number_SPIdP int,
ts date
);
CREATE TABLE realm_usage (
id int,
realmid int,
national_sn int,
international_sn int,
date date
);
CREATE TABLE institution_usage (
id int,
institutionid int,
local_sn int,
national_sn int,
international_sn int,
date date
);
CREATE TABLE mon_realm (
id int,
tested_realm varchar,
tested_country varchar,
realmid int,
mon_type_sel int(1),
last_mon_logid int,
ts date
);
CREATE TABLE mon_ser (
id int,
name varchar,
mon_realmid int,
ip varchar,
port int,
timeout int,
retry int,
secret varchar,
stype int(1),
reject_only int(1),
radsec int(1),
monitoring int(1),
last_mon_logid int(1),
ts date
);
CREATE TABLE mon_ser_log (
id int,
mon_serid int,
mon_type int(1),
status int(1),
a_resp_time int,
r_resp_time int,
ts date,
mon_logid int
);
CREATE TABLE mon_realm_log (
id int,
mon_realmid int,
mon_type int(1),
status int(1),
a_resp_time int,
r_resp_time int,
mon_serid int,
ts date,
mon_logid int
);
CREATE TABLE mon_log (
id int,
scheduled int(1),
ts_scheduled time,
ts_start time,
ts_end time,
type int(2),
status int(1)
);
CREATE TABLE mon_creds (
id int,
username varchar,
password varchar,
mon_realmid int
);
CREATE TABLE users (
id int,
username varchar,
password varchar,
name varchar,
email varchar,
location varchar
);
INSERT INTO "users" VALUES(1,NULL,'47eb752bac1c08c75e30d9624b3e58b7','Stas Sushkov','stas@nerd.ro','UTCN, Cluj');
CREATE TABLE realm (
id int,
roid varchar,
country varchar(2),
stype int(1),
stage int(1),
org_name varchar,
address_street varchar,
address_city varchar,
contact_name varchar,
contact_email varchar,
contact_phone numbers,
contact_type INT(1),
contact_privacy INT(1),
info_URL varchar,
policy_URL varchar,
ts date
);
INSERT INTO "realm" VALUES(1,'tbd','RO',1,1,'Technical University of Cluj-Napoca','str. Baritiu 26','Cluj-Napoca','TUCN','admin@net.utcluj.ro',40765655963,0,0,'http://utcluj.ro/','http://eduroam.utcluj.ro/','2009-05-19');
CREATE TABLE institution (
id INT,
realmid INT,
type INT(1),
stage INT(1),
inst_realm varchar,
org_name varchar,
address_street varchar,
address_city varchar,
contact_name varchar,
contact_email varchar,
contact_phone varchar,
contact_type INT(1),
contact_privacy INT(1),
info_url varchar,
policy_url varchar,
ts date
);
INSERT INTO "institution" VALUES(1,1,1,1,'Căminul 7 Observator','Observator, căminul 7','str. Observatorului 34','Cluj-Napoca','C7OBS','admin@c7.campus.utcluj.ro','40765655963',0,0,'http://c7obs.net/','http://intranet.c7obs.net/','2009-05-19');
COMMIT;
