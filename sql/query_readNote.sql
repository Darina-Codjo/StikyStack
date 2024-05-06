SELECT title, content
FROM note
WHERE idNote IN (
    SELECT idNote
    FROM link
    WHERE idUser = [ID_UTILISATEUR]
)
AND title = [TITLE_WEBSITE];
