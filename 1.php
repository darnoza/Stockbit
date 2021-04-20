SELECT 
    ID,
    UserName,
    CASE
        WHEN Parent = 0 THEN NULL
        WHEN Parent = 1 THEN 'Ali'
        WHEN Parent = 2 THEN 'Budi'
        ELSE ''
    END AS ParentUserName
FROM
    tb_test
ORDER BY ID ASC;