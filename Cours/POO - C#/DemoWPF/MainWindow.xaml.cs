using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Threading;
using Microsoft.VisualBasic;
using Microsoft.Win32;

namespace DemoWPF
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        static List<SuperHeros> Heros = new();

        public MainWindow()
        {
            InitializeComponent();
            DispatcherTimer dt = new()
            {
                Interval = new TimeSpan(0, 0, 1),
            };
            dt.Tick += (o, e) => { Lbl_Time.Content = DateTime.Now.ToString(); };
            dt.Start();

        }

        private void Btn_Connect_Click(object sender, RoutedEventArgs e)
        {
            OpenFileDialog ofd = new OpenFileDialog();
            ofd.InitialDirectory = "D:\\CESI\\Cours\\POO - C#\\DemoWPF\\Data";
            if (ofd.ShowDialog().Value)
            {
                TB_Login.Text = ofd.FileName;
            }

            LoadFile(TB_Login.Text);

            Lst_Username.Items.Clear();
            Lst_Username.ItemsSource = Heros;

        }

        private static void LoadFile(string filename)
        {
            Heros.Clear();
            var content = File.ReadLines(filename).ToList();
            foreach (var line in content)
            {
                var fields = line.Split(';');
                Heros.Add(new SuperHeros(fields[0], fields[1], fields[2]));
            }
                Heros.Sort();

        }

        private void Lst_Username_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if(Lst_Username.SelectedItem != null)
            {
                var sh = (SuperHeros)Lst_Username.SelectedItem;
                Lbl_Username.Content = sh.Pseudo;
                Lbl_Surname.Content = sh.Nom;
                Lbl_Name.Content = sh.Prenom;
                BitmapImage bmp = new(new Uri("C:\\Users\\manki\\Desktop\\A ne pas touché\\Image\\A dessiner\\Kaneki 3.jpg"));
                Img_SH.Source = bmp;


            }
        }
    }
}
