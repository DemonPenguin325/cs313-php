CREATE TABLE t7user(
    user_id     SERIAL PRIMARY KEY,
    username    VARCHAR(30),
    pwHash      VARCHAR(255)
);