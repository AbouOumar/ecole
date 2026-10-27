export class Depense {
    id?:number
    compte_id?:number
    type_depense_id?:number
    typeTransaction:string='retrait'
    montantTransanction?:number
    piece_jointe?:File|''
    description?:string
}
