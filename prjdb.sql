DROP TABLE IF EXISTS Music;

CREATE TABLE Music (
    Song_id INT(11) NOT NULL AUTO_INCREMENT,
    Song_name CHAR(30),
    Artist CHAR(30),
    Album CHAR(30),
    Year INT(4),
    PRIMARY KEY (Song_id)
);

insert into Music values
(1, 'Billie Jean', 'Michael Jackson', 'Thriller', 1982),
(2, 'Hey Jude', 'The Beatles', 'Hey Jude', 1968),
(3, 'Tiny Dancer', 'Elton John', 'Madman Across the Water', 1971),
(4, 'Christmas Song', 'Brenda Lee', 'Christmas Album', 1958);
