DROP TABLE IF EXISTS Music;

CREATE TABLE Music (
    Song_id INT(11) NOT NULL AUTO_INCREMENT,
    Song_name CHAR(15),
    Artist CHAR(15),
    Album CHAR(15),
    Year INT(4),
    PRIMARY KEY (Song_id)
);

insert into Music values
(1, 'SongName', 'Band', 'AlbumName', 2000),
(2, 'Song2', 'Band2', 'Album2', 2004);