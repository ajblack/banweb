Insert into graduate_applicant values ('Josh Klein', 123456789, '15842 stonetower st', '954-319-8577', 'jhklein@gwu.edu', '11/20/90', 'black', 'M', 1011121314);
Insert into application (appDate, degree_sought, degree_prior_b, gre_score_total, gre_score_verbal, gre_anal, gre_quant, work_experience, admission_date, app_status, password) values ('3/20/2013', 1, 'Systems Engineering', 100, 30, 30, 40, 'waiter', 'Fall 2013', 1, 1011121314);
Insert into letter_writers values ('Tom Mazzuchi', 'mazzu@gwu.edu', 'advisor', 'GWU', 1011121314);
Insert into letter_writers values ('Mom', 'mom@gmail.com', 'mother', 'family', 1011121314);
Insert into documents values(1, 1, 1011121314);
Insert into review values (4, 'Good looking guy', 1413121110, 'Dr. Berg', 1011121314); 
Insert into final_status values  (1, 1011121314);

 Insert into graduate_applicant values ('Superman', 987654321, 'Fortress of Solitude', '1800-superman', 'sup@hotmail,com', '3/10/50', 'Alien', 'M', 1516171819);
Insert into application (interest, appDate, degree_sought, gre_score_total, gre_score_verbal, gre_anal, gre_quant, work_experience, admission_date, app_status, password) values ('criminology', '3/15/2013', 1, 0, 0, 0, 0, 'crime fighter', 'Fall 2013', 0, 516171819);
Insert into letter_writers values ('Jor-El', 'JE@krypton.com', 'dad', 'family', 1516171819);
Insert into letter_writers values ('Lex Luthor', 'badboy@gmail.com', 'nemesis', 'LuthorCorp', 1516171819);
Insert into documents values (0, 1, 1516171819);
Insert into review (recommendation, comments, reviewer_id, password) values (2, 'super', 1918171615, 1516171819); /*recommender ID needs to not be a primary key */
Insert into final_status  (password) values (1516171819);

Insert into graduate_applicant values ('Bruce Wayne', 888888888, 'Wayne Manor, Gotham', '123-456-7890', 'BW@waynecorp,co', '9/15/80', 'White', 'M', 2021222324);
Insert into application (appDate, degree_sought, degree_prior_b, degree_prior_m, gre_score_total, gre_score_verbal, gre_anal, gre_quant, work_experience, admission_date, app_status, password) values ('3/10/2013', 2, 'Exercise Science', 'Chemistry', 300, 100, 100, 100, 'Billionaire', 'Spring 2014', 1, 2021222324);
Insert into letter_writers values ('Commissioner Gordon', 'gordon@gothampd.com', 'police commissioner', 'Gotham PD', 2021222324);
Insert into documents values (1, 1, 2021222324);
Insert into review values (3, 'charming but brooding', 1918144415, 'Dr. Victor Fries', 2021222324); 
Insert into final_status  values (1, 2021222324);










