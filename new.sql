DROP TABLE TblLeave;

CREATE TABLE TblLeave
(
    id int primary key AUTO_INCREMENT,
    lStartDate date not null,
    lEndDate date not null,
    lType tinyint(1) not null,
    lReason varchar(200) not null
);

INSERT INTO TblLeave (lStartDate, lEndDate, lReason, lType)
VALUES
    ('2023-05-05', '2023-05-05', 'Collage CIE', '0'),
    ('2023-05-09', '2023-05-10', 'Collage CIE', '0'),
    ('2023-05-18', '2023-05-18', 'Surat Enjoy', '0'),
    ('2023-05-24', '2023-05-24', 'Surat Rest', '0'),
    ('2023-05-30', '2023-05-30', 'Bardoli Rest', '0'),
    ('2023-06-01', '2023-06-02', 'Bardoli Rest', '0'),
    ('2023-06-05', '2023-06-06', 'Bardoli Rest', '0');

SELECT DATEDIFF('2023-05-09', '2023-05-10');

DROP TABLE TblMonthOf2023;

CREATE TABLE TblMonthOf2023 
(
    id int primary key AUTO_INCREMENT,
    workingDays int not null,
    workedDays decimal(3,1) not null default 0
);

DELETE FROM TblMonthOf2023;

INSERT INTO TblMonthOf2023 (id, workingDays, workedDays)
VALUES
    (5, 24, 18), -- May
    (6, 23, 18.5), -- June
    (7, 22, 22), -- July
    (8, 23, 23), -- August
    (9, 20, 20), -- September
    (10, 22, 22), -- October
    (11, 18, 18), -- November
    (12, 22, 22); -- December

    SELECT MONTHNAME(id) as month, workingDays FROM TblMonthOf2023;
    SELECT MONTHNAME(id) AS month_name, workingDays FROM TblMonthOf2023;
SELECT 
    CASE 
        WHEN id = 1 THEN 'January'
        WHEN id = 2 THEN 'February'
        WHEN id = 3 THEN 'March'
        WHEN id = 4 THEN 'April'
        WHEN id = 5 THEN 'May'
        WHEN id = 6 THEN 'June'
        WHEN id = 7 THEN 'July'
        WHEN id = 8 THEN 'August'
        WHEN id = 9 THEN 'September'
        WHEN id = 10 THEN 'October'
        WHEN id = 11 THEN 'November'
        WHEN id = 12 THEN 'December'
        ELSE NULL
    END AS month_name,
    workingDays
FROM TblMonthOf2023;