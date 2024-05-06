SELECT title, content
FROM note
WHERE idNote IN (
    SELECT idNote
    FROM user_note
    WHERE idUser = [ID_UTILISATEUR]
)
AND title = [TITLE_WEBSITE];
