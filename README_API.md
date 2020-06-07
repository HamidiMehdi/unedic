# Documentation API

Documentation de la requête de récupération des étudiants d'un département. 

## Request

```bash
GET /api/department/{department_id}/students
```

## Réponse
```json
[
    {
        "id": 1,
        "firstname": "Mehdi",
        "lastname": "HAMIDI",
        "numetud": "1010101010"
    },
    {
        "id": 7,
        "firstname": "John",
        "lastname": "Doe",
        "numetud": "1239638521"
    }
]
```

Si le département n'existe pas

```json
{
    "status": 404,
    "message": "Unable to find this entity."
}
```
