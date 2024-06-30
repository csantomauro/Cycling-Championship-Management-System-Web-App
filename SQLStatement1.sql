SELECT DISTINCT C.Name, C.Surname, T.NameT,S.Edition, I.Ranking, S.StartingCity, S.ArrivalCity
FROM CYCLIST C, TEAM T, STAGE S, INDIVIDUAL_CLASSIFICATION I
WHERE C.CodC = I.CodC
AND S.CodS = I.CodS
AND S.Edition = I.Edition
AND C.CodT = T.CodT
AND C.CodC = 1 
AND S.CodS = 1
ORDER BY S.Edition