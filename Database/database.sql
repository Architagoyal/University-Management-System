CREATE TABLE IF NOT EXISTS stud_info (
  s_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  s_name varchar(60) NOT NULL,
  gender char(10) NOT NULL,
  dob date NOT NULL,
  address varchar(100) NOT NULL,
  phone varchar(50) NOT NULL,
  e_id varchar(70) NOT NULL,
  s_cred int(10)NOT NULL,
  PRIMARY KEY (s_id)
);

CREATE TABLE IF NOT EXISTS dept (
 dept_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  dept_name varchar(50) NOT NULL,
  PRIMARY KEY (dept_id)
);



CREATE TABLE IF NOT EXISTS teacher (
  teacher_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  t_name varchar(30) NOT NULL,
  gender char(10) NOT NULL,
  dob date NOT NULL,
  address varchar(100) NOT NULL,
  phone varchar(50) NOT NULL,
  e_id varchar(70) NOT NULL,
  t_dep int(10) unsigned NOT NULL,
  salary float NOT NULL,
  PRIMARY KEY (teacher_id),
  FOREIGN KEY (t_dep) 
  REFERENCES dept (dept_id) 

);

CREATE TABLE IF NOT EXISTS course (
  course_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  c_name varchar(50) NOT NULL,
  c_cred int NOT NULL,
  c_sem int NOT NULL,
  c_teach int(10) unsigned NOT NULL,
  PRIMARY KEY (course_id),
  FOREIGN KEY (c_teach) 
  REFERENCES teacher (teacher_id) 
);

CREATE TABLE IF NOT EXISTS enrolled (
std_id int(10) unsigned NOT NULL,
c_id int(10) unsigned NOT NULL,
FOREIGN KEY (std_id) 
  REFERENCES stud_info (s_id),
FOREIGN KEY (c_id) 
  REFERENCES course (course_id)
);

CREATE TABLE IF NOT EXISTS course_dep (
c_id int(10) unsigned NOT NULL,
dep_id int(10) unsigned NOT NULL,
FOREIGN KEY (c_id) 
  REFERENCES course (course_id),
FOREIGN KEY (dep_id) 
  REFERENCES dept (dept_id)
);
