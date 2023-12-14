using System;

namespace DemoWPF
{
    class SuperHeros : IComparable
    {
        public string Pseudo { get; set; }
        public string Nom { get; set; }
        public string Prenom { get; set; }

        public SuperHeros(string pseudo, string nom, string prenom)
        {
            Pseudo = pseudo; Nom = nom; Prenom = prenom;
        }
        public override string ToString()
        {
            return $"Pseudo: {Pseudo} Nom: {Nom} Prenom: {Prenom}";
        }

        public int CompareTo(object? obj)
        {
            if (obj == null) return -1;
            else return Pseudo.CompareTo((obj as SuperHeros)?.Pseudo);
        }
    }
}
