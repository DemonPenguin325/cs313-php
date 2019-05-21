CREATE EXTENSION pgcrypto;

CREATE TABLE public.user (
    user_id              SERIAL PRIMARY KEY,
    user_name            VARCHAR(30) NOT NULL UNIQUE,
    user_password        TEXT NOT NULL
);

CREATE TABLE public.class (
    class_id             SERIAL PRIMARY KEY,
    class_name           VARCHAR(20) NOT NULL UNIQUE,
    class_hp             SMALLINT,
    class_type           VARCHAR(20) NOT NULL,
    class_rules          TEXT,
    class_description    TEXT NOT NULL
);

CREATE TABLE public.race (
    race_id          SERIAL PRIMARY KEY,
    race_name        VARCHAR(20) NOT NULL UNIQUE,
    race_hp          SMALLINT,
    race_rules       TEXT,
    race_magic_rule  TEXT,
    race_description TEXT NOT NULL
);

CREATE TABLE public.character (
    character_id        SERIAL PRIMARY KEY,
    character_class     INT REFERENCES public.class(class_id),
    character_race      INT REFERENCES public.race(race_id),
    sub_race1           INT REFERENCES public.race(race_id),
    sub_race2           INT REFERENCES public.race(race_id),
    character_hp        INT,
    character_owner     INT REFERENCES public.user(user_id)
);


-- Base values for classes --
INSERT INTO public.class (class_name, class_type, class_rules, class_description)
VALUES ('knight', 'fighter', 'Pauldron Shield', 'Can use a pauldron as a shield');

INSERT INTO public.class (class_name, class_type, class_hp, class_description)
VALUES ('berserker', 'fighter', 2, 'Gains 2 additional hp.');

INSERT INTO public.class (class_name, class_type, class_rules, class_description)
VALUES ('paladin', 'support', 'Combat Healing', 'Also can cure from plauges or vampirism.');

INSERT INTO public.class (class_name, class_type, class_rules, class_description)
VALUES ('warden', 'support', 'Inspiration', 'Inspires the players next to them and all 3 gain 1 hp.');

INSERT INTO public.class (class_name, class_type, class_rules, class_description)
VALUES ('bard', 'support', 'Divine Protection', 'Must sing to gain special rule.');

INSERT INTO public.class (class_name, class_type, class_rules, class_description)
VALUES ('medic', 'support', 'Divine Protection', 'Only has special rule while healing.');

-- Base values for races --
INSERT INTO public.race (race_name, race_description)
VALUES ('human', 'Normal boring plain old human.');

INSERT INTO public.race (race_name, race_hp, race_rules, race_magic_rule, race_description)
VALUES ('skeleton/ghost', 4, 'Mass Revival', 'Necromancy', 'You are dead. Act like it');

INSERT INTO public.race (race_name, race_hp, race_rules, race_magic_rule, race_description)
VALUES ('vampire/shade/zombie', 4, 'Vampirism', 'Necromancy', 'You are dead. Act like it');

INSERT INTO public.race (race_name, race_rules, race_description)
VALUES ('shadow-bound', 'Mass Revival:Respawn', 'Nessarian race');

INSERT INTO public.race (race_name, race_rules, race_magic_rule, race_description)
VALUES ('elf', 'Bow/Arrow', 'Magic Healing', 'Highborn Elf.');

-- Test Character --
-- INSERT INTO public.character (character_class, character_race)
-- VALUES (SELECT class_id FROM public.class WHERE class_name = 'paladin', 1);




--Insert example--
--INSERT INTO public.user (user_name, user_password) VALUES (
--  'johndoe@mail.com',
--  crypt('johnspassword', gen_salt('bf'))
--);
--SELECT character_id FROM public.character WHERE character_owner = 1;
--Select example--
--SELECT id 
--  FROM users
-- WHERE email = 'johndoe@mail.com' 
--   AND password = crypt('johnspassword', password);
-- Returns 0 rows if password is wrong -- 

--SELECT * FROM public.user;