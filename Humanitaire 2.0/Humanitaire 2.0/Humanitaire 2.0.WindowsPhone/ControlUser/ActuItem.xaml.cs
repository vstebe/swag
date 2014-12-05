using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Navigation;
using Windows.Data.Json;
using Windows.Networking;

// Pour en savoir plus sur le modèle d’élément Page vierge, consultez la page http://go.microsoft.com/fwlink/?LinkID=390556

namespace Humanitaire_2._0
{
    /// <summary>
    /// Une page vide peut être utilisée seule ou constituer une page de destination au sein d'un frame.
    /// </summary>
    public sealed partial class ActuItem : Grid
    {
        private string Time { get; set; }
        private string Text { get; set; }
        private string Author { get; set; }


        public ActuItem()
        {
            this.InitializeComponent();
        }

        public ActuItem(string time, string text, string author)
        {
            this.InitializeComponent();
            this.Time = time;
            this.Text = text;
            this.Author = author;
        }

    }
}
