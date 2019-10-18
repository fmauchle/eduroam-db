BEGIN TRANSACTION;
ALTER table realm ADD roid varchar default 'unspecified';
ALTER table realm ADD stage INT(1) default 1;
ALTER table realm ADD contact_type INT(1) default 0;
ALTER table realm ADD contact_privacy INT(1) default 0;
ALTER table institution ADD stage INT(1) default 1;
ALTER table institution ADD contact_type INT(1) default 0;
ALTER table institution ADD contact_privacy INT(1) default 0;
ALTER table service_loc ADD stage INT(1) default 1;


COMMIT;