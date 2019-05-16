CREATE EXTENSION pgcrypto;

CREATE TABLE public.user (
    user_id              SERIAL PRIMARY KEY,
    user_name            VARCHAR(30) NOT NULL UNIQUE,
    user_password        TEXT NOT NULL,
    main_character       INT REFERENCES public.character(character_id)
);

CREATE TABLE public.class (
    class_id             SERIAL PRIMARY KEY,
    class_name           VARCHAR(20) NOT NULL,
    class_hp             SMALLINT,
    class_rules          TEXT NOT NULL,
    class_description    TEXT NOT NULL
);

CREATE TABLE public.race (
    race_id          SERIAL PRIMARY KEY,
    race_name        VARCHAR(20) NOT NULL,
    race_hp          SMALLINT,
    race_rules       TEXT,
    race_description TEXT NOT NULL
);

CREATE TABLE public.character (
    character_id        SERIAL PRIMARY KEY,
    character_class     INT REFERENCES public.class(class_id),
    character_race      INT REFERENCES public.race(race_id),
    character_hp        INT
);

--Insert example--
INSERT INTO public.user (user_name, user_password) VALUES (
  'johndoe@mail.com',
  crypt('johnspassword', gen_salt('bf'))
);
--Select example--
SELECT id 
  FROM users
 WHERE email = 'johndoe@mail.com' 
   AND password = crypt('johnspassword', password);
-- Returns 0 rows if password is wrong -- 

SELECT * FROM public.user;