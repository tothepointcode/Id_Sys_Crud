CREATE TABLE clients_tb(
  cl_id int primary key auto_increment,
  cl_first_name varchar(40) not null,
  cl_last_name varchar(40) not null,
  cl_other_names varchar(40) ,
  cl_dob date not null,
  cl_sex varchar(10) not null,
  cl_place_of_birth varchar(50) not null,
  cl_email_address varchar(40) ,
  cl_telephone_number varchar(15) not null,
  cl_postal_address varchar(100) ,
  cl_marital_status varchar(20) not null,
  cl_img_stat int(2) not null
);

CREATE TABLE clients_gallery_tb(
  im_id int primary key auto_increment,
  im_cl_id int,
  im_folder varchar(15) not null,
  im_full_name varchar(40) not null,
  FOREIGN KEY (im_cl_id) REFERENCES clients_tb(cl_id)
);
