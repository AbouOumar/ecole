import { User } from "../app/Classes/Users/user";

// Environnement de développement (ng serve) : API Laravel locale.
export const environment={
    production: false,
    apiUrl: 'http://127.0.0.1:8000/api',
    ip: 'http://127.0.0.1',

    user: User,
  NameBilly: "Billy-Ecole",
  siteEmail: "billyecole@gmail.com"
}
