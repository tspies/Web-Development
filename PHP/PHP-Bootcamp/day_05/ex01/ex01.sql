CREATE TABLE ft_table(
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    login VARCHAR (20) NOT NULL DEFAULT 'tspies',
    `group` ENUM ('staff', 'student', 'other') NOT NULL,
    creation_date DATE NOT NULL,
    PRIMARY KEY (id)
)