

drop table if exists application cascade;
create table application(
   interest varchar(30),
   appDate  varchar(30),
   degree_sought   int(1), /*may need to make a binary */
   degree_prior_b  varchar(100),
   degree_prior_m varchar(100),
   gre_score_total   int(6),
   gre_score_verbal  int(6),
   gre_anal int(6),
   gre_quant   int(6),
   gre_subject_one varchar(30), 
   gre_subject_two varchar(30),
   gre_subject_three varchar(30),
   work_experience varchar(100),
   admission_date  varchar(50),
   app_status  int(1),
   aid int(10) references graduate_applicant(aid));


drop table if exists graduate_applicant cascade;
create table graduate_applicant (
   name varchar(30),
   SSN   int(9), 
   address varchar(100),
   phone varchar(30),
   email varchar(50),
   DOB varchar(30),
   race varchar(30), 
   gender varchar(30), 
   password varchar(30), /*this is new */
   aid int(10) primary key);

drop table if exists documents cascade;
create table documents(
   trans_recieved int(1),
   recs_recieved int(1),
   aid int(10) references graduate_applicant(aid));


drop table if exists review cascade;
create table review(
   recommendation int(1),
   comments varchar(200),
   reviewer_id int(10) primary key,
   advisor_rec varchar(30),
   aid int(10) references graduate_applicant(aid));


drop table if exists letter_writers cascade;
create table letter_writers(
   letter_writer_name varchar(30),
   letter_writer_email varchar(50) primary key,
   title varchar(30),
   affiliation varchar(50),
   aid int(10) references graduate_applicant(aid));


drop table if exists final_status cascade;
create table final_status(
   decision int(1),
   aid int(10) references graduate_applicant(aid));

drop table if exists secretary cascade;
create table secretary(
      password varchar(30),
       sec_id int(10) primary key);

drop table if exists reviewer cascade;
create table reviewer(
   password varchar(30),
   r_id int(10) primary key);
   





   