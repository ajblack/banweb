drop table if exists students cascade;
create table students (
   sid      	int(4) primary key,
   l_name    	varchar(30),
   f_name	varchar(30),
   password	varchar(30),
   address	varchar(50),
   phone	varchar(20),
   email        varchar(30),
   degree	varchar(20),
   status       varchar(20),
   admit_sem    varchar(10),
   admit_year	year);

drop table if exists faculty cascade;
create table faculty (
   fid 	        int(4) primary key,
   l_name    	varchar(30),
   f_name	varchar(30),
   password	varchar(30),
   address	varchar(50),
   phone	varchar(20),
   email        varchar(30),
   permission	int(1));

drop table if exists classes cascade;
create table classes (
   crn 	     	int(5) primary key,
   dept         varchar(5),
   course_num   int(4),
   title        varchar(30),
   semid        int(5),
   credits      int(1),
   course_day	varchar(3),
   course_time  varchar(12),
   foreign key (semid) references classes(semid));

drop table if exists takes cascade;
create table takes (
   sid          int(4),
   crn          int(5),
   grade        varchar(2),
   foreign key (sid) references students(sid),
   foreign key (crn) references classes(crn),
   primary key(sid, crn));

drop table if exists teach cascade;
create table teach (
   fid          int(4),
   crn          int(5),
   foreign key (fid) references faculty(fid),
   foreign key (crn) references classes(crn),
   primary key(fid, crn));

drop table if exists semesters cascade;
create table semesters (
  semid	        int(5) primary key,
  sem           varchar(12));

/*this is the beginning of application scripts */

drop table if exists application cascade;
create table application(
   interest varchar(30),
   appDate varchar(30),
   degree_sought   int(1), /*may need to make a binary */
   bach_year varchar(30),
   bach_gpa varchar(30),
   bach_school varchar(30),
   bach_major varchar(30),
   mast_year varchar(30),
   mast_gpa varchar(30),
   mast_school varchar(30),
   mast_major varchar(30),
   gre_score_total   int(6),
   gre_score_verbal  int(6),
   gre_anal int(6),
   gre_quant   int(6),
   sub1_sub varchar(30),
   sub1_score varchar(30),
   sub2_sub varchar(30),
   sub2_score varchar(30),
   sub3_sub varchar(30),
   sub3_score varchar(30),
   work_experience varchar(100),
   sem_admit varchar(30),
   year_admit varchar(30),
   app_status  int(1),
   aid int(10) references graduate_applicant(aid));


drop table if exists graduate_applicant cascade;
create table graduate_applicant (
   l_name varchar(30),
   f_name varchar(30),
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
   reviewer_id int(10) references faculty(fid),
   advisor_rec varchar(30),
   aid int(10) references graduate_applicant(aid),
   constraint pk_review primary key (reviewer_id,aid));

drop table if exists letter_writers cascade;
create table letter_writers(
   letter_writer_name varchar(30),
   letter_writer_email varchar(50),
   the_rec varchar(10000);
   title varchar(30),
   affiliation varchar(50),
   aid int(10) references graduate_applicant(aid));

drop table if exists final_status cascade;
create table final_status(
   decision int(1),
   recommendation int(1),
   aid int(10) references graduate_applicant(aid));






   