CREATE TABLE `User` (
    computing_id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
CREATE TABLE Professor (
    name VARCHAR(255) PRIMARY KEY
);
CREATE TABLE Department (
    code VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255)
);
CREATE TABLE Course (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dept_code VARCHAR(255) NOT NULL,
    professor_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (dept_code) REFERENCES Department(code),
    FOREIGN KEY (professor_name) REFERENCES Professor(name)
);
CREATE TABLE Note (
    id INT PRIMARY KEY,
    course_id INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES Course(id)
);
CREATE TABLE Schedule (
    id INT PRIMARY KEY,
    computing_id VARCHAR(255) NOT NULL,
    course_id INT NOT NULL,
    FOREIGN KEY (computing_id) REFERENCES User(computing_id),
    FOREIGN KEY (course_id) REFERENCES Course(id)
);
CREATE TABLE Rating (
    id INT PRIMARY KEY,
    value FLOAT NOT NULL, 
    comment TEXT
);
CREATE TABLE NoteRating (
    rating_id INT,
    note_id INT,
    PRIMARY KEY (rating_id),
    FOREIGN KEY (rating_id) REFERENCES Rating(id),
    FOREIGN KEY (note_id) REFERENCES Note(id)
);
CREATE TABLE CourseRating (
    rating_id INT,
    course_id INT,
    PRIMARY KEY (rating_id),
    FOREIGN KEY (rating_id) REFERENCES Rating(id),
    FOREIGN KEY (course_id) REFERENCES Course(id)
);
CREATE TABLE Favorite (
    computing_id VARCHAR(255),
    note_id INT,
    course_id INT,
    PRIMARY KEY (computing_id, note_id),
    FOREIGN KEY (computing_id) REFERENCES User(computing_id),
    FOREIGN KEY (note_id) REFERENCES Note(id),
    FOREIGN KEY (course_id) REFERENCES Course(id)
);