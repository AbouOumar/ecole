import { User } from "../app/Classes/Users/user";

// Environnement de production (ng build) : remplace environment.ts, voir angular.json.
export const environment={
    production: true,
    apiUrl: 'http://192.168.1.2:8000/api',
    ip: 'http://192.168.1.2',

    user: User,
  NameBilly: "Billy-Ecole",
  siteEmail: "billyecole@gmail.com"
}
