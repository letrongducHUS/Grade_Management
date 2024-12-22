
CREATE DATABASE quanlydiem;
USE quanlydiem;


-- Table: admins
CREATE TABLE admins (
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        login_id VARCHAR(20) UNIQUE NOT NULL,
                        password VARCHAR(64) NOT NULL,
                        actived_flag INT(1) DEFAULT 0 COMMENT '0: not active, 1: active',
                        reset_password_token VARCHAR(100),
                        updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        created DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: subjects
CREATE TABLE subjects (
                          id INT(10) AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(250) NOT NULL,
                          avatar VARCHAR(250) COMMENT 'Name of avatar file (do not store file path)',
                          description TEXT,
                          school_year CHAR(10) COMMENT 'Code of school_year',
                          updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          created DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: teachers
CREATE TABLE teachers (
                          id INT(10) AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(250) NOT NULL,
                          avatar VARCHAR(250) COMMENT 'Name of avatar file (do not store file path)',
                          description TEXT,
                          specialized CHAR(10) COMMENT 'Code of specialization',
                          degree CHAR(10) COMMENT 'Code of degree',
                          updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          created DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: students
CREATE TABLE students (
                          id INT(10) AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(250) NOT NULL,
                          avatar VARCHAR(250) COMMENT 'Name of avatar file (do not store file path)',
                          description TEXT,
                          updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          created DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table: scores
CREATE TABLE scores (
                        id INT(10) AUTO_INCREMENT PRIMARY KEY,
                        student_id INT(10) NOT NULL,
                        teacher_id INT(10) NOT NULL,
                        subject_id INT(10) NOT NULL,
                        score INT(2) DEFAULT 0,
                        description TEXT,
                        updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        created DATETIME DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (student_id) REFERENCES students(id),
                        FOREIGN KEY (teacher_id) REFERENCES teachers(id),
                        FOREIGN KEY (subject_id) REFERENCES subjects(id)
);