<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/createUser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'createUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/listeUser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'listeUser',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-eleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-eleve',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-eleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-eleve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/enregistrer_eleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'enregistrer_eleve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-ins_reins' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-ins_reins',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-ins_reins' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-ins_reins',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-personnel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-personnel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-tousPersonnel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-tousPersonnel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-anneeScolaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-anneeScolaire',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-semestreAnnee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-semestreAnnee',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-anneeScolaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-anneeScolaire',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-absence' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-absence',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-absence' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-absence',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-coefficient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-coefficient',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-coefficient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-coefficient',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-classe' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-classe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-desclasse' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-desclasse',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-classe' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-classe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-parent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-parent',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/actionParentId' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'actionParentId',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getListeParentPersonnel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getListeParentPersonnel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-parentEleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-parentEleve',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-parentEleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-parentEleve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-personnelEleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-personnelEleve',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-personnelEleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-personnelEleve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-accueillit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-accueillit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-accueillit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-accueillit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-depart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-depart',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-depart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-depart',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-compte' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-compte',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-compte' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-compte',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/liste-journal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-journal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/liste-balance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-balance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-payement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-payement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-payement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-payement',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/listePayementDetail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'listePayementDetail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/listeDesImpayes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'listeDesImpayes',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/statistique_rapport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-statistique_rapport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-recu_payement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-recu_payement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-recu_payement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-recu_payement',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-reduction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-reduction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-reduction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-reduction',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-effectifClasse' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-effectifClasse',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-effectifClasse' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-effectifClasse',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-payement_salaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-payement_salaire',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-payement_salaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-payement_salaire',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/personnel/matieres' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personnel/matieres',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-personnel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-personnel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-enseignant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-enseignant',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getactionPersonnelId' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getactionPersonnelId',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getPersonnel-salaireDetail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getPersonnel-salaireDetail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getEnseignant-salaireDetail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getEnseignant-salaireDetail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-volume_horaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-volume_horaire',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-volume_horaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-volume_horaire',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-matiere' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-matiere',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-matiere' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-matiere',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-enseigner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-enseigner',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-enseigner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-enseigner',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-affecter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-affecter',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-affecter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-affecter',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-noter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-noter',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-bulletinsDisponibles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-bulletinsDisponibles',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-notation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-notation',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-resultatAnnuel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-resultatAnnuel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-resultatSemestriel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-resultatSemestriel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/bulletin_eleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bulletin_eleve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/MgEleve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'MgEleve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-noter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-noter',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/enregistrer-note' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'enregistrer-note',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-emploi_temps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-emploi_temps',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-emploi_tempsPerson' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-emploi_tempsPerson',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-emploi_temps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-emploi_temps',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-salaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-salaire',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-salaire' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-salaire',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getEtatSalaireGlobal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getEtatSalaireGlobal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-fonction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-fonction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-fonction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-fonction',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-fonction_personnel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-fonction_personnel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-fonction_personnel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-fonction_personnel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-depense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-depense',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-recette' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-recette',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-depense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-depense',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-recetteCasReduction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-recetteCasReduction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-type_depense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-type_depense',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-type_recette' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-type_recette',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-type_depense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-type_depense',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-ficheRenseignement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-ficheRenseignement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/create-ficheRenseignement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-ficheRenseignement',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/list-statistique_rapprochement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-statistique_rapprochement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/statistique_rapprochementMoisAnnee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-statistique_rapprochementMoisAnnee',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/dasbord_comptable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dasbord_comptable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Mj408DAUNfmYyBSm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vHoYCMCrrJZLTO1q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/api/(?|update(?|User(?|Statut/([^/]++)(*:46)|/([^/]++)(*:62))|\\-(?|e(?|leve/([^/]++)(*:92)|ffectifClasse/([^/]++)(*:121)|nseigner/([^/]++)(*:146)|mploi_temps/([^/]++)(*:174))|ins_reins/([^/]++)(*:201)|a(?|nneeScolaire/([^/]++)(*:234)|c(?|cueillit/([^/]++)(*:263)|tion/([^/]++)(*:284))|ffecter/([^/]++)(*:309))|c(?|o(?|efficient/([^/]++)(*:344)|mpte/([^/]++)(*:365))|lasse/([^/]++)(*:388))|p(?|a(?|rent(?|/([^/]++)(*:421)|Eleve/([^/]++)(*:443))|yement(?|/([^/]++)(*:470)|_salaire/([^/]++)(*:495)))|ersonnel(?|Eleve/([^/]++)(*:530)|/([^/]++)(*:547)))|dep(?|art/([^/]++)(*:575)|ense/([^/]++)(*:596))|re(?|cu_payement/([^/]++)(*:630)|duction/([^/]++)(*:654))|volume_horaire/([^/]++)(*:686)|matiere/([^/]++)(*:710)|noter/([^/]++)(*:732)|salaire/([^/]++)(*:756)|f(?|onction(?|/([^/]++)(*:787)|_personnel/([^/]++)(*:814))|icheRenseignement/([^/]++)(*:849))|type_depense/([^/]++)(*:879)))|vo(?|ir\\-fichier/(.*)(*:910)|lume_horaireId/([^/]++)(*:941))|e(?|leve(?|Id/([^/]++)(*:972)|_(?|droit(?|/([^/]++)(*:1001)|Ensei/([^/]++)(*:1024))|p(?|arentId/([^/]++)(*:1054)|ersonnelId/([^/]++)(*:1082))|PersonnelId/([^/]++)(*:1112)))|ffectifClasseId/([^/]++)(*:1147)|nseignerId/([^/]++)(*:1175)|mploi_tempsId(?|/([^/]++)(*:1209)|person/([^/]++)(*:1233)))|s(?|how(?|Matricule(?|/([^/]++)(*:1275)|Personnel/([^/]++)(*:1302))|TelephoneP/([^/]++)(*:1331)|Emploi(?|Personnel/([^/]++)(*:1367)|Classe/([^/]++)(*:1391)|Jour/([^/]++)(*:1413))|\\-fonction_personnel/([^/]++)(*:1452))|alaireId/([^/]++)(*:1479)|tatistique_rapprochement_annee/([^/]++)(*:1527))|de(?|lete\\-(?|e(?|leve/([^/]++)(*:1568)|ffectifClasse/([^/]++)(*:1599)|nseigner/([^/]++)(*:1625)|mploi_temps/([^/]++)(*:1654))|ins_reins/([^/]++)(*:1682)|a(?|nneeScolaire/([^/]++)(*:1716)|bsence/([^/]++)(*:1740)|c(?|cueillit/([^/]++)(*:1770)|tion/([^/]++)(*:1792))|ffecter/([^/]++)(*:1818))|c(?|o(?|efficient/([^/]++)(*:1854)|mpte/([^/]++)(*:1876))|lasse/([^/]++)(*:1900))|p(?|a(?|rent(?|/([^/]++)(*:1934)|Eleve/([^/]++)(*:1957))|yement(?|/([^/]++)(*:1985)|_salaire/([^/]++)(*:2011)))|ersonnel(?|Eleve/([^/]++)(*:2047)|/([^/]++)(*:2065)))|dep(?|art/([^/]++)(*:2094)|ense/([^/]++)(*:2116))|re(?|cu_payement/([^/]++)(*:2151)|duction/([^/]++)(*:2176))|volume_horaire/([^/]++)(*:2209)|matiere/([^/]++)(*:2234)|noter/([^/]++)(*:2257)|salaire/([^/]++)(*:2282)|f(?|onction(?|/([^/]++)(*:2314)|_personnel/([^/]++)(*:2342))|icheRenseignement/([^/]++)(*:2378))|type_depense/([^/]++)(*:2409))|p(?|artId/([^/]++)(*:2437)|enseId/([^/]++)(*:2461)))|p(?|a(?|rent(?|_eleveId/([^/]++)(*:2504)|Id/([^/]++)(*:2524)|Telephone/([^/]++)(*:2551)|EleveId/([^/]++)(*:2576))|yement(?|Id/([^/]++)(*:2606)|_salaireId/([^/]++)(*:2634)))|ersonnel(?|/([^/]++)/(?|classes(*:2676)|matieres(*:2693))|EleveId/([^/]++)(*:2719)|Id/([^/]++)(*:2739)))|a(?|c(?|tion(?|EleveId/([^/]++)(*:2781)|Id/([^/]++)(*:2801))|cueillitId/([^/]++)(*:2830))|nneeScolaireId/([^/]++)(*:2863)|ffecterId/([^/]++)(*:2890))|ins_reinsId/([^/]++)(*:2920)|c(?|o(?|efficientId/([^/]++)(*:2957)|mpteId/([^/]++)(*:2981))|lasseId/([^/]++)(*:3007)|reate\\-parent/([^/]++)(*:3038))|list\\-(?|c(?|lasseDroit/([^/]++)(*:3080)|omparaisonDepense/([^/]++)(*:3115))|bulletinsDisoEleve/([^/]++)(*:3152)|situationPrevisionnelDepense/([^/]++)(*:3198))|f(?|rais(?|ParClasseId/([^/]++)(*:3239)|_scolariteEleve/([^/]++)(*:3272))|onction(?|Id/([^/]++)(*:3303)|_personnelId/([^/]++)(*:3333))|icheRenseignementId/([^/]++)(*:3371))|ImpayesEleve/([^/]++)(*:3402)|re(?|cu_payementId/([^/]++)(*:3438)|duction(?|Id/([^/]++)(*:3468)|EleveId/([^/]++)(*:3493)))|matiere(?|Droit/([^/]++)(*:3528)|Id/([^/]++)(*:3548)|Prof_droit/([^/]++)(*:3576))|getPersonnelMatiere/([^/]++)(*:3614)|noterId/([^/]++)(*:3639)|type_depenseId/([^/]++)(*:3671)))/?$}sDu',
    ),
    3 => 
    array (
      46 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateUserStatut',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      62 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateUser',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      92 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-eleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-effectifClasse',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-enseigner',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-emploi_temps',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      201 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-ins_reins',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-anneeScolaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-accueillit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-affecter',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-coefficient',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-compte',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-classe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      421 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-parent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      443 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-parentEleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-payement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      495 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-payement_salaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      530 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-personnelEleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-personnel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      575 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-depart',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-depense',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      630 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-recu_payement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-reduction',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      686 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-volume_horaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-matiere',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      732 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-noter',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-salaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      787 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-fonction',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      814 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-fonction_personnel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      849 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-ficheRenseignement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      879 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-type_depense',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showFile',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      941 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'volume_horaireId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      972 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eleveId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1001 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eleve_droit',
          ),
          1 => 
          array (
            0 => 'droit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1024 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eleve_droitEnsei',
          ),
          1 => 
          array (
            0 => 'droit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1054 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eleve_parentId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1082 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eleve_personnelId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'eleve_PersonnelId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1147 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'effectifClasseId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1175 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'enseignerId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emploi_tempsId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emploi_tempsIdperson',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1275 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showMatricule',
          ),
          1 => 
          array (
            0 => 'matricule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1302 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showMatriculePersonnel',
          ),
          1 => 
          array (
            0 => 'matricule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1331 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showTelephoneP',
          ),
          1 => 
          array (
            0 => 'telephone',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1367 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showEmploiPersonnel',
          ),
          1 => 
          array (
            0 => 'personnel_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showEmploiClasse',
          ),
          1 => 
          array (
            0 => 'classe_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showEmploiJour',
          ),
          1 => 
          array (
            0 => 'jour',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1452 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-fonction_personnel',
          ),
          1 => 
          array (
            0 => 'matricule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1479 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'salaireId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-statistique_rapprochement_annee',
          ),
          1 => 
          array (
            0 => 'annee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1568 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-eleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-effectifClasse',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1625 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-enseigner',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-emploi_temps',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-ins_reins',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1716 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-anneeScolaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1740 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-absence',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1770 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-accueillit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1818 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-affecter',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1854 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-coefficient',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1876 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-compte',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1900 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-classe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1934 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-parent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-parentEleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1985 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-payement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2011 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-payement_salaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2047 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-personnelEleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2065 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-personnel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2094 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-depart',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2116 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-depense',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-recu_payement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2176 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-reduction',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-volume_horaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-matiere',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-noter',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2282 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-salaire',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-fonction',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2342 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-fonction_personnel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2378 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-ficheRenseignement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-type_depense',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'departId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2461 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'depenseId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2504 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'parent_eleveId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'parentId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2551 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'parentTelephone',
          ),
          1 => 
          array (
            0 => 'telephone',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'parentEleveId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2606 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payementId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2634 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payement_salaireId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2676 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personnel/{id}/classes',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personnel/{id}/matieres',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2719 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personnelEleveId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2739 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personnelId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2781 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'actionEleveId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2801 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'actionId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accueillitId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2863 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'anneeScolaireId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2890 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'affecterId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2920 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ins_reinsId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coefficientId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2981 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'compteId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3007 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classeId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3038 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-parent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3080 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-classeDroit',
          ),
          1 => 
          array (
            0 => 'droit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3115 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-comparaisonDepense',
          ),
          1 => 
          array (
            0 => 'annee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-bulletinsDisoEleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3198 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'list-situationPrevisionnelDepense',
          ),
          1 => 
          array (
            0 => 'annee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3239 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fraisParClasseId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frais_scolairiteEleve',
          ),
          1 => 
          array (
            0 => 'matricule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3303 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fonctionId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fonction_personnelId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ficheRenseignementId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ImpayesEleve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'recu_payementId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3468 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reductionId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reductionEleveId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3528 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'matiereDroit',
          ),
          1 => 
          array (
            0 => 'droit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'matiereId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'matiereProf_droit',
          ),
          1 => 
          array (
            0 => 'droit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3614 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getPersonnelMatiere',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3639 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'noterId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3671 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'type_depenseId',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Controllers\\Auth\\LoginController@login_store',
        'controller' => 'App\\Http\\Controllers\\Controllers\\Auth\\LoginController@login_store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@logout',
        'controller' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'createUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/createUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@inscription_store',
        'controller' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@inscription_store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'createUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateUserStatut' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/updateUserStatut/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@updateUserStatut',
        'controller' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@updateUserStatut',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'updateUserStatut',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/updateUser/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@updateUser',
        'controller' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@updateUser',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'updateUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'listeUser' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/listeUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@listeUser',
        'controller' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@listeUser',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'listeUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showFile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/voir-fichier/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@showFile',
        'controller' => '\\App\\Http\\Controllers\\Controllers\\Auth\\LoginController@showFile',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showFile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'filename' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-eleve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-eleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-eleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eleveId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/eleveId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'eleveId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showMatricule' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/showMatricule/{matricule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@showMatricule',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@showMatricule',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showMatricule',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-eleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-eleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-eleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-eleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-eleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-eleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-eleve' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-eleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-eleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eleve_droit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/eleve_droit/{droit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@EleveClasse',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@EleveClasse',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'eleve_droit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eleve_droitEnsei' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/eleve_droitEnsei/{droit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@EleveEnseiClasse',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@EleveEnseiClasse',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'eleve_droitEnsei',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'enregistrer_eleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/enregistrer_eleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@enregistrer',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@enregistrer',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'enregistrer_eleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'parent_eleveId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/parent_eleveId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@getParentEleveId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@getParentEleveId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'parent_eleveId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'actionEleveId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/actionEleveId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@getactionEleveId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EleveController@getactionEleveId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'actionEleveId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-ins_reins' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-ins_reins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-ins_reins',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ins_reinsId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ins_reinsId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'ins_reinsId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-ins_reins' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-ins_reins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-ins_reins',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-ins_reins' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-ins_reins/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-ins_reins',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-ins_reins' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-ins_reins/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-ins_reins',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-personnel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-personnel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@createPersonnel',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@createPersonnel',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-tousPersonnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-tousPersonnel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@tousPersonnel',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\InsReinsController@tousPersonnel',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-tousPersonnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-anneeScolaire' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-anneeScolaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-anneeScolaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-semestreAnnee' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-semestreAnnee',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\CoefficientController@semestreAnnee',
        'controller' => 'App\\Http\\Controllers\\CoefficientController@semestreAnnee',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-semestreAnnee',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'anneeScolaireId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/anneeScolaireId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'anneeScolaireId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-anneeScolaire' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-anneeScolaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-anneeScolaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-anneeScolaire' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-anneeScolaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-anneeScolaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-anneeScolaire' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-anneeScolaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AnneeScolaireController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-anneeScolaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-absence' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-absence',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AbsenceController@liste',
        'controller' => 'App\\Http\\Controllers\\AbsenceController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-absence',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-absence' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-absence',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AbsenceController@create',
        'controller' => 'App\\Http\\Controllers\\AbsenceController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-absence',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-absence' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-absence/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AbsenceController@delete',
        'controller' => 'App\\Http\\Controllers\\AbsenceController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-absence',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-coefficient' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-coefficient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\CoefficientController@liste',
        'controller' => 'App\\Http\\Controllers\\CoefficientController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-coefficient',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'coefficientId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/coefficientId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\CoefficientController@show',
        'controller' => 'App\\Http\\Controllers\\CoefficientController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'coefficientId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-coefficient' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-coefficient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\CoefficientController@create',
        'controller' => 'App\\Http\\Controllers\\CoefficientController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-coefficient',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-coefficient' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-coefficient/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\CoefficientController@update',
        'controller' => 'App\\Http\\Controllers\\CoefficientController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-coefficient',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-coefficient' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-coefficient/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\CoefficientController@delete',
        'controller' => 'App\\Http\\Controllers\\CoefficientController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-coefficient',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-classe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-classe',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-classe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-classeDroit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-classeDroit/{droit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@classeDroit',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@classeDroit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-classeDroit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'personnel/{id}/classes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/personnel/{id}/classes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@getClasseParPersonnelId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@getClasseParPersonnelId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'personnel/{id}/classes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-desclasse' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-desclasse',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@liste_classe',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@liste_classe',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-desclasse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'classeId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/classeId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'classeId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-classe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-classe',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-classe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-classe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-classe/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-classe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-classe' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-classe/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-classe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fraisParClasseId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/fraisParClasseId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@fraisParClasse',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ClasseController@fraisParClasse',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'fraisParClasseId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-parent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-parent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-parent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'parentId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/parentId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'parentId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'parentTelephone' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/parentTelephone/{telephone}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@showTelephone',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@showTelephone',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'parentTelephone',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-parent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-parent/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-parent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-parent' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-parent/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-parent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-parent' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-parent/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-parent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eleve_parentId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/eleve_parentId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getEleveParentId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getEleveParentId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'eleve_parentId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eleve_PersonnelId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/eleve_PersonnelId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getElevePersonnelId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getElevePersonnelId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'eleve_PersonnelId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'actionParentId' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/actionParentId',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getactionParentId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getactionParentId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'actionParentId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getListeParentPersonnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getListeParentPersonnel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getListeParentPersonnelEleve',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@getListeParentPersonnelEleve',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'getListeParentPersonnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showTelephoneP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/showTelephoneP/{telephone}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@showTelephoneP',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentController@showTelephoneP',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showTelephoneP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-parentEleve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-parentEleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-parentEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'parentEleveId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/parentEleveId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'parentEleveId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-parentEleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-parentEleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-parentEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-parentEleve' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-parentEleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-parentEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-parentEleve' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-parentEleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ParentEleveController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-parentEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-personnelEleve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-personnelEleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PersonnelEleveController@liste',
        'controller' => 'App\\Http\\Controllers\\PersonnelEleveController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-personnelEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'personnelEleveId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/personnelEleveId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PersonnelEleveController@show',
        'controller' => 'App\\Http\\Controllers\\PersonnelEleveController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'personnelEleveId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-personnelEleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-personnelEleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PersonnelEleveController@create',
        'controller' => 'App\\Http\\Controllers\\PersonnelEleveController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-personnelEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-personnelEleve' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-personnelEleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PersonnelEleveController@update',
        'controller' => 'App\\Http\\Controllers\\PersonnelEleveController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-personnelEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-personnelEleve' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-personnelEleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PersonnelEleveController@delete',
        'controller' => 'App\\Http\\Controllers\\PersonnelEleveController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-personnelEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-accueillit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-accueillit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-accueillit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accueillitId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/accueillitId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'accueillitId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-accueillit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-accueillit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-accueillit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-accueillit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-accueillit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-accueillit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-accueillit' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-accueillit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\AccueillitController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-accueillit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-depart' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-depart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-depart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'departId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/departId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'departId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-depart' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-depart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-depart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-depart' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-depart/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-depart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-depart' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-depart/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ControllerDepart@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-depart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-compte' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-compte',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-compte',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'compteId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/compteId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'compteId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-compte' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-compte',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-compte',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-compte' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-compte/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-compte',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-compte' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-compte/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-compte',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-journal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/liste-journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@liste_journal',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@liste_journal',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-journal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-balance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/liste-balance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@liste_balance',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\CompteController@liste_balance',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-balance',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-payement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-payement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payementId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/payementId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'payementId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-payement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-payement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-payement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-payement/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-payement' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-payement/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frais_scolairiteEleve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/frais_scolariteEleve/{matricule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@frais_scolairiteEleve',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@frais_scolairiteEleve',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'frais_scolairiteEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'listePayementDetail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/listePayementDetail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@listePayementDetail',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@listePayementDetail',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'listePayementDetail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'listeDesImpayes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/listeDesImpayes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@listeDesImpayes',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@listeDesImpayes',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'listeDesImpayes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ImpayesEleve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ImpayesEleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@ImpayesEleve',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@ImpayesEleve',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'ImpayesEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-statistique_rapport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/statistique_rapport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@statistique_rapport',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\PayementController@statistique_rapport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-statistique_rapport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-recu_payement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-recu_payement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-recu_payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'recu_payementId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/recu_payementId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'recu_payementId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-recu_payement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-recu_payement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-recu_payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-recu_payement' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-recu_payement/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-recu_payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-recu_payement' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-recu_payement/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\RecuPayementController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-recu_payement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-reduction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-reduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-reduction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reductionId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reductionId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'reductionId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-reduction' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-reduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-reduction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-reduction' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-reduction/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-reduction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-reduction' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-reduction/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-reduction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reductionEleveId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reductionEleveId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@reductionEleveId',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\ReductionController@reductionEleveId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'reductionEleveId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-effectifClasse' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-effectifClasse',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-effectifClasse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'effectifClasseId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/effectifClasseId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'effectifClasseId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-effectifClasse' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-effectifClasse',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-effectifClasse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-effectifClasse' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-effectifClasse/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-effectifClasse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-effectifClasse' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-effectifClasse/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_eleve\\EffectifClasseController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-effectifClasse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-payement_salaire' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-payement_salaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PayementSalaireController@liste',
        'controller' => 'App\\Http\\Controllers\\PayementSalaireController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-payement_salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payement_salaireId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/payement_salaireId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PayementSalaireController@show',
        'controller' => 'App\\Http\\Controllers\\PayementSalaireController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'payement_salaireId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-payement_salaire' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-payement_salaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PayementSalaireController@create',
        'controller' => 'App\\Http\\Controllers\\PayementSalaireController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-payement_salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-payement_salaire' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-payement_salaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PayementSalaireController@update',
        'controller' => 'App\\Http\\Controllers\\PayementSalaireController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-payement_salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-payement_salaire' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-payement_salaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\PayementSalaireController@delete',
        'controller' => 'App\\Http\\Controllers\\PayementSalaireController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-payement_salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'personnel/{id}/matieres' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/personnel/{id}/matieres',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getMatiereParPersonnelId',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getMatiereParPersonnelId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'personnel/{id}/matieres',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'personnel/matieres' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/personnel/matieres',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getMatiereParPersonnel',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getMatiereParPersonnel',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'personnel/matieres',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-personnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-personnel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-enseignant' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-enseignant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@listeEnseignant',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@listeEnseignant',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-enseignant',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'personnelId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/personnelId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'personnelId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-personnel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-personnel/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-personnel' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-personnel/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showMatriculePersonnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/showMatriculePersonnel/{matricule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@showMatricule',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@showMatricule',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showMatriculePersonnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getactionPersonnelId' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getactionPersonnelId',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getactionPersonnelId',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getactionPersonnelId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'getactionPersonnelId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getPersonnel-salaireDetail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getPersonnel-salaireDetail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getPersonnelDetail',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getPersonnelDetail',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'getPersonnel-salaireDetail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getEnseignant-salaireDetail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getEnseignant-salaireDetail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getEnseignantDetail',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getEnseignantDetail',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'getEnseignant-salaireDetail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'eleve_personnelId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/eleve_personnelId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getElevePersonnelId',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\PersonnelController@getElevePersonnelId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'eleve_personnelId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-volume_horaire' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-volume_horaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-volume_horaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'volume_horaireId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/volume_horaireId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'volume_horaireId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-volume_horaire' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-volume_horaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-volume_horaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-volume_horaire' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-volume_horaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-volume_horaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-volume_horaire' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-volume_horaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\VolumeHoraireController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-volume_horaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPersonnelController@liste',
        'controller' => 'App\\Http\\Controllers\\ActionPersonnelController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'actionId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/actionId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPersonnelController@show',
        'controller' => 'App\\Http\\Controllers\\ActionPersonnelController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'actionId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPersonnelController@create',
        'controller' => 'App\\Http\\Controllers\\ActionPersonnelController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-action/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPersonnelController@update',
        'controller' => 'App\\Http\\Controllers\\ActionPersonnelController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-action/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPersonnelController@delete',
        'controller' => 'App\\Http\\Controllers\\ActionPersonnelController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-matiere' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-matiere',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-matiere',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'matiereDroit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/matiereDroit/{droit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@matiereDroit',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@matiereDroit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'matiereDroit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'matiereId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/matiereId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'matiereId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-matiere' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-matiere',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-matiere',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-matiere' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-matiere/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-matiere',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-matiere' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-matiere/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-matiere',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getPersonnelMatiere' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getPersonnelMatiere/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@getPersonnelMatiere',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\MatiereController@getPersonnelMatiere',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'getPersonnelMatiere',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-enseigner' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-enseigner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-enseigner',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'enseignerId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/enseignerId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'enseignerId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-enseigner' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-enseigner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-enseigner',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-enseigner' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-enseigner/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-enseigner',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-enseigner' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-enseigner/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EnseignerController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-enseigner',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-affecter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-affecter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AffectationController@liste',
        'controller' => 'App\\Http\\Controllers\\AffectationController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-affecter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'affecterId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/affecterId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AffectationController@show',
        'controller' => 'App\\Http\\Controllers\\AffectationController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'affecterId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-affecter' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-affecter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AffectationController@create',
        'controller' => 'App\\Http\\Controllers\\AffectationController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-affecter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-affecter' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-affecter/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AffectationController@update',
        'controller' => 'App\\Http\\Controllers\\AffectationController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-affecter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-affecter' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-affecter/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\AffectationController@delete',
        'controller' => 'App\\Http\\Controllers\\AffectationController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-affecter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-noter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-noter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-noter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-bulletinsDisponibles' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-bulletinsDisponibles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@bulletinsDisponibles',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@bulletinsDisponibles',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-bulletinsDisponibles',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-bulletinsDisoEleve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-bulletinsDisoEleve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@bulletinsDisoEleve',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@bulletinsDisoEleve',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-bulletinsDisoEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-notation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/list-notation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@notesParClasseSemestre',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@notesParClasseSemestre',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-notation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-resultatAnnuel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/list-resultatAnnuel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@resultatAnnuel',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@resultatAnnuel',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-resultatAnnuel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-resultatSemestriel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/list-resultatSemestriel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@resultatSemestriel',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@resultatSemestriel',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-resultatSemestriel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulletin_eleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bulletin_eleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@bulletinEleve',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@bulletinEleve',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'bulletin_eleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'MgEleve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/MgEleve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@MgEleve',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@MgEleve',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'MgEleve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'noterId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/noterId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'noterId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-noter' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-noter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-noter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'enregistrer-note' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/enregistrer-note',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@enregistrerNote',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@enregistrerNote',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'enregistrer-note',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-noter' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-noter/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-noter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-noter' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-noter/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\NoterController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-noter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-emploi_temps' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-emploi_temps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-emploi_temps',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-emploi_tempsPerson' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-emploi_tempsPerson',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@listeEmploiPerson',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@listeEmploiPerson',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-emploi_tempsPerson',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emploi_tempsId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/emploi_tempsId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEnploiClasse',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEnploiClasse',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'emploi_tempsId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emploi_tempsIdperson' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/emploi_tempsIdperson/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEnploiPerson',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEnploiPerson',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'emploi_tempsIdperson',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-emploi_temps' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-emploi_temps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-emploi_temps',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-emploi_temps' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-emploi_temps/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-emploi_temps',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-emploi_temps' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-emploi_temps/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-emploi_temps',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showEmploiPersonnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/showEmploiPersonnel/{personnel_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEmploiPersonnel',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEmploiPersonnel',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showEmploiPersonnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showEmploiClasse' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/showEmploiClasse/{classe_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEmploiClasse',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEmploiClasse',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showEmploiClasse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showEmploiJour' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/showEmploiJour/{jour}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEmploiJour',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@showEmploiJour',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'showEmploiJour',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'matiereProf_droit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/matiereProf_droit/{droit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@matiereProf_droit',
        'controller' => 'App\\Http\\Controllers\\gestion_scolaire\\EmploiTempsController@matiereProf_droit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'matiereProf_droit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-salaire' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-salaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'salaireId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/salaireId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'salaireId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-salaire' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-salaire',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-salaire' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-salaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-salaire' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-salaire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-salaire',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getEtatSalaireGlobal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getEtatSalaireGlobal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@getEtatSalaireGlobal',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\SalaireController@getEtatSalaireGlobal',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'getEtatSalaireGlobal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-fonction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-fonction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-fonction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fonctionId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/fonctionId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'fonctionId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-fonction' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-fonction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-fonction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-fonction' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/update-fonction/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-fonction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-fonction' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-fonction/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-fonction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-fonction_personnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-fonction_personnel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@liste',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-fonction_personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-fonction_personnel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/show-fonction_personnel/{matricule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@showMatricule',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@showMatricule',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'show-fonction_personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fonction_personnelId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/fonction_personnelId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@show',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'fonction_personnelId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-fonction_personnel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-fonction_personnel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@create',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-fonction_personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-fonction_personnel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-fonction_personnel/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@update',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-fonction_personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-fonction_personnel' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-fonction_personnel/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@delete',
        'controller' => 'App\\Http\\Controllers\\gestion_personnel\\FonctionPersonnelController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-fonction_personnel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-depense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-depense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@liste',
        'controller' => 'App\\Http\\Controllers\\DepenseController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-recette' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-recette',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@recette',
        'controller' => 'App\\Http\\Controllers\\DepenseController@recette',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-recette',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'depenseId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/depenseId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@show',
        'controller' => 'App\\Http\\Controllers\\DepenseController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'depenseId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-depense' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-depense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@create',
        'controller' => 'App\\Http\\Controllers\\DepenseController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-depense' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-depense/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@update',
        'controller' => 'App\\Http\\Controllers\\DepenseController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-depense' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-depense/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@delete',
        'controller' => 'App\\Http\\Controllers\\DepenseController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-recetteCasReduction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-recetteCasReduction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@recetteCasReduction',
        'controller' => 'App\\Http\\Controllers\\DepenseController@recetteCasReduction',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-recetteCasReduction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-situationPrevisionnelDepense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-situationPrevisionnelDepense/{annee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@situationPrevisionnelDepense',
        'controller' => 'App\\Http\\Controllers\\DepenseController@situationPrevisionnelDepense',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-situationPrevisionnelDepense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-comparaisonDepense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-comparaisonDepense/{annee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\DepenseController@comparaisonDepense',
        'controller' => 'App\\Http\\Controllers\\DepenseController@comparaisonDepense',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-comparaisonDepense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-type_depense' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-type_depense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\TypeDepenseController@liste',
        'controller' => 'App\\Http\\Controllers\\TypeDepenseController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-type_depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-type_recette' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-type_recette',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\TypeDepenseController@listeTypeRecette',
        'controller' => 'App\\Http\\Controllers\\TypeDepenseController@listeTypeRecette',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-type_recette',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'type_depenseId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/type_depenseId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\TypeDepenseController@show',
        'controller' => 'App\\Http\\Controllers\\TypeDepenseController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'type_depenseId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-type_depense' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-type_depense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\TypeDepenseController@create',
        'controller' => 'App\\Http\\Controllers\\TypeDepenseController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-type_depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-type_depense' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-type_depense/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\TypeDepenseController@update',
        'controller' => 'App\\Http\\Controllers\\TypeDepenseController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-type_depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-type_depense' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-type_depense/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\TypeDepenseController@delete',
        'controller' => 'App\\Http\\Controllers\\TypeDepenseController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-type_depense',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-ficheRenseignement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-ficheRenseignement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ficheRenseignementController@liste',
        'controller' => 'App\\Http\\Controllers\\ficheRenseignementController@liste',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-ficheRenseignement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ficheRenseignementId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ficheRenseignementId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ficheRenseignementController@show',
        'controller' => 'App\\Http\\Controllers\\ficheRenseignementController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'ficheRenseignementId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-ficheRenseignement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/create-ficheRenseignement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ficheRenseignementController@create',
        'controller' => 'App\\Http\\Controllers\\ficheRenseignementController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'create-ficheRenseignement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-ficheRenseignement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update-ficheRenseignement/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ficheRenseignementController@update',
        'controller' => 'App\\Http\\Controllers\\ficheRenseignementController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'update-ficheRenseignement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-ficheRenseignement' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/delete-ficheRenseignement/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\ficheRenseignementController@delete',
        'controller' => 'App\\Http\\Controllers\\ficheRenseignementController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'delete-ficheRenseignement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-statistique_rapprochement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/list-statistique_rapprochement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@statistique_rapprochement',
        'controller' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@statistique_rapprochement',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-statistique_rapprochement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-statistique_rapprochement_annee' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/statistique_rapprochement_annee/{annee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@statistique_rapprochement_annee',
        'controller' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@statistique_rapprochement_annee',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-statistique_rapprochement_annee',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'list-statistique_rapprochementMoisAnnee' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/statistique_rapprochementMoisAnnee',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@statistique_rapprochementMoisAnnee',
        'controller' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@statistique_rapprochementMoisAnnee',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'list-statistique_rapprochementMoisAnnee',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dasbord_comptable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/dasbord_comptable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          2 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@dasbord_comptable',
        'controller' => 'App\\Http\\Controllers\\statistique\\StatistiqueController@dasbord_comptable',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'dasbord_comptable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Mj408DAUNfmYyBSm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:858:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'C:\\\\projet-soutenance\\\\Projet laravel 6_4_25\\\\Laravel_api\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"00000000000004c90000000000000000";}}',
        'as' => 'generated::Mj408DAUNfmYyBSm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vHoYCMCrrJZLTO1q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000004d40000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vHoYCMCrrJZLTO1q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
