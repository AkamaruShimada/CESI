using System;
using System.Collections.Generic;

class HelloWorld
{
  static void Main ()
  {

    var lv = new List < Vehicule > ();

    do{

    Console.WriteLine("Vehicule");
    Console.Write("Immatriculation : ");
    string i = Console.ReadLine();
    Console.Write("Type (1. Moto 2.Voiture) :");
    var t = Console.ReadLine();
    
    if (t="2")
      lv.Add (new Voiture (i));
else
      lv.Add (new Moto (i));
}
    try
    {
      foreach (Vehicule v in lv)
      {
    	  if (v is IEnginMotorise)
    	  {
    	    (v as IEnginMotorise).Demarrer ();
    	  }
      }
    }
    catch 
    {
        Console.WriteLine("Erreur Fatale, veuillez evacuez la salle !");
    }

    //   Voiture maVoiture = new Voiture("Ferrari","F40");
    //   Voiture taVoiture = new Voiture("Citroen","2CV");
    //   Moto saMoto = new Moto("Yamaha","T-Max");

// Voiture sa = new Voiture { Marque = "BMW" };
    //   maVoiture.Demarrer();
    //   taVoiture.Demarrer();
    //  saMoto.Demarrer();
    // Console.WriteLine("{0}", maVoiture.Marque);
  }
}
