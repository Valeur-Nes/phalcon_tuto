DROP TABLE IF EXISTS post;

CREATE TABLE post (
      id int(11) NOT NULL AUTO_INCREMENT,
      title varchar(50) NOT NULL,
      content varchar(255) NOT NULL,
      PRIMARY KEY (id)
)