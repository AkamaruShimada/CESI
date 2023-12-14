import java.lang.invoke.SwitchPoint;
import java.util.Scanner;
import java.text.DecimalFormat;

// Press Shift twice to open the Search Everywhere dialog and type `show whitespaces`,
// then press Enter. You can now see whitespace characters in your code.
public class Main {


    public static void main(String[] args) {
        ventePC();
        Richter();
    }

    public static void ventePC(){
        double prixOrdinateur = 799.99;
        double prixEcran = 149.99;
        double prixClavier = 17.99;

        boolean taxeAPayer = false;
        double taxe = 0;
        int nbOrdinateur = 1;
        int nbEcran = 1;
        int nbClavier = 1;

        DecimalFormat df = new DecimalFormat("#.##");

        double montant = (prixOrdinateur * nbOrdinateur) + (prixEcran * nbEcran) + (prixClavier * nbClavier);

        if(montant < 1000) {
            taxeAPayer = true;
            taxe = 0.07;
            montant = montant + (montant * taxe);
            String montantFormate = df.format(montant);
            System.out.println(montantFormate);
        } else if (montant >= 1000 && montant < 2500) {
            taxeAPayer = true;
            taxe = 0.12;
            montant = montant + (montant * taxe);
            String montantFormate = df.format(montant);
            System.out.println(montantFormate);
        } else if (montant > 2500) {
            taxeAPayer = true;
            taxe = 0.25;
            montant = montant + (montant * taxe);
            String montantFormate = df.format(montant);
            System.out.println(montantFormate);
        }
    }

    public static void Richter(){
        Scanner scanner = new Scanner(System.in);
        System.out.println("Insérer la magnitude que vous avez lu");

        int magnitude = scanner.nextInt();

        switch (magnitude) {
            case 1 :
                System.out.println("Micro tremblement de terre, non ressenti");
                break;
            case 2 :
                System.out.println("Très mineur. Non ressenti mais détecté");
                break;
            case 3 :
                System.out.println("Mineur. Causant rarement des dommages");
                break;
            case 4 :
                System.out.println("Léger. Secousses notables d'objets à l'intérieur des maisons");
                break;
            case 5 :
                System.out.println("Modéré. Légers dommages aux édifices bien construits");
                break;
            case 6 :
                System.out.println("Fort. Destruceur dans des zones allant jusqu'à 180km à la rondes si elles sont peuplées");
                break;
            case 7 :
                System.out.println("Majeur. Dommages modérés à sévères dans des zones plus vastes.");
                break;
            case 8 :
                System.out.println("Important. Dommages sérieux dans des zones à des centaines de kilomètres à la ronde");
                break;
            case 9 :
                System.out.println("Dévasteur. Dévaste des zones sur des millers de km à la ronde");
                break;
            default :
                if(magnitude < 1) {
                    System.out.println("Erreur de saisie");
                } else {
                    System.out.println("APOCALYPSE");
                }

        }
    }

}