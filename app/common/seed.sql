
INSERT INTO admins (login_id, password, actived_flag)
VALUES
    ('admin1', 'hashed_password1', 1),
    ('admin2', 'hashed_password2', 0),
    ('admin3', 'hashed_password3', 1);

INSERT INTO subjects (name, avatar, description, school_year)
VALUES
    ('Mathematics', 'math_avatar.png', 'Basic Mathematics subject', '2024'),
    ('Physics', 'physics_avatar.png', 'Physics subject with lab work', '2024'),
    ('Chemistry', 'chemistry_avatar.png', 'Chemistry subject for 10th grade', '2024');

INSERT INTO teachers (name, avatar, description, specialized, degree)
VALUES
    ('John Doe', 'johndoe_avatar.png', 'Expert in Mathematics', 'MATH', 'MSc'),
    ('Jane Smith', 'janesmith_avatar.png', 'Physics teacher with 5 years experience', 'PHYS', 'MSc'),
    ('Albert Johnson', 'albert_avatar.png', 'Chemistry teacher specializing in organic chemistry', 'CHEM', 'PhD');

INSERT INTO students (name, avatar, description)
VALUES
    ('Alice Brown', 'alice_avatar.png', 'High-achieving student in mathematics'),
    ('Bob Green', 'bob_avatar.png', 'Interested in physics and engineering'),
    ('Cathy White', 'cathy_avatar.png', 'Focused on chemistry and biology studies');

INSERT INTO scores (student_id, teacher_id, subject_id, score, description)
VALUES
    (1, 1, 1, 95, 'Excellent performance in Mathematics'),
    (2, 2, 2, 88, 'Good understanding of Physics concepts'),
    (3, 3, 3, 91, 'Great performance in Chemistry'),
    (1, 2, 2, 78, 'Average performance in Physics'),
    (2, 1, 1, 85, 'Good effort in Mathematics');