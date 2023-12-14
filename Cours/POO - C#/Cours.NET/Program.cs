List<SuperHeros> Heros = new();
var content = File.ReadLines("D:\\CESI\\Cours\\POO - C#\\Cours.NET\\Data\\Avengers.csv").ToList();
foreach (var line in content)
{
    var fields = line.Split(';');
    Heros.Add(new SuperHeros(fields[0], fields[1], fields[2]));

}

//Tri de la liste
Heros.Sort();

//Affichage
foreach (var sh in Heros)
{
    Console.WriteLine(sh);
}
class SuperHeros : IComparable
{
    string Pseudo { get; set; }
    string Nom { get; set; }
    string Prenom { get; set; }

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
