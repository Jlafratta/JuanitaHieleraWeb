
    -- Admin localhost

CREATE USER 'admin_hielera'@'localhost' IDENTIFIED BY '1234';
GRANT ALL ON juanita_hielera.* TO 'admin_hielera'@'localhost';