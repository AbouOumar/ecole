import { Component } from "@angular/core"
import { FormGroup, FormBuilder, Validators } from "@angular/forms"
import { Eleve } from "../Classes/Eleves/eleve"
import { Ins_reins } from "../Classes/Inscription_reinscription/ins_reins"
import { ParentEleves } from "../Classes/ParentEleves/parentEleves"
import { Parents } from "../Classes/Parents/parents"
import { ServiceEleveService } from "../Service/Eleves/service-eleve.service"

export interface Note {
    matricule?: string,
    nom?: string,
    prenom?: string
    note_orale?: number,
    note_ecrite?: number,
    composition?: number,
    mois?: string,
    matiere?: string,
    classe?: string
}

