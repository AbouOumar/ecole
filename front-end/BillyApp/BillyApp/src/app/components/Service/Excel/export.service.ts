import { WorkSheet, WorkBook } from './../../../../../node_modules/xlsx/types/index.d';
import { Injectable } from '@angular/core';
import { buffer } from 'stream/consumers';
import * as FileSaver from 'file-saver'
import * as XLSX from 'xlsx';

@Injectable({
  providedIn: 'root'
})
export class ExportService {

  constructor() { }
  exportAsExcel(data: any[], fileName: string):void{
    const ws: XLSX.WorkSheet = XLSX.utils.json_to_sheet(data)
    const wb: XLSX.WorkBook = {Sheets: {data: ws},
    SheetNames: ['data']};
    const  excelBuffer: any = XLSX.write(wb, {bookType: 'xlsx', type:'array'})
        this.saveAsExcelFile(excelBuffer, fileName)
  }

  private saveAsExcelFile(buffer: any, fileName: string):void{
    const blob: Blob = new Blob([buffer], {
        type:'application/vnd.openxmlformats-office-officedocument.spreadsheetml.sheet;charset=UTF-8',
    });
    FileSaver.saveAs(blob, `${fileName}.Xlsx`);

  }
}
