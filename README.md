swag
====

Secretly We Are Groot

Projets Nuit de l'Info 2014, Strasbourg


1- Alerter
  Bandeau avec défilement dynamique des dernières actualités des réseaux sociaux.
  Twitter #épidémie

2- Cartographier
  Affichage de la carte avec des zones d'épidémie
  Affichage de la carte avec des zones à risque
  Points sur les centres de vacinations
  Points sur les centres de dépistages
  Filtres (épidémie (centre -> point, épidemie -> zone coloriée )
  
3- Diagnostiquer
  Saisie des syndromes
  Donc Détection de maladies

4- Réseaux sociaux
  Récupérer des tweet
  Récupérer des post facebook

5- Création d'entité par l'utilisateur
  Rajout de maladie 
  Rajout de centre de vacination
  Rajout de zone d'épidémie

-- API --
/social
  /getAlert/disease:id/ 
  /getAlert/location:name/

/center
  /create
  /read
  /edit
  /delete
  
  {
    id:
    name:
    latitude:
    longitude:
    type:
  }
  
  /zone
    /create
    /read
    /edit
    /delete
    
    {
      id:
      latitude:
      longitude:
      radius:
    }
  
  
  
  /

/diagnostic
  /getSymptom Renvoie tout les symptomes existant en base de données ( {id:"",name:"" } )
  /getDesease Renvoie toutes les maladies avec les symptome correspondant { name:"", id:"", symptom:[id, id, id] }

/map
  /view
