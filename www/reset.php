<?php
//put sql queries to delete all of the tables 
$dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);
if(isset($_POST['submit!'])) {
  mysql_query("TRUNCATE TABLE application") or die(mysql_error());
  mysql_query("TRUNCATE TABLE classes") or die(mysql_error());
  mysql_query("TRUNCATE TABLE documents") or die(mysql_error());
  mysql_query("TRUNCATE TABLE faculty") or die(mysql_error());
  mysql_query("TRUNCATE TABLE final_status") or die(mysql_error());
  mysql_query("TRUNCATE TABLE graduate_applicant") or die(mysql_error());
  mysql_query("TRUNCATE TABLE letter_writers") or die(mysql_error());
  mysql_query("TRUNCATE TABLE prereqs") or die(mysql_error());
  mysql_query("TRUNCATE TABLE review") or die(mysql_error());
  mysql_query("TRUNCATE TABLE semesters") or die(mysql_error());
  mysql_query("TRUNCATE TABLE students") or die(mysql_error());
  mysql_query("TRUNCATE TABLE takes") or die(mysql_error());
  mysql_query("TRUNCATE TABLE teach") or die(mysql_error());
  

  //here is where we do a ton of adds
  mysql_query("INSERT INTO  students values (1,'Fletcher','Emma','student','616 23rd St NW','952-715-1044','efletch@gwmail.gwu.edu','Computer Eng','cleared','Fall',2009)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (2,'Dhamsania','Avani','student','2124 I St NW','240-454-4083','avanisd@gwmail.gwu.edu','Computer Sci','cleared','Fall',2009)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (3,'Raj','Meenu','student','1900 F St NW','314-452-0964','rajm@gwmail.gwu.edu','Computer Sci','applied','Fall',2010)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (4,'Yarmis','Ben','student','616 23rd St NW','849-203-2839','by1991@gwmail.gwu.edu','Mechanical Eng','active','Fall',2010)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (5,'Wittrock','John','student','616 23rd St NW','282-384-1930','jwitt@gwmail.gwu.edu','Computer Sci','active','Fall',2011)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (6,'Sitapara','Roshni','student','2020 K St NW','301-269-4109','sitar@gwmail.gwu.edu','Biomedical Eng','active','Fall',2011)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (7,'Phillips','Mark','student','111 F St NW','201-983-9283','markp@gwmail.gwu.edu','Civil Eng','active','Spring',2011)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (8,'Shah','Shalini','student','2124 I St NW','849-284-8674','sshalini@gwmail.gwu.edu','Economics','active','Fall',2012)") or die(mysql_error());
mysql_query("INSERT INTO   students values (9,'Brown','Daniel','student','123 Pennsylvania Ave','920-719-4710','dannyb@gwmail.gwu.edu','Systems Eng','active','Fall',2012)") or die(mysql_error());
 mysql_query("INSERT INTO  students values (10,'Rege','Parth','student','1900 F St NW','234-245-9654','parth_rege@gwmail.gwu.edu','Finance','active','Spring',2012)") or die(mysql_error());

 mysql_query("INSERT INTO  faculty values (11,'Narahari','Bhagirath','professor','101 23rd St NW','482-381-1001','narahari@gwmail.gwu.edu',0)") or die(mysql_error());
 mysql_query("INSERT INTO  faculty values (12,'Foster','Irene','professor','600 12th St NW','230-456-2900','foster_i@gwmail.gwu.edu',0)") or die(mysql_error());
 mysql_query("INSERT INTO  faculty values (13,'Smith','Joan','professor','310 M St NW','289-942-1984','jsmith@gwmail.gwu.edu',0)") or die(mysql_error());
 mysql_query("INSERT INTO  faculty values (14,'Leontie','Roxana','gradstudent','1800 F St NW','482-567-8900', 'roxana@gwmail.gwu.edu',1)") or die(mysql_error());
 mysql_query("INSERT INTO  faculty values (21,'Smith','Joe','reviewer','1700 F St NW','893-983-1029','smith_j@gwmail.gwu.edu',2)") or die(mysql_error());
 mysql_query("INSERT INTO  faculty values  (31,'Cook','Dan','sysadmin','123 Ohio Ave NW','828-139-1029','danc@gwmail.gwu.edu',3)") or die(mysql_error());

 mysql_query("INSERT INTO  classes values (1, 'CS', 6221, 'Software Paradigms',1,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (2, 'CS', 6461, 'Computer Architecture',1,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (3, 'CS', 6212, 'Algorithms',1,3,'W','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (4, 'CS', 6225, 'Data Compression',1,3,'R','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (5, 'CS', 6232, 'Networks 1',1,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (6, 'CS', 6233, 'Networks 2',1,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (7, 'CS', 6241, 'Database 1',1,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (8, 'CS', 6242, 'Database 2',1,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (9, 'CS', 6246, 'Compilers',1,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (10, 'CS', 6251, 'Distributed Systems',1,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (11, 'CS', 6254, 'Software Engineering',1,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (12, 'CS', 6260, 'Multimedia',1,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (13, 'CS', 6262, 'Graphics 1',1,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (14, 'CS', 6283, 'Security 1',1,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (15, 'CS', 6284, 'Cryptography',1,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (16, 'CS', 6285, 'Network Security',1,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (17, 'CS', 6325, 'Advanced Algorithms',1,2,'R','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (18, 'CS', 6339, 'Embedded Systems',1,2,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (19, 'CS', 6840, 'Advanced Crypto',1,3,'W','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (20, 'EE', 6243, 'Communication Systems',1,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (21, 'EE', 6244, 'Information Theory',1,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (22, 'Math', 6210,'Logic',1,2,'W','6-8:30pm')") or die(mysql_error());

 mysql_query("INSERT INTO  classes values (23, 'CS', 6221, 'Software Paradigms',2,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (24, 'CS', 6461, 'Computer Architecture',2,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (25, 'CS', 6212, 'Algorithms',2,3,'W','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (26, 'CS', 6225, 'Data Compression',2,3,'R','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (27, 'CS', 6232, 'Networks 1',2,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (28, 'CS', 6233, 'Networks 2',2,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (29, 'CS', 6241, 'Database 1',2,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (30, 'CS', 6242, 'Database 2',2,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (31, 'CS', 6246, 'Compilers',2,3,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (32, 'CS', 6251, 'Distributed Systems',2,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (33, 'CS', 6254, 'Software Engineering',2,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (34, 'CS', 6260, 'Multimedia',2,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (35, 'CS', 6262, 'Graphics 1',2,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (36, 'CS', 6283, 'Security 1',2,3,'T','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (37, 'CS', 6284, 'Cryptography',2,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (38, 'CS', 6285, 'Network Security',2,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (39, 'CS', 6325, 'Advanced Algorithms',2,2,'R','4-6:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (40, 'CS', 6339, 'Embedded Systems',2,2,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (41, 'CS', 6840, 'Advanced Crypto',2,3,'W','4-6:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (42, 'EE', 6243, 'Communication Systems',2,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (43, 'EE', 6244, 'Information Theory',2,2,'T','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (44, 'Math', 6210,'Logic',2,2,'W','6-8:30pm')") or die(mysql_error());

mysql_query("INSERT INTO   classes values (45, 'CS', 6221, 'Software Paradigms',3,3,'M','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (46, 'CS', 6461, 'Computer Architecture',3,3,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (47, 'CS', 6212, 'Algorithms',3,3,'W','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (48, 'CS', 6225, 'Data Compression',3,3,'R','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (49, 'CS', 6232, 'Networks 1',3,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (50, 'CS', 6233, 'Networks 2',3,3,'T','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (51, 'CS', 6241, 'Database 1',3,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (52, 'CS', 6242, 'Database 2',3,3,'R','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (53, 'CS', 6246, 'Compilers',3,3,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (54, 'CS', 6251, 'Distributed Systems',3,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (55, 'CS', 6254, 'Software Engineering',3,3,'M','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (56, 'CS', 6260, 'Multimedia',3,3,'R','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (57, 'CS', 6262, 'Graphics 1',3,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (58, 'CS', 6283, 'Security 1',3,3,'T','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (59, 'CS', 6284, 'Cryptography',3,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (60, 'CS', 6285, 'Network Security',3,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (61, 'CS', 6325, 'Advanced Algorithms',3,2,'R','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (62, 'CS', 6339, 'Embedded Systems',3,2,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (63, 'CS', 6840, 'Advanced Crypto',3,3,'W','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (64, 'EE', 6243, 'Communication Systems',3,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (65, 'EE', 6244, 'Information Theory',3,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (66, 'Math', 6210,'Logic',4,2,'W','6-8:30pm')") or die(mysql_error());

mysql_query("INSERT INTO   classes values (67, 'CS', 6221, 'Software Paradigms',4,3,'M','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (68, 'CS', 6461, 'Computer Architecture',4,3,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (69, 'CS', 6212, 'Algorithms',4,3,'W','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (70, 'CS', 6225, 'Data Compression',4,3,'R','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (71, 'CS', 6232, 'Networks 1',4,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (72, 'CS', 6233, 'Networks 2',4,3,'T','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (73, 'CS', 6241, 'Database 1',4,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (74, 'CS', 6242, 'Database 2',4,3,'R','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (75, 'CS', 6246, 'Compilers',4,3,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (76, 'CS', 6251, 'Distributed Systems',4,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (77, 'CS', 6254, 'Software Engineering',4,3,'M','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (78, 'CS', 6260, 'Multimedia',4,3,'R','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (79, 'CS', 6262, 'Graphics 1',4,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (80, 'CS', 6283, 'Security 1',4,3,'T','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (81, 'CS', 6284, 'Cryptography',4,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (82, 'CS', 6285, 'Network Security',4,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (83, 'CS', 6325, 'Advanced Algorithms',4,2,'R','4-6:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (84, 'CS', 6339, 'Embedded Systems',4,2,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (85, 'CS', 6840, 'Advanced Crypto',4,3,'W','4-6:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (86, 'EE', 6243, 'Communication Systems',4,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (87, 'EE', 6244, 'Information Theory',4,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (88, 'Math', 6210,'Logic',4,2,'W','6-8:30pm')") or die(mysql_error());

 mysql_query("INSERT INTO  classes values (89, 'CS', 6221, 'Software Paradigms',5,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (90, 'CS', 6461, 'Computer Architecture',5,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (91, 'CS', 6212, 'Algorithms',5,3,'W','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (92, 'CS', 6225, 'Data Compression',5,3,'R','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (93, 'CS', 6232, 'Networks 1',5,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (94, 'CS', 6233, 'Networks 2',5,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (95, 'CS', 6241, 'Database 1',5,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (96, 'CS', 6242, 'Database 2',5,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (97, 'CS', 6246, 'Compilers',5,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (98, 'CS', 6251, 'Distributed Systems',5,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (99, 'CS', 6254, 'Software Engineering',5,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (100, 'CS', 6260, 'Multimedia',5,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (101, 'CS', 6262, 'Graphics 1',5,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (102, 'CS', 6283, 'Security 1',5,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (103, 'CS', 6284, 'Cryptography',5,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (104, 'CS', 6285, 'Network Security',5,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (105, 'CS', 6325, 'Advanced Algorithms',5,2,'R','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (106, 'CS', 6339, 'Embedded Systems',5,2,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (107, 'CS', 6840, 'Advanced Crypto',5,3,'W','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (108, 'EE', 6243, 'Communication Systems',5,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (109, 'EE', 6244, 'Information Theory',5,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (110, 'Math', 6210,'Logic',5,2,'W','6-8:30pm')") or die(mysql_error());

 mysql_query("INSERT INTO  classes values (111, 'CS', 6221, 'Software Paradigms',6,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (112, 'CS', 6461, 'Computer Architecture',6,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (113, 'CS', 6212, 'Algorithms',6,3,'W','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (114, 'CS', 6225, 'Data Compression',6,3,'R','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (115, 'CS', 6232, 'Networks 1',6,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (116, 'CS', 6233, 'Networks 2',6,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (117, 'CS', 6241, 'Database 1',6,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (118, 'CS', 6242, 'Database 2',6,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (119, 'CS', 6246, 'Compilers',6,3,'T','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (120, 'CS', 6251, 'Distributed Systems',6,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (121, 'CS', 6254, 'Software Engineering',6,3,'M','3-5:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (122, 'CS', 6260, 'Multimedia',6,3,'R','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (123, 'CS', 6262, 'Graphics 1',6,3,'W','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (124, 'CS', 6283, 'Security 1',6,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (125, 'CS', 6284, 'Cryptography',6,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (126, 'CS', 6285, 'Network Security',6,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (127, 'CS', 6325, 'Advanced Algorithms',6,2,'R','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (128, 'CS', 6339, 'Embedded Systems',6,2,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (129, 'CS', 6840, 'Advanced Crypto',6,3,'W','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (130, 'EE', 6243, 'Communication Systems',6,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (131, 'EE', 6244, 'Information Theory',6,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (132, 'Math', 6210,'Logic',6,2,'W','6-8:30pm')") or die(mysql_error());

 mysql_query("INSERT INTO  classes values (133, 'CS', 6221, 'Software Paradigms',7,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (134, 'CS', 6461, 'Computer Architecture',7,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (135, 'CS', 6212, 'Algorithms',7,3,'W','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (136, 'CS', 6225, 'Data Compression',7,3,'R','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (137, 'CS', 6232, 'Networks 1',7,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (138, 'CS', 6233, 'Networks 2',7,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (139, 'CS', 6241, 'Database 1',7,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (140, 'CS', 6242, 'Database 2',7,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (141, 'CS', 6246, 'Compilers',7,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (142, 'CS', 6251, 'Distributed Systems',7,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (143, 'CS', 6254, 'Software Engineering',7,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (144, 'CS', 6260, 'Multimedia',7,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (145, 'CS', 6262, 'Graphics 1',7,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (146, 'CS', 6283, 'Security 1',7,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (147, 'CS', 6284, 'Cryptography',7,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (148, 'CS', 6285, 'Network Security',7,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (149, 'CS', 6325, 'Advanced Algorithms',7,2,'R','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (150, 'CS', 6339, 'Embedded Systems',7,2,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (151, 'CS', 6840, 'Advanced Crypto',7,3,'W','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (152, 'EE', 6243, 'Communication Systems',7,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (153, 'EE', 6244, 'Information Theory',7,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (154, 'Math', 6210,'Logic',7,2,'W','6-8:30pm')") or die(mysql_error());

 mysql_query("INSERT INTO  classes values (155, 'CS', 6221, 'Software Paradigms',8,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (156, 'CS', 6461, 'Computer Architecture',8,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (157, 'CS', 6212, 'Algorithms',8,3,'W','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (158, 'CS', 6225, 'Data Compression',8,3,'R','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (159, 'CS', 6232, 'Networks 1',8,3,'M','6-8:30pm')") or die(mysql_error());
mysql_query("INSERT INTO   classes values (160, 'CS', 6233, 'Networks 2',8,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (161, 'CS', 6241, 'Database 1',8,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (162, 'CS', 6242, 'Database 2',8,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (163, 'CS', 6246, 'Compilers',8,3,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (164, 'CS', 6251, 'Distributed Systems',8,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (165, 'CS', 6254, 'Software Engineering',8,3,'M','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (166, 'CS', 6260, 'Multimedia',8,3,'R','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (167, 'CS', 6262, 'Graphics 1',8,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (168, 'CS', 6283, 'Security 1',8,3,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (169, 'CS', 6284, 'Cryptography',8,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (170, 'CS', 6285, 'Network Security',8,3,'W','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (171, 'CS', 6325, 'Advanced Algorithms',8,2,'R','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (172, 'CS', 6339, 'Embedded Systems',8,2,'T','3-5:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (173, 'CS', 6840, 'Advanced Crypto',8,3,'W','4-6:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (174, 'EE', 6243, 'Communication Systems',8,3,'M','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (175, 'EE', 6244, 'Information Theory',8,2,'T','6-8:30pm')") or die(mysql_error());
 mysql_query("INSERT INTO  classes values (176, 'Math', 6210,'Logic',8,2,'W','6-8:30pm')") or die(mysql_error());

 mysql_query("INSERT INTO  takes values (1, 1, 'A-')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (1, 2, 'C')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (1, 3, 'A')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (2, 5, 'B')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (2, 6, 'C')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (2, 7, 'A-')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (3, 1, 'B+')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (3, 8, 'A-')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (3, 9, 'B')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (4, 2, 'A')") or die(mysql_error());
 mysql_query("INSERT INTO  takes values (4, 11, 'B')") or die(mysql_error());

 mysql_query("INSERT INTO  teach values(11, 1)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(12, 2)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(13, 3)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 5)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 7)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 25)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 26)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 27)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 29)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 59)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 60)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 67)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 87)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 73)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 99)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 103)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 117)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 127)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 146)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 161)") or die(mysql_error());
 mysql_query("INSERT INTO  teach values(11, 158)") or die(mysql_error());


 mysql_query("INSERT INTO  semesters values(1, 'Fall 2009')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(2, 'Spring 2010')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(3, 'Fall 2010')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(4, 'Spring 2011')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(5, 'Fall 2011')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(6, 'Spring 2012')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(7, 'Fall 2012')") or die(mysql_error());
 mysql_query("INSERT INTO  semesters values(8, 'Spring 2013')") or die(mysql_error());

 //inserting application stuff
  //insert John Lennon information. complete application waiting for review
 mysql_query("INSERT INTO application values ('peace','4/10/13','2','1998','3.0','miami','music','1999','3.2','uvm','guitar','2000','150','4','160','','','','','','','was in a band','fall','2013','0','199')") or die(mysql_error());
 mysql_query("INSERT INTO graduate_applicant values ('Lennon','John','111111111','london','23454678','jl@hotmail.com','02231945','white','male','iheartrock','199')") or die(mysql_error());
 mysql_query("INSERT INTO documents values ('1','1','199')") or die(mysql_error());
  mysql_query("INSERT INTO letter_writers values ('rolling stone','rs@gmail.com','magazine','magazine','','199')") or die(mysql_error());
  mysql_query("INSERT INTO final_status (aid) values ('199')") or die(mysql_error());
    
        //insert Ringo Starr information. incomplete application
   mysql_query("INSERT INTO application values ('love','4/10/13','2','1978','2.0','gwu','math','1979','1.2','dartmouth','computer science','1000','160','5','160','','','','','','','worked in a garage','spring','2013','0','166')") or die(mysql_error());

  mysql_query("INSERT INTO graduate_applicant values ('Starr','Ringo','222111111','london','23463278','starr@hotmail.com','10031944','white','male','england99','166')") or die(mysql_error());
  mysql_query("INSERT INTO documents values ('0','0','166')") or die(mysql_error());
  mysql_query("INSERT INTO letter_writers values ('mr martin','martin@gmail.com','teacher','drum school','','166')") or die(mysql_error());
  mysql_query("INSERT INTO final_status (aid) values ('166')") or die(mysql_error());

 echo "reset successful";
}

?>

