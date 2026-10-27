export interface Salaire {
    id: number;
    matricule: string;
    nomPrenom: string;
    fonction: string;
    idfonction: number;
    salaire_brut: number;
    salaire_id: number;
    avance_salaire: number;
    salaire_net: number;
    mois: string;
    annee_scolaire_id: number;
    statut: string;
    prime: number;
    affaire_sociale: number;
    ecolage: number;
    disponibilite: string;
    volume_horaire: number;
    taux_horaire: number;
    photo: string;
}
