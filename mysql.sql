 CREATE A TABLE pizza(id INT  AUTO_INCREMENT  PRIMARY KEY, 
                      title VARCHAR(255) NOT NULL,
                      email VARCHAR(255) NOT NULL,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                      );

INSERT INTO pizza (title,email) 

VALUES (
'Margherita',
'mariozenuni@gmail.com'
);