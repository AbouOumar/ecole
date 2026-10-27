import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class RouteMapService {

  constructor() { }
}


// Ce fichier associe chaque route claire à une chaîne cryptée (alias)
export const RouteMap: Record<string, string> = {
  '/admin': 'dc9_ahaf/453rf3/4ie_6f',
  '/eleve': 'dc4_ahaf/026rf6/7ie_9f',
  '/enseignant': 'dc7_ahaf/648rf2/0ie_5f',
  '/admin/access-nonAuthorier': '404',
  '/admin/tableaudebord': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/037rf9/0ie_7f',
  '/admin/listeDesElevesDroit': 'dc9_ahaf/453rf3/4ie_6f/dc9_ahaf/424rf2/5ie_8f',
  '/admin/listeDesElevesC': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/285rf7/0ie_5f',
  '/admin/Re/inscription': 'dc9_ahaf/453rf3/4ie_6f/dc0_ahaf/194rf7/6ie_5f',
  '/admin/listeEleveParent/:id': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/366rf4/0ie_1f/:id',
  '/admin/listeParentEnfant/:id/:type': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/379rf0/2ie_8f/:id/:type',
  '/admin/tableauDeRapprochement': 'dc9_ahaf/453rf3/4ie_6f/dc7_ahaf/804rf0/6ie_9f',
  '/admin/paiementDeScolarite': 'dc9_ahaf/453rf3/4ie_6f/dc1_ahaf/274rf4/4ie_4f',
  '/admin/Historiquepaiement': 'dc9_ahaf/453rf3/4ie_6f/dc8_ahaf/953rf2/1ie_3f',
  '/admin/listeDesPersonnelsDroit': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/720rf1/3ie_6f',
  '/admin/listeDesPersonnels': 'dc9_ahaf/453rf3/4ie_6f/dc7_ahaf/306rf3/1ie_8f',
  '/admin/listeDesEnseignants': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/684rf0/2ie_9f',
  '/admin/volumeHoraire': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/054rf1/6ie_6f',
  '/admin/lesSalaire': 'dc9_ahaf/453rf3/4ie_6f/dc2_ahaf/791rf7/9ie_0f',
  '/admin/etatSalairePers': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/431rf8/3ie_5f',
  '/admin/payementDesSalaire': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/660rf4/1ie_3f',
  '/admin/PaimentSalaire': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/673rf8/6ie_5f',
  '/admin/gestionEnseignants': 'dc9_ahaf/453rf3/4ie_6f/dc6_ahaf/339rf1/9ie_5f',
  '/admin/EtatSalaire': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/422rf2/2ie_9f',
  '/admin/detailInfoPers': 'dc9_ahaf/453rf3/4ie_6f/dc9_ahaf/575rf9/9ie_6f',
  '/admin/recetteHorScolarite': 'dc9_ahaf/453rf3/4ie_6f/dc8_ahaf/350rf9/7ie_7f',
  '/admin/recetteCasReduction': 'dc9_ahaf/453rf3/4ie_6f/dc7_ahaf/508rf4/9ie_7f',
  '/admin/situationPrevisionnelle': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/334rf6/2ie_8f',
  '/admin/listeDeDepenses': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/264rf1/8ie_7f',
  '/admin/typeDePenses': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/726rf2/5ie_1f',
  '/admin/situationPrevisionnelleDepenses': 'dc9_ahaf/453rf3/4ie_6f/dc1_ahaf/264rf8/4ie_5f',
  '/admin/gestionEmploiCenseur': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/405rf8/1ie_4f',
  '/admin/gestionNotesCenseur': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/746rf3/8ie_6f',
  '/admin/noterEleveCenseur': 'dc9_ahaf/453rf3/4ie_6f/dc0_ahaf/759rf9/1ie_3f',
  '/admin/organiserEvaCenseur': 'dc9_ahaf/453rf3/4ie_6f/dc0_ahaf/728rf7/5ie_4f',
  '/admin/resultatTrimestriel': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/590rf1/6ie_5f',
  '/admin/resultatFinDannee': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/976rf1/8ie_1f',
  '/admin/statistiqueSupervision': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/397rf3/6ie_1f',
  '/admin/supervision': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/909rf4/9ie_2f',
  '/admin/lesClasses': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/724rf1/7ie_0f',
  '/admin/lesMatieres': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/990rf7/6ie_0f',
  '/admin/lesFraisDeScolarite': 'dc9_ahaf/453rf3/4ie_6f/dc7_ahaf/139rf6/6ie_1f',
  '/admin/coefficientMatiere': 'dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/804rf2/5ie_8f',
  '/admin/anneeScolaire': 'dc9_ahaf/453rf3/4ie_6f/dc8_ahaf/675rf9/1ie_6f',
  '/admin/fonctionPersonnel': 'dc9_ahaf/453rf3/4ie_6f/dc7_ahaf/671rf7/3ie_1f',
  '/admin/gestionRapports': 'dc9_ahaf/453rf3/4ie_6f/dc8_ahaf/678rf0/1ie_4f',
  '/admin/listeComptes': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/197rf2/9ie_6f',
  '/admin/lesBanlanes': 'dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/030rf8/0ie_9f',
  '/admin/lesJournales': 'dc9_ahaf/453rf3/4ie_6f/dc4_ahaf/270rf9/2ie_7f',
  '/admin/gestionUsers': 'dc9_ahaf/453rf3/4ie_6f/dc9_ahaf/453rf3/4ie_6f3',

  '/eleve/detail_note': 'dc4_ahaf/026rf6/7ie_9f/dc1_ahaf/684rf4/8ie_4f',
  '/eleve/Paiements': 'dc4_ahaf/026rf6/7ie_9f/dc0_ahaf/121rf6/7ie_4f',
  '/eleve/EmploiDuTemps_eleve': 'dc4_ahaf/026rf6/7ie_9f/dc6_ahaf/816rf0/2ie_1f',
  '/eleve/RelevesDeNotes': 'dc4_ahaf/026rf6/7ie_9f/dc4_ahaf/066rf7/4ie_0f',
  '/eleve/Renseignements': 'dc4_ahaf/026rf6/7ie_9f/dc0_ahaf/227rf8/4ie_7f',

  '/enseignant/emploiDuTemps': 'dc7_ahaf/648rf2/0ie_5f/dc3_ahaf/649rf3/2ie_1f',
  '/enseignant/organiserEvaluations': 'dc7_ahaf/648rf2/0ie_5f/dc6_ahaf/643rf3/8ie_3f',
  '/enseignant/noterLesEleves': 'dc7_ahaf/648rf2/0ie_5f/dc5_ahaf/272rf4/3ie_3f',
  '/enseignant/listesEleves': 'dc7_ahaf/648rf2/0ie_5f/dc6_ahaf/196rf6/4ie_4f',
  '/enseignant/etatSalaire': 'dc7_ahaf/648rf2/0ie_5f/dc9_ahaf/502rf5/2ie_8f',

  '/admin/profil': 'dc9_ahaf/453rf3/4ie_6f/profil',
  '/enseignant/profil': 'dc7_ahaf/648rf2/0ie_5f/profil',
  'signUp': 'signUp',
  'signIn': 'signIn',
  'historiqueBilly': 'historiqueBilly',
  'nosCours': 'nosCours',
  // Ajoute autant que tu veux ici
};






// Cette ligne inverse les paires clé/valeur pour faire la correspondance inverse
export const ReverseRouteMap: Record<string, string> = Object.fromEntries(
  Object.entries(RouteMap).map(([key, value]) => [value, key])
);
